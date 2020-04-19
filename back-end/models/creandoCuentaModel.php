<?php 
require_once('./dataBase.php');
class CreandoCunetaModel {
    public static function creandoCuenta($datoUser, $datoStudent, $datoDetail) {
        //se establece la conexion
        $conexion = new DataBase();
        //resultado por defecto
        $resultCuenta = false;
        $queryUser = "INSERT INTO `tb_usuarios`(`correo_user`, `telefono_user`, `clave_user`) VALUES ('". $datoUser['correo_user'] ."','". $datoUser['telefono_user'] ."','". $datoUser['clave_user'] ."')";
        //run user
        $userId = $conexion->insertLastId($queryUser);

        if ($userId > 0) {
            $queryStudent = "INSERT INTO `tb_estudiante`(`estudiante_id`, `fk_usuario_id`, `primer_nombre`, `segundo_nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `genero_estudiante`) VALUES ('". $userId ."','". $userId ."','". $datoStudent['primer_nombre'] ."','". $datoStudent['segundo_nombre'] ."','". $datoStudent['apellido_paterno'] ."','". $datoStudent['apellido_materno'] ."','". $datoStudent['fecha_nacimiento'] ."','". $datoStudent['genero_estudiante'] ."')";
            //run user
            $resultStudent = $conexion->insertUpdateDato($queryStudent);
            
            if ($resultStudent ==  true) {
                $queryDetail = "INSERT INTO `tb_detalle_estudiante`(`detalle_estudiante_id`, `fk_estudiante_id`, `nombre_universidad`, `facultad_universidad`, `carrera_universidad`) VALUES ('". $userId ."','". $userId ."','". $datoDetail['nombre_universidad'] ."','". $datoDetail['facultad_universidad'] ."','". $datoDetail['carrera_universidad'] ."')";
                //run query
                $resultDetail = $conexion->insertUpdateDato($queryDetail);

                if ($resultDetail == true) {
                    session_start();
                    $_SESSION['USER_ID'] = $userId;
                    $_SESSION['PHOTO'] = 'defect.jpg';
                    $_SESSION['USERNAME'] = $datoStudent['primer_nombre'] . ' ' . $datoStudent['apellido_paterno'];
                    //se modifica el resultdado
                    $resultCuenta = true;
                } else {
                    echo 'error en detail <br>';
                }
            } else {
                echo 'error en student <br>';
            }
        } else {
            echo 'error en user <br>';
        }

        return $resultCuenta;

    }
}

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {

        case 'creandoCuenta':
            $datosEstudiante = array(
                'primerNombre' => DataBase::clearFields($_POST['primerNombre']),
                'segundoNombre' => DataBase::clearFields($_POST['segundoNombre']),
                'apellidoPaterno' => DataBase::clearFields($_POST['apellidoPaterno']),
                'apellidoMaterno' => DataBase::clearFields($_POST['apellidoMaterno']),
                'fechNaci' => DataBase::clearFields($_POST['fechNaci']),
                'genero' => DataBase::clearFields($_POST['genero'])
            );
            
            header("Location: ../../front-end/view/Login/crearCuenta.php?datos=" . serialize($datosEstudiante));
            break;

        case 'crearCuenta':
            $pass = DataBase::clearFields($_POST['txtPass']);
            $user = array(
                'correo_user' => DataBase::clearFields($_POST['txtCorreo']),
                'telefono_user' => DataBase::clearFields($_POST['txtTelefono']),
                'clave_user' => DataBase::encryption($pass)
            );

            $student = array(
                'primer_nombre' => DataBase::clearFields($_POST['primerNombre']),
                'segundo_nombre' => DataBase::clearFields($_POST['segundoNombre']),
                'apellido_paterno' => DataBase::clearFields($_POST['apellidoPaterno']),
                'apellido_materno' => DataBase::clearFields($_POST['apellidoMaterno']),
                'fecha_nacimiento' => DataBase::clearFields($_POST['fechNaci']),
                'genero_estudiante' => DataBase::clearFields($_POST['genero'])
            );

            $detailStudent =array(
                'nombre_universidad' => DataBase::clearFields($_POST['txtUniversidad']),
                'facultad_universidad' => DataBase::clearFields($_POST['txtFacultad']),
                'carrera_universidad' => DataBase::clearFields($_POST['txtCarrera'])
            );

            $crenadoCuenta = CreandoCunetaModel::creandoCuenta($user, $student, $detailStudent);

            if ($crenadoCuenta == true) {
                echo json_encode(array('result' => 1));
            } else {
                echo json_encode(array('result' => 0));
            }

            break;
        
    }
} else {
    echo json_encode('No existe el mentodo POST');
}
?>