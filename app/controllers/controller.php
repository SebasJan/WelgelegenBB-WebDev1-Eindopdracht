<?php
require __DIR__ . '/../services/bookingservice.php';
class Controller
{
    // this class is used to initialize the different service classes and make them available to the controllers
    protected $bookingService;
    public function __construct()
    {
        $this->bookingService = new BookingService();
    }
}