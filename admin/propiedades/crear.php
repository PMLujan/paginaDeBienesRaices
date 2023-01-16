<?php

//base de datos 
require '../../includes/configuracion/database.php';

$bd=  conectandoBD();

//consultar para obtener los vendedores

$consulta = 'SELECT * FROM vendedores';
$resultado= mysqli_query($bd,$consulta);


//arreglo con msjs de errores

$errores = [];

//declaro las variables ara que guarde el valor al faltar datos en formulario
$titulo=  "";
$precio= "" ;
$descripcion= "" ;
$habitaciones= "" ;
$baños=  "";
$estacionamiento=  "";
$vendedores_id= "";


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

    echo "<pre>";
        var_dump($imagen);
    echo "</pre>";


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
    if(!$imagen['name'] || $imagen['error']){
        $errores[]="La imagen es obligatoria";
    }
    //validar imagenes pesadas:

    $medida= 1000 * 100;

    if($imagen['size'] > $medida){
        $errores[] = 'La imagen es muy pesada';
    }

    //revisar que el arreglo de errores este vacio

    if(empty($errores)){

    //insertar en la base de datos

        $query=" INSERT INTO propiedades (titulo,precio,descripcion,habitaciones,baños,estacionamiento, creado ,vendedores_id) VALUES      ('$titulo','$precio', '$descripcion', '$habitaciones', '$baños', '$estacionamiento','$creado', '$vendedores_id')";


    //almacenar en BD
     
        $resultado = mysqli_query($bd,$query);

        if($resultado){
            //redireccionar a la pagina inicio

            header('location: /admin');
        }
    }
}

require '../../includes/funciones.php';

incluirTemplate('header');
?>
   <main class="contenedor seccion">
        <h3>Crear nueva propiedad</h3>

            <a href="/admin" class="boton boton-verde">Volver</a>
            
            <!-- mostrar errores  -->

            <?php foreach($errores as $error) : ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>

              <!-- formulario -->
        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg , image/png " name="imagen">

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


            <input type="submit" value="Crear Propiedad" class="boton boton-verde">


        </form>

   </main>
<?php
    incluirTemplate('footer');
?>