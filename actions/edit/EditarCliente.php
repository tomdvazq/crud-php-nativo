<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando cliente</title>
    <link rel="stylesheet" href="../../estilos.css">
</head>

<body>
    <?php
    include '../../configs/conexion.php';
    $id = $_REQUEST['id'];
    $consulta = "SELECT * FROM contactos WHERE id = $id";
    $data = $conexion->query($consulta);
    $cliente = $data->fetch_assoc();
    ?>

    <div class="containerEdit">
        <h2>Editando al cliente <?php echo $cliente['nombre'] . ' ' . $cliente['apellido']?></h2>
        <form action="ProcesarEdicion.php?id=<?php echo $cliente['id'] ?>" method="POST" enctype="multipart/form-data">
            <img class="imagenPerfilEditar" src="data:image/jpg;base64,<?php echo base64_encode($cliente['imagen_perfil']) ?>"> <br>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $cliente['nombre'] ?>"><br><br>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" value="<?php echo $cliente['apellido'] ?>"><br><br>

            <label for="telefono">Teléfono:</label>
            <input type="number" id="telefono" name="telefono" value="<?php echo $cliente['telefono'] ?>"><br><br>

            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo_electronico" value="<?php echo $cliente['correo_electronico'] ?>"><br><br>

            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $cliente['fecha_nacimiento'] ?>"><br><br>

            <label for="foto_perfil">Foto de perfil:</label>
            <input type="file" id="foto_perfil" name="imagen_perfil" accept="image/*"><br><br>

            <div class="actions">
            <button type="submit" value="Agregar cliente">Editar cliente</button>
            <a href="../../index.php">Volver a la vista</a>
            </div>
        </form>
    </div>
</body>

</html>