<?php
require_once __DIR__ . '/controller.php';

class HomeController extends Controller
{
    # initial load view of home
    public function index()
    {
        require __DIR__ . '/../views/home/index.php';
    }

    public function getAvailableRooms()
    {
        # listen for post request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # sanitize input             
            $amountOfGuests = htmlspecialchars($_POST['amount_of_guests']);
            $beginDate = htmlspecialchars($_POST['check_in_date']);
            $endDate = htmlspecialchars($_POST['check_out_date']);

            # go to book page with query string
            header('Location: /availability?beginDate=' . $beginDate . '&endDate=' . $endDate . '&amountOfGuests=' . $amountOfGuests);
        }
    }
}
?>