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

//mostrar mensaje condicional:
$resultado= $_GET['resultado'] ?? null;

//validar id para eliminar registro:
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $id=$_POST['id'];
    $id=filter_var($id, FILTER_VALIDATE_INT);

 //eliminar archivo de imagen propiedad
    if($id){

        $tipo= $_POST['tipo'];

                if(validarTipoDeContenido($tipo)){
                    if($tipo === 'propiedad'){

                            $propiedad= Propiedad::find($id);
                            $propiedad->eliminar();
                    } else if($tipo === 'vendedor'){

                            $vendedor= Vendedores::find($id);
                            $vendedor->eliminar();
                    }
    }
   }
}
//incluir un template:

incluirTemplate('header');
?>

   <main class="contenedor">
        <h3>Administrador de Bienes Raices</h3>
        <?php
        $mensaje=mostrarNotifiacion( intval($resultado) );//intval transforma el string en entero
        if($mensaje) { ?>
        <p class="alerta verde"><?php echo s($mensaje) ; ?></p>
          <?php }?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>
        <a href="/admin/vendedores/crear.php" class="boton boton-amarillo">Nuevo Vendedor</a>

        <h2>Propiedades</h2>

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
                            <input type="hidden" name="tipo" value="propiedad">
                            <input class="boton-rojo-block" type="submit" value="Eliminar">
                        </form>
                        <a class="boton-amarillo-block" href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id ; ?>">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Vendedores</h2>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        <tbody><!-- Mostrar los resultados de la BD-->

            <?php foreach( $vendedores as $vendedor): ?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre ." ". $vendedor->apellido; ?></td>
                    <td><?php echo $vendedor->telefono?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input class="boton-rojo-block" type="submit" value="Eliminar">
                        </form>
                        <a class="boton-amarillo-block" href="/admin/vendedores/actualizar.php?id=<?php echo $vendedor->id ; ?>">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
   </main>

<?php

    incluirTemplate('footer');
?>