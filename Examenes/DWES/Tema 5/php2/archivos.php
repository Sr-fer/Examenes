<?php
$archivo_txt = "ejemplo.txt";
echo "Nombre y ruta del archivo $archivo_txt: " . realpath($archivo_txt) . "<br>";

if (file_exists($archivo_txt)) {
    echo "El archivo $archivo_txt existe<br>";


    $contenido = file_get_contents($archivo_txt);


    $array = array("1", "2", "3", "4");
    file_put_contents($archivo_txt, implode("\n", $array));


    $archivo_csv = "ejemplo.csv";
    $primera_linea = array();
    if (($separado = fopen($archivo_csv, "r")) !== false) {
        if (($datos = fgetcsv($separado)) !== false) {
            $fila = $datos;
        }
        fclose($separado);
    }
    print_r($fila);
} else {
    echo "El archivo $archivo_txt no existe<br>";
}
?>
