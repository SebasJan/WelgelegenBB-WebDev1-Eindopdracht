<?php
require __DIR__ . '/controller.php';

class AvailabilityController extends Controller
{
    # initial load view of home
    public function index()
    {
        # get query string
        $beginDate = $_GET['beginDate'];
        $endDate = $_GET['endDate'];
        $amountOfGuests = $_GET['amountOfGuests'];

        # get all rooms
        require __DIR__ . '/../repositories/bookingrepository.php';
        $bookingRepository = new BookingRepository();
        $rooms = $bookingRepository->getAvailableRooms($amountOfGuests, $beginDate, $endDate);

        $this->displayView($rooms);
    }
}
?>