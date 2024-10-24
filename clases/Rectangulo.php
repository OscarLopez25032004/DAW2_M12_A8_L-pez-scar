<?php
require_once 'FiguraGeometrica.php'; // Incluye la clase base FiguraGeometrica

class Rectangulo extends FiguraGeometrica { // La clase Rectangulo hereda de FiguraGeometrica
    private $lado2; // Atributo privado para el segundo lado del rectángulo

    // Constructor de la clase Rectangulo
    public function __construct($lado1, $lado2) {
        parent::__construct('rectangulo', $lado1); // Llama al constructor de la clase padre, asignando el nombre 'rectangulo' y el lado1
        $this->lado2 = $lado2; // Asigna el valor del lado2
    }

    // Método para calcular el área del rectángulo
    public function calcularArea() {
        // Devuelve el área multiplicando lado1 y lado2
        return $this->lado1 * $this->lado2;
    }

    // Método para calcular el perímetro del rectángulo
    public function calcularPerimetro() {
        // Devuelve el perímetro utilizando la fórmula 2 * (lado1 + lado2)
        return 2 * ($this->lado1 + $this->lado2);
    }

    // Método mágico para convertir el objeto a una cadena de texto
    public function __toString() {
        // Devuelve una representación en cadena de los lados del rectángulo
        return "Lado 1: $this->lado1, Lado 2: $this->lado2";
    }
}
?>
