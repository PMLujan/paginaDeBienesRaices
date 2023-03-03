
<fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo propiedad" value="<?php echo s($propiedad->titulo); ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio propiedad" value="<?php echo s($propiedad->precio); ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg , image/png " name="propiedad[imagen]">

                <?php 
                      if($propiedad->imagen): { ?>
                        <img class="imagenPropiedad" src="../../imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen propiedad" >
                        <?php } ?>

                <?php endif; ?>


                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="propiedad[descripcion]" cols="30" rows="10"><?php echo s($propiedad->descripcion); ?></textarea>

            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ej: 3" min="1" max="9" value="<?php echo s($propiedad->habitaciones); ?>">

                <label for="baños">Baños:</label>
                <input type="number" id="baños" name="propiedad[baños]" placeholder="Ej: 3" min="1" max="9" value="<?php echo s($propiedad->baños); ?>">

                <label for="estacionamiento"> Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Ej: 3" min="1" max="9" value="<?php echo s($propiedad->estacionamiento); ?>">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select>
                    <option value=""><-- Seleccione --></option>
                    <option value="1">juan Perez </option>
                    <option value="2">Laura fernandez</option>
                    <option value="3">valeria Lopez</option>
                </select>

            </fieldset>


