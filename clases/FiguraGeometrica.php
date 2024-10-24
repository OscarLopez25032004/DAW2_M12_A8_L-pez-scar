<?php
class FiguraGeometrica { // Definición de la clase FiguraGeometrica
    protected $tipoFigura; // Atributo protegido para almacenar el tipo de figura
    protected $lado1; // Atributo protegido para almacenar el primer lado de la figura

    // Constructor de la clase
    public function __construct($tipoFigura, $lado1) {
        $this->tipoFigura = $tipoFigura; // Asigna el tipo de figura
        $this->lado1 = $lado1; // Asigna el primer lado
    }

    // Método para calcular el área de la figura
    public function calcularArea() {
        // Este método está destinado a ser sobreescrito por las clases hijas
        return "Este método debe ser sobreescrito";
    }

    // Método para calcular el perímetro de la figura
    public function calcularPerimetro() {
        // Este método está destinado a ser sobreescrito por las clases hijas
        return "Este método debe ser sobreescrito";
    }
}
?>
