<?php
class Guardia {
    private $conn;
    private $table_name = "guardias";

    public $id;
    public $nombres;
    public $cedula;
    public $cargo;
    public $sueldo;

    public function __construct($db) {
        $this->conn = $db;
    }

    // 1. LEER (READ) - Obtener todos los guardias
    public function leer() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY fecha_creacion DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // 2. CREAR (CREATE) - Insertar nuevo guardia
    public function crear() {
        $query = "INSERT INTO " . $this->table_name . " (nombres, cedula, cargo, sueldo) 
                  VALUES (:nombres, :cedula, :cargo, :sueldo)";
        $stmt = $this->conn->prepare($query);

        // Limpieza de seguridad
        $this->nombres = htmlspecialchars(strip_tags($this->nombres));
        $this->cedula = htmlspecialchars(strip_tags($this->cedula));
        $this->cargo = htmlspecialchars(strip_tags($this->cargo));
        $this->sueldo = htmlspecialchars(strip_tags($this->sueldo));

        // Vincular datos
        $stmt->bindParam(":nombres", $this->nombres);
        $stmt->bindParam(":cedula", $this->cedula);
        $stmt->bindParam(":cargo", $this->cargo);
        $stmt->bindParam(":sueldo", $this->sueldo);

        return $stmt->execute();
    }

    // 3. OBTENER UNO - Para cargar los datos en el formulario de editar
    public function leerUno() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $this->nombres = $row['nombres'];
            $this->cedula = $row['cedula'];
            $this->cargo = $row['cargo'];
            $this->sueldo = $row['sueldo'];
            return true;
        }
        return false;
    }

    // 4. ACTUALIZAR (UPDATE) - Guardar cambios de un guardia existente
    public function actualizar() {
        $query = "UPDATE " . $this->table_name . " 
                  SET nombres = :nombres, cedula = :cedula, cargo = :cargo, sueldo = :sueldo 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->nombres = htmlspecialchars(strip_tags($this->nombres));
        $this->cedula = htmlspecialchars(strip_tags($this->cedula));
        $this->cargo = htmlspecialchars(strip_tags($this->cargo));
        $this->sueldo = htmlspecialchars(strip_tags($this->sueldo));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":nombres", $this->nombres);
        $stmt->bindParam(":cedula", $this->cedula);
        $stmt->bindParam(":cargo", $this->cargo);
        $stmt->bindParam(":sueldo", $this->sueldo);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    // 5. ELIMINAR (DELETE) - Borrar un guardia
    public function eliminar() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(":id", $this->id);
        
        return $stmt->execute();
    }
}
?>