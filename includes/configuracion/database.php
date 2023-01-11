<?php

function conectandoBD() : mysqli {
    $bd= mysqli_connect('localhost','root','Mlparedes2','bienesraices_crud');

    if(!$bd){
        echo "Error no se pudo conectar";
        exit;
    }
    return $bd;
}