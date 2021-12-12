<?php
// Saber si se registro correctamente
$resultado = $_GET['resultado'] ?? null;

require '../includes/funciones.php';
incluirTempleate('header');
?>
<main class="contenedor seccion">
    <h1>Bienvenido</h1>
    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Crear propiedad</a>
    <?php
    if ($resultado == 1) {
        echo "Registrado correctamente";
    }
    ?>

    <table class="listado">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Casa chida</td>
                <td>$30000</td>
                <td>
                    <a href="" class="boton-rojo-block">Eliminar</a>
                    <a href="" class="boton-verde-block">Actualizar</a>
                </td>
            </tr>
        </tbody>
    </table>
</main>

<?php incluirTempleate('footer'); ?>