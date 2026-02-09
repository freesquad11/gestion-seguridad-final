<?php
class Database {
    private $host = "localhost";
    private $db_name = "seguridad_db";
    private $username = "root";
    private $password = ""; // En XAMPP la clave viene vacía por defecto
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>