<?php
// This template code was taken from Workshop 9 and modified for UReview use.
class Database
{

    // Database Credentials
    private $host = "localhost:3306";
    private $db = "ureview";
    private $username = "root";
    private $password = "TestPa*ss21";
    public $conn;
    // Establish Database Connection
    public function getConnection()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db);
        if ($this->conn->connect_error) {
            $response['status'] = '0';
            $response['message'] = $exception->getMessage();
            return $response;
        } else {
            $response['status'] = '1';
            $response['connection'] = $this->conn;
            return $response;
        }
    }
}
