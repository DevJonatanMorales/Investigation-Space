<?php
require_once('./dataBase.php');
require_once('../App/enviarCorreo.php');

class RecupererarContrasenaModel
{

  public static function vlrCorreo($correo)
  {
    //creo un objeto
    $conexion = new DataBase();
    //resultado por defecto
    $resultQuery = false;
    //consulta
    $queryCorreo = "SELECT tb_estudiante.primer_nombre, tb_usuarios.usuario_id, tb_usuarios.correo_user FROM tb_usuarios INNER JOIN tb_estudiante ON tb_usuarios.usuario_id=tb_estudiante.fk_usuario_id WHERE correo_user = '". $correo ."'";
    $resultEmailUser = $conexion->selectSearchDato($queryCorreo);
    if ($resultEmailUser->num_rows > 0) {
      
        $row = $resultEmailUser->fetch_assoc();
        date_default_timezone_set("America/El_Salvador");
        $dia = date("d") + 1;
        //creamos la fecha de recuperar cuenta en 24hrs
        $fecha = date("Y")."-".date("m")."-".$dia." ".date("g:i");
        //creamos el codigo para verficar
        $codigoBerificacion = $conexion->codigoRecuperarPass();
        //queryUser
        $query = "UPDATE `tb_usuarios` SET `codigo`= '".$codigoBerificacion."',`fecha`= '" . $fecha . "' WHERE usuario_id = '" . $row['usuario_id'] . "'";
        //run query
        $resultQuery = $conexion->insertUpdateDato($query);
        //validamos
        if ($resultQuery == true) {
            //enviarmos el correo
            $id = $conexion->encryption($row['usuario_id']);

            $contenido = "Para cambiar la contraseña
            <a href=\"http://localhost/Investigation-Space/front-end/view/Login/RestaurarClave.php?_id=".$id."\">click aqui</a> introduzca el siguiente codigo <b>".$codigoBerificacion."</b> y digite la nueva contraseña y confirme y por ultimo de click en guardar cambios";

            $contenido = wordwrap($contenido, 70, "\r\n");

            $resultEmail = enviarCorreo($row['primer_nombre'],$correo,$contenido);
            if ($resultEmail == true) {
              $resultQuery = true;
            }
        }
      
        return   $resultQuery;
    }
  }
  //funcion para validar el codigo
  public static function vlrCodigo($id)
  {
    //creo un objeto
    $conexion = new DataBase();
    //result
    $resultCodigo = false;
    //fecha actual
    date_default_timezone_set("America/El_Salvador");
    $fechaActual = date("Y")."-".date("m")."-".date("d")." ".date("g:i");

    $query = "SELECT usuario_id, codigo, fecha FROM `tb_usuarios` WHERE usuario_id = '". $id ."'";
    $resultQuery = $conexion->selectSearchDato($query);

    if ($resultQuery->num_rows > 0) {
      $row = $resultQuery->fetch_assoc();

      if(strtotime($fechaActual) > strtotime($row['fecha'])){
        $resultCodigo = array(
          'userId' => $row['usuario_id'],
          'codigo' => $row['codigo'],
          'fecha' => 0
        );
      } else if(strtotime($fechaActual) < strtotime($row['fecha'])){
        $resultCodigo = array(
          'userId' => $row['usuario_id'],
          'codigo' => $row['codigo'],
          'fecha' => 1
        );
      }
      
    }
    
    return $resultCodigo;
  }
  //restaurar clave
  public static function restauraClave($id, $clave)
  {
    //creo un objeto
    $conexion = new DataBase();
    //result
    $resultClave = false;
    //query
    $query = "UPDATE `tb_usuarios` SET `clave_user`= '". $clave ."',`codigo`= '',`fecha`= '' WHERE `usuario_id`= '". $id ."'";

    $resultQuery = $conexion->insertUpdateDato($query);

    if ($resultQuery === true) {
      $resultClave = true;
    }

    return $resultClave;
  }
}

if (isset($_POST['accion'])) {
  switch ($_POST['accion']) {
    case 'RecuperarCuenta':
      $result = RecupererarContrasenaModel::vlrCorreo($_POST['txtEmail']);

      if ($result == true) {
        echo json_encode(array('result' => 1));

      } else {
        echo json_encode(array('result' => 0));

      }
      break;

    case 'RestaurarCuenta':
      $clave = DataBase::clearFields($_POST['clave']);

      $resultUpdate = RecupererarContrasenaModel::restauraClave(DataBase::clearFields($_POST['userID']), DataBase::encryption($clave));

      if ($resultUpdate === true) {
        echo json_encode(array('result' => 1));
      } else {
        echo json_encode(array('result' => 0));
      }
      
      break;
  }
} else {
  $getId = DataBase::clearFields($_POST['userId']);
  $resultCodigo = RecupererarContrasenaModel::vlrCodigo(DataBase::decryption($getId));

  if ($resultCodigo === false) {
    echo json_encode(array('result' => 0));
  } else {
    echo json_encode($resultCodigo);
  }
  
}
?>
