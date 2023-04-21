<?php
require_once("vehiculos.inc");


$v1 = new Vehiculos("ABC123", 5);
$v2 = new Vehiculos("XYZ789", 3);


$v1->ver();
echo "<br>";
echo "<br>";

$v2->ver_completo();
echo "<br>";


$v2->actualizar_matricula("DEF456");

echo "La nueva matrícula del Vehiculo 2 es:";
echo "<br>";
echo  $v2->ver_completo();
?>