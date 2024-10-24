<?php session_start(); ?> <!-- Inicia la sesión para poder usar variables de sesión -->

<!DOCTYPE html>
<html lang="es"> <!-- Establece el idioma del documento como español -->
<head>
    <meta charset="UTF-8"> <!-- Define el conjunto de caracteres del documento a UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Hace que la página sea responsiva en dispositivos móviles -->
    <title>Cálculo de Figuras Geométricas</title> <!-- Título de la página que se muestra en la pestaña del navegador -->
    <link rel="stylesheet" href="styles/styles.css"> <!-- Enlace a la hoja de estilos CSS para el diseño -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Importa la biblioteca SweetAlert para mostrar alertas estilizadas -->
</head>
<body>
    <div class="container"> <!-- Contenedor principal para organizar el contenido de la página -->
        <h1>Cálculo de Figuras Geométricas</h1> <!-- Título principal de la sección -->
        <div id="errores"></div> <!-- Div para mostrar mensajes de error, si los hay -->
        <form action="resultado.php" method="POST" id="figuraForm"> <!-- Formulario que enviará los datos a resultado.php usando el método POST -->
            <label for="tipoFigura">Selecciona una figura:</label> <!-- Etiqueta para el campo de selección de tipo de figura -->
            <select name="tipoFigura" id="tipoFigura" onchange="actualizarCampos()" required> <!-- Menú desplegable para seleccionar el tipo de figura; 'required' asegura que se seleccione una opción -->
                <option value="">--Selecciona--</option> <!-- Opción predeterminada que indica al usuario que seleccione una figura -->
                <option value="triangulo" <?php echo (isset($_SESSION['tipoFigura']) && $_SESSION['tipoFigura'] == 'triangulo') ? 'selected' : ''; ?>>Triángulo</option> <!-- Opción para triángulo; marcada como seleccionada si corresponde -->
                <option value="rectangulo" <?php echo (isset($_SESSION['tipoFigura']) && $_SESSION['tipoFigura'] == 'rectangulo') ? 'selected' : ''; ?>>Rectángulo</option> <!-- Opción para rectángulo; marcada como seleccionada si corresponde -->
                <option value="cuadrado" <?php echo (isset($_SESSION['tipoFigura']) && $_SESSION['tipoFigura'] == 'cuadrado') ? 'selected' : ''; ?>>Cuadrado</option> <!-- Opción para cuadrado; marcada como seleccionada si corresponde -->
                <option value="circulo" <?php echo (isset($_SESSION['tipoFigura']) && $_SESSION['tipoFigura'] == 'circulo') ? 'selected' : ''; ?>>Círculo</option> <!-- Opción para círculo; marcada como seleccionada si corresponde -->
            </select>

            <div id="camposAdicionales"> <!-- Div para mostrar campos adicionales según la figura seleccionada -->
                <?php
                // Mostrar campos adicionales basados en la figura seleccionada
                if (isset($_SESSION['tipoFigura'])) { // Verifica si hay una figura seleccionada en la sesión
                    switch ($_SESSION['tipoFigura']) { // Según el tipo de figura seleccionada, se generan diferentes campos
                        case 'triangulo':
                            echo '<label for="lado1">Lado 1:</label>'; // Etiqueta para Lado 1
                            echo '<input type="number" name="lado1" id="lado1" value="' . (isset($_SESSION['lado1']) ? $_SESSION['lado1'] : '') . '" required>'; // Campo para Lado 1
                            echo '<label for="lado2">Lado 2:</label>'; // Etiqueta para Lado 2
                            echo '<input type="number" name="lado2" id="lado2" value="' . (isset($_SESSION['lado2']) ? $_SESSION['lado2'] : '') . '" required>'; // Campo para Lado 2
                            echo '<label for="lado3">Lado 3:</label>'; // Etiqueta para Lado 3
                            echo '<input type="number" name="lado3" id="lado3" value="' . (isset($_SESSION['lado3']) ? $_SESSION['lado3'] : '') . '" required>'; // Campo para Lado 3
                            break;
                        case 'rectangulo':
                            echo '<label for="lado1">Lado 1:</label>'; // Etiqueta para Lado 1
                            echo '<input type="number" name="lado1" id="lado1" value="' . (isset($_SESSION['lado1']) ? $_SESSION['lado1'] : '') . '" required>'; // Campo para Lado 1
                            echo '<label for="lado2">Lado 2:</label>'; // Etiqueta para Lado 2
                            echo '<input type="number" name="lado2" id="lado2" value="' . (isset($_SESSION['lado2']) ? $_SESSION['lado2'] : '') . '" required>'; // Campo para Lado 2
                            break;
                        case 'cuadrado':
                            echo '<label for="lado1">Lado:</label>'; // Etiqueta para Lado
                            echo '<input type="number" name="lado1" id="lado1" value="' . (isset($_SESSION['lado1']) ? $_SESSION['lado1'] : '') . '" required>'; // Campo para Lado
                            break;
                        case 'circulo':
                            echo '<label for="lado1">Radio:</label>'; // Etiqueta para Radio
                            echo '<input type="number" name="lado1" id="lado1" value="' . (isset($_SESSION['lado1']) ? $_SESSION['lado1'] : '') . '" required>'; // Campo para Radio
                            break;
                    }
                }
                ?>
            </div>
            <button type="submit">Calcular</button> <!-- Botón para enviar el formulario y calcular el área y perímetro -->
        </form>
    </div>

    <script>
        function actualizarCampos() { // Función para actualizar los campos adicionales según la figura seleccionada
            const tipoFigura = document.getElementById("tipoFigura").value; // Obtiene el valor seleccionado del menú desplegable
            const camposAdicionales = document.getElementById("camposAdicionales"); // Obtiene el div donde se mostrarán los campos adicionales
            let html = ''; // Inicializa una variable para almacenar el HTML de los campos adicionales

            // Limpiar campos adicionales
            camposAdicionales.innerHTML = ''; // Limpia el contenido anterior de campos adicionales

            // Genera los campos correspondientes según el tipo de figura seleccionada
            if (tipoFigura === 'triangulo') {
                html = ` <!-- Campos para triángulo -->
                    <label for="lado1">Lado 1:</label>
                    <input type="number" name="lado1" id="lado1" onblur="validaCampo('lado1','errorlado1')" required><br> <!-- Campo para Lado 1 con validación -->
                    <span id="errorlado1" class="error"></span><br> <!-- Mensaje de error para Lado 1 -->
                    <label for="lado2">Lado 2:</label>
                    <input type="number" name="lado2" id="lado2" onblur="validaCampo('lado2','errorlado2')" required><br> <!-- Campo para Lado 2 con validación -->
                    <span id="errorlado2" class="error"></span><br> <!-- Mensaje de error para Lado 2 -->
                    <label for="lado3">Lado 3:</label>
                    <input type="number" name="lado3" id="lado3" onblur="validaCampo('lado3','errorlado3')" required><br> <!-- Campo para Lado 3 con validación -->
                    <span id="errorlado3" class="error"></span><br> <!-- Mensaje de error para Lado 3 -->
                `;
            } else if (tipoFigura === 'rectangulo') {
                html = ` <!-- Campos para rectángulo -->
                    <label for="lado1">Lado 1:</label>
                    <input type="number" name="lado1" id="lado1" onblur="validaCampo('lado1','errorlado1')" required><br> <!-- Campo para Lado 1 con validación -->
                    <span id="errorlado1" class="error"></span><br> <!-- Mensaje de error para Lado 1 -->
                    <label for="lado2">Lado 2:</label>
                    <input type="number" name="lado2" id="lado2"  onblur="validaCampo('lado2','errorlado2')" required><br> <!-- Campo para Lado 2 con validación -->
                    <span id="errorlado2" class="error"></span><br> <!-- Mensaje de error para Lado 2 -->
                `;
            } else if (tipoFigura === 'cuadrado') {
                html = ` <!-- Campos para cuadrado -->
                    <label for="lado1">Lado:</label>
                    <input type="number" name="lado1" id="lado1" onblur="validaCampo('lado1','errorlado1')" required><br> <!-- Campo para Lado con validación -->
                    <span id="errorlado1" class="error"></span><br> <!-- Mensaje de error para Lado -->
                `;
            } else if (tipoFigura === 'circulo') {
                html = ` <!-- Campos para círculo -->
                    <label for="lado1">Radio:</label>
                    <input type="number" name="lado1" id="lado1" onblur="validaCampo('lado1','errorlado1')" required><br> <!-- Campo para Radio con validación -->
                    <span id="errorlado1" class="error"></span><br> <!-- Mensaje de error para Radio -->
                `;
            }

            camposAdicionales.innerHTML = html; // Actualiza el div de campos adicionales con el HTML generado
        }
    </script>
    <script src="js/validacion.js"></script> <!-- Incluye el archivo de validación JavaScript -->
</body>
</html>
