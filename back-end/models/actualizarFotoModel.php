<?php
require_once('./dataBase.php');

class ActualizarFotoModel {

  public static function actualizarFoto($foto, $id) {
    //resultado por defecto
    $resultFoto = false;
    //establecemos la conexion
    $conexion = new  DataBase();
    //query
    $query = "UPDATE `tb_estudiante` SET `photo`= '". $foto ."' WHERE `estudiante_id`= '". $id ."'";
    //run query
    $resultQuery = $conexion->insertUpdateDato($query);

    if ($resultQuery == true) 
    {
      $resultFoto = true;
    }

    return $resultFoto;
  }
}

if (isset($_POST['accion'])) {
  session_start();
  switch ($_POST['accion']) {
    case 'actualizar':

      $nomTemp = $_FILES['foto']['tmp_name'];
      $nomFoto = $_FILES['foto']['name'];
      
      $resutlUpdate = ActualizarFotoModel::actualizarFoto($nomFoto, $_SESSION['USER_ID']);

      if ($resutlUpdate == true) {        
        move_uploaded_file($nomTemp,'../../front-end/img/'.$nomFoto);
        $_SESSION['PHOTO'] = $nomFoto;

        header("Location: ../../front-end/view/Content/actualizarFoto.php?alerta=valid");
        
      } else {
       header("Location: ../../front-end/view/Content/actualizarFoto.php?alerta=invalid");

      }
      
      break;
  }
}
?>
