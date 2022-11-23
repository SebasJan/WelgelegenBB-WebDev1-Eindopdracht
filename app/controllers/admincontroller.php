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
        require __DIR__ . '/../views/admin/index.php';
    }

    public function validateLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # sanitize input
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            # check if username and password are correct
            if ($username == 'admin' && $password == 'admin') {
                $_SESSION['loggedIn'] = true;
                header('Location: /admin');
            } else {
                header('Location: /login');
            }
        }
    }
}

?>