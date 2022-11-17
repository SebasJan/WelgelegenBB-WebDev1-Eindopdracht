<?php
require __DIR__ . '/repository.php';

class BookingRepository extends Repository
{
    public function getAvailableRooms($amountOfGuests, $amountOfGuestsChilderen, $beginDate, $endDate)
    {
        # prepare sql statement
        $stmt = $this::$connection->prepare("SELECT * FROM Room WHERE id IN 
                (SELECT room_id FROM Booking WHERE 
                :beginDate NOT BETWEEN booking_date_begin AND booking_date_end
                AND
                :endDate NOT BETWEEN booking_date_begin AND booking_date_end)");

        # bind parameters
        $stmt->bindParam(':beginDate', $beginDate);
        $stmt->bindParam(':endDate', $endDate);

        # execute statement
        $stmt->execute();

        # fetch all results
        return $stmt->fetchAll();
    }
}
?>