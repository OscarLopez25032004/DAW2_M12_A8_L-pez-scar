<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Figuras Geométricas</title>
    <link rel="stylesheet" href="styles/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Agrega SweetAlert -->
</head>
<body>
    <div class="container">
        <h1>Cálculo de Figuras Geométricas</h1>
        <div id="errores"></div> <!-- Div para mostrar errores -->
        <form action="resultado.php" method="POST" id="figuraForm">
            <label for="tipoFigura">Selecciona una figura:</label>
            <select name="tipoFigura" id="tipoFigura" onchange="actualizarCampos()" required>
                <option value="">--Selecciona--</option>
                <option value="triangulo" <?php echo (isset($_SESSION['tipoFigura']) && $_SESSION['tipoFigura'] == 'triangulo') ? 'selected' : ''; ?>>Triángulo</option>
                <option value="rectangulo" <?php echo (isset($_SESSION['tipoFigura']) && $_SESSION['tipoFigura'] == 'rectangulo') ? 'selected' : ''; ?>>Rectángulo</option>
                <option value="cuadrado" <?php echo (isset($_SESSION['tipoFigura']) && $_SESSION['tipoFigura'] == 'cuadrado') ? 'selected' : ''; ?>>Cuadrado</option>
                <option value="circulo" <?php echo (isset($_SESSION['tipoFigura']) && $_SESSION['tipoFigura'] == 'circulo') ? 'selected' : ''; ?>>Círculo</option>
            </select>

            <div id="camposAdicionales">
                <?php
                // Mostrar campos adicionales basados en la figura seleccionada
                if (isset($_SESSION['tipoFigura'])) {
                    switch ($_SESSION['tipoFigura']) {
                        case 'triangulo':
                            echo '<label for="lado1">Lado 1:</label>';
                            echo '<input type="number" name="lado1" id="lado1" value="' . (isset($_SESSION['lado1']) ? $_SESSION['lado1'] : '') . '" required>';
                            echo '<label for="lado2">Lado 2:</label>';
                            echo '<input type="number" name="lado2" id="lado2" value="' . (isset($_SESSION['lado2']) ? $_SESSION['lado2'] : '') . '" required>';
                            echo '<label for="lado3">Lado 3:</label>';
                            echo '<input type="number" name="lado3" id="lado3" value="' . (isset($_SESSION['lado3']) ? $_SESSION['lado3'] : '') . '" required>';
                            break;
                        case 'rectangulo':
                            echo '<label for="lado1">Lado 1:</label>';
                            echo '<input type="number" name="lado1" id="lado1" value="' . (isset($_SESSION['lado1']) ? $_SESSION['lado1'] : '') . '" required>';
                            echo '<label for="lado2">Lado 2:</label>';
                            echo '<input type="number" name="lado2" id="lado2" value="' . (isset($_SESSION['lado2']) ? $_SESSION['lado2'] : '') . '" required>';
                            break;
                        case 'cuadrado':
                            echo '<label for="lado1">Lado:</label>';
                            echo '<input type="number" name="lado1" id="lado1" value="' . (isset($_SESSION['lado1']) ? $_SESSION['lado1'] : '') . '" required>';
                            break;
                        case 'circulo':
                            echo '<label for="lado1">Radio:</label>';
                            echo '<input type="number" name="lado1" id="lado1" value="' . (isset($_SESSION['lado1']) ? $_SESSION['lado1'] : '') . '" required>';
                            break;
                    }
                }
                ?>
            </div>
            <button type="submit">Calcular</button>
        </form>
    </div>

    <script>
        function actualizarCampos() {
            const tipoFigura = document.getElementById("tipoFigura").value;
            const camposAdicionales = document.getElementById("camposAdicionales");
            let html = '';

            // Limpiar campos adicionales
            camposAdicionales.innerHTML = '';

            if (tipoFigura === 'triangulo') {
                html = `
                    <label for="lado1">Lado 1:</label>
                    <input type="number" name="lado1" id="lado1" onblur="validaCampo('lado1','errorlado1')" required><br>
                    <span id="errorlado1" class="error"></span><br>
                    <label for="lado2">Lado 2:</label>
                    <input type="number" name="lado2" id="lado2" onblur="validaCampo('lado2','errorlado2')" required><br>
                    <span id="errorlado2" class="error"></span><br>
                    <label for="lado3">Lado 3:</label>
                    <input type="number" name="lado3" id="lado3" onblur="validaCampo('lado3','errorlado3')" required><br>
                    <span id="errorlado3" class="error"></span><br>
                `;
            } else if (tipoFigura === 'rectangulo') {
                html = `
                    <label for="lado1">Lado 1:</label>
                    <input type="number" name="lado1" id="lado1" onblur="validaCampo('lado1','errorlado1')" required><br>
                    <span id="errorlado1" class="error"></span><br>
                    <label for="lado2">Lado 2:</label>
                    <input type="number" name="lado2" id="lado2"  onblur="validaCampo('lado2','errorlado2')" required><br>
                    <span id="errorlado2" class="error"></span><br>
                `;
            } else if (tipoFigura === 'cuadrado') {
                html = `
                    <label for="lado1">Lado:</label>
                    <input type="number" name="lado1" id="lado1" onblur="validaCampo('lado1','errorlado1')" required><br>
                    <span id="errorlado1" class="error"></span><br>
                `;
            } else if (tipoFigura === 'circulo') {
                html = `
                    <label for="lado1">Radio:</label>
                    <input type="number" name="lado1" id="lado1" onblur="validaCampo('lado1','errorlado1')" required><br>
                    <span id="errorlado1" class="error"></span><br>
                `;
            }

            camposAdicionales.innerHTML = html;
        }
    </script>
    <script src="js/validacion.js"></script>
</body>
</html>
