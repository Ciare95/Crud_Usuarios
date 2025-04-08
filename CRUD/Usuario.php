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
        try {
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = $this->conn->prepare("SELECT id, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nacimiento, telefono, correo, direccion FROM usuarios");

            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al listar usuarios: " . $e->getMessage();
            return [];
        }
    }

    public function obtenerUsuario($id)
    {
        // Lógica para obtener un usuario por ID
        try {
            $sql = "SELECT * FROM usuarios WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener usuario: " . $e->getMessage();
            return null;
        }
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
        } catch (PDOException $e) {
            echo $sql . PHP_EOL . $e->getMessage();
        }
    }

    public function actualizarUsuario($id, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $telefono, $correo, $direccion)
    {
        try {
            $sql = "UPDATE usuarios SET 
                        primer_nombre = :primer_nombre, 
                        segundo_nombre = :segundo_nombre, 
                        primer_apellido = :primer_apellido, 
                        segundo_apellido = :segundo_apellido, 
                        fecha_nacimiento = :fecha_nacimiento, 
                        telefono = :telefono, 
                        correo = :correo, 
                        direccion = :direccion 
                    WHERE id = :id";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':primer_nombre', $primer_nombre);
            $stmt->bindParam(':segundo_nombre', $segundo_nombre);
            $stmt->bindParam(':primer_apellido', $primer_apellido);
            $stmt->bindParam(':segundo_apellido', $segundo_apellido);
            $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->execute();
    
            echo "Usuario actualizado correctamente." . PHP_EOL;
        } catch (PDOException $e) {
            echo "Error al actualizar usuario: " . $e->getMessage();
        }
    }
    

    public function eliminarUsuario($id)
    {
        // Lógica para eliminar un usuario
        try {
            if ($this->obtenerUsuario($id) == null) {
                echo "El usuario no existe";
                return;
            }
            $sql = "DELETE FROM usuarios WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}
