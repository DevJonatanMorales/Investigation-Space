function vlrUser() {
    let url = '../../../back-end/models/iniciarSesionModel.php';
    let btn = document.getElementById("btnIngresar");
    $.ajax({
        type: "POST",
        url: url,
        dataType: 'json',
        data: $("#formLogin").serialize(),
        beforeSend: function () {
            btn.innerText = "Validando...";
        },
        success: function (data) {

            if (data.result == 1) {
                location.href = "../Content/index.php";

            } else {
                console.log('invalid');
                btn.innerText = "Ingresar";
                Swal.fire({
                    icon: 'warning',
                    title: 'Usuario o Contraseñas correctas',
                    showConfirmButton: true
                })

            }
        },
        error: function () {
            btn.innerText = "Ingresar";
            console.log("No se ha podido obtener la información");
        }
    });
}

/* valido q los campos no esten vacios */
function txtCampoEmpty(txtCampoEmpty) {
    if (txtCampoEmpty.value == '') {
        txtCampoEmpty.className = 'invalid';

    } else {
        txtCampoEmpty.className = 'valid';

    }
}

function vlrFormLogin() {
    let datosCorrectos = true
    let msjError = "";
    /* validamos que ingrese el numero de telefono o correo */
    if (document.getElementById("txtUser").value == "") {
        datosCorrectos = false;
        msjError = "ingrese su correo o numero de telefono.";
    }
    /* validamos que ingrese su contrasena */
    if (document.getElementById("txtPass").value == "") {
        datosCorrectos = false;
        msjError = "ingrese su contraseña.";
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
$(document).on('submit', '#formLogin', function (e) {
    e.preventDefault();

    $estadoFormulario = vlrFormLogin();

    if ($estadoFormulario == true) {
        vlrUser();
    }

})
