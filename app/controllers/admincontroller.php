<?php

session_start();
// require __DIR__ . '/../services/bookingservice.php';

class AdminController
{
    // private $service;

    public function __construct()
    {
        //$this->service = new BookingService();
    }

    public function index()
    {
        $this->checkIfLoggedIn();

        # if the user is logged in -> get all bookings
        require __DIR__ . '/../services/bookingservice.php';
        $bookingService = new BookingService();
        $bookings = $bookingService->getAllBookings();

        # render view
        require_once __DIR__ . '/../views/admin/index.php';
    }

    public function validateLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # sanitize input
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            # check if username and password are correct
            // if ($this->service->verifyUser($username, $password)) {
            //     $_SESSION['loggedIn'] = true;
            //     header('Location: /admin');
            // } else {
            //     echo '<script>alert("Username or password is incorrect")</script>';
            //     echo '<script>window.location.href = "/login"</script>';
            // }

            if ($username == 'admin' && $password == 'admin') {
                $_SESSION['loggedIn'] = true;
                header('Location: /admin');
            } else {
                echo '<script>alert("Username or password is incorrect")</script>';
                echo '<script>window.location.href = "/login"</script>';
            }
        }
    }

    public function deleteBooking()
    {
        $this->checkIfLoggedIn();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Parse the request body as JSON
            $request_body = file_get_contents('php://input');
            $request_data = json_decode($request_body, true);

            // Get the booking ID from the request data
            $id = htmlspecialchars($request_data['id']);

            // Delete the booking
            require __DIR__ . '/../services/bookingservice.php';
            $bookingService = new BookingService();
            $bookingService->deleteBooking($id);

            // Return a response to the client
            header('Content-Type: application/json');
            echo json_encode(['message' => 'Booking deleted']);
        }
    }

    public function updateBooking()
    {
        // update the booking
        $this->checkIfLoggedIn();

        // Parse the request body as JSON
        $request_body = file_get_contents('php://input');
        $request_data = json_decode($request_body, true);

        require __DIR__ . '/../services/bookingservice.php';
        $bookingService = new BookingService();

        // get the required data from the request data
        $id = htmlspecialchars($request_data['id']);
        $amountOfVisitors = htmlspecialchars($request_data['amountOfVisitors']);
        $checkInDate = htmlspecialchars($request_data['checkInDate']);
        $checkOutDate = htmlspecialchars($request_data['checkOutDate']);
        $price = htmlspecialchars($request_data['price']);

        $bookingService->updateBooking($amountOfVisitors, $checkInDate, $checkOutDate, $price, $id);

        // echo json that the booking was updated
        header('Content-Type: application/json');
        echo json_encode(['message' => 'Booking updated']);
    }

    public function getBookingDetails()
    {
        $this->checkIfLoggedIn();

        // Parse the request body as JSON
        $request_body = file_get_contents('php://input');
        $request_data = json_decode($request_body, true);

        // Get the booking ID from the request data
        $id = htmlspecialchars($request_data['id']);

        require __DIR__ . '/../services/bookingservice.php';
        $bookingService = new BookingService();

        // Get the booking details from the database
        $booking = $bookingService->getBookingById($id);

        // Return a response to the client
        header('Content-Type: application/json');
        echo json_encode($booking);
    }


    private function checkIfLoggedIn()
    {
        if (!isset($_SESSION['loggedIn'])) {
            header('Location: /login');
            return;
        }
    }
}
?>