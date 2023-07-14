<?php
    include 'conexion.php';

    $busqueda = "";

    if(isset($_POST['busqueda'])) {
        $busqueda = $_POST['busqueda'];
    }

    $consulta = "SELECT * FROM contactos WHERE nombre LIKE '%$busqueda%' OR apellido LIKE '%$busqueda%' OR telefono LIKE '%$busqueda%' OR correo_electronico LIKE '%$busqueda%' OR fecha_nacimiento LIKE '%$busqueda%'";

    $consultaBusqueda = mysqli_query($conexion, $consulta);
?>