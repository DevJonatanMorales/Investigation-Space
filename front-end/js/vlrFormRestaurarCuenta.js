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
  var parametros = { userId: id };
  $.ajax({
    type: "POST",
    url: url,
    dataType: "json",
    data: parametros,
    success: function (data) {
      console.log(data);

      if (data.result == 1) {
        location.href = "../Content/index.php";
      } else {
        console.log("invalid");
        Swal.fire({
          icon: "warning",
          title: "Usuario o Contraseñas correctas",
          showConfirmButton: true,
        });
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
  if (document.getElementById("txtNuevaContrasena").value == "") {
    datosCorrectos = false;
    msjError = "ingrese la confirmacion de la contraseña.";
  }
  /* validamos que confirme la contraseña */
  if (document.getElementById("txtConfirmeContrasena").value == "") {
    datosCorrectos = false;
    msjError = "ingrese la confirmacion de la contraseña.";
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
