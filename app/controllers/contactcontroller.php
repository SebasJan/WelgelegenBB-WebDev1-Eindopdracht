<?php

class ContactController
{
    public function index()
    {
        // get the booking id from the url if it exists
        $bookingId = isset($_GET['bookingid']) ? $_GET['bookingid'] : null;
        require_once __DIR__ . '/../views/contact/index.php';
    }
}
?>