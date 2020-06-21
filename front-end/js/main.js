// funcion que se encarga de pintar en patalla las publicaciones
function cardPublicacion(data) {
  const datos = JSON.parse(data);
  //console.log(datos);

  let id = datos[0]['publicacionId'];
  $("#publicacionId").val(id);

  let publicaciones = '';
  datos.forEach(datos => {
    publicaciones += `<div class="card margen my-2" >
          <div class="media bg-white py-1">
            <img class="mr-3 rounded-circle" src="../../img/${datos.foto}" class="mr-3" alt="..." width="64" height="64" >
            <div class="media-body">
              <h5 class="mt-0 my-3 Oswald">${datos.user}</h5>
            </div>
          </div>
          <img src="../../img/${datos.articuloImg}" class="card-img-top my-2" alt="Cargando...">
          <div class="card-body">
            <h5 id="${datos.articuloConte}" class="card-title">${datos.articuloNom}</h5>
            <p class="card-text">${datos.articuloDescrip}</p>
          </div>
          <div class="card-footer text-muted">
            <a href="#" >fecha de publicacion ${datos.articuloFech}</a>            
          </div>
        </div>`;
  });

  $("#publicaciones").html(publicaciones);

}

function obtenerPublicaciones() {
  $("#actualizarID").removeClass("btnActualizarShow");
  $("#actualizarID").addClass("btnActualizarNone");
  let url = "../../../back-end/models/indexModel.php";
  $.ajax({
    url: url,
    type: 'post',
    success: function (result) {

      if (result === 0) {
        console.log("No ay datos q mostrar");

      } else {
        cardPublicacion(result);
      }

    },
    error: function () {
      console.log("No se a podido obtener la informacion :(");
    }
  });
}
// funcion que se encarga de decidir si es necesario actualizar la pag.
function actualizarPublicaciones() {
  let url = "../../../back-end/models/indexModel.php";
  //se obtiene el id de a la ultima publicacion
  let idActual = $('#publicacionId').val();
  $.ajax({
    url: url,
    type: 'post',
    success: function (result) {

      if (result === 0) {
        console.log("No ay datos q mostrar");
      } else {
        const idNuevo = JSON.parse(result);
        //obtenemos el numero de las nuevas publicaciones
        let diferencia = idActual - idNuevo[0]["publicacionId"];

        if (diferencia > 0) {
          console.log("la diferenciaes " + diferencia);
          $("#actualizarID").removeClass("btnActualizarNone");
          $("#actualizarID").addClass("btnActualizarShow");
          /* si la diferencia en mayor a 4 es decir mostramos el boton actualizar */
        }
      }

    },
    error: function () {
      console.log("No se a podido obtener la informacion :(");
    }
  });
}
/*
funcion principal,
si #publicacionId esta vacio significa q se acaba de iniciar sesion
y ejecutamos la funcion q obtiene las publicaciones sino
ejecutamos la funcion q se encargara de buscar las nuevas publicaciones
*/
function main() {
  if ($('#publicacionId').val() === "") {
    obtenerPublicaciones();
  } else {
    actualizarPublicaciones();
  }
  setTimeout('main()', 10000);
}

$(document).ready(function () {
  main()
});

$(document).on("click", "#actualizarID", function () {
  obtenerPublicaciones();
});
/* 
  en esta parte al dar click en el nombre de la publicacion
  obtenemos el id que es el mismo id que esta en la BD y es el
  que enviamos a la pagina donde mostramos la publicacion
*/
$(document).on("click", ".card-title", function () {
  let id = this.id;
  console.log(id);
  window.open('./mostrarPublicaciones.php?publicacion=' + id);
});