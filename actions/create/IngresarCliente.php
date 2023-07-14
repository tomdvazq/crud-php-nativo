<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear un nuevo cliente</title>
    <link rel="stylesheet" href="../../estilos.css">
</head>

<body>
    <div class="containerCreate">
        <h2>Agregar nuevo cliente</h2>
        <form action="ProcesarFormulario.php" method="POST" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required><br><br>

            <label for="telefono">Teléfono:</label>
            <input type="number" id="telefono" name="telefono" required><br><br>

            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo_electronico" required><br><br>

            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br><br>

            <label for="foto_perfil">Foto de perfil:</label>
            <input type="file" id="foto_perfil" name="imagen_perfil" accept="image/*" required><br><br>

            <div class="actions">
                <button type="submit" value="Agregar cliente">Agregar cliente</button>
                <a href="../../index.php">Volver a la vista</a>
            </div>
        </form>
    </div>
</body>

</html>