<?php
class HomeController extends Controller {
    public function index() {
        $productModel = new Product();
        $page = $_GET['page'] ?? 1;
        $limit = 12;
        $offset = ($page - 1) * $limit;
        $products = $productModel->getAllApproved(null, '', $limit, $offset);
        $total = $productModel->countApproved();
        $totalPages = ceil($total / $limit);
        $this->view('home/index', [
            'products' => $products,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ]);
    }
}