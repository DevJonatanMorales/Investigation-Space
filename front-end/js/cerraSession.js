function cerrarSesion() {
    Swal.fire({
        icon: 'warning',
        title: '¿Está seguro de salir?',
        showCancelButton: true,
        confirmButtonColor: '#27AE61',
        cancelButtonColor: '#d33',
        confirmButtonText: 'No',
        cancelButtonText: 'Si'
    }).then((result) => {
        if (!result.value) {
            location.href = "../../../back-end/models/iniciarSesionModel.php?exit";
        }
    })
}