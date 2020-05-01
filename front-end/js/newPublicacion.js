console.log("archivo conectado");
//funcion para habiilitar el boton cuando todos los campos esten completos
function disabledBtn() {
  if (
    document.getElementById("txtNombre").value != "" &&
    document.getElementById("txtTextarea").value != "" &&
    document.getElementById("txtFiles").value != ""
  ) {
    document.getElementById("btn").disabled = false;
    /*let userID = document.getElementById("userID").value;
    console.log(userID);*/
  }
}
