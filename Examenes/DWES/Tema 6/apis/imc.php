<?php

if (isset($_GET['peso']) && isset($_GET['altura'])) {
  $peso = floatval($_GET['peso']);
  $altura = floatval($_GET['altura']);

  $imc = $peso / ($altura * $altura);

  echo "Tu índice de masa corporal es: " . round($imc, 2);
} else {
  echo "Error: Debes proporcionar los parámetros 'peso' y 'altura' en el URL";
}

//Como resolver la url: http://localhost/apis/imc/?peso=?&altura=?
?>