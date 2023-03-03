<?php

namespace App;

class Propiedad extends ActiveRecord {

            protected static $tabla = 'propiedades';  
            
            protected static $columnasBD = ['id','titulo','precio','imagen','descripcion','habitaciones','baños','estacionamiento','creado','vendedores_id'];

            
            public $id;
            public $titulo;
            public $precio;
            public $imagen;
            public $descripcion;
            public $habitaciones;
            public $baños;
            public $estacionamiento;
            public $creado;
            public $vendedores_id;

            //funcion constructura

            public function __construct($args = []) //toma un arreglo y por default esta vacio
                                                    {
                    $this->id = $args['id'] ?? NULL;
                    $this->titulo = $args['titulo'] ?? '';
                    $this->precio = $args['precio'] ?? '';
                    $this->imagen = $args['imagen'] ?? '';
                    $this->descripcion = $args['descripcion'] ?? '';
                    $this->habitaciones = $args['habitaciones'] ?? '';
                    $this->baños = $args['baños'] ?? '';
                    $this->estacionamiento = $args['estacionamiento'] ?? '';
                    $this->creado = date('Y/m/d') ;
                    $this->vendedores_id = $args['vendedores_id'] ?? '';

                }


}