<?php

class Config{
    //set the properties for the connection details
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $database = "portfolio";

    protected $conn;

    //create a constructor to automatically connect to the database
    public function __construct()
    {
        $conn = new mysqlI($this->servername,$this->username,$this->password,$this->database);

        if($conn->connect_error)
        {
            die("Connect Error:" .$con->connect_error);
        }

        //set the connection as a global variable
        $this->conn = $conn;
    }

}