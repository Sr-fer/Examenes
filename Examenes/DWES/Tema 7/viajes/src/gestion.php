<?php
$host = 'postgres';
$dbname = 'viajes';
$username = 'fer';
$password = 'fer';

try {
    $db = new PDO("pgsql:host=$host;port=5432;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit_agregar_viajero'])) {
        $nombre = $_POST['nombre'];
        $fechaNacimiento = $_POST['fecha_nacimiento'];
        $nacionalidad = $_POST['nacionalidad'];

        $queryInsertViajero = "INSERT INTO Viajeros (nombre, fecha_nacimiento, nacionalidad) VALUES (?, ?, ?)";
        $stmtInsertViajero = $db->prepare($queryInsertViajero);
        $stmtInsertViajero->execute([$nombre, $fechaNacimiento, $nacionalidad]);
        header("Location: stats.php");
        exit();
    }

    if (isset($_POST['submit_agregar_viaje'])) {
        $idViajero = $_POST['id_viajero'];
        $origen = $_POST['origen'];
        $destino = $_POST['destino'];
        $fechaSalida = $_POST['fecha_salida'];
        $fechaLlegada = $_POST['fecha_llegada'];

        $queryInsertViaje = "INSERT INTO Viajes (id_viajero, origen_id, destino_id, fecha_salida, fecha_llegada) VALUES (?, ?, ?, ?, ?)";
        $stmtInsertViaje = $db->prepare($queryInsertViaje);
        $stmtInsertViaje->execute([$idViajero, $origen, $destino, $fechaSalida, $fechaLlegada]);
        header("Location: stats.php");
        exit();
    }

    if (isset($_POST['submit_agregar_ciudad'])) {
        $nombre = $_POST['nombre'];
        $habitantes = $_POST['habitantes'];
        $descripcion = $_POST['descripcion'];

        $queryInsertCiudad = "INSERT INTO Ciudades (nombre, habitantes, descripcion) VALUES (?, ?, ?)";
        $stmtInsertCiudad = $db->prepare($queryInsertCiudad);
        $stmtInsertCiudad->execute([$nombre, $habitantes, $descripcion]);
        header("Location: stats.php");
        exit();
    }
}

if (isset($_POST['submit_actualizar_viajero'])) {
    $idViajero = $_POST['id_viajero'];
    $nombre = $_POST['nombre'];
    $fechaNacimiento = $_POST['fecha_nacimiento'];
    $nacionalidad = $_POST['nacionalidad'];

    $queryActualizarViajero = "UPDATE Viajeros SET nombre = ?, fecha_nacimiento = ?, nacionalidad = ? WHERE id = ?";
    $stmtActualizarViajero = $db->prepare($queryActualizarViajero);
    $stmtActualizarViajero->execute([$nombre, $fechaNacimiento, $nacionalidad, $idViajero]);
    header("Location: stats.php");
    exit();
}

if (isset($_POST['submit_borrar_viajero'])) {
    $idViajeroBorrar = $_POST['id_viajero_borrar'];

    $queryBorrarViajero = "DELETE FROM Viajeros WHERE id = ?";
    $stmtBorrarViajero = $db->prepare($queryBorrarViajero);
    $stmtBorrarViajero->execute([$idViajeroBorrar]);
    header("Location: stats.php");
    exit();
}

if (isset($_POST['submit_borrar_viaje'])) {
    $idViajeBorrar = $_POST['id_viaje_borrar'];

    $queryBorrarViaje = "DELETE FROM Viajes WHERE id = ?";
    $stmtBorrarViaje = $db->prepare($queryBorrarViaje);
    $stmtBorrarViaje->execute([$idViajeBorrar]);
    header("Location: stats.php");
    exit();
}

if (isset($_POST['submit_borrar_ciudad'])) {
    $idCiudadBorrar = $_POST['id_ciudad_borrar'];

    $queryBorrarCiudad = "DELETE FROM Ciudades WHERE id = ?";
    $stmtBorrarCiudad = $db->prepare($queryBorrarCiudad);
    $stmtBorrarCiudad->execute([$idCiudadBorrar]);
    header("Location: stats.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Viajes</title>
</head>
<body>
    <h2>Añadir Viajero</h2>
    <form action="gestion.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" required><br>

        <label for="nacionalidad">Nacionalidad:</label>
        <input type="text" name="nacionalidad" required><br>

        <input type="submit" name="submit_agregar_viajero" value="Agregar Viajero">
    </form>

    <h2>Añadir Viaje</h2>
    <form action="gestion.php" method="POST">
        <label for="id_viajero">ID del Viajero:</label>
        <input type="text" name="id_viajero" required><br>

        <label for="origen">Origen:</label>
        <input type="text" name="origen" required><br>

        <label for="destino">Destino:</label>
        <input type="text" name="destino" required><br>

        <label for="fecha_salida">Fecha de Salida:</label>
        <input type="date" name="fecha_salida" required><br>

        <label for="fecha_llegada">Fecha de Llegada:</label>
        <input type="date" name="fecha_llegada" required><br>

        <input type="submit" name="submit_agregar_viaje" value="Agregar Viaje">
    </form>

    <h2>Añadir Ciudad</h2>
    <form action="gestion.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="habitantes">Número de Habitantes:</label>
        <input type="text" name="habitantes" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required></textarea><br>

        <input type="submit" name="submit_agregar_ciudad" value="Agregar Ciudad">
    </form>

    <h2>Actualizar Datos de un Viajero</h2>
    <form action="gestion.php" method="POST">
        <label for="id_viajero">ID del Viajero:</label>
        <input type="text" name="id_viajero" required><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" required><br>

        <label for="nacionalidad">Nacionalidad:</label>
        <input type="text" name="nacionalidad" required><br>

        <input type="submit" name="submit_actualizar_viajero" value="Actualizar Datos">
    </form>

    <h2>Borrar Viajero</h2>
    <form action="gestion.php" method="POST">
        <label for="id_viajero_borrar">ID del Viajero:</label>
        <input type="text" name="id_viajero_borrar" required><br>

        <input type="submit" name="submit_borrar_viajero" value="Borrar Viajero">
    </form>

    <h2>Borrar Viaje</h2>
    <form action="gestion.php" method="POST">
        <label for="id_viaje_borrar">ID del Viaje:</label>
        <input type="text" name="id_viaje_borrar" required><br>

        <input type="submit" name="submit_borrar_viaje" value="Borrar Viaje">
    </form>

    <h2>Borrar Ciudad</h2>
    <form action="gestion.php" method="POST">
        <label for="id_ciudad_borrar">ID de la Ciudad:</label>
        <input type="text" name="id_ciudad_borrar" required><br>

        <input type="submit" name="submit_borrar_ciudad" value="Borrar Ciudad">
    </form>
</body>
</html>