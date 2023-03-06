<?php

//inicio de sesión

require '../../includes/app.php';

use App\Propiedad;
use App\Vendedores;
//validar imagenes
use Intervention\Image\ImageManagerStatic as Image; //le colocamos un alias para no escribir todo el nombre

//para proteger las paginas si no esta autenticado no puede verlas
$auth= estaAutenticado();

$propiedad = new Propiedad;

//cosulta para obtener todos los vendedores
$vendedores= Vendedores::all();

//arreglo con msjs de errores

$errores = Propiedad::getErrores();

//ejecuta el codigo despues de que el usuario envie el formulario
 if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //crear nueva instancia :
    $propiedad = new Propiedad($_POST['propiedad']);

        //crear carpeta imagenes
                $carpetaImagenes='../../imagenes/';

        //validamos que no este creada
                    if(!is_dir($carpetaImagenes)){
                        mkdir($carpetaImagenes);
                    }
 
        //crear nombres aleatorio a los archivos
                    $nombreImagen= md5( uniqid( rand(), true)) .".jpg";
        
        //setear la imagen
                if($_FILES['propiedad']['tmp_name']['imagen']){

                //realizar un resize a la imagen con intervetion
                $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                
                //guardar nombre de la imagen en BD
                $propiedad->setImagen($nombreImagen);
            }
                
    //validar
    $errores = $propiedad->validar();

    //revisar que el arreglo de errores este vacio
    if( empty($errores)){

        //guardar archivo en el disco duro
        $imagen->save($carpetaImagenes . $nombreImagen);
      
        //guarda en la BD
                            //llamado metodo:
           $resultado = $propiedad->guardar();

    }
 }

incluirTemplate('header');
?>


   <main class="contenedor seccion">
        <h3>Crear nueva propiedad</h3>

            <a href="/admin" class="boton boton-verde">Volver</a>
            
            <!-- mostrar errores  -->

            <?php foreach($errores as $error): ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>

              <!-- formulario -->
        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">

            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">

        </form>

   </main>
<?php
    incluirTemplate('footer');
?>