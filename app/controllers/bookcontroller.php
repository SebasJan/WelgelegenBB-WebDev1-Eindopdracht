<?php
require __DIR__ . '/controller.php';

class BookController extends Controller
{
    # initial load view of home
    public function index()
    {
        require __DIR__ . '/../views/book/index.php';
    }
}
?>