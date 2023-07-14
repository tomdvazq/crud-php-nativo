<?php
include '../../configs/conexion.php';

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$email = $_POST["correo_electronico"];
$fecha = $_POST["fecha_nacimiento"];
$foto = $_FILES["imagen_perfil"]["tmp_name"];
$fotoSize = $_FILES["imagen_perfil"]["size"];

if (strlen($telefono) > 14) {
    echo "El número de teléfono debe contener como máximo 14 caracteres. <a href='IngresarCliente.php'>Volver</a>";
    exit;
}

// Validar tamaño de la imagen
if ($fotoSize > 64000) { 
    echo "El tamaño de la imagen es demasiado grande. Por favor, seleccione una imagen más pequeña. El máximo es de 64KB. <a href='IngresarCliente.php'>Volver</a>";
    exit;
}

$fotoBinario = addslashes(file_get_contents($foto));

$consulta = "INSERT INTO contactos (nombre, apellido, telefono, correo_electronico, fecha_nacimiento, imagen_perfil)
            VALUES ('$nombre', '$apellido', '$telefono', '$email', '$fecha', '$fotoBinario')";

if (mysqli_query($conexion, $consulta)) {
    echo "Registro insertado correctamente";
    header('Location: ../../index.php');
} else {
    echo "Error al insertar el registro: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
