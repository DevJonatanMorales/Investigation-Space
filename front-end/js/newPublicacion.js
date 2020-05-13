//funcion para habilitar el boton cuando todos los campos esten completos
function disabledBtn() {
  if (
    document.getElementById("txtNombre").value != "" &&
    document.getElementById("txtTextarea").value != "" &&
    document.getElementById("txtFile").value != "" &&
    document.getElementById("txtImg").value != ""
  ) {
    document.getElementById("btn").disabled = false;
  }
}
//funcion para mostrar el nombre de la imagen
function lblFile(input) {
  let btn = document.getElementById('lblFile');

  if (input.files && input.files[0]) {
    let nameArray = input.files[0];
    btn.innerText = nameArray.name;

  }
}
//funcion para mostrar el nombre del archivo
function lblImg(input) {
  let btn = document.getElementById('lblImg');

  if (input.files && input.files[0]) {
    let nameArray = input.files[0];
    btn.innerText = nameArray.name;

  }
}

$(document).ready(function () {
  $("#txtImg").on("change", function () {
    lblImg(this);
  });

  $("#txtFile").on("change", function () {
    lblFile(this);
  });
});
