function obtenerPubliaciones() {
  let url = "../../../back-end/models/publicacionesModel.php";
  $.ajax({
    url: url,
    type: "get",
    success: function (result) {
      const datos = JSON.parse(result);
      let publicaciones = '';
      datos.forEach(datos => {
        publicaciones += `<div class="card" style="width: 18rem;" >
          <img src="../../img/banner.jpg" class="card-img-top" alt="Cargando...">
          <div class="card-body">
            <h5 class="card-title">${datos.ArticuloNom}</h5>
            <p class="card-text">${datos.articuloConte}</p>
          </div>
          <div class="card-footer text-muted">
            fecha de publicacion ${datos.articuloFech}
          </div>
        </div>`;
      });

      $("#publicaciones").html(publicaciones);
    },
    error: function () {
      console.log("No se a podido obtener la informacion");
    },
  });
}
obtenerPubliaciones();
/*
showData += `
        <div class="card" style="width: 18rem;">
          <img src="../../img/banner.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">${res.ArticuloNom}</h5>
            <p class="card-text">${res.articuloConte}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        `;
const numbers = [1, 2, 3, 4, 5];
$.each(numbers, function (index, value) {
  console.log(`${index}: ${value}`);
});
*/
