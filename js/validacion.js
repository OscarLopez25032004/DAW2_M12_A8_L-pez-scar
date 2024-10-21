document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('figuraForm');
    const erroresDiv = document.getElementById('errores');

    form.addEventListener('submit', function (event) {
        erroresDiv.innerHTML = '';  // Limpiamos los mensajes de error
        let errorEncontrado = false;

        // Obtener todos los inputs del formulario
        const inputs = form.querySelectorAll('input[type="number"]');

        // Validar que los campos no estén vacíos
        inputs.forEach(function (input) {
            if (input.value.trim() === '') {
                errorEncontrado = true;
            }
        });

        // Si se encuentra algún error, mostramos un único mensaje y evitamos el envío del formulario
        if (errorEncontrado) {
            event.preventDefault(); // Detener el envío del formulario
            erroresDiv.innerHTML = 'Todos los campos deben estar completos.'; // Mostrar un único mensaje de error
        }
    });
});
