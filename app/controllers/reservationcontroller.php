<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../models/booking.php';
require_once __DIR__ . '/../models/customer.php';
require_once __DIR__ . '/../models/room.php';
require __DIR__ . '/../repositories/bookingrepository.php';

session_start();

class ReservationController extends Controller
{
    protected static $bookingRepository;

    public function index()
    {
        self::$bookingRepository = new BookingRepository();
        $room = self::$bookingRepository->getRoomById($_GET['roomid']);

        # TODO: use room object to show room information in view
        $this->displayView($room);
    }

    public function bookRoom()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # sanitize input
            $firstname = htmlspecialchars($_POST['firstname']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $email = htmlspecialchars($_POST['email']);
            $phone_number = htmlspecialchars($_POST['phone_number']);
            $postal_code = htmlspecialchars($_POST['postal_code']);
            $house_number = htmlspecialchars($_POST['house_number']);
            $streetname = htmlspecialchars($_POST['streetname']);
            $residence = htmlspecialchars($_POST['residence']);
            $customer = new Customer($firstname, $lastname, $email, $phone_number, $postal_code, $house_number, $streetname, $residence);


            # get the booking from the session and add the customer
            $booking = $_SESSION['booking'];
            $booking->customer = $customer;

            # book the room
            self::$bookingRepository = new BookingRepository();
            self::$bookingRepository->bookRoom($booking);
        }
    }
}
?>