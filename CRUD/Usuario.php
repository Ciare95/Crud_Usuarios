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
        $suma = 4 + 6;
        return $suma;
    }

    public function obtenerUsuario($id)
    {
        // Lógica para obtener un usuario por ID
    }

    public function crearUsuario($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $telefono, $correo, $direccion)
    {
        // Lógica para insertar usuario
        try {
            $sql = "INSERT INTO usuarios(primer_nombre, segundo_nombre,
                                        primer_apellido, segundo_apellido,
                                        fecha_nacimiento, telefono, 
                                        correo, direccion) 
                                VALUES (:primer_nombre, :segundo_nombre, 
                                :primer_apellido, :segundo_apellido, 
                                :fecha_nacimiento, :telefono, 
                                :correo, :direccion)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':primer_nombre', $primer_nombre);
            $stmt->bindParam(':segundo_nombre', $segundo_nombre);
            $stmt->bindParam(':primer_apellido', $primer_apellido);
            $stmt->bindParam(':segundo_apellido', $segundo_apellido);
            $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->execute();
        } catch(PDOException $e) {
            echo $sql . PHP_EOL . $e->getMessage();
        }
        
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
