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

$refranes_aleatorios = array(
    "primero" => $refranes[array_rand($refranes)],
    "segundo" => $refranes[array_rand($refranes)],
    "tercero" => $refranes[array_rand($refranes)]
);

$json = json_encode($refranes_aleatorios);

header('Content-Type: application/json');
echo $json;