//mostramos los datos
function mostrarCredenciales() {
  $.ajax({
    url: '../../../back-end/models/actualizarCredencialesModel.php',
    type: 'GET',
    dataType: 'json',
    success: function (data) {
      console.log(data.result);
      $("#txtClave").val(data.result);

    },
    error: function () {
      console.log("No se ha podido obtener la información");
    }
  });
}
//cuando la pagina carga
$(document).ready(function () {
  mostrarCredenciales();

});
//
function campoVlr() {
  if ($('#txtNewClave').addClass('invalid')) {
    $('#txtNewClave').removeClass('invalid');
    $('#txtNewClave').addClass('txtCampoForm')

  }
  if ($('#txtConfirClave').addClass('invalid')) {
    $('#txtConfirClave').removeClass('invalid');
    $('#txtConfirClave').addClass('txtCampoForm')

  }
  if ($('#txtClaveActual').addClass('invalid')) {
    $('#txtClaveActual').removeClass('invalid');
    $('#txtClaveActual').addClass('txtCampoForm')

  }
}
//valido si actualiza la CLAVE
function validarForm() {
  //si no se encuentran campos vacios se actualiza
  let datosCorrectos = true;

  if ($('#txtNewClave').val() == "") {
    datosCorrectos = false;
    $('#txtNewClave').removeClass('txtCampoForm');
    $('#txtNewClave').addClass('invalid')

  }
  if ($('#txtConfirClave').val() == "") {
    datosCorrectos = false;
    $('#txtConfirClave').removeClass('txtCampoForm');
    $('#txtConfirClave').addClass('invalid')

  }
  if ($('#txtClaveActual').val() == "") {
    datosCorrectos = false;
    $('#txtClaveActual').removeClass('txtCampoForm');
    $('#txtClaveActual').addClass('invalid')

  }

  return datosCorrectos;
}
//actualizo lo datos
function actualizarCredenciales() {
  let url = '../../../back-end/models/actualizarCredencialesModel.php';

  $.ajax({
    type: "POST",
    url: url,
    dataType: 'json',
    data: $("#FormCredenciales").serialize(),
    beforeSend: function () {
      $("#btnActualizar").html('<i class="fas fa-user-edit"></i> Actualizando...');
    },
    success: function (dato) {
      $("#btnActualizar").html('<i class="fas fa-user-edit"></i> Actualizar');
      mostrarCredenciales();
      limpiarCampos();
      if (dato.result == 1) {
        Swal.fire({
          icon: 'success',
          title: 'EXITO',
          text: 'Contraseña actualizada con exito.',
          confirmButtonText: 'Aceptar',
          showConfirmButton: true
        });

      } else {
        Swal.fire({
          icon: 'warning',
          title: 'ERROR',
          text: 'Error al actualizar la contraseña, por favor intente de nuevo.',
          confirmButtonText: 'Aceptar',
          showConfirmButton: true
        });
      }
    },
    error: function () {
      console.log("No se ha podido obtener la información ");
    }

  });
}
//vaciamos los campos
function limpiarCampos() {
  $('#txtConfirClave').val("");
  $('#txtNewClave').val("");
  $('#txtClaveActual').val("");
}
//cuando la click en actualizar
$(document).on('submit', '#FormCredenciales', function (e) {
  e.preventDefault();
  let estadoFormulario = validarForm();

  if (estadoFormulario == true) {
    //validamos si coinciden la CLAVE actual coninsidan
    if ($('#txtClave').val() == $('#txtClaveActual').val()) {
      //validamos q la nueva clave coninsida
      if ($('#txtNewClave').val() == $('#txtConfirClave').val()) {
        //ejecutamos la funcion que actualiza
        actualizarCredenciales();

      } else {
        // mensaje de alerta
        Swal.fire({
          icon: 'warning',
          title: 'Error',
          text: 'Su contraseña nueva no coincide, por favor intente de nuevo.',
          confirmButtonText: 'Aceptar',
          showConfirmButton: true
        });
      }

    } else {
      // mensaje de alerta
      Swal.fire({
        icon: 'warning',
        title: 'Error',
        text: 'La contraseña actual no coincide, por favor intente de nuevo',
        confirmButtonText: 'Aceptar',
        showConfirmButton: true
      });
    }
  } else {
    // mensaje de alerta
    Swal.fire({
      icon: 'warning',
      title: 'ADVERTENCIA',
      text: 'Por favor intente ingrese los campos que se le solicitan.',
      confirmButtonText: 'Aceptar',
      showConfirmButton: true
    });
  }
});
