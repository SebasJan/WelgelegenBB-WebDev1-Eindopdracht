<?php
require __DIR__ . '/../repositories/adminrepository.php';
class AdminService
{
    private $adminRepository;

    public function __construct()
    {
        $this->adminRepository = new AdminRepository();
    }

    public function verifyUser($username, $passwordGiven)
    {
        $passwordHash = $this->adminRepository->getPassword($username);
        if (password_verify($passwordGiven, $passwordHash)) {
            return true;
        } else {
            return false;
        }
    }
}