//Obtener el id de cada input y el error para que no choquen
function validaCampo(id, idE) {
    const campo = document.getElementById(id).value;
    const errorCampo = document.getElementById(idE);

    //Que no este vacio
    if (campo === '') {
        errorCampo.textContent = 'No puede estar vacío.';
        return false;
    }

    //Que no tenga numeros
    if (!/^[0-9]+$/.test(campo)) {
        errorCampo.textContent = 'No puede tener letras.';
        return false;
    }

    //Retea el error a vacio para que no siga apareciendo el error a pesar de que ya este bien.
    errorCampo.textContent = "";
    return true;
}
