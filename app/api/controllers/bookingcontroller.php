<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../../services/service.php';

class BookingController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new Service();
    }

    public function getAllBookings()
    {
        $bookings = $this->service->getAllBookings();
        if (count($bookings) == 0) {
            $this->respond(array('Message' => 'No bookings found'));
        } else {
            $this->respond($bookings);
        }
    }
}