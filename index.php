<?php session_start(); ?> <!-- Inicia la sesión para poder utilizar variables de sesión en la página -->

<!DOCTYPE html>
<html lang="es"> <!-- Define el idioma del documento como español -->
<head>
    <meta charset="UTF-8"> <!-- Establece el conjunto de caracteres a UTF-8 para soportar caracteres especiales -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Hace que la página sea responsiva en dispositivos móviles -->
    <title>Seleccionar Figura</title> <!-- Título de la página que se muestra en la pestaña del navegador -->
    <link rel="stylesheet" href="styles/styles.css"> <!-- Enlace a la hoja de estilos CSS para el diseño -->
</head>
<body>
    <div class="container"> <!-- Contenedor principal para la estructura de la página -->
        <h1>Seleccione una Figura Geométrica</h1> <!-- Título principal de la sección para seleccionar figura -->
        <form action="figura.php" method="POST"> <!-- Formulario que envía los datos a figura.php usando el método POST -->
            <label for="tipoFigura">Tipo de Figura:</label> <!-- Etiqueta para el campo de selección de tipo de figura -->
            <select name="tipoFigura" id="tipoFigura" required> <!-- Menú desplegable para seleccionar el tipo de figura; 'required' asegura que se seleccione una opción -->
                <option value="triangulo" <?php if (isset($_SESSION['tipoFigura']) && $_SESSION['tipoFigura'] == 'triangulo') echo 'selected'; ?>>Triángulo</option> <!-- Opción para triángulo, marcada como seleccionada si corresponde -->
                <option value="rectangulo" <?php if (isset($_SESSION['tipoFigura']) && $_SESSION['tipoFigura'] == 'rectangulo') echo 'selected'; ?>>Rectángulo</option> <!-- Opción para rectángulo, marcada como seleccionada si corresponde -->
                <option value="cuadrado" <?php if (isset($_SESSION['tipoFigura']) && $_SESSION['tipoFigura'] == 'cuadrado') echo 'selected'; ?>>Cuadrado</option> <!-- Opción para cuadrado, marcada como seleccionada si corresponde -->
                <option value="circulo" <?php if (isset($_SESSION['tipoFigura']) && $_SESSION['tipoFigura'] == 'circulo') echo 'selected'; ?>>Círculo</option> <!-- Opción para círculo, marcada como seleccionada si corresponde -->
            </select>
            <button type="submit">Continuar</button> <!-- Botón para enviar el formulario -->
        </form>
    </div>
</body>
</html>
