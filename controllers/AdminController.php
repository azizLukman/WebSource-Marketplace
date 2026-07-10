<?php
class AdminController extends Controller {
    public function dashboard() {
        Auth::requireAdmin();
        $userModel = new User();
        $productModel = new Product();
        $orderModel = new Order();
        $db = Database::getInstance()->getConnection();

        // Ambil 5 order terbaru
        $recentOrders = $db->query("SELECT o.*, p.title as product_title, u.username as buyer_name 
                                    FROM orders o 
                                    JOIN products p ON o.product_id = p.id 
                                    JOIN users u ON o.buyer_id = u.id 
                                    ORDER BY o.created_at DESC LIMIT 5")->fetchAll();

        // Hitung total pendapatan (order dengan status 'paid')
        $stmt = $db->query("SELECT SUM(amount) FROM orders WHERE status = 'paid'");
        $revenue = $stmt->fetchColumn() ?: 0;

        // Data grafik 6 bulan terakhir
        $chartLabels = [];
        $chartData = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = date('Y-m', strtotime("-$i months"));
            $chartLabels[] = date('M Y', strtotime("-$i months"));
            $stmt = $db->prepare("SELECT COUNT(*) FROM orders WHERE DATE_FORMAT(created_at, '%Y-%m') = ?");
            $stmt->execute([$month]);
            $chartData[] = (int)$stmt->fetchColumn();
        }

        $allOrders = $orderModel->getAll();
        $data = [
            'totalUsers' => count(array_filter($userModel->getAll(), fn($u) => $u['role'] === 'user')),
            'totalProducts' => count($productModel->getAllAdmin()),
            'totalOrders'   => count($allOrders),
            'pendingOrders' => count(array_filter($allOrders, fn($o) => $o['status'] == 'pending' && $o['payment_proof'])),
            'recentOrders'  => $recentOrders,
            'revenue'       => $revenue,
            'chartLabels'   => $chartLabels,
            'chartData'     => $chartData,
        ];
        $this->view('admin/dashboard', $data);
    }

    public function products() {
        Auth::requireAdmin();
        $productModel = new Product();
        $products = $productModel->getAllAdmin();
        $this->view('admin/products', ['products' => $products]);
    }

    public function approveProduct($id) {
        Auth::requireAdmin();
        (new Product())->updateStatus($id, 'approved');
        $this->redirect('/admin/products');
    }

    public function rejectProduct($id) {
        Auth::requireAdmin();
        (new Product())->updateStatus($id, 'rejected');
        $this->redirect('/admin/products');
    }

    public function transactions() {
        Auth::requireAdmin();
        $orderModel = new Order();
        $orders = $orderModel->getAll();
        $this->view('admin/transactions', ['orders' => $orders]);
    }

    public function verifyPayment($orderId) {
        Auth::requireAdmin();
        $orderModel = new Order();
        $order = $orderModel->getById($orderId);
        if ($order && $order['payment_proof'] && $order['status'] == 'pending') {
            $orderModel->updateStatus($orderId, 'paid');
            $licenseModel = new License();
            $licenseModel->generate($orderId);
            // Update saldo penjual dengan perhitungan ulang total pendapatan
            $productModel = new Product();
            $product = $productModel->getById($order['product_id']);
            $userModel = new User();
            $userModel->recalculateBalance($product['seller_id']);
            // Notifikasi ke penjual
            $commission = 0.1 * $order['amount'];
            $sellerAmount = $order['amount'] - $commission;
            $notif = new Notification();
            $notif->create($product['seller_id'], "Pembayaran untuk produk {$product['title']} telah diverifikasi. Saldo Anda bertambah Rp " . number_format($sellerAmount,0,',','.'));
        }
        $this->redirect('/admin/transactions');
    }

    public function users() {
        Auth::requireAdmin();
        $userModel = new User();
        $users = $userModel->getAll();
        $this->view('admin/users', ['users' => $users]);
    }

    public function toggleUser($id) {
        Auth::requireAdmin();
        (new User())->toggleActive($id);
        $this->redirect('/admin/users');
    }

    // ** BARU: Reset saldo user berdasarkan transaksi yang valid **
    public function resetBalance($userId) {
        Auth::requireAdmin();
        $userModel = new User();
        $userModel->recalculateBalance($userId);
        $this->redirect('/admin/users');
    }

    public function tickets() {
        Auth::requireAdmin();
        $ticketModel = new Ticket();
        $tickets = $ticketModel->getAll();
        $this->view('admin/tickets', ['tickets' => $tickets]);
    }

    public function replyTicket() {
        Auth::requireAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->validateCsrf();
            $ticketId = $_POST['ticket_id'];
            $reply = $_POST['reply'];
            $ticketModel = new Ticket();
            $ticketModel->reply($ticketId, $reply);
        }
        $this->redirect('/admin/tickets');
    }
}