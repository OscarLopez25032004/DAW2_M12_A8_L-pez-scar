<?php
session_start();

// Verificar si se han enviado datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $tipoFigura = $_POST['tipoFigura'];
    $_SESSION['tipoFigura'] = $tipoFigura;

    // Inicializar variables
    $lado1 = isset($_POST['lado1']) ? $_POST['lado1'] : null;
    $lado2 = isset($_POST['lado2']) ? $_POST['lado2'] : null;
    $lado3 = isset($_POST['lado3']) ? $_POST['lado3'] : null;

    // Guardar los lados en la sesión
    $_SESSION['lado1'] = $lado1;
    $_SESSION['lado2'] = $lado2;
    $_SESSION['lado3'] = $lado3;

    // Calcular área y perímetro
    switch ($tipoFigura) {
        case 'triangulo':
            // Calcular el área y el perímetro del triángulo
            $semiperimetro = ($lado1 + $lado2 + $lado3) / 2;
            $area = sqrt($semiperimetro * ($semiperimetro - $lado1) * ($semiperimetro - $lado2) * ($semiperimetro - $lado3));
            $perimetro = $lado1 + $lado2 + $lado3;
            break;
        case 'rectangulo':
            // Calcular el área y el perímetro del rectángulo
            $area = $lado1 * $lado2;
            $perimetro = 2 * ($lado1 + $lado2);
            break;
        case 'cuadrado':
            // Calcular el área y el perímetro del cuadrado
            $area = $lado1 * $lado1;
            $perimetro = 4 * $lado1;
            break;
        case 'circulo':
            // Calcular el área y el perímetro del círculo
            $area = pi() * ($lado1 * $lado1);
            $perimetro = 2 * pi() * $lado1;
            break;
        default:
            $area = null;
            $perimetro = null;
    }
} else {
    // Redirigir a figura.php si no se envían datos
    header('Location: figura.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <div class="container">
        <h1>Resultados del Cálculo</h1>
        <p><strong>Tipo de figura:</strong> <?php echo htmlspecialchars($tipoFigura); ?></p>
        <p><strong>Lado 1:</strong> <?php echo htmlspecialchars($lado1); ?></p>
        <?php if ($tipoFigura === 'triangulo' || $tipoFigura === 'rectangulo'): ?>
            <p><strong>Lado 2:</strong> <?php echo htmlspecialchars($lado2); ?></p>
        <?php endif; ?>
        <?php if ($tipoFigura === 'triangulo'): ?>
            <p><strong>Lado 3:</strong> <?php echo htmlspecialchars($lado3); ?></p>
        <?php endif; ?>
        <p><strong>Área:</strong> <?php echo number_format($area, 2); ?></p>
        <p><strong>Perímetro:</strong> <?php echo number_format($perimetro, 2); ?></p>
        
        <button onclick="window.location.href='figura.php'">Volver al formulario</button>
        <button onclick="window.location.href='cerrar_sesion.php'">Cerrar sesión</button>
    </div>
</body>
</html>
