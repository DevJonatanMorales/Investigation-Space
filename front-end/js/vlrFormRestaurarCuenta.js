//Convertimos en array las variables en el GET
function getVariable() {
  var variables = {};
  var arreglos = window.location.href.replace(
    /[?&]+([^=&]+)=([^&]*)/gi,
    function (m, key, value) {
      variables[key] = value;
    }
  );
  return variables;
}
//consultamos el id
function consultarDatos() {
  let url = "../../../back-end/models/recuperarContrasenaModel.php";
  //Para recuperar la variable con nombre "ciudad", acudimos a dicha posición del arreglo.
  let id = getVariable()["_id"];
  let parametros = { userId: id };
  $.ajax({
    type: "POST",
    url: url,
    dataType: "json",
    data: parametros,
    success: function (data) {
      //console.log(data);
      if (data.fecha === 1) {
        $("#idForm").css("display", "block");
        $("#txtUserId").val(data.userId);
        $("#txtCodigoDb").val(data.codigo);
      } else if (data.fecha === 0) {
        $("#idAlert").css("display", "block");
      }
    },
    error: function () {
      console.log("No se ha podido obtener la información");
    },
  });
}
//cuando la pagina carga
$(document).ready(function () {
  consultarDatos();
});
function vlrFormRestaurarCuenta() {
  let datosCorrectos = true;
  let msjError = "";
  /* validamos que ingrese el codigo */
  if (document.getElementById("txtCodigo").value == "") {
    datosCorrectos = false;
    msjError = "ingrese el condigo que fue enviado a su correo.";
  }
  /* validamos que ingrese la contraseña */
  if (document.getElementById("txtNew").value == "") {
    datosCorrectos = false;
    msjError = "ingrese su nueva contraseña.";
  }
  /* validamos que confirme la contraseña */
  if (document.getElementById("txtConfirmar").value == "") {
    datosCorrectos = false;
    msjError = "ingrese la confirmacion de su contraseña.";
  }
  /* si existe algun error en ell formulario */
  if (datosCorrectos == false) {
    Swal.fire({
      icon: "warning",
      title: "Advertencia",
      text: "Por favor " + msjError,
    });
  }

  return datosCorrectos;
}
/* valido q los campos no esten vacios */
function txtCampoEmpty(txtCampoEmpty) {
  if (txtCampoEmpty.value == "") {
    txtCampoEmpty.className = "invalid";
  } else {
    txtCampoEmpty.className = "valid";
  }
}
function limpiarTxt() {
  $("#txtUserId").val("");
  $("#txtCodigoDb").val("");
  $("#txtCodigo").val(" ");
  $("#txtNew").val("");
  $("#txtConfirmar").val("");
}
function restauraClave(parametros) {
  let url = "../../../back-end/models/recuperarContrasenaModel.php";
  let btn = document.getElementById("btn");
  $.ajax({
    type: "POST",
    url: url,
    dataType: "json",
    data: parametros,
    beforeSend: function () {
      btn.innerText = "Guardando...";
    },
    success: function (data) {
      btn.innerText = "Guardar";
      console.log(data);

      if (data.result === 1) {
        Swal.fire({
          icon: "success",
          title: "EXITO",
          text: "Contraseña actualizada con exito, ya puede iniciar sesion",
          confirmButtonText: "Aceptar",
          showConfirmButton: true,
        });
      } else if (data.result === 0) {
        Swal.fire({
          icon: "warning",
          title: "ERROR",
          text:
            "Ocurro un error al guardar su contraseña, por favor intente de nuevo.",
          confirmButtonText: "Aceptar",
          showConfirmButton: true,
        });
      }
    },
    error: function () {
      btn.innerText = "Guardar";
      console.log("No se ha podido obtener la información");
    },
  });
}
$(document).on("submit", "#idForm", function (e) {
  e.preventDefault();
  $resultForm = vlrFormRestaurarCuenta();
  if ($resultForm === true) {
    if ($("#txtCodigoDb").val() === $("#txtCodigo").val()) {
      if ($("#txtNew").val() === $("#txtConfirmar").val()) {
        let datos = {
          userID: $("#txtUserId").val(),
          clave: $("#txtConfirmar").val(),
          accion: $("#accion").val(),
        };
        restauraClave(datos);
      } else {
        Swal.fire({
          icon: "warning",
          title: "ERROR",
          text: "Su contraseña no coincide, por favor intente de nuevo.",
          confirmButtonText: "Aceptar",
          showConfirmButton: true,
        });
      }
    } else {
      Swal.fire({
        icon: "warning",
        title: "ERROR",
        text: "EL codigo no coincide, por favor intente de nuevo.",
        confirmButtonText: "Aceptar",
        showConfirmButton: true,
      });
    }
  }
});
