<?php
//inicio de sesión

require '../includes/funciones.php';

//para proteger las paginas si no esta autenticado no puede verlas
$auth= estaAutenticado();

if(!$auth){
    header('location: /');
}

//importar bd
require '../includes/configuracion/database.php';
$db=conectandoBD();

//escribir el query:
$query= 'SELECT * FROM propiedades';

//consultar BD :

$consulta=mysqli_query($db,$query);

//mostrar mensaje condicional:
$resultado= $_GET['resultado'] ?? null;

//validar id para eliminar registro:
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id=$_POST['id'];
    $id=filter_var($id, FILTER_VALIDATE_INT);

 //eliminar archivo de imagen propiedad
    if($id){

        $query="SELECT imagen FROM propiedades WHERE id={$id}";
        $resultado= mysqli_query($db,$query);
        $propiedad=mysqli_fetch_assoc($resultado);
      
        unlink('../imagenes'. '/' .$propiedad['imagen']);

//eliminar propiedad

        $query="DELETE FROM propiedades WHERE id= {$id}";

        $resultado=mysqli_query($db,$query);

        if($resultado){
            header('location: /admin?resultado=3');
        }
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

            <?php while($propiedad =mysqli_fetch_assoc($consulta)): ?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td><img class="imagenTabla" src= '../imagenes/<?php echo $propiedad['imagen']; ?>' alt="Imagen propiedad"></td>
                    <td><?php echo $propiedad['precio']; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id']?>">
                            <input class="boton-rojo-block" type="submit" value="Eliminar">
                        </form>
                        <a class="boton-amarillo-block" href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>">Actualizar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
   </main>

<?php
//cerrar bd
mysqli_close($db);

    incluirTemplate('footer');
?>