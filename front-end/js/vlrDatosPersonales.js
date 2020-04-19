//evitamos campos
function validarForm() {
    let datosCorrectos = true;
    let msjError = "";

    if (document.getElementById("primerNombre").value == "") {
        msjError = "ingrese su primer nombre.";
        datosCorrectos = false;
    }

    if (document.getElementById("segundoNombre").value == "") {
        msjError = "ingrese su segundo nombre.";
        datosCorrectos = false;
    }

    if (document.getElementById("apellidoPaterno").value == "") {
        msjError = "ingrese su apellido paterno.";
        datosCorrectos = false;
    }

    if (document.getElementById("apellidoMaterno").value == "") {
        msjError = "ingrese su apellido materno.";
        datosCorrectos = false;
    }

    if (document.getElementById("fechNaci").value == "") {
        msjError = "ingrese su fecha de nacimiento.";
        datosCorrectos = false;
    }

    if (document.getElementById("genero").value == 0) {
        msjError = "selecciona su genero.";
        datosCorrectos = false;
    }

    if (!datosCorrectos) {
        /*alert('Hay Errores En El formulario ' + msjError);*/
        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: 'Por favor ' + msjError
        });
    }

    return datosCorrectos;
}
//validar campos en tiempo real
function txtCampoEmpty(txtCampo) {
    if (txtCampo.value == "") {
        txtCampo.className = 'invalid';

    } else {
        txtCampo.className = 'valid';

    }
}