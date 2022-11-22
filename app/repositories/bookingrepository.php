<?php
require __DIR__ . '/repository.php';

class BookingRepository extends Repository
{
    public function getAvailableRooms($amountOfGuests, $beginDate, $endDate)
    {
        # TODO: use amount of guests to filter rooms
        # prepare sql statement
        $stmt = $this::$connection->prepare("SELECT * FROM Room WHERE id NOT IN 
                (SELECT room_id FROM Booking WHERE 
                :beginDate BETWEEN booking_date_begin AND booking_date_end
                AND
                :endDate BETWEEN booking_date_begin AND booking_date_end)");

        # bind parameters
        $stmt->bindParam(':beginDate', $beginDate);
        $stmt->bindParam(':endDate', $endDate);

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
        echo 'booking room';
        $this->insertCustomer($booking);
        $this->insertBooking($booking);
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
}
?>