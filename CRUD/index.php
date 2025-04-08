<?php

require_once 'Usuario.php';

$usuario = new Usuario();

// Aquí puedes probar:


while (true) {
    echo "Bienvenido a la administracion de usuarios";
    echo PHP_EOL;
    echo "1. Crear usuario";
    echo PHP_EOL;
    echo "2. Listar usuarios";
    echo PHP_EOL;
    echo "3. Actualizar usuario";
    echo PHP_EOL;
    echo "4. Eliminar usuario";
    echo PHP_EOL;
    echo "5. Salir";
    echo PHP_EOL;
    $opcion = readline("ingresa la opcion: ");
    echo PHP_EOL;
    
    switch ($opcion) {
        case '1':
            $pn = readline("Ingresa el primer nombre: ");
            echo PHP_EOL;
            $sn = readline("Ingresa el segundo nombre: ");
            echo PHP_EOL;
            $pa = readline("Ingresa el primer apellido: ");
            echo PHP_EOL;
            $sa = readline("Ingresa el segundo apellido: ");
            echo PHP_EOL;
            $fn = readline("Ingresa su fecha de nacimiento: ");
            echo PHP_EOL;
            $t = readline("Ingresa el telefono: ");
            echo PHP_EOL;
            $c = readline("Ingresa el correo: ");
            echo PHP_EOL;
            $d = readline("Ingresa la direccion: ");
            echo PHP_EOL;
            $usuario->crearUsuario($pn, $sn, $pa, $sa, $fn, $t, $c, $d);
            echo "Usuario creado";
            break;
        case '2':

            $listarUsuarios = $usuario->listarUsuarios();

            foreach ($listarUsuarios as $value) {
                echo $value['primer_nombre'] . " " . $value["segundo_apellido"];
                echo PHP_EOL;
            }
            break;
            case '3':
                $listarUsuarios = $usuario->listarUsuarios();
            
                foreach ($listarUsuarios as $value) {
                    echo $value['id'] . " " . $value['primer_nombre'] . " " . $value["segundo_apellido"];
                    echo PHP_EOL;
                }
                echo PHP_EOL;
            
                $id_actualizar = readline("Ingresa el id del usuario para actualizar: ");
                $primer_nombre = readline("Nuevo primer nombre: ");
                $segundo_nombre = readline("Nuevo segundo nombre: ");
                $primer_apellido = readline("Nuevo primer apellido: ");
                $segundo_apellido = readline("Nuevo segundo apellido: ");
                $fecha_nacimiento = readline("Nueva fecha de nacimiento (YYYY-MM-DD): ");
                $telefono = readline("Nuevo teléfono: ");
                $correo = readline("Nuevo correo: ");
                $direccion = readline("Nueva dirección: ");
            
                $usuario->actualizarUsuario(
                    $id_actualizar,
                    $primer_nombre,
                    $segundo_nombre,
                    $primer_apellido,
                    $segundo_apellido,
                    $fecha_nacimiento,
                    $telefono,
                    $correo,
                    $direccion
                );
                break;
            

        case '4':
            $id = readline("Ingresa el id del usuario a eliminar: ");
            echo PHP_EOL;
            $usuario->eliminarUsuario($id);
            echo "Usuario eliminado";
            break;

        case '5':
            echo "Gracias por usar el sistema de administracion de usuarios";
            break 2;
            
        
        default:
            echo "Opcion invalida vuelve a intentarlo";
    }       break;
}

