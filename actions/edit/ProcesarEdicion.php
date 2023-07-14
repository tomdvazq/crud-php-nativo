<?php
include '../../configs/conexion.php';
error_reporting(1);

$id = $_GET['id'];

$consultaExistente = "SELECT * FROM contactos WHERE id = ?";
$stmt = $conexion->prepare($consultaExistente);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$clienteExistente = $resultado->fetch_assoc();
$stmt->close();

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$email = $_POST["correo_electronico"];
$fecha = $_POST["fecha_nacimiento"];
$foto = $clienteExistente['imagen_perfil'];

if (strlen($telefono) > 14) {
    echo "El número de teléfono debe contener como máximo 14 caracteres. <a href='EditarCliente.php?id=" . $id . "'>Volver</a>";
    exit;
}

if ($_FILES["imagen_perfil"]["error"] === UPLOAD_ERR_OK) {
    $fotoSize = $_FILES["imagen_perfil"]["size"];

    if ($fotoSize <= 64000) { // 64KB en bytes
        $foto = file_get_contents($_FILES["imagen_perfil"]["tmp_name"]);
    } else {
        echo "El tamaño de la imagen es demasiado grande. Por favor, seleccione una imagen más pequeña. El máximo es de 64KB. <a href='EditarCliente.php?id=" . $id . "'>Volver</a>";
        exit; 
    }
}

if ($_FILES["imagen_perfil"]["error"] === UPLOAD_ERR_NO_FILE) {
    $foto = $clienteExistente['imagen_perfil'];
}

if ($nombre === $clienteExistente['nombre'] &&
    $apellido === $clienteExistente['apellido'] &&
    $telefono === $clienteExistente['telefono'] &&
    $email === $clienteExistente['correo_electronico'] &&
    $fecha === $clienteExistente['fecha_nacimiento'] &&
    $foto === $clienteExistente['imagen_perfil']) {

    echo "No se realizaron cambios en el cliente. <a href='../../index.php'>Volver al inicio</a>";

} else {

    $consulta = "UPDATE contactos SET   nombre = ?, 
                                        apellido = ?, 
                                        telefono = ?, 
                                        correo_electronico = ?, 
                                        fecha_nacimiento = ?, 
                                        imagen_perfil = ? 
                WHERE id = ?";
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("ssssssi", $nombre, $apellido, $telefono, $email, $fecha, $foto, $id);

    if ($stmt->execute()) {
        echo "Registro actualizado correctamente";
        header('Location: ../../index.php');
    } else {
        echo "Error al actualizar el registro: " . $stmt->error;
    }

    $stmt->close();
}
?>