<?php
class Database{
    private $host = "localhost";
    private $db_name = "lab_5b";
    private $username = "archie";
    private $password = "Arch_1345";
    public $conn;

    public function getConnection()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}