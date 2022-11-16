<?php
require __DIR__ . '/controller.php';

class HomeController extends Controller
{
    # initial load view of home
    public function index()
    {
        require __DIR__ . '/../views/home/index.php';
    }

    public function about()
    {
        # show about section on the home page
        // require __DIR__ . '/../views/home/about.php';
    }
}
?>