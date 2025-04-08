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
            $a = readline("Ingresa su año de nacimiento: ");
            echo PHP_EOL;
            $m = readline("Ingresa el numero de mes de nacimiento: ");
            echo PHP_EOL;
            $dia = readline("Ingresa el dia de nacimiento: ");
            echo PHP_EOL;
            $t = readline("Ingresa el telefono: ");
            echo PHP_EOL;
            $c = readline("Ingresa el correo: ");
            echo PHP_EOL;
            $d = readline("Ingresa la direccion: ");
            echo PHP_EOL;
            if (in_array(null, [$pn, $pa, $a, $m, $dia, $t, $c, $d])) {
                echo "vuelva a intentarlo porque no puede dejar campos vacios";
                echo PHP_EOL;
                break;
            }
            if ($usuario->validacion_fecha((int)$a, (int)$m, (int)$dia) === false){
                echo "Formato de fecha incorrecto, vuelva a intentarlo";
                echo PHP_EOL;
                break;
            };
            $fn = "$a-$m-$dia";

            $usuario->crearUsuario($pn, $sn, $pa, $sa, $fn, $t, $c, $d);
            echo "Usuario creado";
            echo PHP_EOL;
            break;
        case '2':
            $hoy = new DateTime();
            $listarUsuarios = $usuario->listarUsuarios();
            foreach ($listarUsuarios as $key => $value) {
                $fecha_nacimiento = new DateTime($value["fecha_nacimiento"]);
                $edad = $hoy->diff($fecha_nacimiento);
                if ($value['segundo_nombre'] == null) {
                    $sn = "";
                } else {
                    $sn = $value['segundo_nombre'];
                    $sn .= " ";
                }
                if ($value['segundo_apellido'] == null) {
                    $value['segundo_apellido'] = "";
                } else {
                    $sa = $value['segundo_apellido'];
                    $sa .= " ";
                }
                echo "ID: " . $value['id'] . PHP_EOL . "Primer nombre: " . $value['primer_nombre'] . PHP_EOL . "Segundo nombre: " . $sn . PHP_EOL . "Primer apellido: " . $value["primer_apellido"] . PHP_EOL . "Segundo apellido: " . $sa . PHP_EOL . "Edad: " . $edad->y . " años" . PHP_EOL . "Teléfono: " . $value["telefono"];
                echo PHP_EOL;
            }
            echo PHP_EOL;
            break;
        case '3':
            $listarUsuarios = $usuario->listarUsuarios();

            foreach ($listarUsuarios as $value) {
                echo $value['id'] . " " . $value['primer_nombre'] . " " . $value["primer_apellido"];
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
            if ($usuario->eliminarUsuario($id)) {
                echo "Usuario eliminado";
            } else {
                echo "Error al eliminar el usuario";
            }
            break;

        case '5':
            echo "Gracias por usar el sistema de administracion de usuarios";
            break 2;


        default:
            echo "Opcion invalida vuelve a intentarlo";
            echo PHP_EOL;
    }
}
