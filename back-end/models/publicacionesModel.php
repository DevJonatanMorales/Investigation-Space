<?php 
require_once('./dataBase.php');
class publicacionesModel
{
  public static function savePublicacion($datos)
  {
    //
    $resultDefault = false;
    $conn = New DataBase();
    $queryArticulo = "INSERT INTO `nombre_articulo`, `contenido_articulo`, `fecha_articulo`) VALUES ('".$datos['nombre_articulo']."','".$datos['contenido_articulo']."','".$datos['fecha_articulo']."'";

    $resultQuery = $conn->insertLastId($query);

    if ($resultQuery > 0) {
      $queryPublicacion = "INSERT INTO `tb_publicaciones`(`fk_estudiante_id`, `fk_articulo_id`) VALUES ('".$queryArticulo."','".$datos['fk_articulo_id']."')";

      $resultPublicacion = $conn->insertUpdateDato($queryPublicacion);

      if ($resultPublicacion === true) {
        $resultDefault = true;
      }
    }

    return $resultDefault;

  }

  public static function mostrasPublicacion($id)
  {
    $conn = new DataBase();
    $query = "SELECT tb_articulos.nombre_articulo,  tb_articulos.contenido_articulo, tb_articulos.fecha_articulo, tb_publicaciones.publicacion_id FROM tb_articulos INNER JOIN tb_publicaciones ON tb_articulos.articulo_id=tb_publicaciones.fk_articulo_id WHERE tb_publicaciones.fk_estudiante_id = '".$id."'";
    $resultQuery = $conn->selectSearchDato($query);

    if ($resultQuery->num_rows > 0) {
      
      while ($row = $resultQuery->fetch_assoc()) {
        $publicaciones[] = array(
          'ArticuloNom' => $row['nombre_articulo'],
          'articuloConte' => $row['contenido_articulo'],
          'articuloFech' => $row['fecha_articulo']
        );
      }
    } else {
      $publicaciones = false;
    }
    
    return $publicaciones;
  }
}

?>