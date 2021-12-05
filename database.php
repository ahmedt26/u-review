<?php
// This template code was taken from Workshop 9 and modified for UReview use.
class Database
{

    // Database Credentials
    private $host = "localhost";
    private $port = "3306";
    private $db = "ureview";
    private $username = "root";
    private $password = "TestPa*ss21";
    public $conn;
    // Establish Database Connection
    public function getConnection()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db, $this->port);
        if ($this->conn->connect_error) {
            $response['status'] = '0';
            $response['message'] = "ERROR: Connection Status 0";
            return $response;
        } else {
            $response['status'] = '1';
            $response['connection'] = $this->conn;
            return $response;
        }
    }
}
