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

# query to get availible room
// SELECT * FROM Room WHERE id IN 
// (SELECT room_id FROM Booking WHERE 
// '2022-12-11' NOT BETWEEN booking_date_begin AND booking_date_end
// AND
// '2022-12-25' NOT BETWEEN booking_date_begin AND booking_date_end)
}
?>