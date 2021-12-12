<?php
// Importar conexion
require '../includes/config/database.php';
$db = conectarDB();

//Hacer consulta
$query= "SELECT * FROM propiedades";
$consulta= mysqli_query($db,$query);

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
            <?php while ($propiedad = mysqli_fetch_assoc($consulta)): ?>
            <tr>
                <td><?php echo $propiedad['id']; ?></td>
                <td><?php echo $propiedad['titulo']; ?></td>
                <td><?php echo $propiedad['precio']; ?></td>
                <td>
                    <a href="" class="boton-amarillo-block">Actualizar</a>
                    <a href="" class="boton-rojo-block">Eliminar</a>
                </td>
            </tr>
            <?php endwhile;?>
        </tbody>
    </table>
</main>

<?php 
mysqli_close($db);
incluirTempleate('footer'); 
?>