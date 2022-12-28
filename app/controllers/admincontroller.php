<?php

session_start();
require __DIR__ . '/controller.php';

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->checkIfLoggedIn();

        # if the user is logged in -> get all bookings        
        $bookings = $this->service->getAllBookings();

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
            if ($this->service->verifyUser($username, $password)) {
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
            // Delete the booking
            if ($this->service->deleteBooking()) {
                // Return a response to the client
                header('Content-Type: application/json');
                echo json_encode(['message' => 'Booking deleted']);
            } else {
                // Return a response to the client
                header('Content-Type: application/json');
                echo json_encode(['message' => 'Booking not deleted']);
            }
        }
    }

    public function updateBooking()
    {
        // update the booking
        $this->checkIfLoggedIn();

        if ($this->service->updateBooking()) {
            // echo json that the booking was updated
            header('Content-Type: application/json');
            echo json_encode(['message' => 'Booking updated']);
        } else {
            // echo json that the booking was not updated
            header('Content-Type: application/json');
            echo json_encode(['message' => 'Booking not updated']);
        }
    }

    public function getBookingDetails()
    {
        $this->checkIfLoggedIn();

        // Get the booking details from the database
        $booking = $this->service->getBookingDetails();

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