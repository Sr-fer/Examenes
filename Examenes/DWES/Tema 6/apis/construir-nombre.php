<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    
    if (isset($data->nombre) && isset($data->apellidos)) {
        $nombreCompleto = $data->nombre . ' ' . $data->apellidos;
        echo $nombreCompleto;
    } else {
        echo 'El JSON debe contener los campos de "nombre" y "apellidos"';
    }
} else {
    echo 'Se requiere el método POST';
}
?>