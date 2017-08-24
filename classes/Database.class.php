<?php

class Database
{
    protected $dbserver = "localhost";
    protected $dbusername = "root";
    protected $dbpassword = "";
    protected $dbname = "curs";

    protected $conn;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        try {
            $this->conn = new PDO(
                                "mysql:host=" . $this->dbserver . ";
                                dbname=" . $this->dbname,
                                $this->dbusername,
                                $this->dbpassword);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
