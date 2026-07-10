<?php
class TicketsController extends Controller {
    public function index() {
        Auth::requireLogin();
        $ticketModel = new Ticket();
        $tickets = $ticketModel->getUserTickets(Auth::user()['id']);
        $this->view('ticket/index', ['tickets' => $tickets]);
    }

    public function create() {
        Auth::requireLogin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->validateCsrf();
            $ticketModel = new Ticket();
            $ticketModel->create(Auth::user()['id'], $_POST['subject'], $_POST['message']);
            $this->redirect('/tickets');
        }
        $this->view('ticket/create');
    }
}