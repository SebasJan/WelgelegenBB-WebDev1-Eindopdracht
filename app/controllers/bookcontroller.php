<?php
require __DIR__ . '/controller.php';

class BookController extends Controller
{
    # initial load view of home
    public function index()
    {
        require __DIR__ . '/../views/book/index.php';
    }

    public function bookingSearch()
    {
        // TODO: Moet dit hier??
        require_once __DIR__ . '/../repositories/bookingrepository.php';
        $bookingRepository = new BookingRepository();
        # show booking search form
        require __DIR__ . '/../views/home/bookingsearch.inc.php';
    }
}
?>