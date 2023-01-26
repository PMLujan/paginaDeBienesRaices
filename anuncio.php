<?php
//importo bd
require 'includes/configuracion/database.php';
$db= conectandoBD();

//leo id url
$idUrl=$_GET['id'];
$id=filter_var($idUrl,FILTER_VALIDATE_INT);

if(!$id){
    header('location: /');
}
//instruccion
$query= "SELECT * FROM propiedades WHERE id={$id}";
$resultado= mysqli_query($db,$query);
//validamos que reciba un resultado que existe en bd
if($resultado->num_rows === 0){
    header('location:/');
}
$propiedad=mysqli_fetch_assoc($resultado);

require './includes/funciones.php';
incluirTemplate('header');

?>
   <main class="contenedor contenido-centrado">
         <h1><?php echo $propiedad['titulo'] ;?></h1>
          <picture>
            <img src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="image/jpeg">
          </picture>

          <div class="resumen-propiedad">
            <p class="precio"><?php echo $propiedad['precio'] ;?></p>
            <ul class="iconos-caracteristicas">
               <li>
                   <img class="iconoAnuncios" loading="lazy" src="build/img/icono_wc.svg" alt="Baños">
                   <p><?php echo $propiedad['baños'] ;?></p>
               </li><!--fin icono-->
               <li>
                   <img class="iconoAnuncios" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Habitaciones">
                   <p><?php echo $propiedad['habitaciones'] ;?></p>
               </li><!--fin icono-->
               <li>
                   <img class="iconoAnuncios" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Garage">
                   <p><?php echo $propiedad['estacionamiento'] ;?></p>
               </li><!--fin icono-->
           </ul>

           <p>
                <?php echo $propiedad['descripcion'] ;?>
           </p>

          </div>

   </main>

<?php
    incluirTemplate('footer');
    mysqli_close($db);
?>