<?php
$refranes = array(
    "Por bestia suele quedar quien en verano quiere caminar.",
    "Por San Andrés crece el día si es no es; por Santa Lucía, un paso de gallina; por Navidad, quien quiera lo verá.",
    "Haz de la noche, noche y del día, día, y vivirás con alegría.",
    "No hay mejor desprecio que no hacer aprecio.",
    "A quien madruga, Dios le ayuda.",
    "Quien bien hace, para sí hace.",
    "Al mal tiempo, buena cara.",
    "Al pan, pan y al vino, vino.",
    "No hay plazo tan largo, que no llegue al cabo.",
    "Aire castellano, malo en invierno y peor en verano."
);


$refran_aleatorio = $refranes[array_rand($refranes)];

header('Content-Type: text/plain');
echo $refran_aleatorio;
?>