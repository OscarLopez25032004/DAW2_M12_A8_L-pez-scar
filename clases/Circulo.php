<?php
require_once 'FiguraGeometrica.php'; // Incluye la definición de la clase FiguraGeometrica

class Circulo extends FiguraGeometrica { // La clase Circulo hereda de FiguraGeometrica
    // Constructor de la clase Circulo
    public function __construct($radio) {
        parent::__construct('circulo', $radio); // Llama al constructor de la clase padre con el tipo 'circulo' y el radio proporcionado
    }

    // Método para calcular el área del círculo
    public function calcularArea() {
        return pi() * pow($this->lado1, 2); // Área = π * radio^2
    }

    // Método para calcular el perímetro (circunferencia) del círculo
    public function calcularPerimetro() {
        return 2 * pi() * $this->lado1; // Perímetro = 2 * π * radio
    }

    // Método mágico para convertir la instancia en una cadena
    public function __toString() {
        return "Radio: $this->lado1"; // Devuelve una representación del círculo
    }
}
?>
