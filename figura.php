<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['tipoFigura'] = $_POST['tipoFigura'];
    $tipoFigura = $_POST['tipoFigura'];
} else {
    $tipoFigura = $_SESSION['tipoFigura'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduce los lados</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Introduce los valores de la figura seleccionada</h1>
    <form id="figuraForm" action="resultado.php" method="POST">
        <div id="errores" class="error"></div>
        <?php if ($tipoFigura == 'triangulo'): ?>
            <label for="lado1">Lado 1:</label>
            <input type="number" name="lado1" id="lado1" required>
            <label for="lado2">Lado 2:</label>
            <input type="number" name="lado2" id="lado2" required>
            <label for="lado3">Lado 3:</label>
            <input type="number" name="lado3" id="lado3" required>
        <?php elseif ($tipoFigura == 'rectangulo'): ?>
            <label for="lado1">Lado 1:</label>
            <input type="number" name="lado1" id="lado1" required>
            <label for="lado2">Lado 2:</label>
            <input type="number" name="lado2" id="lado2" required>
        <?php elseif ($tipoFigura == 'cuadrado'): ?>
            <label for="lado1">Lado:</label>
            <input type="number" name="lado1" id="lado1" required>
        <?php elseif ($tipoFigura == 'circulo'): ?>
            <label for="radio">Radio:</label>
            <input type="number" name="lado1" id="lado1" required>
        <?php endif; ?>
        <button type="submit">Calcular</button>
    </form>

    <script src="js/validacion.js"></script>
</body>
</html>
