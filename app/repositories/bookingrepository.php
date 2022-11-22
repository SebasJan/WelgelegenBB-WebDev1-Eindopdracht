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
}
?>