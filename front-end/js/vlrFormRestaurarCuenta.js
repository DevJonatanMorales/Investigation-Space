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
