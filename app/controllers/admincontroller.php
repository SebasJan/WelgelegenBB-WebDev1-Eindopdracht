<?php
require __DIR__ . '/controller.php';

session_start();

class AdminController extends Controller
{
    public function index()
    {
        # check if user is logged in
        // TODO: do via service layer
        if (!isset($_SESSION['loggedIn'])) {
            header('Location: /login');
            return;
        }
        # get all bookings
        require __DIR__ . '/../services/bookingservice.php';
        $bookingService = new BookingService();
        $bookings = $bookingService->getAllBookings();
        $this->displayView($bookings);
    }

    public function validateLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # sanitize input
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            # check if username and password are correct
            // TODO: implement with data from database in service layer
            // TODO: do this via service layer
            if ($username == 'admin' && $password == 'admin') {
                $_SESSION['loggedIn'] = true;
                header('Location: /admin');
            } else {
                echo '<script>alert("Username or password is incorrect")</script>';
                // header('Location: /login');
                echo '<script>window.location.href = "/login"</script>';
            }
        }
    }

    public function deleteBooking()
    {

    }

    public function updateBooking()
    {

    }
}
?>