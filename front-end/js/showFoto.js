$(document).ready(function () {
  $("#contener-foto-user").hover(function () {
    $("#contener-foto").css("display", "none");
  });

  $("#contener-foto-user").mousemove(function () {
    $("#contener-foto").css("display", "block");
  });
});
