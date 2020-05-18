function cardPublicacion(data) {
  const datos = JSON.parse(data);
  let id = datos[0]['publicacionId'];
  $("#publicacionId").val(id);

  let publicaciones = '';
  datos.forEach(datos => {
    publicaciones += `<div class="card margen my-2" >
          <img src="../../img/${datos.articuloImg}" class="card-img-top my-2" alt="Cargando...">
          <div class="card-body">
            <h5 class="card-title">${datos.articuloNom}</h5>
            <p class="card-text">${datos.articuloDescrip}</p>
          </div>
          <div class="card-footer text-muted">
            fecha de publicacion ${datos.articuloFech}
          </div>
        </div>`;
  });

  $("#publicaciones").html(publicaciones);
}
function obtenerPublicaciones() {
  let url = "../../../back-end/models/indexModel.php";
  $.ajax({
    url: url,
    type: 'post',
    success: function (result) {

      if (result === 0) {
        console.log("No ay datos q mostrar");

      } else {
        cardPublicacion(result)
      }

    },
    error: function () {
      console.log("No se a podido obtener la informacion :(");
    }
  });
}
let btn = $('#publicacionId').val();
console.log('el valor es ' + btn);

$(document).ready(function () {
  obtenerPublicaciones();
});