<?php
require_once('./dataBase.php');
class PerfilUsuarioModel {

    public static function showUser($_id) {
        //se establece un nuevo objeto
        $conn = new DataBase();
        //result por defecto
        $resultQuery = false;
        //query
        $queryUserProfile = "SELECT tb_usuarios.correo_user, tb_usuarios.telefono_user, tb_estudiante.photo, tb_estudiante.primer_nombre, tb_estudiante.segundo_nombre, tb_estudiante.apellido_paterno, tb_estudiante.apellido_materno, tb_estudiante.fecha_nacimiento, tb_estudiante.genero_estudiante, tb_detalle_estudiante.nombre_universidad, tb_detalle_estudiante.facultad_universidad, tb_detalle_estudiante.carrera_universidad FROM tb_usuarios INNER JOIN tb_estudiante ON tb_usuarios.usuario_id=tb_estudiante.fk_usuario_id INNER JOIN tb_detalle_estudiante ON tb_estudiante.estudiante_id=tb_detalle_estudiante.fk_estudiante_id WHERE tb_usuarios.usuario_id = '" . $_id ."'";
        //run query
        $resultQueryProfile = $conn->selectSearchDato($queryUserProfile);

        if ($resultQueryProfile->num_rows > 0) {
            while ($row = $resultQueryProfile->fetch_assoc()) {
                $resultQuery = array(
                    'correo_user' => $row['correo_user'],
                    'telefono_user' => $row['telefono_user'],
                    'photo' => $row['photo'],
                    'primer_nombre' => $row['primer_nombre'],
                    'segundo_nombre' => $row['segundo_nombre'],
                    'apellido_paterno' => $row['apellido_paterno'],
                    'apellido_materno' => $row['apellido_materno'],
                    'fecha_nacimiento' => $row['fecha_nacimiento'],
                    'genero_estudiante' => $row['genero_estudiante'],
                    'nombre_universidad' => $row['nombre_universidad'],
                    'facultad_universidad' => $row['facultad_universidad'],
                    'carrera_universidad' => $row['carrera_universidad']
                );
            }

            return $resultQuery;
        }

    }
}
session_start();
$result = PerfilUsuarioModel::showUser($_SESSION['USER_ID']);
echo json_encode($result);
?>
