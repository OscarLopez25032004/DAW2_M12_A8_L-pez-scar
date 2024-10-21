<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Figuras Geométricas</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <h1>Selecciona una Figura Geométrica</h1><br><br>
    <form action="figura.php" method="POST">
        <label for="tipoFigura">Elige una figura:</label><br><br>
        <select name="tipoFigura" id="tipoFigura" required>
            <option value="triangulo">Triángulo</option>
            <option value="rectangulo">Rectángulo</option>
            <option value="cuadrado">Cuadrado</option>
            <option value="circulo">Círculo</option>
        </select><br><br>
        <button type="submit">Siguiente</button>
    </form>
</body>
</html>
