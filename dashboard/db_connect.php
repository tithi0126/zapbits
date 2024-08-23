<?php
ob_start();
class DB_Connect
{
    public $con1;
    // constructor
    function __construct()
    {
        $this->connect();
    }

    // Connecting to database
    public function connect()
    {
      ($con = mysqli_connect("localhost", "pragmanx_justpin", "qTQA8p0DA2qH", "pragmanx_justping")) or
            die("Connection Failed...!");

        if (!$con) {
            die("Connection error: " . mysqli_connect_errno());
        }
        mysqli_autocommit($con, true);

        $this->con1 = $con;
        // return database handler
        return $con;
    }
}
?>
