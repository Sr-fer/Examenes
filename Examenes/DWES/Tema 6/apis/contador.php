<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $texto = $_POST['texto'] ?? '';
    $contador = strlen($texto);
    header('Content-Type: text/plain');
    echo $contador;
} else {
    echo "Método no permitido";
}

?>