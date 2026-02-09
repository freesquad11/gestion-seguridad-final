<?php
class Database {
    // 1. Aquí pegamos tu IP de Google Cloud:
    private $host = "136.111.239.172"; 
    
    private $db_name = "seguridad_db";
    
    // 2. Usamos el usuario 'admin' que creamos hace un momento:
    private $username = "admin"; 
    
    // 3. ¡OJO AQUÍ! Escribe dentro de las comillas la contraseña que anotaste:
    private $password = "Matematicas11"; 
    
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>