<?php
require_once 'FiguraGeometrica.php';

class Rectangulo extends FiguraGeometrica {
    private $lado2;

    public function __construct($lado1, $lado2) {
        parent::__construct('rectangulo', $lado1);
        $this->lado2 = $lado2;
    }

    public function calcularArea() {
        return $this->lado1 * $this->lado2;
    }

    public function calcularPerimetro() {
        return 2 * ($this->lado1 + $this->lado2);
    }

    public function __toString() {
        return "Lado 1: $this->lado1, Lado 2: $this->lado2";
    }
}
?>
