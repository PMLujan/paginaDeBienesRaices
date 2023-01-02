<?php

require './includes/funciones.php';
incluirTemplate('header');

?>
   <main class="contenedor contenido-centrado">
    <h1>Contactanos</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="build/img/destacada3.jpg" alt="image/jpeg">
        </picture>
    <h2>Llene el formulario de contacto</h2>
    <form class="formulario">
        <fieldset>
            <legend>Datos personales</legend>
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre">

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu E-mail" id="email">

                <label for="telefono">Telefono</label>
                <input type="tel" placeholder="Tu telefono" id="telefono">

                <label for="mensaje">Mensaje</label>
                <textarea placeholder="Mensaje" id="mensaje" ></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion sobre la propiedad</legend>
            <label for="opciones">Vende o Compra</label>
            <select id="opciones">
                <option value="" disabled selected> --Seleccione-- </option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" placeholder="Precio o presupuesto" id="presupuesto">

        </fieldset>
        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contacto-telefono">Teléfono</label>
                    <input name="contacto" type="radio" value="telefono" id="contacto-telefono">

                    <label for="contacto-email">E-mail</label>
                    <input name="contacto" type="radio" value="email" id="contacto-email">
                </div>
            <p>Si elegió teléfono seleccione fecha y hora</p>
                <label for="fecha">Fecha</label>
                <input type="date"  id="fecha">

                <label for="hora">Hora</label>
                <input type="time"  id="hora" min="9:00" max="18:00">
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>

   </main>


<?php
    incluirTemplate('footer');
?>