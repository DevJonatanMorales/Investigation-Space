<?php
require_once('./dataBase.php');
sleep(1);

class ActualizarDatosModel {

    public static function actualizar($_id, $Student, $Detail, $User) {
        //se establece la conexion
        $conexion = new DataBase();
        //resultado por defecto
        $resultQuery = false;
        //
        $queryStudent = "UPDATE `tb_estudiante` SET `primer_nombre`= '". $Student['primer_nombre'] ."',`segundo_nombre`= '". $Student['segundo_nombre'] ."',`apellido_paterno`= '". $Student['apellido_paterno'] ."',`apellido_materno`= '". $Student['apellido_materno'] ."',`fecha_nacimiento`= '". $Student['fecha_nacimiento'] ."',`genero_estudiante`= '". $Student['genero_estudiante'] ."' WHERE `estudiante_id`= '". $_id ."'";

        $resutlStudent = $conexion->insertUpdateDato($queryStudent);

        if ($resutlStudent == true) {
            $queryDetail = "UPDATE `tb_detalle_estudiante` SET `nombre_universidad`= '". $Detail['nombre_universidad'] ."',`facultad_universidad`= '". $Detail['facultad_universidad'] ."',`carrera_universidad`= '". $Detail['carrera_universidad'] ."' WHERE `detalle_estudiante_id`= '". $_id ."'";

            $resultDetail = $conexion->insertUpdateDato($queryDetail);

            if ($resultDetail == true) {
              $queryUser = "UPDATE `tb_usuarios` SET `correo_user`= '". $User['correo_user'] . "',`telefono_user`= '". $User['telefono_user'] . "' WHERE `usuario_id`= '". $_id . "'";

              $resultUser = $conexion->insertUpdateDato($queryUser);

              if ($resultUser == true) {
                $resultQuery = true;
              }
            }
        }
        return $resultQuery;

    }
}

if (isset($_POST['accion'])) {
    $estudiante = array(
        'primer_nombre' => $_POST['txtPrimerNombre'],
        'segundo_nombre' => $_POST['txtSegundoNombre'],
        'apellido_paterno' => $_POST['txtApellidoPaterno'],
        'apellido_materno' => $_POST['txtApellidoMaterno'],
        'fecha_nacimiento' => $_POST['txtFechNaci'],
        'genero_estudiante' => $_POST['txtGenero']
    );

    $detalle = array(
        'nombre_universidad' => $_POST['txtUniversidad'],
        'facultad_universidad' => $_POST['txtfacultad'],
        'carrera_universidad' => $_POST['txtCarrera']
    );

$user = array(
  'correo_user' => $_POST['txtCorreo'],
  'telefono_user' => $_POST['txtTelefono']
);
    session_start();
    $resultUpdate = ActualizarDatosModel::actualizar($_SESSION['USER_ID'], $estudiante, $detalle, $user);

    if ($resultUpdate == true) {
        echo json_encode(array('result' => 1));
    } else {
        echo json_encode(array('result' => 0));
    }

}

?>
