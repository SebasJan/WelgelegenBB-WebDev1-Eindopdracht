<?php
# signleton class for the db connection
class DBConnection
{
    private static $instance = null;

    private $connection;

    private function __construct()
    {
        require_once 'dbconfig.php';
        # connect to db
        try {
            $this->connection = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DBConnection();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
?>