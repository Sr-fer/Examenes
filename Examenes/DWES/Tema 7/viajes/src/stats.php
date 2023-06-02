<?php
$host = 'postgres';
$dbname = 'viajes';
$username = 'fer';
$password = 'fer';

try {
    $db = new PDO("pgsql:host=$host;port=5432;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    echo "Error: " . $e->getTraceAsString();
    exit();
}
    $queryViajeros = "SELECT * FROM Viajeros";
    $stmtViajeros = $db->query($queryViajeros);
    $viajeros = $stmtViajeros->fetchAll(PDO::FETCH_ASSOC);

    $queryViajes = "SELECT c1.nombre origen, c2.nombre destino FROM Viajes v,Ciudades c1,Ciudades c2 WHERE v.origen_id=c1.id and v.destino_id=c2.id";
    $stmtViajes = $db->query($queryViajes);
    $viajes = $stmtViajes->fetchAll(PDO::FETCH_ASSOC);

    $queryCantidadViajeros = "SELECT COUNT(*) FROM Viajeros";
    $stmtCantidadViajeros = $db->query($queryCantidadViajeros);
    $cantidadViajeros = $stmtCantidadViajeros->fetchColumn();

    $queryCantidadViajes = "SELECT COUNT(*) FROM Viajes";
    $stmtCantidadViajes = $db->query($queryCantidadViajes);
    $cantidadViajes = $stmtCantidadViajes->fetchColumn();

    $queryViajeroMenorEdad = "SELECT * FROM Viajeros ORDER BY fecha_nacimiento ASC LIMIT 1";
    $stmtViajeroMenorEdad = $db->query($queryViajeroMenorEdad);
    $viajeroMenorEdad = $stmtViajeroMenorEdad->fetch(PDO::FETCH_ASSOC);

    $queryCantidadViajesPorOrigen = "SELECT c.nombre, (SELECT count(*) FROM Viajes v WHERE v.origen_id=c.id) cantidad FROM Ciudades c";
    $stmtCantidadViajesPorOrigen = $db->query($queryCantidadViajesPorOrigen);
    $viajesPorOrigen = $stmtCantidadViajesPorOrigen->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Estadísticas de Viajes</title>
</head>
<body>
    <h1>Estadísticas de Viajes</h1>

    <h2>Viajeros Registrados</h2>
    <ul>
        <?php foreach ($viajeros as $viajero): ?>
            <li><?php echo $viajero['nombre']; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Viajes Registrados</h2>
    <ul>
        <?php foreach ($viajes as $viaje): ?>
            <li>Origen: <?php echo $viaje['origen']; ?>, Destino: <?php echo $viaje['destino']; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Cantidad de Viajeros Registrados: <?php echo $cantidadViajeros; ?></h2>

    <h2>Cantidad de Viajes Registrados: <?php echo $cantidadViajes; ?></h2>

    <h2>Viajero de Menor Edad</h2>
    <p>Nombre: <?php echo $viajeroMenorEdad['nombre']; ?></p>
    <p>Fecha de Nacimiento: <?php echo $viajeroMenorEdad['fecha_nacimiento']; ?></p>

    <h2>Cantidad de Viajes por Origen</h2>
    <ul>
        <?php foreach ($viajesPorOrigen as $viajePorOrigen): ?>
            <li>Origen <?php echo $viajePorOrigen['nombre']; ?>: <?php echo $viajePorOrigen['cantidad']; ?> viajes</li>
        <?php endforeach; ?>
    </ul>
    <a href=/gestion.php>Modificar Datos</a>
</body>
</html>