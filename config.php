<?php

session_start();


class DB
{
    public $servername = "localhost";
    public $username = "root";
    public $password = "root@mdb";
    public $database = "adminsphere";
    public $port = 3306;


    // public function __construct()
    // {
    //     echo "hit me"; exit;
    // }
    function connect()
    {
        try {
            $dsn = "mysql:host=$this->servername;port=$this->port;dbname=$this->database;charset=utf8mb4";

            $conn = new PDO($dsn, $this->username, $this->password);

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {

            return "Connection failed: " . $e->getMessage();
        }
    }
}
