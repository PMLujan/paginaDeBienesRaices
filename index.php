<?php
require './includes/funciones.php';

incluirTemplate('header', $inicio = true);
?>

<main class="contenedor">
        <h3>Más sobre nosotros</h3>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="./build/img/icono1.svg" alt="Icono seguridad">
                <h3>Seguridad</h3>
                <p>Consectetur adipisicing elit. Nulla, quis corrupti minima deserunt beatae nam recusandae maiores sit voluptate impedit dolorem explicabo earum accusamus doloribus.</p>
            </div><!--fin icono-->
            <div class="icono">
                <img src="./build/img/icono2.svg" alt="Icono precio">
                <h3>Precio</h3>
                <p>Consectetur adipisicing elit. Nulla, quis corrupti minima deserunt beatae nam recusandae maiores sit voluptate impedit dolorem explicabo earum accusamus doloribus.</p>
            </div><!--fin icono-->
            <div class="icono">
                <img src="./build/img/icono3.svg" alt="Icono tiempo">
                <h3>A tiempo</h3>
                <p>Consectetur adipisicing elit. Nulla, quis corrupti minima deserunt beatae nam recusandae maiores sit voluptate impedit dolorem explicabo earum accusamus doloribus.</p>
            </div><!--fin icono-->
        </div>
   </main>
<!--Comienzo propiedades-->
   <section class="seccion contenedor" >
       <h3> Casas y departamentos en Ventas </h3>
        <div class="contenedor-anuncio">
                <div class="anuncio">
                    <picture>
                        <source srcset="./build/img/anuncio1.webp" type="image/webp">
                        <source srcset="./build/img/anuncio1.jpg" type="image/jpeg">
                        <img loading="lazy" src="./build/img/anuncio1.jpg" alt="Anuncio">
                    </picture>
        
                 <div class="contenido-anuncio">
                        <h3>Casa de lujo en el lago</h3>
                            <p>Sit amet dipisicing elitaconsectetur dipisicing elita. Ad, rem.</p>
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
                        <a href="anuncios.php" class="boton-amarillo-block">Ver propiedad</a>
                 </div> <!--fin contenido anuncio-->
                </div> <!--fin anuncio-->
                <div class="anuncio">
                    <picture>
                        <source srcset="./build/img/anuncio2.webp" type="image/webp">
                        <source srcset="./build/img/anuncio2.jpg" type="image/jpeg">
                        <img loading="lazy" src="./build/img/anuncio2.jpg" alt="Anuncio">
                    </picture>
        
                 <div class="contenido-anuncio">
                        <h3>Casa terminados de lujo</h3>
                            <p>Sit amet dipisicing elitaconsectetur dipisicing elita. Ad, rem.</p>
                                <p class="precio">$5.000.000</p>
                             <ul class="iconos-caracteristicas">
                                <li>
                                    <img class="iconoAnuncios" loading="lazy" src="build/img/icono_wc.svg" alt="Baños">
                                    <p>2</p>
                                </li><!--fin icono-->
                                <li>
                                    <img class="iconoAnuncios" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Habitaciones">
                                    <p>5</p>
                                </li><!--fin icono-->
                                <li>
                                    <img class="iconoAnuncios" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Garage">
                                    <p>2</p>
                                </li><!--fin icono-->
                            </ul>
                        <a href="anuncios.html" class="boton-amarillo-block">Ver propiedad</a>
                 </div> <!--fin contenido anuncio-->
                </div> <!--fin anuncio-->
                <div class="anuncio">
                    <picture>
                        <source srcset="./build/img/anuncio3.webp" type="image/webp">
                        <source srcset="./build/img/anuncio3.jpg" type="image/jpeg">
                        <img loading="lazy" src="./build/img/anuncio3.jpg" alt="Anuncio">
                    </picture>
        
                 <div class="contenido-anuncio">
                        <h3>Casa con pileta</h3>
                            <p>Sit amet dipisicing elitaconsectetur dipisicing elita. Ad, rem.</p>
                                <p class="precio">$4.000.000</p>
                             <ul class="iconos-caracteristicas">
                                <li>
                                    <img class="iconoAnuncios" loading="lazy" src="build/img/icono_wc.svg" alt="Baños">
                                    <p>3</p>
                                </li><!--fin icono-->
                                <li>
                                    <img class="iconoAnuncios" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Habitaciones">
                                    <p>6</p>
                                </li><!--fin icono-->
                                <li>
                                    <img class="iconoAnuncios" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Garage">
                                    <p>2</p>
                                </li><!--fin icono-->
                            </ul>
                        <a href="anuncios.html" class="boton-amarillo-block">Ver propiedad</a>
                    </div> <!--fin contenido anuncio-->
                </div> <!--fin anuncio-->
        </div> <!--fin contenedor anuncio-->

        <div class="alinear-derecha">
            <a href="anuncios.html" class="boton-verde">Ver todas</a>
        </div>

   </section> <!--fin propiedades-->

   <section class="imagen-contacto">
          <h2>Encuentra la casa de tus sueños</h2>
             <p>Completa el formulario y un asesor se pondra en contacto contigo a la brevedad</p>
                <a href="contacto.php" class="boton-amarillo">Contactanos</a>
   </section>

   <!--COMIENZO DE BLOG-->
   <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Imagen de blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p>Escrito el . <span>24/11/2022</span> por : <span>Admin</span></p>
                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorando dinero</p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Imagen de blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p>Escrito el . <span>25/11/2021</span> por : <span>Admin</span></p>
                        <p>Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu lugar</p>
                    </a>
                </div>
            </article>
        </section>
        <!--TESTIMONIALES-->
        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una excelente forma,muy buena atencion y la casa que me ofrecieron cumple con todas las expectativas.
                </blockquote>
                <p>-Lujan Paredes</p>
            </div>
        </section>
   </div>


<?php
incluirTemplate('footer');
?>