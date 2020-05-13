<?php
require_once('./dataBase.php');
class PublicacionesModel
{
  public static function savePublicacion($datos)
  {
    //
    $resultDefault = false;
    $conexion = New DataBase();
    $articuloInsert = "INSERT INTO `tb_articulos`(`nombre_articulo`, `contenido_articulo`, `fecha_articulo`) VALUES ('".$datos['nombre_articulo']."','".$datos['contenido_articulo']."','".$datos['fecha_articulo']."')";

    $articuloID = $conexion->insertLastId($articuloInsert);

    if ($articuloID > 0) {
      $publicacionInsert = "INSERT INTO `tb_publicaciones`(`publicacion_id`, `fk_estudiante_id`, `fk_articulo_id`, `img_descriptiva`, `descripcion_articulo`) VALUES ('".$articuloID."','".$datos['fk_estudiante_id']."','".$articuloID."','".$datos['img_descriptiva']."','".$datos['descripcion_articulo']."')";

      $resultPublicacion = $conexion->insertUpdateDato($publicacionInsert);

      if ($resultPublicacion === true) {
        $resultDefault = true;
      }
    }

    return $resultDefault;

  }

  public static function mostrasPublicacion($id, $buscar = null)
  {
    $conn = new DataBase();

    if ($buscar === null) {
      $query = "SELECT tb_articulos.nombre_articulo,  tb_articulos.contenido_articulo, tb_articulos.fecha_articulo, tb_publicaciones.publicacion_id, tb_publicaciones.img_descriptiva, tb_publicaciones.descripcion_articulo FROM tb_articulos INNER JOIN tb_publicaciones ON tb_articulos.articulo_id=tb_publicaciones.fk_articulo_id WHERE tb_publicaciones.fk_estudiante_id = '".$id."'";
    } else {
      $query = "SELECT tb_articulos.nombre_articulo,  tb_articulos.contenido_articulo, tb_articulos.fecha_articulo, tb_publicaciones.publicacion_id, tb_publicaciones.img_descriptiva, tb_publicaciones.descripcion_articulo FROM tb_articulos INNER JOIN tb_publicaciones ON tb_articulos.articulo_id=tb_publicaciones.fk_articulo_id WHERE tb_publicaciones.fk_estudiante_id = '".$id."' AND tb_articulos.nombre_articulo LIKE '%".$buscar."%' OR tb_articulos.fecha_articulo LIKE '%".$buscar."%'";
    }


    $resultQuery = $conn->selectSearchDato($query);

    if ($resultQuery->num_rows > 0) {

      while ($row = $resultQuery->fetch_assoc()) {
        $publicaciones[] = array(
          'articuloNom' => $row['nombre_articulo'],
          'articuloImg' => $row['img_descriptiva'],
          'articuloConte' => $row['contenido_articulo'],
          'articuloDescrip' => $row['descripcion_articulo'],
          'articuloFech' => $row['fecha_articulo']
        );
      }
    } else {
      $publicaciones = false;
    }

    return $publicaciones;
  }
}

if (isset($_POST['accion'])) {
  if ($_POST["accion"] == 'guardarPublicacion') {
    session_start();

    date_default_timezone_set("America/El_Salvador");
    $fechPublicacion = date("Y")."-".date("m")."-".date("d");

    $imgTemp = $_FILES['txtImg']['tmp_name'];
    $imgName = $_FILES['txtImg']['name'];

    $fileTemp = $_FILES['txtFile']['tmp_name'];
    $fileName = $_FILES['txtFile']['name'];

    $datosPublicacion = array(
      'fk_estudiante_id' => $_SESSION['USER_ID'],
      'img_descriptiva' => $imgName,
      'nombre_articulo' => $_POST['txtNombre'],
      'descripcion_articulo' => $_POST['txtTextarea'],
      'contenido_articulo' => $fileName,
      'fecha_articulo' => $fechPublicacion
    );
    //print_r($datosPublicacion);
    $publicacion = PublicacionesModel::savePublicacion($datosPublicacion);

    if ($publicacion === true) {
      move_uploaded_file($imgTemp,'../../front-end/img/'.$imgName);
      move_uploaded_file($fileTemp,'../../front-end/file/'.$fileName);
      echo  'Exito :)';
      //header("Location: ../../front-end/view/Content/misPublicaciones.php");

    } else {
      //header("Location: ../../front-end/view/Content/misPublicaciones.php?alerta=error");
      echo 'Error :(' . $publicacion;
    }

  }
} else {
  session_start();

  if (isset($_POST["buscar"])) {
    $public = PublicacionesModel::mostrasPublicacion($_SESSION['USER_ID'],$_POST["buscar"]);
  } else {
    $public = PublicacionesModel::mostrasPublicacion($_SESSION['USER_ID']);
  }

  if ($public === false) {
    echo json_encode(0);
  } else {
    echo json_encode($public);
  }
}


?>