<?php
$usuarios = json_decode(file_get_contents("usuarios.json"), true);

function mostrar_usuario($usuario) {
    echo "<tr>";
    echo "<td>" . $usuario["dni"] . "</td>" . "&nbsp" . "&nbsp" . "&nbsp";
    echo "<td>" . $usuario["nombre"] . "</td>" . "&nbsp" . "&nbsp" . "&nbsp";
    echo "<td>" . $usuario["email"] . "</td>" . "&nbsp" . "&nbsp" . "&nbsp";
    echo "</tr>";
}

echo "<h2>Listado de usuarios:</h2>";
echo "<table>";
echo "<tr><th>DNI</th><th>Nombre</th><th>Email</th></tr>";
foreach ($usuarios as $usuario) {
    mostrar_usuario($usuario);
}
echo "</table>";

$dni = "12345678A";
echo "<h2>Datos del usuario cuyo DNI es $dni:</h2>";
$encontrado = false;
foreach ($usuarios as $usuario) {
    if ($usuario["dni"] == $dni) {
        mostrar_usuario($usuario);
        $encontrado = true;
        break;
    }
}
if (!$encontrado) {
    echo "No se encontró ningún usuario con el DNI $dni";
}
?>