<?php

//importar bd
require '../includes/configuracion/database.php';
$db=conectandoBD();

//escribir el query:
$query= 'SELECT * FROM propiedades';

//consultar BD :

$consulta=mysqli_query($db,$query);

//mostrar mensaje condicional:
$resultado= $_GET['resultado'] ?? null;


//incluir un template:
require '../includes/funciones.php';

incluirTemplate('header');
?>

   <main class="contenedor">
        <h3>Administrador de Bienes Raices</h3>

        <?php
        if($resultado){ ?>

            <p class="alerta verde">Propiedad creada correctamente</p>

        <?php } ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody><!-- Mostrar los resultados de la BD-->

            <?php while($propiedad =mysqli_fetch_assoc($consulta)): ?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td><img class="imagenTabla" src= '../imagenes/<?php echo $propiedad['imagen']; ?>' alt="Imagen propiedad"></td>
                    <td><?php echo $propiedad['precio']; ?></td>
                    <td>
                        <a class="boton-rojo-block" href="#">Eliminar</a>
                        <a class="boton-amarillo-block" href="#">Actualizar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
   </main>
<?php
//cerrar bd
mysqli_close($bd);

    incluirTemplate('footer');
?>