<?php
require_once __DIR__ . '/repository.php';
class CustomerRepository extends Repository
{
    public function insertCustomer($booking)
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

    public function updateCustomer($booking)
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

    public function checkIfCustomerExists($booking)
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

    public function getCustomerByEmail($booking)
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
}