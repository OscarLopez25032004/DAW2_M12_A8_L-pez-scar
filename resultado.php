<?php
session_start();
require_once 'clases/FiguraGeometrica.php';
require_once 'clases/Triangulo.php';
require_once 'clases/Rectangulo.php';
require_once 'clases/Cuadrado.php';
require_once 'clases/Circulo.php';

$tipoFigura = $_SESSION['tipoFigura'];
$lado1 = $_POST['lado1'];

switch ($tipoFigura) {
    case 'triangulo':
        $lado2 = $_POST['lado2'];
        $lado3 = $_POST['lado3'];
        $figura = new Triangulo($lado1, $lado2, $lado3);
        break;
    case 'rectangulo':
        $lado2 = $_POST['lado2'];
        $figura = new Rectangulo($lado1, $lado2);
        break;
    case 'cuadrado':
        $figura = new Cuadrado($lado1);
        break;
    case 'circulo':
        $figura = new Circulo($lado1);
        break;
}

$area = $figura->calcularArea();
$perimetro = $figura->calcularPerimetro();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
</head>
<body>
    <h1>Resultados</h1>
    <p>Figura: <?php echo ucfirst($tipoFigura); ?></p>
    <p>Lado(s) introducidos: <?php echo $figura->__toString(); ?></p>
    <p>Área: <?php echo $area; ?></p>
    <p>Perímetro: <?php echo $perimetro; ?></p>
</body>
</html>
