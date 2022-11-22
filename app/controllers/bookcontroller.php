<?php
require __DIR__ . '/controller.php';

class BookController extends Controller
{
    # initial load view of home
    public function index()
    {
        $this->displayView($this);
    }
}
?>