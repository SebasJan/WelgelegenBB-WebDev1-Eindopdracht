<?php
require __DIR__ . '/repository.php';

class BookingRepository extends Repository
{
    public function getCustomerById($customerId)
    {
        $stmt = $this::$connection->prepare("SELECT * FROM Customer WHERE id = :customerId");
        $stmt->bindParam(':customerId', $customerId);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateBooking($amountOfVisitors, $checkInDate, $checkOutDate, $price, $id)
    {
        $stmt = $this::$connection->prepare("UPDATE Booking SET amount_of_visitors = :amountOfVisitors, booking_date_begin = :beginDate, booking_date_end = :endDate, price = :price WHERE id = :id");
        $stmt->bindParam(':amountOfVisitors', $amountOfVisitors);
        $stmt->bindParam(':beginDate', $checkInDate);
        $stmt->bindParam(':endDate', $checkOutDate);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getBookingById($bookingId)
    {
        $stmt = $this::$connection->prepare("SELECT * FROM Booking WHERE id = :bookingId");
        $stmt->bindParam(':bookingId', $bookingId);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getAllBookings()
    {
        $stmt = $this::$connection->prepare("SELECT id, customer_id, room_id, amount_of_visitors, booking_date_begin, booking_date_end, price FROM Booking");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteBooking($id)
    {
        $stmt = $this::$connection->prepare("DELETE FROM Booking WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getAvailableRooms($amountOfGuests, $beginDate, $endDate)
    {
        # prepare sql statement
        $stmt = $this::$connection->prepare("SELECT * FROM Room WHERE id NOT IN 
                (SELECT room_id FROM Booking WHERE 
                :beginDate BETWEEN booking_date_begin AND booking_date_end
                AND
                :endDate BETWEEN booking_date_begin AND booking_date_end)
                AND :amountOfGuests <= capacity");

        # bind parameters
        $stmt->bindParam(':beginDate', $beginDate);
        $stmt->bindParam(':endDate', $endDate);
        $stmt->bindParam(':amountOfGuests', $amountOfGuests);

        # execute statement
        $stmt->execute();

        # fetch all results
        return $stmt->fetchAll();
    }

    public function getAllRooms()
    {
        # prepare sql statement
        $stmt = $this::$connection->prepare("SELECT * FROM Room");

        # execute statement
        $stmt->execute();

        # fetch all results
        return $stmt->fetchAll();
    }

    public function getRoomById($roomId)
    {
        $stmt = $this::$connection->prepare("SELECT * FROM Room WHERE id = :roomId");

        $stmt->bindParam(':roomId', $roomId);

        $stmt->execute();

        return $stmt->fetch();
    }

    public function bookRoom($booking)
    {
        $this->insertCustomer($booking);
        $this->insertBooking($booking);

        # return the booking id
        return $this::$connection->lastInsertId();
    }

    private function insertBooking($booking)
    {
        # get the id of the customer
        $customerId = $this::$connection->lastInsertId();

        # add booking to database
        $stmt = $this::$connection->prepare("INSERT INTO Booking (customer_id, room_id, booking_date_begin, booking_date_end, amount_of_visitors, price) 
                VALUES (:customerId, :roomId, :beginDate, :endDate, :amountOfVisitors, :price)");

        # bind parameters
        $stmt->bindParam(':customerId', $customerId);
        $stmt->bindParam(':roomId', $booking->room->id);
        $stmt->bindParam(':beginDate', $booking->checkInDate);
        $stmt->bindParam(':endDate', $booking->checkOutDate);
        $stmt->bindParam(':amountOfVisitors', $booking->amountOfVisitors);
        $stmt->bindParam(':price', $booking->price);

        # execute statement
        $stmt->execute();
    }

    private function insertCustomer($booking)
    {
        # first add customer to database
        $stmt = $this::$connection->prepare("INSERT INTO Customer (firstname, lastname, email, phonenumber, postal_code, house_number, streetname, residence) 
                VALUES (:firstname, :lastname, :email, :phone_number, :postal_code, :house_number, :streetname, :residence)");

        # bind parameters
        $stmt->bindParam(':firstname', $booking->customer->firstName);
        $stmt->bindParam(':lastname', $booking->customer->lastName);
        $stmt->bindParam(':email', $booking->customer->email);
        $stmt->bindParam(':phone_number', $booking->customer->phoneNumber);
        $stmt->bindParam(':postal_code', $booking->customer->postalCode);
        $stmt->bindParam(':house_number', $booking->customer->houseNumber);
        $stmt->bindParam(':streetname', $booking->customer->streetname);
        $stmt->bindParam(':residence', $booking->customer->residence);

        # execute statement
        $stmt->execute();
    }

    public function getPassword($username)
    {
        $stmt = $this::$connection->prepare("SELECT password FROM User WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch()[0];
    }
}
?>