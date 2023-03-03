<?php

require './includes/app.php';
incluirTemplate('header');

?>
   <main class="contenedor">
    <section class="seccion contenedor" >
        <h3> Casas y departamentos en Ventas </h3>
        
        <?php 
                $limite= 100;
                include 'includes/templates/anuncios.php';
        ?>


    </section> <!--fin propiedades-->
 


   </main>

<?php
    incluirTemplate('footer');
?>