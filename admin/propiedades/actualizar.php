<?php

//inicio de sesión

require '../../includes/funciones.php';

//para proteger las paginas si no esta autenticado no puede verlas
$auth= estaAutenticado();

if(!$auth){
    header('location: /');
}

//validar que en url recibimos un ID:

$idUrl= $_GET['id'];
$id= filter_var($idUrl,FILTER_VALIDATE_INT); //valida que sea un entero


if(!$id){ //si no lo es lo redirecciona
    header('location: /admin');
}

//base de datos 
require '../../includes/configuracion/database.php';

$bd=  conectandoBD();

//consultar para obtener propiedades:

$consultarPropiedad= "SELECT * FROM propiedades WHERE id= {$id}";
$resultadoPropiedad=mysqli_query($bd,$consultarPropiedad);
$propiedad=mysqli_fetch_assoc($resultadoPropiedad);


//consultar para obtener los vendedores

$consulta = 'SELECT * FROM vendedores';
$resultado= mysqli_query($bd,$consulta);


//arreglo con msjs de errores

$errores = [];

//declaro las variables ara que guarde el valor al faltar datos en formulario
$titulo=  $propiedad['titulo'];
$precio= $propiedad['precio'] ;
$descripcion= $propiedad['descripcion'] ;
$habitaciones=$propiedad['habitaciones'] ;
$baños=  $propiedad['baños'];
$estacionamiento= $propiedad['estacionamiento'];
$vendedores_id= $propiedad['vendedores_id'];
$imagen= $propiedad['imagen'];


//ejecuta el codigo despues de que el usuario envie el formulario
 if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // echo "<pre>";
    //     var_dump($_POST);
    // echo "</pre>";
 
    $titulo= mysqli_real_escape_string( $bd , $_POST['titulo'] );
    $precio= mysqli_real_escape_string(  $bd ,$_POST['precio'] );
    $descripcion= mysqli_real_escape_string( $bd , $_POST['descripcion'] );
    $habitaciones= mysqli_real_escape_string( $bd , $_POST['habitaciones'] );
    $baños= mysqli_real_escape_string( $bd , $_POST['baños'] );
    $estacionamiento= mysqli_real_escape_string( $bd , $_POST['estacionamiento'] );
    $creado= date('Y/m/d');
    $vendedores_id= mysqli_real_escape_string( $bd , $_POST['vendedor'] );

    //asigno file a la variable

    $imagen= $_FILES['imagen'];


    if(!$titulo){
        $errores[] = "Debes añadir un titulo";
    }
    if(!$precio){
        $errores[] = "Debes añadir un Precio";
    }
    if( strlen($descripcion) < 50){
         $errores[] = "Debes añadir una descripción que contenga mas de 50 caracteres";
    }
    if(!$baños){
        $errores[] = "Debes añadir cantidad de baños";
    }
    if(!$estacionamiento){
        $errores[] = "Debes añadir cantidad de estacionamientos";
    }
    if(!$vendedores_id){
        $errores[] = "Debes seleccionar un vendedor";
    }
    // //validar imagenes pesadas:

    $medida= 1000 * 1000;
      if($imagen['size'] > $medida){
        $errores[] = 'La imagen es muy pesada';
    }

    $nombreImagen='';
    //revisar que el arreglo de errores este vacio

    if(empty($errores)){

        
    //crear carpeta imagenes

        $carpetaImagenes='../../imagenes';

    //validamos que no este creada
        if(!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }

    //eliminar imagen anterior para cargar nueva:

    if($imagen['name']){
        unlink($carpetaImagenes . $propiedad['imagen']);
     
    //crear nombres aleatorio a los archivos

    $nombreImagen= md5( uniqid( rand(), true)) . ".jpg";

    //mover imagen de archivo temporal a carpeta imagen
       move_uploaded_file($imagen['tmp_name'], $carpetaImagenes ."/". $nombreImagen);

    }else{
        $nombreImagen=$propiedad['imagen'];
    }

    //insertar en la base de datos

        $query= "UPDATE propiedades SET titulo = '{$titulo}', precio={$precio}, imagen = '{$nombreImagen}', descripcion='{$descripcion}',habitaciones={$habitaciones}, baños={$baños},estacionamiento={$estacionamiento},vendedores_id='{$vendedores_id}' WHERE id={$id}";

     

    //almacenar en BD
     
        $resultado = mysqli_query($bd, $query);

        if($resultado){
            //redireccionar a la pagina inicio

            header('location: /admin?resultado=2');
        }
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
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg , image/png " name="imagen">
                <!--para no mostrar la posicion del archivo-->

                <img class="imagenPropiedad" src="../../imagenes/<?php echo $imagen ; ?>" alt="Imagen de propiedad">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" cols="30" rows="10"><?php echo $descripcion; ?></textarea>

            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">

                <label for="baños">Baños:</label>
                <input type="number" id="baños" name="baños" placeholder="Ej: 3" min="1" max="9" value="<?php echo $baños; ?>">

                <label for="estacionamiento"> Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor">
                    <option value=""><-- Seleccione --></option>

                    <!-- traer valor desde la bd  -->

                    <?php while( $vendedores = mysqli_fetch_assoc($resultado) ) : ?>
                        <option <?php echo $vendedores_id === $vendedores['id'] ? 'selected' : "" ; ?> value="<?php echo $vendedores['id']; ?>"> <?php echo $vendedores['nombre'] . " " . $vendedores['apellido']  ?> </option>

                        <?php endwhile; ?>
                </select>

            </fieldset>


            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">


        </form>

   </main>
   
<?php
    incluirTemplate('footer');
?>