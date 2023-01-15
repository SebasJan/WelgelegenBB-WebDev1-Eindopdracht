<?php
require __DIR__ . '/../services/service.php';
class Controller
{
    protected $service;
    public function __construct()
    {
        $this->service = new Service();
    }
}