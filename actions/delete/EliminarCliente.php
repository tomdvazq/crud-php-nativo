<?php
    include '../../configs/conexion.php';
    $id = $_REQUEST['id'];

    if (isset($_POST['confirmacion']) && $_POST['confirmacion'] === 'si') {
        $consulta = "DELETE FROM contactos WHERE id = $id";

        if (mysqli_query($conexion, $consulta)) {
            echo "Registro eliminado correctamente";
            header('Location: ../../index.php');
            exit();
        } else {
            echo "Error al eliminar el registro: " . mysqli_error($conexion);
        }
    }
?>

<form method="post" action="">
    <p>¿Estás seguro de eliminar al cliente?</p>
    <input type="hidden" name="confirmacion" value="si">
    <button type="submit">Eliminar</button>
    <a href="../../index.php">No eliminar</a>
</form>