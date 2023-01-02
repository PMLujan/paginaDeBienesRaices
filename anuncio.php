<?php

require './includes/funciones.php';
incluirTemplate('header');

?>
   <main class="contenedor contenido-centrado">
         <h1>Casa en venta frente al bosque</h1>
          <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img src="build/img/destacada.jpg" alt="image/jpeg">
          </picture>

          <div class="resumen-propiedad">
            <p class="precio">$3.000.000</p>
            <ul class="iconos-caracteristicas">
               <li>
                   <img class="iconoAnuncios" loading="lazy" src="build/img/icono_wc.svg" alt="Baños">
                   <p>3</p>
               </li><!--fin icono-->
               <li>
                   <img class="iconoAnuncios" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Habitaciones">
                   <p>4</p>
               </li><!--fin icono-->
               <li>
                   <img class="iconoAnuncios" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Garage">
                   <p>3</p>
               </li><!--fin icono-->
           </ul>

           <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime animi modi tempora, laudantium sequi corrupti voluptates similique sed explicabo eum incidunt. Sapiente, aspernatur dignissimos incidunt facere quas dolor exercitationem odio magnam reprehenderit maxime atque sunt et, ipsa natus velit nemo officiis molestiae cupiditate porro laborum accusantium ea necessitatibus numquam enim!
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui ut fuga eveniet excepturi quod, at obcaecati est maxime nemo unde tenetur ab aperiam. Distinctio, quas?
           </p>

          </div>

   </main>

<?php
    incluirTemplate('footer');
?>