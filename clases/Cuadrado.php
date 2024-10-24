<?php
require_once 'FiguraGeometrica.php'; // Incluye la definición de la clase FiguraGeometrica

class Cuadrado extends FiguraGeometrica { // La clase Cuadrado hereda de FiguraGeometrica
    // Constructor de la clase Cuadrado
    public function __construct($lado1) {
        parent::__construct('cuadrado', $lado1); // Llama al constructor de la clase padre con el tipo 'cuadrado' y el lado proporcionado
    }

    // Método para calcular el área del cuadrado
    public function calcularArea() {
        return $this->lado1 * $this->lado1; // Área = lado1 * lado1
    }

    // Método para calcular el perímetro del cuadrado
    public function calcularPerimetro() {
        return 4 * $this->lado1; // Perímetro = 4 * lado1
    }

    // Método mágico para convertir la instancia en una cadena
    public function __toString() {
        return "Lado: $this->lado1"; // Devuelve una representación del cuadrado
    }
}
?>
