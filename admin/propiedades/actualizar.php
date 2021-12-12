<?php

// Extrae el id de la propiedad seleccionada
$id = $_GET['id'];
// Valida la id
$id= filter_var($id, FILTER_VALIDATE_INT);

//redireccionar sino existe o no es valido
if(!$id){
    header('Location: /admin');
}

// Importa la conexion
require '../../includes/config/database.php';
$db = conectarDB();

// Consulta para extraer los datos de la propiedad
$query3= "SELECT * FROM propiedades WHERE id = ${id}";
$resultado3=mysqli_query($db,$query3);
$propiedad= mysqli_fetch_assoc($resultado3);

// Ver datos de la propiedad
// echo "<pre>";
// var_dump($propiedad);
// echo "</pre>";
// Consulta para vendedores
$query2= "SELECT * FROM vendedores";
$resultado2=mysqli_query($db,$query2);

// Mensaje de errores 
$errores = [];

// Iniciacion de la variables
$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedor = $propiedad['vendedorID'];

//  valida que el meotodo sea post y no get
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     //Mostrar datos de  la variable POST
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    // Declara las variables  y las sanitiza 
    $titulo = mysqli_real_escape_string($db,$_POST['titulo']);
    $precio =mysqli_real_escape_string( $db,$_POST['precio']);
    $descripcion =mysqli_real_escape_string( $db,$_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db,$_POST['habitaciones']);
    $wc =mysqli_real_escape_string( $db,$_POST['wc']);
    $estacionamiento =mysqli_real_escape_string( $db,$_POST['estacionamientos']);
    $vendedor =mysqli_real_escape_string( $db,$_POST['vendedor']);

    // Valida que los campos no esten vacios
    if (!$titulo) {
        $errores[] = "Debes añadir un titulo";
    }
    if (!$precio) {
        $errores[] = "Debes añadir un precio";
    }
    if (!$descripcion) {
        $errores[] = "Debes añadir una descripcion";
    }
    if (!$habitaciones) {
        $errores[] = "Debes añadir una habitacion";
    }
    if (!$habitaciones) {
        $errores[] = "Debes añadir una habitacion";
    }
    if (!$wc) {
        $errores[] = "Debes añadir un wc";
    }
    if (!$estacionamiento) {
        $errores[] = "Debes añadir un estacionamiento";
    }
    if (!$vendedor) {
        $errores[] = "Debes seleccionar un vendedor";
    }

    // Muestra los errores
    // echo "<pre>";
    // var_dump($errores);
    // echo "</pre>";

// Revisar que el arreglo de erroes este vacio
    if(empty($errores)){
        $query = "UPDATE propiedades SET titulo = '${titulo}',precio = ${precio},descripcion = '${descripcion}',habitaciones = ${habitaciones},wc = ${wc},estacionamiento = ${estacionamiento},vendedorID = ${vendedor} WHERE id = ${id}";
        
        //almacenar en base de datos
        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            // Una vez termine su registro sera redireccionado
            header('Location: /admin?resultado=2');
        } 
    }
}

require '../../includes/funciones.php';
incluirTempleate('header');
?>
<main class="contenedor seccion">
    <h1>Actualizar</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>
    <!-- action donde se llevara a cabo el proceso de validacion -->
    <!-- mandar datos a un servidor es recomendable usar el metodo post -->
    <form class="formulario"  method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend> Informacion general</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Ingrese un titulo" value="<?php echo $titulo;?>">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Ingrese un precio" value="<?php echo $precio;?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="" accept="image/jpeg , image/png">

            <label for="descripcion">Descripcion:</label>
            <textarea name="descripcion" id="descripcion"><?php echo $descripcion;?></textarea>
        </fieldset>
        <fieldset>
            <legend>Informacion de la propiedad</legend>
            <label for="habitaciones">habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="N° habitaciones" min="1" value="<?php echo $habitaciones;?>">

            <label for="baños">Baños:</label>
            <input type="number" id="baños" name="wc" placeholder="N° baños" min="1" value="<?php echo $wc;?>">

            <label for="estacionamiento">Estacionamientos:</label>
            <input type="number" id="estacionamiento" name="estacionamientos" placeholder="N° estacionamientos" min="1" value="<?php echo $estacionamiento;?>">
        </fieldset>
        <fieldset>
            <legend>Informacion del vendedor</legend>
            <select name="vendedor" id="vendedor">
                <option value ="" selected >--Sin seleccionar--</option>
                <!-- Mostrar resultado de la consulta de vendedores -->
                <?php while ($row = mysqli_fetch_assoc($resultado2)): ?>
                    <option <?php echo $vendedor === $row['id'] ? 'selected': ''; ?> value ="<?php echo $row['id']; ?>"> <?php echo $row['nombre'] . " ". $row['apellido'];?></option>
                <?php endwhile ?>
                
            </select>
        </fieldset>
        <input type="submit" value="Actualizar propiedad" class="boton boton-verde">
    </form>

    <!-- imprime los errores -->
    <?php foreach($errores as $error):?>
        <!-- estilos a los erroes -->
        <div class="alerta error">
            <?php echo $error;?>
        </div>
    <?php endforeach;?>
</main>

<?php incluirTempleate('footer'); ?>