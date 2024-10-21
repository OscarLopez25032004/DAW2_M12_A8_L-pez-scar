<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Figuras Geométricas</title>
</head>
<body>
    <h1>Selecciona una Figura Geométrica</h1>
    <form action="figura.php" method="POST">
        <label for="tipoFigura">Elige una figura:</label>
        <select name="tipoFigura" id="tipoFigura" required>
            <option value="triangulo">Triángulo</option>
            <option value="rectangulo">Rectángulo</option>
            <option value="cuadrado">Cuadrado</option>
            <option value="circulo">Círculo</option>
        </select>
        <button type="submit">Siguiente</button>
    </form>
</body>
</html>
