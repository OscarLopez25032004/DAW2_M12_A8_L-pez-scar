<?php
class FiguraGeometrica {
    protected $tipoFigura;
    protected $lado1;

    public function __construct($tipoFigura, $lado1) {
        $this->tipoFigura = $tipoFigura;
        $this->lado1 = $lado1;
    }

    public function calcularArea() {
        return "Este método debe ser sobreescrito";
    }

    public function calcularPerimetro() {
        return "Este método debe ser sobreescrito";
    }
}
?>
