<?php
require_once '../app/config/db.php';
require_once '../app/models/Guardia.php';

class GuardiaController {
    private $db;
    private $guardia;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->guardia = new Guardia($this->db);
    }

    // LISTAR TODOS LOS GUARDIAS
    public function index() {
        $stmt = $this->guardia->leer();
        $guardias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once '../app/views/guardia/index.php';
    }

    // MOSTRAR FORMULARIO DE REGISTRO
    public function create() {
        require_once '../app/views/guardia/create.php';
    }

    // GUARDAR NUEVO REGISTRO
    public function store() {
        if ($_POST) {
            $this->guardia->nombres = $_POST['nombres'];
            $this->guardia->cedula = $_POST['cedula'];
            $this->guardia->cargo = $_POST['cargo'];
            $this->guardia->sueldo = $_POST['sueldo'];

            if ($this->guardia->crear()) {
                header("Location: /gestion-seguridad/public/index.php");
            }
        }
    }

    // MOSTRAR FORMULARIO DE EDICIÓN CON DATOS CARGADOS
    public function edit() {
        if (isset($_GET['id'])) {
            $this->guardia->id = $_GET['id'];
            if ($this->guardia->leerUno()) {
                require_once '../app/views/guardia/edit.php';
            } else {
                header("Location: /gestion-seguridad/public/index.php");
            }
        }
    }

    // GUARDAR CAMBIOS DE LA EDICIÓN
    public function update() {
        if ($_POST) {
            $this->guardia->id = $_POST['id'];
            $this->guardia->nombres = $_POST['nombres'];
            $this->guardia->cedula = $_POST['cedula'];
            $this->guardia->cargo = $_POST['cargo'];
            $this->guardia->sueldo = $_POST['sueldo'];

            if ($this->guardia->actualizar()) {
                header("Location: /gestion-seguridad/public/index.php");
            }
        }
    }

    // ELIMINAR UN REGISTRO
    public function delete() {
        if (isset($_GET['id'])) {
            $this->guardia->id = $_GET['id'];
            if ($this->guardia->eliminar()) {
                header("Location: /gestion-seguridad/public/index.php");
            }
        }
    }
}