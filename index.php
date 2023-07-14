<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITD Consulting Technical Programming Examination: CRUD</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <div class="containerCrud">
        <?php
        include 'configs/conexion.php';

        $consulta = 'SELECT * FROM contactos';
        $resultado = $conexion->query($consulta);
    
        if ($resultado->num_rows > 0) {
            $columnas = $resultado->fetch_fields();
        ?>
    
            <div class="headerCrud">
                <a href="actions/create/IngresarCliente.php" class="ingresarCliente">Ingresar cliente</a>
                
                <form action="index.php" method="POST">
                    <input type="search" name="busqueda">
                    <input type="submit" name="enviar" value="Buscar">
                </form>
            </div>

            <table>
                <thead>
                    <tr>
                        <?php foreach ($columnas as $columna) { ?>
                            <th>
                                <?php
                                switch ($columna->name) {
                                    case 'correo_electronico':
                                        echo 'Correo electrónico';
                                        break;
                                    case 'fecha_nacimiento':
                                        echo 'Fecha de nacimiento';
                                        break;
                                    case 'imagen_perfil':
                                        echo 'Foto de perfil';
                                        break;
                                    case 'creado_en':
                                        echo 'Creado el día';
                                        break;
                                    case 'actualizado_en':
                                        echo 'Actualizado el día';
                                        break;
                                    default:
                                        echo $columna->name;
                                        break;
                                }
                                ?>
                            </th>
                        <?php } ?>
                        <th id="actions">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'configs/buscador.php';

                    while ($fila = mysqli_fetch_array($consultaBusqueda)) { ?>
                        <tr>
                            <?php foreach ($columnas as $columna) { ?>
                                <td>
                                    <?php
                                    if ($columna->name === 'imagen_perfil') {
                                        echo '<img class="imagenPerfil" src="data:image/jpg;base64,' . base64_encode($fila[$columna->name]) . '">';
                                    } else if ($columna->name === "creado_en" || $columna->name === "actualizado_en") {
                                        echo date("Y-m-d");
                                    } else {
                                        echo $fila[$columna->name];
                                    }
                                    ?>
                                </td>
                            <?php } ?>
                            <td>
                                <a class="editar" href="actions/edit/EditarCliente.php?id=<?php echo $fila["id"]?>">Editar</a>
                                <a class="eliminar" href="actions/delete/EliminarCliente.php?id=<?php echo $fila["id"]?>">Eliminar</a>
                            </td>
                        </tr>
                        <?php
                    } ?>
                </tbody>
            </table>
    
        <?php } else {
            echo "<p>No existen clientes registrados en la base de datos, <a href='actions/create/IngresarCliente.php'>crea uno nuevo</a></p>";
        }
    
        $conexion->close();
        ?>
    </div>