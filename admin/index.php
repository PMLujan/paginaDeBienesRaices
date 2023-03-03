<?php
//inicio de sesión

require '../includes/app.php';

use App\Propiedad;
use App\Vendedores;

//para proteger las paginas si no esta autenticado no puede verlas
estaAutenticado();

//implementar metodo para obtener propiedades

$propiedades = Propiedad::all(); 
$vendedores= Vendedores::all();

debuguear($propiedades);

//mostrar mensaje condicional:
$resultado= $_GET['resultado'] ?? null;

//validar id para eliminar registro:
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id=$_POST['id'];
    $id=filter_var($id, FILTER_VALIDATE_INT);

 //eliminar archivo de imagen propiedad
    if($id){

        $propiedad= Propiedad::find($id);
        $propiedad->eliminar();

    }
}
//incluir un template:

incluirTemplate('header');
?>

   <main class="contenedor">
        <h3>Administrador de Bienes Raices</h3>

  <?php if($resultado == 1): ?>
     
    <p class="alerta verde">Propiedad Creada Correctamente</p>
  <?php elseif($resultado == 2): ?>

    <p class="alerta verde">Propiedad actualizada</p>
    <?php elseif($resultado == 3): ?>

        <p class="alerta rojo">Propiedad Eliminada</p>
  <?php endif; ?>

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

            <?php foreach( $propiedades as $propiedad): ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img class="imagenTabla" src= '../imagenes/<?php echo $propiedad->imagen; ?>' alt="Imagen propiedad"></td>
                    <td><?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
                            <input class="boton-rojo-block" type="submit" value="Eliminar">
                        </form>
                        <a class="boton-amarillo-block" href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id ; ?>">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
   </main>

<?php

    incluirTemplate('footer');
?>