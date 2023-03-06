<?php

require '../../includes/app.php';

use App\Vendedores;

estaAutenticado();

$vendedor = new Vendedores;

$errores = Vendedores::getErrores();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //crear nueva instancia de vendedor
    $vendedor= new Vendedores($_POST['vendedor']);

    //validar datos
    $errores= $vendedor->validar();

    //si no hay errores
    if(empty($errores)){//chequeamos que el array este vacio
        
        $vendedor->guardar();
    }
}


incluirTemplate('header');
?>

<main class="contenedor seccion">
        <h3>Crear nuevo vendedor</h3>

            <a href="/admin" class="boton boton-amarillo">Volver</a>
            
            <!-- mostrar errores  -->

            <?php foreach($errores as $error): ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>

              <!-- formulario -->
        <form class="formulario" method="POST" action="/admin/vendedores/crear.php">

                <?php include '../../includes/templates/formulario_vendedores.php'; ?>

        <input type="submit" value="Crear Vendedor" class="boton boton-verde">

        </form>

   </main>
<?php

incluirTemplate('footer');

?>
