<?php
require __DIR__ . '/controller.php';


class AvailabilityController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    # initial load view of home
    public function index()
    {
        # get query string
        $beginDate = $_GET['beginDate'];
        $endDate = $_GET['endDate'];
        $amountOfGuests = $_GET['amountOfGuests'];

        # get all rooms        
        $rooms = $this->service->getAvailableRooms($amountOfGuests, $beginDate, $endDate);

        require_once __DIR__ . '/../views/availability/index.php';
    }
}
?>