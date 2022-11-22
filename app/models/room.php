<?php
class Room
{
    public $id;
    public $name;
    public $capacity;
    public $description;
    public $pricePerNight;

    public function __construct($id, $name, $capacity, $description, $pricePerNight)
    {
        $this->id = $id;
        $this->name = $name;
        $this->capacity = $capacity;
        $this->description = $description;
        $this->pricePerNight = $pricePerNight;
    }
}
?>