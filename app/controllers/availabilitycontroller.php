<?php
require_once __DIR__ . '/controller.php';

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
        $beginDate = htmlspecialchars($_GET['beginDate']);
        $endDate = htmlspecialchars($_GET['endDate']);
        $amountOfGuests = htmlspecialchars($_GET['amountOfGuests']);

        # get all rooms  ($rooms variable used in view)      
        $rooms = $this->service->getAvailableRooms($amountOfGuests, $beginDate, $endDate);

        require_once __DIR__ . '/../views/availability/index.php';
    }
}
?>