$(document).ready(function () {
    $('#btnActualizar').click(function () {
        console.log('Va a actualizar la foto');        
    });
    $("#contener-foto-user").hover(function () {
        $("#contener-foto").css("display", "none");
    });

    $("#contener-foto-user").mousemove(function () {
        $("#contener-foto").css("display", "block");
    });
});