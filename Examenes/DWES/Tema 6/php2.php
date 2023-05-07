<?php
$latitud = ;
$longitud = ;
$apiKey = 'TU_API_KEY';

$url_hoy = "https://api.openweathermap.org/data/2.5/weather?lat=$latitud&lon=$longitud&exclude=minutely,hourly,daily,alerts&units=metric&appid=$apiKey";
$datos_hoy = json_decode(file_get_contents($url_hoy));


$fecha = '2021-07-15';
$tiempo = strtotime($fecha);
$urlFecha = "https://api.openweathermap.org/data/2.5/onecall/timemachine?lat=$latitud&lon=$longitud&dt=$tiempo&exclude=minutely,hourly,daily,alerts&units=metric&appid=$apiKey";
$datos_fecha = json_decode(file_get_contents($urlFecha));


$descripcionHoy = $datos_hoy->weather[0]->description;


$temperatura_hoy = $datos_hoy->main->temp;
$humedad_hoy = $datos_hoy->main->humidity;
$presion_hoy = $datos_hoy->main->pressure;
$nubes_hoy = $datos_hoy->clouds->all;


$temperatura_fecha = $datos_fecha->current->temp;
$humedad_fecha = $datos_fecha->current->humidity;
$presion_fecha = $datos_fecha->current->pressure;
$nubes_fecha = $datos_fecha->current->clouds;


echo "<h1>Información del Clima</h1>";
echo "<h2>Hoy</h2>";
echo "<p>Descripción del clima: $descripcionHoy</p>";
echo "<p>Temperatura: $temperatura_hoy &deg;C</p>";
echo "<p>Humedad: $humedad_hoy%</p>";
echo "<p>Presión: $presion_hoy hPa</p>";
echo "<p>Nubosidad: $nubes_hoy%</p>";

echo "<h2>$fecha</h2>";
echo "<p>Temperatura: $temperatura_fecha &deg;C</p>";
echo "<p>Humedad: $humedad_fecha%</p>";
echo "<p>Presión: $presion_fecha hPa</p>";
echo "<p>Nubosidad: $nubes_fecha%</p>";
?>