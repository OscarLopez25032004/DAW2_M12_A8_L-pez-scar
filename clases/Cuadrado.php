<?php
require_once 'FiguraGeometrica.php';

class Cuadrado extends FiguraGeometrica {
    public function __construct($lado1) {
        parent::__construct('cuadrado', $lado1);
    }

    public function calcularArea() {
        return $this->lado1 * $this->lado1;
    }

    public function calcularPerimetro() {
        return 4 * $this->lado1;
    }

    public function __toString() {
        return "Lado: $this->lado1";
    }
}
?>
