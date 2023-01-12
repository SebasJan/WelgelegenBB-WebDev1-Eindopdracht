<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/customerrepository.php';
class BookingRepository extends Repository
{
    private $customerRepository;

    public function __construct()
    {
        parent::__construct();
        $this->customerRepository = new CustomerRepository();
    }

    public function updateBooking($amountOfVisitors, $checkInDate, $checkOutDate, $price, $id)
    {
        try {
            $stmt = $this::$connection->prepare("UPDATE Booking SET amount_of_visitors = :amountOfVisitors, booking_date_begin = :beginDate, booking_date_end = :endDate, price = :price WHERE id = :id");
            $stmt->bindParam(':amountOfVisitors', $amountOfVisitors);
            $stmt->bindParam(':beginDate', $checkInDate);
            $stmt->bindParam(':endDate', $checkOutDate);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Something went wrong with the database connection, please try again." . $e->getMessage();
        }
    }

    public function getBookingById($bookingId)
    {
        try {
            $stmt = $this::$connection->prepare("SELECT id, customer_id, room_id, amount_of_visitors, booking_date_begin, booking_date_end, price FROM Booking WHERE id = :bookingId");
            $stmt->bindParam(':bookingId', $bookingId);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Something went wrong with the database connection, please try again." . $e->getMessage();
        }
    }

    public function getAllBookings()
    {
        try {
            $stmt = $this::$connection->prepare("SELECT id, customer_id, room_id, amount_of_visitors, booking_date_begin, booking_date_end, price FROM Booking");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Something went wrong with the database connection, please try again." . $e->getMessage();
        }
    }

    public function deleteBooking($id)
    {
        try {
            $stmt = $this::$connection->prepare("DELETE FROM Booking WHERE id = :id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Something went wrong with the database connection, please try again." . $e->getMessage();
        }
    }

    public function bookRoom($booking)
    {
        try {
            $this->customerRepository->checkIfCustomerExists($booking);
            $this->insertBooking($booking);

            # return the booking id
            return $this::$connection->lastInsertId();
        } catch (PDOException $e) {
            echo "Something went wrong with the database connection, please try again." . $e->getMessage();
        }
    }

    private function insertBooking($booking)
    {
        try {
            # get the id of the customer
            $customerId = $this->customerRepository->getCustomerByEmail($booking)["id"];

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
        } catch (PDOException $e) {
            echo "Something went wrong with the database connection, please try again." . $e->getMessage();
        }
    }
}