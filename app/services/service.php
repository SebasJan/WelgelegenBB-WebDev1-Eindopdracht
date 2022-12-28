<?php
require __DIR__ . '/../repositories/repository.php';

class Service
{
    private $repository;

    public function __construct()
    {
        $this->repository = new Repository();
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

        return $this->repository->updateBooking($amountOfVisitors, $checkInDate, $checkOutDate, $price, $id);
    }

    public function bookRoom($booking)
    {
        return $this->repository->bookRoom($booking);
    }

    public function getCustomerById($customerId)
    {
        $customerRaw = $this->repository->getCustomerById($customerId);

        # create customer object
        require_once __DIR__ . '/../models/customer.php';
        $customer = new Customer(
            $customerRaw['firstname'], $customerRaw['lastname'], $customerRaw['email'], $customerRaw['phonenumber'],
            $customerRaw['postal_code'], $customerRaw['house_number'], $customerRaw['streetname'], $customerRaw['residence']
        );
        return $customer;
    }

    public function getAllBookings()
    {
        $bookings = $this->repository->getAllBookings();
        # format into booking objects
        $bookingObjects = [];
        foreach ($bookings as $booking) {
            # get room and customer by id
            $room = $this->getRoomById($booking['room_id']);
            $customer = $this->getCustomerById($booking['customer_id']);
            $id = $booking['id'];

            # create booking object and add to array
            require_once __DIR__ . '/../models/booking.php';
            $bookingObject = new Booking($room, $booking['amount_of_visitors'], $booking['booking_date_begin'], $booking['booking_date_end'], $booking['price']);
            $bookingObject->customer = $customer;
            $bookingObject->id = $id;
            $bookingObjects[] = $bookingObject;
        }
        return $bookingObjects;
    }

    public function deleteBooking()
    {
        // Parse the request body as JSON
        $request_body = file_get_contents('php://input');
        $request_data = json_decode($request_body, true);

        // Get the booking ID from the request data
        $id = htmlspecialchars($request_data['id']);

        return $this->repository->deleteBooking($id);
    }

    public function getBookingDetails()
    {
        // Parse the request body as JSON
        $request_body = file_get_contents('php://input');
        $request_data = json_decode($request_body, true);

        // Get the booking ID from the request data
        $id = htmlspecialchars($request_data['id']);

        return $this->getBookingById($id);
    }

    private function getBookingById($id)
    {
        $bookingRaw = $this->repository->getBookingById($id);

        # get room and customer by id
        $room = $this->getRoomById($bookingRaw['room_id']);
        $customer = $this->getCustomerById($bookingRaw['customer_id']);

        # create booking object
        require_once __DIR__ . '/../models/booking.php';
        $booking = new Booking($room, $bookingRaw['amount_of_visitors'], $bookingRaw['booking_date_begin'], $bookingRaw['booking_date_end'], $bookingRaw['price']);
        $booking->customer = $customer;
        $booking->id = $id;
        return $booking;
    }

    public function getAvailableRooms($amountOfGuests, $beginDate, $endDate)
    {
        return $this->repository->getAvailableRooms($amountOfGuests, $beginDate, $endDate);
    }

    public function getAllRooms()
    {
        return $this->repository->getAllRooms();
    }

    public function getRoomById($roomId)
    {
        $roomRaw = $this->repository->getRoomById($roomId);

        # create room object
        require_once __DIR__ . '/../models/room.php';
        $room = new Room($roomRaw['id'], $roomRaw['room_name'], $roomRaw['capacity'], $roomRaw['description'], $roomRaw['price_per_night']);
        return $room;
    }

    public function verifyUser($username, $passwordGiven)
    {
        $passwordHash = $this->repository->getPassword($username);
        if (password_verify($passwordGiven, $passwordHash)) {
            return true;
        } else {
            return false;
        }
    }
}
?>