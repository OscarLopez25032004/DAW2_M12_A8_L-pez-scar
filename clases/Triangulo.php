<?php
require_once 'FiguraGeometrica.php'; // Incluye la clase base FiguraGeometrica

class Triangulo extends FiguraGeometrica { // La clase Triangulo hereda de FiguraGeometrica
    private $lado2; // Atributo privado para el segundo lado del triángulo
    private $lado3; // Atributo privado para el tercer lado del triángulo

    // Constructor de la clase Triangulo
    public function __construct($lado1, $lado2, $lado3) {
        parent::__construct('triangulo', $lado1); // Llama al constructor de la clase padre, asignando el nombre 'triangulo' y el lado1
        $this->lado2 = $lado2; // Asigna el valor del lado2
        $this->lado3 = $lado3; // Asigna el valor del lado3
    }

    // Método para calcular el área del triángulo utilizando la fórmula de Herón
    public function calcularArea() {
        $s = ($this->lado1 + $this->lado2 + $this->lado3) / 2; // Calcula el semiperímetro
        // Devuelve el área calculada utilizando la fórmula de Herón
        return sqrt($s * ($s - $this->lado1) * ($s - $this->lado2) * ($s - $this->lado3));
    }

    // Método para calcular el perímetro del triángulo
    public function calcularPerimetro() {
        // Devuelve la suma de los tres lados del triángulo
        return $this->lado1 + $this->lado2 + $this->lado3;
    }

    // Método mágico para convertir el objeto a una cadena de texto
    public function __toString() {
        // Devuelve una representación en cadena de los lados del triángulo
        return "Lado 1: $this->lado1, Lado 2: $this->lado2, Lado 3: $this->lado3";
    }
}
?>
