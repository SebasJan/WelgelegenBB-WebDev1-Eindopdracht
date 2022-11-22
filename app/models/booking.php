<?php
class Booking
{
    public $customer;
    public $room;
    public $amountOfVisitors;
    public $checkInDate;
    public $checkOutDate;
    public $price;

    public function __construct($room, $amountOfGuests, $checkInDate, $checkOutDate, $price)
    {
        $this->room = $room;
        $this->amountOfVisitors = $amountOfGuests;
        $this->checkInDate = $checkInDate;
        $this->checkOutDate = $checkOutDate;
        $this->price = $price;
    }
}
?>