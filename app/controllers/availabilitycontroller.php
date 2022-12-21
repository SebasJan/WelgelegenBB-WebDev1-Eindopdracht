<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/bookingservice.php';

class AvailabilityController extends Controller
{
    private $bookingService;

    public function __construct()
    {
        $this->bookingService = new BookingService();
    }
    # initial load view of home
    public function index()
    {
        # get query string
        $beginDate = $_GET['beginDate'];
        $endDate = $_GET['endDate'];
        $amountOfGuests = $_GET['amountOfGuests'];

        # get all rooms        
        $rooms = $this->bookingService->getAvailableRooms($amountOfGuests, $beginDate, $endDate);

        $this->displayView($rooms);
    }
}
?>