$(document).on('submit', '#formCrear', function (e) {
    e.preventDefault();

    $estadoFormulario = validarForm();

    if ($estadoFormulario == true) {
        CrearCuenta();
    }

});
//enviamos los datos
function CrearCuenta() {
    let url = '../../../back-end/models/creandoCuentaModel.php';
    let btn = document.getElementById('btnCrear');
    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        data: $("#formCrear").serialize(),
        beforeSend: function () {
            btn.innerText = "Creando Cuenta...";
        },
        success: function (data) {
            btn.innerText = "Crear Cuenta";
            console.log(data);

            if (data.result == 1) {
                //console.log('Cuanta creada :)');
                location.href = "../Content/index.php";

            } else {
                console.log('Error al crear cuanta :(');
                Swal.fire({
                    icon: 'warning',
                    title: 'Advertencia',
                    text: 'Ocurrio un error, intente de nuevo',
                    confirmButtonColor: '#007BFF',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.value) {
                        location.href = "CreandoCuenta.php";
                    }
                })
                //location.href = "../Content/index.php;
                
            }
        },
        error: function () {
            btn.innerText = "Crear Cuenta";
            console.log("No se ha podido obtener la información");
        }
    });
}
//validamos campos vacios en el form
function validarForm() {
    let datosCorrectos = true;
    let msjError = "";

    if (document.getElementById("txtUniversidad").value == "") {
        msjError = "ingrese el nombre de la universidad.";
        datosCorrectos = false;
    }

    if (document.getElementById("txtFacultad").value == "") {
        msjError = "ingrese nombre de la facultad.";
        datosCorrectos = false;
    }

    if (document.getElementById("txtCarrera").value == "") {
        msjError = "ingrese el nombre de su carrera.";
        datosCorrectos = false;
    }

    if (document.getElementById("txtCorreo").value == "") {
        msjError = "ingrese su correo electronico.";
        datosCorrectos = false;
    }

    if (document.getElementById("txtTelefono").value == "") {
        msjError = "ingrese su nuemro de telefono.";
        datosCorrectos = false;
    }

    if (document.getElementById("txtPass").value == "") {
        msjError = "ingrese su contraseña.";
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
//validamos los campos
function txtCampoEmpty(txtCampo) {
    if (txtCampo.value == "") {
        txtCampo.className = 'invalid';

    } else {
        txtCampo.className = 'valid';

    }
}