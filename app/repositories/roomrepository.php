<?php
require_once __DIR__ . '/repository.php';
class RoomRepository extends Repository
{
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
}