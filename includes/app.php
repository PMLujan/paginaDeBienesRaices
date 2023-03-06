<?php

require 'funciones.php';
require 'configuracion/database.php';
require __DIR__ . '/../vendor/autoload.php';

// conectar BD 
$bd= conectandoBD();

use App\ActiveRecord;

ActiveRecord::setBD($bd);