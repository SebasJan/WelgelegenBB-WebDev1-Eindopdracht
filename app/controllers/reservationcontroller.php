<?php
require_once __DIR__ . '/controller.php';

class ReservationController extends Controller
{
    public function index()
    {
        require __DIR__ . '/../views/reservation/index.php';
    }
}
?>