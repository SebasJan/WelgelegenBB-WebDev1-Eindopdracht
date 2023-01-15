<?php
require __DIR__ . '/../services/service.php';
require __DIR__ . '/../services/adminservice.php';
class Controller
{
    protected $service;
    protected $adminService;
    public function __construct()
    {
        $this->service = new Service();
        $this->adminService = new AdminService();
    }
}