function readImage(input) {
    let btn = document.getElementById('txtDescripcion');

    if (input.files && input.files[0]) {
        let nameArray = input.files[0];

        btn.innerText = nameArray.name;

        let reader = new FileReader();
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result); // Renderizamos la imagen
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function () {
    $("#txtFile").on("change", function () {
        // Código a ejecutar cuando se detecta un cambio de archivo
        readImage(this);
    });
});
//
function emptyFoto() {
    let datosCorrectos = true;
    let msjError = "";
    /* validamos que ingrese el numero de telefono o correo */
    if ($('input[name=foto]').val() == "") {
        datosCorrectos = false;
        msjError = "seleccione una foto.";
    }
    /* si existe algun error en el formulario */
    if (datosCorrectos == false) {
        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: 'Por favor ' + msjError
        });
    }

    return datosCorrectos;
}