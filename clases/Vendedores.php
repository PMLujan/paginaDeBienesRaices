<?php

namespace App;

class Vendedores extends ActiveRecord {
   
        protected static $tabla = "vendedores";

        protected static $columnasBD = ['id','nombre','apellido','telefono'];

        public $id;
        public $nombre;
        public $apellido;
        public $telefono;


        public function __construct($args = []) //toma un arreglo y por default esta vacio
                                                {
                    $this->id = $args['id'] ?? NULL;
                    $this->nombre = $args['nombre'] ?? '';
                    $this->apellido = $args['apellido'] ?? '';
                    $this->telefono = $args['telefono'] ?? '';
                }
                
}