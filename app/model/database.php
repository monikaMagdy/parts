<?php

class Database {

    private static $Instance;

    private $LocalHost = "localhost";
    private $Name = "root";
    private $Password = "";
    private $DBname = "autosparecar";
    public $Connection;

    public function __construct() {
        $this->Connection = new mysqli($this->LocalHost, $this->Name, $this->Password, $this->DBname);

        if(mysqli_connect_error()) {
            echo "Failed To Connect To Database" . mysqli_connect_error();
        }
    }

    public static function GetInstance() {

        if(!isset(self::$Instance)) {  // If There is No Instance, Create a NEW one.
            self::$Instance = new self();
        }
        return self::$Instance; // Else, return the Instance.

    }

    public function GetConnection() { // Get The Database Connection.
        return $this->Connection;
    }

    private function __clone() {} // Prevent Duplication Of Connection.
}
?>
