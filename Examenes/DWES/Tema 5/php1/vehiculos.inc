<?php
class Vehiculos {
  private $matr;
  private $edad;

  public function __construct($matr, $edad) {
    $this->matr = $matr;
    $this->edad = $edad;
  }

  public function ver() {
    echo "El vehículo con matrícula $this->matr tiene una antigüedad de $this->edad años";
  }

  public function actualizar_matricula($nueva_matr) {
    $this->matr = $nueva_matr;
  }

  public function ver_completo() {
    echo "Matrícula: $this->matr<br>";
    echo "Edad: $this->edad años<br>";
  }
}
?>