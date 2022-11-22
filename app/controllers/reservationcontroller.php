<?php
require_once __DIR__ . '/controller.php';

class ReservationController extends Controller
{
    public function index()
    {
        require __DIR__ . '/../repositories/bookingrepository.php';
        $bookingRepository = new BookingRepository();
        $room = $bookingRepository->getRoomById($_GET['roomid']);
        $this->displayView($room);
    }
}
?>