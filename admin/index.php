<?php
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

// Importar conexion
require '../includes/config/database.php';
$db = conectarDB();

//Hacer consulta
$query= "SELECT * FROM propiedades";
$consulta= mysqli_query($db,$query);

// Saber si se registro correctamente
$resultado = $_GET['resultado'] ?? null;

// Validar que se seleccione el boton eliminar tenga un valor
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id=$_POST['id'];
    $id= filter_var($id, FILTER_VALIDATE_INT);
    if($id){
        $query2="DELETE FROM propiedades WHERE id=${id}";
        $resultado2=mysqli_query($db,$query2);

        if($resultado2){
            header('Location: /admin');
        }
    }
}

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
    elseif ($resultado == 2) {
        echo "Actualizado correctamente";
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
                    <a href="propiedades/actualizar.php?id=<?php echo $propiedad['id'];?>" class="boton-amarillo-block">Actualizar</a>
                    <!-- mixion boton with=100% -->
                    <form method="POST" class="w-100">
                        <input type="hidden" name="id" value="<?php echo $propiedad['id'];?>">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>
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