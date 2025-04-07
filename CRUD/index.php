<?php

require_once 'Usuario.php';

$usuario = new Usuario();

// Aquí puedes probar:
$usuario->crearUsuario('Jhon', 'Deivid', 
                        'Rojas', 'Rodriguez', 
                        '2003-01-05', '315789456', 
                        'nose@gmail.com', 'cra 17 12-23');
// print_r($usuario->listarUsuarios());
