<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Figura</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <div class="container">
        <h1>Seleccione una Figura Geométrica</h1>
        <form action="figura.php" method="POST">
            <label for="tipoFigura">Tipo de Figura:</label>
            <select name="tipoFigura" id="tipoFigura" required>
                <option value="triangulo" <?php if (isset($_SESSION['tipoFigura']) && $_SESSION['tipoFigura'] == 'triangulo') echo 'selected'; ?>>Triángulo</option>
                <option value="rectangulo" <?php if (isset($_SESSION['tipoFigura']) && $_SESSION['tipoFigura'] == 'rectangulo') echo 'selected'; ?>>Rectángulo</option>
                <option value="cuadrado" <?php if (isset($_SESSION['tipoFigura']) && $_SESSION['tipoFigura'] == 'cuadrado') echo 'selected'; ?>>Cuadrado</option>
                <option value="circulo" <?php if (isset($_SESSION['tipoFigura']) && $_SESSION['tipoFigura'] == 'circulo') echo 'selected'; ?>>Círculo</option>
            </select>
            <button type="submit">Continuar</button>
        </form>
    </div>
</body>
</html>
