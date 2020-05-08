function obtenerPubliaciones() {
  let url = "../../../back-end/models/publicacionesModel.php";
  $.ajax({
    url: url,
    type: "get",
    datatype: "json",
    success: function (result) {

      let showData = "";
      $.each(result, function (index, value) {
        console.log(value);

      })
      //$("#publicaciones").html(showData);

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
