<?php
require __DIR__ . '/../repositories/bookingrepository.php';

class BookingService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new BookingRepository();
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
        return $this->repository->getRoomById($roomId);
    }
}

?>