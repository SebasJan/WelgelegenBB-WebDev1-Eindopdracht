<?php
require_once __DIR__ . '/controller.php';

class LoginController extends Controller
{
    public function index()
    {
        require __DIR__ . '/../views/login/index.php';
    }
}
?>