<?php
require_once 'FiguraGeometrica.php';

class Circulo extends FiguraGeometrica {
    public function __construct($radio) {
        parent::__construct('circulo', $radio);
    }

    public function calcularArea() {
        return pi() * pow($this->lado1, 2);
    }

    public function calcularPerimetro() {
        return 2 * pi() * $this->lado1;
    }

    public function __toString() {
        return "Radio: $this->lado1";
    }
}
?>
