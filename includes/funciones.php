<?php

//defino constantes

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');


function incluirTemplate($nombre, $inicio=false){
    @include TEMPLATES_URL ."/{$nombre}.php";

}

function estaAutenticado() : bool {
    session_start();
    
    $auth= $_SESSION['login'];
    if($auth){
        return true;
    }
    return false;
}

function debuguear($variable){
    echo "<pre>";
      var_dump($variable);
    echo "</pre>";

exit;
}


//escapar HTML o sanitizar entrada de datos
function s($html){
    $s= htmlspecialchars($html);

    return $s;
}