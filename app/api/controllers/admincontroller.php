<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../../services/service.php';

class AdminController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new Service();
    }

    public function deleteBooking()
    {
        // Parse the request body as JSON
        $request_body = file_get_contents('php://input');
        $request_data = json_decode($request_body, true);

        // Get the booking ID from the request data
        $id = htmlspecialchars($request_data['id']);
        // Delete the booking
        if ($this->service->deleteBooking($id)) {
            // Return a response to the client
            header('Content-Type: application/json');
            $this->respond(['message' => 'Booking deleted']);
        } else {
            // Return a response to the client
            header('Content-Type: application/json');
            $this->respond(['message' => 'Booking not deleted']);
        }

    }

    public function updateBooking()
    {
        // Parse the request body as JSON
        $request_body = file_get_contents('php://input');
        $request_data = json_decode($request_body, true);

        // get the required data from the request data
        $id = htmlspecialchars($request_data['id']);
        $amountOfVisitors = htmlspecialchars($request_data['amountOfVisitors']);
        $checkInDate = htmlspecialchars($request_data['checkInDate']);
        $checkOutDate = htmlspecialchars($request_data['checkOutDate']);
        $price = htmlspecialchars($request_data['price']);

        if ($this->service->updateBooking($id, $amountOfVisitors, $checkInDate, $checkOutDate, $price)) {
            // echo json that the booking was updated
            $this->respond(['message' => 'Booking updated']);
        } else {
            // echo json that the booking was not updated
            $this->respond(['message' => 'Booking not updated']);
        }
    }

    public function getBookingDetails()
    {
        // Parse the request body as JSON
        $request_body = file_get_contents('php://input');
        $request_data = json_decode($request_body, true);

        // Get the booking ID from the request data
        $id = htmlspecialchars($request_data['id']);
        // Get the booking details from the database
        $booking = $this->service->getBookingDetails($id);

        // Return a response to the client
        header('Content-Type: application/json');
        $this->respond($booking);
    }
}