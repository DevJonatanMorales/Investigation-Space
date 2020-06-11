<?php
require_once('./dataBase.php');
class IndexModel
{
  public static function mostrarPublicaciones(Type $var = null)
  {
    $conexion = New DataBase();
    $query = "SELECT tb_estudiante.photo, tb_estudiante.primer_nombre, tb_estudiante.apellido_paterno, tb_articulos.nombre_articulo,  tb_articulos.contenido_articulo, tb_articulos.fecha_articulo, tb_publicaciones.publicacion_id, tb_publicaciones.img_descriptiva, tb_publicaciones.descripcion_articulo FROM tb_articulos INNER JOIN tb_publicaciones ON tb_articulos.articulo_id=tb_publicaciones.fk_articulo_id INNER JOIN tb_estudiante ON tb_publicaciones.fk_estudiante_id=tb_estudiante.estudiante_id ORDER BY tb_publicaciones.publicacion_id DESC";

    $resultQuery = $conexion->selectSearchDato($query);

    if ($resultQuery->num_rows > 0) {
      while ($row = $resultQuery->fetch_assoc()) {
        $publicaciones[] = array(
          'foto' => $row['photo'],
          'user' => $row['primer_nombre'] . $row['apellido_paterno'],
          'publicacionId' => $row['publicacion_id'],
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

$resultPublicaciones = (IndexModel::mostrarPublicaciones() == false) ? 0 : IndexModel::mostrarPublicaciones();
//print_r($resultPublicaciones);
echo json_encode($resultPublicaciones);
?>