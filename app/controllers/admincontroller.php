<?php

session_start();
require_once __DIR__ . '/controller.php';

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->checkIfLoggedIn();

        # if the user is logged in -> get all bookings ($bookings variable used in view)        
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
            if ($this->adminService->verifyUser($username, $password)) {
                $_SESSION['loggedIn'] = true;
                header('Location: /admin');
            } else {
                echo '<script>alert("Username or password is incorrect")</script>';
                echo '<script>window.location.href = "/login"</script>';
            }
        }
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