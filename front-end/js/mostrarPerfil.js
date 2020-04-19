//valiamos campos vacios
function txtCampoEmpty(txtCampoEmpty) {
    if (txtCampoEmpty.value == '') {
        txtCampoEmpty.className = 'invalid';

    } else {
        txtCampoEmpty.className = 'valid';

    }
}
//mostramos los datos
function mostrarDatos() {
    $.ajax({
        url: '../../../back-end/models/perfilUsuarioModel.php',
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            //console.log(result);
            $("#txtPrimerNombre").val(result.primer_nombre);
            $("#txtSegundoNombre").val(result.segundo_nombre);
            $("#txtApellidoPaterno").val(result.apellido_paterno);
            $("#txtApellidoMaterno").val(result.apellido_materno);
            $("#txtFechNaci").val(result.fecha_nacimiento);
            $("#txtGenero").val(result.genero_estudiante);
            $("#txtUniversidad").val(result.nombre_universidad);
            $("#txtfacultad").val(result.facultad_universidad);
            $("#txtCarrera").val(result.carrera_universidad);
            $("#txtCorreo").val(result.correo_user);
            $("#txtTelefono").val(result.telefono_user);

        },
        error: function () {
            console.log("No se ha podido obtener la información");
        }
    });
}
//cuando la pagina carga
$(document).ready(function () {
    mostrarDatos();

});
//valido el formulario
function validarForm() {
    let datosCorrectos = true;
    let msjError = "";

    if (document.getElementById("txtPrimerNombre").value == "") {
        msjError = "ingrese su primer nombre.";
        datosCorrectos = false;
    }

    if (document.getElementById("txtSegundoNombre").value == "") {
        msjError = "ingrese su segundo nombre.";
        datosCorrectos = false;
    }

    if (document.getElementById("txtApellidoPaterno").value == "") {
        msjError = "ingrese su apellido paterno.";
        datosCorrectos = false;
    }

    if (document.getElementById("txtApellidoMaterno").value == "") {
        msjError = "ingrese su apellido materno.";
        datosCorrectos = false;
    }

    if (document.getElementById("txtFechNaci").value == "") {
        msjError = "ingrese su fecha de nacimiento.";
        datosCorrectos = false;
    }

    if (document.getElementById("txtGenero").value == 0) {
        msjError = "selecciona su genero.";
        datosCorrectos = false;
    }

    if (document.getElementById("txtUniversidad").value == "") {
        msjError = "ingrese el nombre de la universidad.";
        datosCorrectos = false;
    }

    if (document.getElementById("txtfacultad").value == "") {
        msjError = "ingrese el nombre de la facultad.";
        datosCorrectos = false;
    }

    if (document.getElementById("txtCarrera").value == "") {
        msjError = "ingrese el nombre de su carrea.";
        datosCorrectos = false;
    }

    if (!datosCorrectos) {
        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: 'Por favor ' + msjError
        });
    }

    return datosCorrectos;
}
//actualizo lo datos
function actualizarDatos() {
    let btnActualizar = document.getElementById('btnActualizar');
    let url = '../../../back-end/models/actualizarDatosModel.php';

    $.ajax({
        type: "POST",
        url: url,
        dataType: 'json',
        data: $("#FormCard").serialize(),
        beforeSend: function () {
            btnActualizar.innerHTML = '<i class="fas fa-user-edit"></i> Actualizando Datos...';
        },
        success: function (dato) {
            btnActualizar.innerHTML = '<i class="fas fa-user-edit"></i> Actualizar Datos';
            //console.log(dato.result);

            if (dato.result == 1) {
                mostrarDatos();
                Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    text: "Datos actualizados con exito",
                    showConfirmButton: true,
                    confirmButtonText: 'Aceptar'
                });

            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Error al actualizar los datos',
                    showConfirmButton: true,
                    confirmButtonText: 'Aceptar'
                });
            }
        },
        error: function () {
            console.log("No se ha podido obtener la información ");
        }

    });
}
//cuando la click en actualizar
$(document).on('submit', '#FormCard', function (e){
    e.preventDefault();

    $estadoFormulario = validarForm();

    if ($estadoFormulario == true) {
        actualizarDatos();
    }
});
