<?php
require __DIR__ . '/../repositories/bookingrepository.php';

class RoomService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new BookingRepository();
    }
}