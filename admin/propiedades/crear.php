<?php
require '../../includes/funciones.php';
incluirTempleate('header');
?>
<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>
    <form action="" class="formulario">
        <fieldset>
            <legend> Informacion general</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="" placeholder="Ingrese un titulo">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="" placeholder="Ingrese un precio">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="" accept="image/jpeg , image/png">

            <label for="descripcion">Descripcion:</label>
            <textarea name="" id="descripcion"></textarea>
        </fieldset>
        <fieldset>
            <legend>Informacion de la propiedad</legend>
            <label for="habitaciones">habitaciones:</label>
            <input type="number" id="habitaciones" name="" placeholder="N° habitaciones" min="1">

            <label for="baños">Baños:</label>
            <input type="number" id="baños" name="" placeholder="N° baños" min="1">

            <label for="estacionamiento">Estacionamientos:</label>
            <input type="number" id="estacionamiento" name="" placeholder="N° estacionamientos" min="1">
        </fieldset>

        <fieldset>
        <legend>Informacion del vendedor</legend>

        <select name="" id="">
            <option value="1" selected disabled>--Sin seleccionar--</option>
            <option value="1">Luis</option>
            <option value="2">Aldrich</option>
        </select>
        </fieldset>

        <input type="submit" value="Registrar" class="boton boton-verde">
    </form>
</main>

<?php incluirTempleate('footer'); ?>