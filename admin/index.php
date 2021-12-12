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
        if($resultado == 1){
            echo "Registrado correctamente";
        }
        ?>
    </main>

<?php incluirTempleate('footer'); ?>