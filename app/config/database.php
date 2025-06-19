<?php
class Database {
    private $serverName = "localhost";
    private $connectionOptions = array(
        "Database" => "Perpustakaan",
        "Uid" => "username",
        "PWD" => "password"
    );
    private $conn;

    public function __construct() {
        $this->conn = sqlsrv_connect($this->serverName, $this->connectionOptions);
        if (!$this->conn) {
            die(print_r(sqlsrv_errors(), true));
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        sqlsrv_close($this->conn);
    }
}
?>