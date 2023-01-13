<?php
require_once __DIR__ . '/repository.php';
class AdminRepository extends Repository
{
    public function getPassword($username)
    {
        try {
            $stmt = $this::$connection->prepare("SELECT password FROM User WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            return $stmt->fetch()[0];
        } catch (PDOException $e) {
            echo "Something went wrong with the database connection, please try again." . $e->getMessage();
        }
    }
}