//funcion que valida si hay campos vacios
function txtCampoEmpty(txtCampoEmpty) {
    if (txtCampoEmpty.value == '') {
        txtCampoEmpty.className = 'invalid';

    } else {
        txtCampoEmpty.className = 'valid';

    }
}
//limpiar compos
function limpiarCampo() {
    txtCampo = document.getElementById('txtEmail');
    txtCampo.innerText = "";
}
// enviamos la peticion al archivo modelo
function vlrCorreo() {
    let url = '../../../back-end/models/recuperarContrasenaModel.php';
    let btn = document.getElementById('btn');
    $.ajax({
        type: "POST",
        url: url,
        //dataType: 'json',
        data: $("#idform").serialize(),
        beforeSend: function () {
            btn.innerText = "Confirmando...";
        },
        success: function (data) {
            btn.innerText = "Confirmar";
            console.log('El resultado es: ' + data);
            if (data.result == 1) {
                limpiarCampo();
                Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    text: 'El mensaje ya fue enviado a su correo, tendra 24horas para recuperar su contraseña.',
                    confirmButtonText: 'Aceptar',
                });
            } else {
                limpiarCampo();
                Swal.fire({
                    icon: 'warning',
                    title: 'Error',
                    text: 'El correo no fue encontrado.',
                    confirmButtonText: 'Aceptar'
                });
            }
        },
        error: function () {
            btn.innerText = "Confirmar";
            console.log("No se ha podido obtener la información");
        }
    });
}
// valido q no exita campo vacion al dar click al boton
function vlrFormRecuperarCuenta() {
    let datosCorrectos = true
    let msjError = "";
    /* validamos que ingrese el correo */
    if (document.getElementById("txtEmail").value == "") {
        datosCorrectos = false;
        msjError = "ingrese su correo electronico.";
    }
    /* si existe algun error en ell formulario */
    if (datosCorrectos == false) {
        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: 'Por favor ' + msjError
        });
    }

    return datosCorrectos;
}
//detectamos el envios
$(document).on("submit", "#idform", function (e) {
    e.preventDefault();//detenemos el envio
    $estadoFormulario = vlrFormRecuperarCuenta();

    if ($estadoFormulario == true) {
        vlrCorreo();
    }

})