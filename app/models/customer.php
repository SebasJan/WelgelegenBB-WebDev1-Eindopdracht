<?php
class Customer
{
    public $firstName;
    public $lastName;
    public $email;
    public $phoneNumber;
    public $postalCode;
    public $residence;
    public $streetname;
    public $houseNumber;

    public function __construct($firstName, $lastName, $email, $phoneNumber, $postalCode, $houseNumber, $streetname, $residence)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->postalCode = $postalCode;
        $this->residence = $residence;
        $this->streetname = $streetname;
        $this->houseNumber = $houseNumber;
    }
}
?>