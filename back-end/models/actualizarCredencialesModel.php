<?php
require_once('./dataBase.php');
sleep(1);
//clase para actualizar la CLAVE
class ActualizarCredencialesModel {
  //funcion que recupera la CLAVE actual
  public static function mostrarClave($_id)  {
    //capturamos la conexion
    $conn = new DataBase();
    //resultado por defecto de la consulta
    $resultDefault = false;
    //creamos la consulta
    $query = "SELECT tb_usuarios.clave_user FROM tb_usuarios WHERE tb_usuarios.usuario_id = '". $_id ."'";
    //ejecutamos la consulta
    $resultQuery = $conn->selectSearchDato($query);
    //validamos si encontro datos y cambiamos el resultado por defecto
    if ($resultQuery->num_rows > 0) {
      $row = $resultQuery->fetch_assoc();
      //creamos un areglo con el resultado
      $resultDefault = array(
        'clave_user' =>$row['clave_user']
      );
    }

    return $resultDefault;
  }
  //funcion para actualizar la CLAVE
  public static function actualizarClave($_id, $newClave) {
    //variable conexion
    $conn = new DataBase();
    //resultado por defecto
    $resultDefault = false;
    //consulta donde actualizamos los datos
    $queryUser = "UPDATE `tb_usuarios` SET `clave_user`= '". $newClave ."' WHERE `usuario_id`= '". $_id ."'";
    //ejecutamos la consulta
    $resultQueryUser = $conn->insertUpdateDato($queryUser);
    //validamos
    if ($resultQueryUser == true) {
      //cambiamos el resultado por defecto
      $resultDefault = true;
    }

    return $resultDefault;
  }
}

//iniciamos session para aceder al ID
session_start();
//valdamos si actualiza la CLAVE
if (isset($_POST['accion'])) {
  //encriptamos la CLAVE
  $newClave =  DataBase::encryption($_POST['txtConfirClave']);
  //capturamos el resultado de la funcion
  $resultUpdate = ActualizarCredencialesModel::actualizarClave($_SESSION['USER_ID'], $newClave);
  //validamos
  if ($resultUpdate == true) {
    //caso que se haya actualizado los datos
    echo json_encode(array('result' => 1));

  }else {
    //caso que no se haya actualizado los datos
    echo json_encode(array('result' => 0));

  }

} else {
  //capturamos la ejecucion de la consulta
  $clave = ActualizarCredencialesModel::mostrarClave($_SESSION['USER_ID']);
  //validamos se encontro datos
  if ($clave == false) {
    //en caso de error
    echo json_encode(array('result' => 0));
  } else {
    //en caso de exito
    //desiframos la CLAVE
    $claveActual = DataBase::decryption($clave['clave_user']);
    //retornamos el resultado
    echo json_encode(array('result' => $claveActual));
  }

}
?>
