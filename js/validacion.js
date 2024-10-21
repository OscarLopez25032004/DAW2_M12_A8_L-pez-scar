document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('figuraForm');
    const erroresDiv = document.getElementById('errores');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevenir el envío del formulario hasta que se valide correctamente
        erroresDiv.innerHTML = ''; // Limpiar los mensajes de error
        let errorEncontrado = false;

        // Obtener todos los inputs del formulario
        const inputs = form.querySelectorAll('input[type="number"]');

        // Validación de que los campos no estén vacíos y que los valores sean positivos
        inputs.forEach(function (input) {
            const valor = input.value.trim();

            if (valor === '') {
                errorEncontrado = true;
                erroresDiv.innerHTML += `<p>El campo ${input.name} no puede estar vacío.</p>`;
            } else if (parseFloat(valor) <= 0) {
                errorEncontrado = true;
                erroresDiv.innerHTML += `<p>El campo ${input.name} debe ser un número positivo.</p>`;
            }
        });

        if (errorEncontrado) {
            // Mostrar alerta con SweetAlert
            Swal.fire({
                icon: 'error',
                title: 'Errores en el formulario',
                text: 'Hay campos vacíos o valores no válidos. Por favor, corrígelos.',
                confirmButtonText: 'Aceptar'
            });
        } else {
            // Enviar el formulario si no hay errores
            form.submit();
        }
    });
});
