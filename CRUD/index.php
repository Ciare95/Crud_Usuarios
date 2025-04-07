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
            $sa = readline("Ingresa el primer apellido: ");
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

        case '2':

        case '3':

        case '4':

        case '5':
            break;
        
        default:
            echo "opcion invalida vuelve a intentarlo";
    }
}

