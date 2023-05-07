<?php

$colores = array(
    "blue", "green", "orange", "yellow", "red", "purple", "black", "pink", "gray", "white"
);

$color_aleatorio = $colores[array_rand($colores)];

header('Content-Type: text/plain');
echo $color_aleatorio;
?>