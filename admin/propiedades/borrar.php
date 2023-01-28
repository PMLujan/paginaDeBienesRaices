<?php
//inicio de sesión

require '../../includes/funciones.php';

//para proteger las paginas si no esta autenticado no puede verlas
$auth= estaAutenticado();

if(!$auth){
    header('location: /');
}

incluirTemplate('header');
?>
   <main class="contenedor">
        <h3>Borrar</h3>


   </main>
<?php
    incluirTemplate('footer');
?>