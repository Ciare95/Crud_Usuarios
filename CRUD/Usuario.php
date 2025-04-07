<?php

require_once 'database.php';

class Usuario
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    public function listarUsuarios()
    {
        // Lógica para obtener todos los usuarios
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $this->conn->prepare("SELECT id, primer_nombre from usuarios");
        $stmt->execute();

        foreach ($stmt->fetchAll() as $k=>$v) {
            # code...
            echo $v;
        }
        echo "papapap";
    }

    public function obtenerUsuario($id)
    {
        // Lógica para obtener un usuario por ID
    }

    public function crearUsuario($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $telefono, $correo, $direccion)
    {
        // Lógica para insertar usuario
    }

    public function actualizarUsuario()
    {
        // Lógica para actualizar un usuario
    }

    public function eliminarUsuario($id)
    {
        // Lógica para eliminar un usuario
    }
}
