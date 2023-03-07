<?php

require '../../includes/app.php';
use App\Vendedores;
estaAutenticado();

//validar que recibimos un id valido
$id=$_GET['id'];
$id=filter_var($id,FILTER_VALIDATE_INT);

if(!$id){
    header('location:/admin');
}

//obtener el arreglo de vendedores
$vendedor= Vendedores::find($id);

$errores = Vendedores::getErrores();

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Asignar los atributos
    $args = $_POST['vendedor'];

    $vendedor->sincronizar($args);

    // Validación
    $errores = $vendedor->validar();
   

    if(empty($errores)) {
        $vendedor->guardar();
    }
}


incluirTemplate('header');
?>

<main class="contenedor seccion">
        <h3>Actualizar vendedor</h3>

            <a href="/admin" class="boton boton-amarillo">Volver</a>
            
            <!-- mostrar errores  -->

            <?php foreach($errores as $error): ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>

              <!-- formulario -->
        <form class="formulario" method="POST">

                    <?php include '../../includes/templates/formulario_vendedores.php'; ?>

        <input type="submit" value="Actualizar Vendedor" class="boton boton-verde">

        </form>

   </main>
<?php

incluirTemplate('footer');

?>
