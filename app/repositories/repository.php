<?php
class Repository
{
    public static $connection;

    function __construct()
    {
        require __DIR__ . '/../dbconfig.php';

        try {
            self::$connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

            // set the PDO error mode to exception
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Something went wrong with the database connection, please try again." . $e->getMessage();
        }
    }

    public function getCustomerById($customerId)
    {
        try {
            $stmt = $this::$connection->prepare("SELECT firstname, lastname, email, phonenumber, postal_code, house_number, streetname, residence  FROM Customer WHERE id = :customerId");
            $stmt->bindParam(':customerId', $customerId);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Something went wrong with the database connection, please try again." . $e->getMessage();
        }
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

    public function getAvailableRooms($amountOfGuests, $beginDate, $endDate)
    {
        try {
            # prepare sql statement
            $stmt = $this::$connection->prepare("SELECT id, room_name, capacity, description, price_per_night FROM Room WHERE id NOT IN 
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
        } catch (PDOException $e) {
            echo "Something went wrong with the database connection, please try again." . $e->getMessage();
        }
    }

    public function getAllRooms()
    {
        try {
            # prepare sql statement
            $stmt = $this::$connection->prepare("SELECT id, room_name, capacity, description, price_per_night FROM Room");
            $stmt->execute();

            # fetch all results
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Something went wrong with the database connection, please try again." . $e->getMessage();
        }
    }

    public function getRoomById($roomId)
    {
        try {
            $stmt = $this::$connection->prepare("SELECT id, room_name, capacity, description, price_per_night FROM Room WHERE id = :roomId");
            $stmt->bindParam(':roomId', $roomId);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Something went wrong with the database connection, please try again." . $e->getMessage();
        }
    }

    public function bookRoom($booking)
    {
        try {
            $this->checkIfCustomerExists($booking);
            $this->insertBooking($booking);

            # return the booking id
            return $this::$connection->lastInsertId();
        } catch (PDOException $e) {
            echo "Something went wrong with the database connection, please try again." . $e->getMessage();
        }
    }

    private function getCustomerByEmail($booking)
    {
        try {
            $stmt = $this::$connection->prepare("SELECT id FROM Customer WHERE email = :email");
            $stmt->bindParam(':email', $booking->customer->email);
            $stmt->execute();

            # return the id of the customer
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Something went wrong with the database connection, please try again." . $e->getMessage();
        }
    }

    private function insertBooking($booking)
    {
        try {
            # get the id of the customer
            $customerId = $this->getCustomerByEmail($booking)["id"];

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

    private function insertCustomer($booking)
    {
        try {
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
        } catch (PDOException $e) {
            echo "Something went wrong with the database connection, please try again." . $e->getMessage();
        }
    }

    private function updateCustomer($booking)
    {
        try {
            $stmt = $this::$connection->prepare("UPDATE Customer SET firstname = :firstname, lastname = :lastname, email = :email, phonenumber = :phone_number, postal_code = :postal_code, house_number = :house_number, streetname = :streetname, residence = :residence WHERE email = :email");

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
        } catch (PDOException $e) {
            echo "Something went wrong with the database connection, please try again." . $e->getMessage();
        }
    }

    private function checkIfCustomerExists($booking)
    {
        try {
            // check if the customers email is in the DB, if this is the case. Update his/her information
            $stmt = $this::$connection->prepare("SELECT id FROM Customer WHERE email = :email");
            $stmt->bindParam(':email', $booking->customer->email);
            $stmt->execute();


            if ($stmt->rowCount() > 0) {
                $this->updateCustomer($booking);
            } else {
                $this->insertCustomer($booking);
            }
        } catch (PDOException $e) {
            echo "Something went wrong with the database connection, please try again." . $e->getMessage();
        }
    }

    public function getPassword($username)
    {
        try {
            $stmt = $this::$connection->prepare("SELECT password FROM User WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            return $stmt->fetch()[0];
        } catch (PDOException $e) {
            echo "Something went wrong with the database connection, please try again." . $e->getMessage();
        }
    }
}
?>