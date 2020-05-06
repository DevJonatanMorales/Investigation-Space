function mostrarPubliaciones() {
  let url = "../../../back-end/models/publicacionesModel.php";
  $.ajax({
    url: url,
    type: "get",
    //datatype: "json",
    success: function (data) {
      console.log(data);
    },
    error: function () {
      console.log("No se a podido obtener la informacion");
    },
  });
}
console.log("archivo contectado");

mostrarPubliaciones();
