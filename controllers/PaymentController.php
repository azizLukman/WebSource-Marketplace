<?php
class PaymentController extends Controller {
    // Upload bukti pembayaran
    public function upload($orderId) {
        Auth::requireLogin();
        $orderModel = new Order();
        $order = $orderModel->getById($orderId);
        if (!$order || $order['buyer_id'] != Auth::user()['id'] || $order['status'] != 'pending') {
            die('Akses tidak sah.');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['payment_proof'])) {
            $this->validateCsrf();
            $filename = Helper::uploadFile($_FILES['payment_proof'], STORAGE_PATH . 'payments/');
            if ($filename) {
                $orderModel->uploadPaymentProof($orderId, $filename);
                $this->setFlash('success', 'Bukti pembayaran berhasil diupload. Menunggu verifikasi admin.');
                $this->redirect('/user/orders');
            }
        }
        $this->view('payment/upload', ['order' => $order]);
    }

    // ** BARU: Halaman instruksi pembayaran **
    public function instruction($orderId) {
        Auth::requireLogin();
        $orderModel = new Order();
        $order = $orderModel->getById($orderId);
        if (!$order || $order['buyer_id'] != Auth::user()['id']) {
            die('Akses tidak sah.');
        }
        $bankName = Helper::getSetting('bank_name');
        $accountNumber = Helper::getSetting('account_number');
        $accountHolder = Helper::getSetting('account_holder');
        $this->view('payment/instruction', [
            'order' => $order,
            'bankName' => $bankName,
            'accountNumber' => $accountNumber,
            'accountHolder' => $accountHolder
        ]);
    }
}