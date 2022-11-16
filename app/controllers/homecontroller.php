<?php
require __DIR__ . '/controller.php';

class HomeController extends Controller
{
    # initial load view of home
    public function index()
    {
        require __DIR__ . '/../views/home/index.php';
    }

    public function bookingSearch()
    {
        # show booking search form
        require __DIR__ . '/../views/home/bookingsearch.inc.php';
    }
}
?>