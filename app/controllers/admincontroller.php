<?php
require __DIR__ . '/controller.php';

session_start();

class AdminController extends Controller
{
    public function index()
    {
        # check if user is logged in
        if (!isset($_SESSION['loggedIn'])) {
            header('Location: /login');
            return;
        }
        # get all bookings
        require __DIR__ . '/../services/bookingservice.php';
        $bookingService = new BookingService();
        $bookings = $bookingService->getAllBookings();
        $this->displayView($bookings);
        # require __DIR__ . '/../views/admin/index.php';
    }

    public function validateLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # sanitize input
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            # check if username and password are correct
            // TODO: implement with data from database
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
}
?>