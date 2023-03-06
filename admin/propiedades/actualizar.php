<?php

//inicio de sesión

use App\Propiedad;
use App\Vendedores;

use Intervention\Image\ImageManagerStatic as Image; //le colocamos un alias para no escribir todo el nombre

require '../../includes/app.php';

estaAutenticado();
//validar que en url recibimos un ID:

$idUrl= $_GET['id'];
$id= filter_var($idUrl,FILTER_VALIDATE_INT); //valida que sea un entero


if(!$id){ //si no recibe un numero lo redirecciona
    header('location: /admin');
}

$propiedad= Propiedad::find($id);


//consultar para obtener los vendedores
$vendedores= Vendedores::all();
//arreglo con msjs de errores

$errores = Propiedad::getErrores();

//ejecuta el codigo despues de que el usuario envie el formulario
 if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //asignar los atributos
    $args = $_POST['propiedad'];

    $propiedad->sincronizar($args);

    $errores=$propiedad->validar();

    //crear nombres aleatorio a los archivos
    $nombreImagen= md5( uniqid( rand(), true)) .".jpg";


    //setear la imagen
        if($_FILES['propiedad']['tmp_name']['imagen']){

    //realizar un resize a la imagen con intervetion
        $imagen= Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);

    //guardar nombre de la imagen en BD
        $propiedad->setImagen($nombreImagen);
        
    }
    $carpetaImagenes='../../imagenes/';
        
    if(empty($errores)){ 
        //si hay una nueva imagen -guardala
        if($_FILES['propiedad']['tmp_name']['imagen']){
            $imagen->save(CARPETA_IMAGENES.$nombreImagen);
        }
        
          //almacenar en BD
          $propiedad->guardar();

         //guardar archivo en el disco duro
         $imagen->save($carpetaImagenes . $nombreImagen);

        }
 }

incluirTemplate('header');
?>
   <main class="contenedor seccion">
        <h3>Actualizar propiedad</h3>

            <a href="/admin" class="boton boton-verde">Volver</a>
            
            <!-- mostrar errores  -->

            <?php foreach($errores as $error) : ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>

              <!-- formulario -->
        <form class="formulario" method="POST" enctype="multipart/form-data">

            <?php include '../../includes/templates/formulario_propiedades.php';  ?>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">

        </form>

   </main>
   
<?php
    incluirTemplate('footer');
?>