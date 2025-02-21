<?php
//Depuracion de errores
// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }

class Database
{
    private static $instance = null;
    private $conn;

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "7000valientes";

    private function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        // Depuracion de errores

        // if ($this->conn->connect_error) {
        //     die("Error de conexión: " . $this->conn->connect_error);
        // }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
?>