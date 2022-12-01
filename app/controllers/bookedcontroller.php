<?php
require __DIR__ . '/controller.php';

class BookedController extends Controller
{
    public function index()
    {
        require_once __DIR__ . '/../views/booked/index.php';
    }
}
?>