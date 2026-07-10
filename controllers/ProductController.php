<?php
class ProductController extends Controller {
    public function detail($id) {
        $productModel = new Product();
        $product = $productModel->getById($id);
        if (!$product || $product['status'] != 'approved') {
            $this->redirect('/');
        }
        // Reviews
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT r.*, u.username FROM reviews r JOIN users u ON r.user_id = u.id WHERE r.product_id = ? ORDER BY r.created_at DESC");
        $stmt->execute([$id]);
        $reviews = $stmt->fetchAll();
        $this->view('product/detail', ['product' => $product, 'reviews' => $reviews]);
    }

    public function upload() {
        Auth::requireLogin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->validateCsrf();
            $file = $_FILES['product_file'];
            $filename = Helper::uploadFile($file, STORAGE_PATH . 'products/');
            if (!$filename) {
                $error = 'Gagal upload file.';
                $this->view('product/upload', ['error' => $error]);
                return;
            }

            // ** PERBAIKAN: Validasi ketat category_id **
            $categoryId = null;
            if (!empty($_POST['category_id']) && is_numeric($_POST['category_id'])) {
                $categoryId = (int)$_POST['category_id'];
                // Cek apakah ID kategori benar-benar ada di database
                $db = Database::getInstance()->getConnection();
                $check = $db->prepare("SELECT id FROM categories WHERE id = ?");
                $check->execute([$categoryId]);
                if (!$check->fetch()) {
                    $categoryId = null; // tidak valid, set null
                }
            }

            $data = [
                'seller_id' => Auth::user()['id'],
                'category_id' => $categoryId,
                'title' => $_POST['title'],
                'slug' => Helper::slug($_POST['title']),
                'description' => $_POST['description'],
                'price_regular' => $_POST['price_regular'],
                'price_extended' => !empty($_POST['price_extended']) ? $_POST['price_extended'] : null,
                'file_path' => $filename,
                'demo_url' => !empty($_POST['demo_url']) ? $_POST['demo_url'] : null
            ];

            $productModel = new Product();
            $productModel->create($data);
            $this->redirect('/user/dashboard');
        } else {
            $this->view('product/upload');
        }
    }

    public function buy() {
        Auth::requireLogin();
        $this->validateCsrf();
        $productId = $_POST['product_id'];
        $licenseType = $_POST['license_type'] ?? 'regular';
        $productModel = new Product();
        $product = $productModel->getById($productId);
        if (!$product || $product['status'] != 'approved') $this->redirect('/');
        $amount = $licenseType === 'extended' ? ($product['price_extended'] ?? $product['price_regular']) : $product['price_regular'];
        $orderModel = new Order();
        $orderId = $orderModel->create([
            'buyer_id' => Auth::user()['id'],
            'product_id' => $productId,
            'license_type' => $licenseType,
            'amount' => $amount
        ]);
        $this->redirect('/payment/instruction/' . $orderId);
    }

    // AJAX live search
    public function search() {
        $query = $_GET['q'] ?? '';
        $productModel = new Product();
        $results = $productModel->search($query);
        $this->json($results);
    }
}