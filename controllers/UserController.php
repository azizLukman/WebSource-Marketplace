<?php
class UserController extends Controller {
    public function dashboard() {
        Auth::requireLogin();
        $orderModel = new Order();
        $notifModel = new Notification();

        $buyerOrders = $orderModel->getByBuyer(Auth::user()['id']);
        $sellerOrders = $orderModel->getBySeller(Auth::user()['id']);
        $notifications = $notifModel->getByUser(Auth::user()['id'], true); // unread only

        $this->view('user/dashboard', [
            'user' => Auth::user(),
            'totalOrders' => count($buyerOrders),
            'totalSales' => count($sellerOrders),
            'notifications' => $notifications
        ]);
    }

    public function orders() {
        Auth::requireLogin();
        $orderModel = new Order();
        $orders = $orderModel->getByBuyer(Auth::user()['id']);
        $this->view('user/orders', ['orders' => $orders]);
    }

    public function sales() {
        Auth::requireLogin();
        $orderModel = new Order();
        $sales = $orderModel->getBySeller(Auth::user()['id']);
        $this->view('user/sales', ['sales' => $sales]);
    }

    public function myProducts() {
        Auth::requireLogin();
        $productModel = new Product();
        $products = $productModel->getBySeller(Auth::user()['id']);
        $this->view('user/products', ['products' => $products]);
    }

    public function download($orderId) {
        Auth::requireLogin();
        $orderModel = new Order();
        $order = $orderModel->getById($orderId);
        if (!$order || $order['buyer_id'] != Auth::user()['id'] || $order['status'] != 'paid') {
            die('Akses tidak sah.');
        }
        if ($order['download_count'] >= $order['max_downloads'] || strtotime($order['token_expiry']) < time()) {
            die('Download sudah tidak tersedia.');
        }
        $filePath = STORAGE_PATH . 'products/' . $order['file_path'];
        if (!file_exists($filePath)) die('File tidak ditemukan.');
        $orderModel->incrementDownload($orderId);
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
    }

    public function wishlist() {
        Auth::requireLogin();
        $wishModel = new Wishlist();
        $products = $wishModel->getUserWishlist(Auth::user()['id']);
        $this->view('user/wishlist', ['products' => $products]);
    }

    public function toggleWishlist() {
        Auth::requireLogin();
        $productId = $_POST['product_id'];
        $wishModel = new Wishlist();
        $wishModel->toggle(Auth::user()['id'], $productId);
        $this->json(['status' => 'ok']);
    }

    public function withdraw() {
        Auth::requireLogin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->validateCsrf();
            $amount = (float)$_POST['amount'];
            $user = Auth::user();
            if ($amount <= 0 || $user['balance'] < $amount) {
                $error = 'Saldo tidak cukup.';
            } else {
                $userModel = new User();
                $userModel->updateBalance($user['id'], -$amount);
                $this->setFlash('success', 'Withdrawal berhasil diproses.');
                $this->redirect('/user/dashboard');
            }
        }
        $this->view('user/withdraw', ['error' => $error ?? null]);
    }
}