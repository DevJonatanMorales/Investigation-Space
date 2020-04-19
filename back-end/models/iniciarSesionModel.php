<?php 
require_once('./dataBase.php');
sleep(1);
class InisiarSesionModel {
    public static function login($user, $pass) {
        //se establece un nuevo objeto
        $conn = new DataBase();
        //resultado de la consulta por defecto es 0
        $result = false;
        //variable q tiene la cosulta
        $sql = "SELECT tb_usuarios.usuario_id, tb_estudiante.photo, tb_estudiante.primer_nombre, tb_estudiante.apellido_paterno FROM tb_usuarios INNER JOIN tb_estudiante ON tb_usuarios.usuario_id=tb_estudiante.fk_usuario_id WHERE EXISTS (SELECT usuario_id, photo FROM tb_estudiante AS e WHERE tb_estudiante.fk_usuario_id=tb_usuarios.usuario_id AND tb_usuarios.correo_user = '" . $user . "' OR tb_usuarios.telefono_user = '" . $user . "') AND tb_usuarios.clave_user = '" . $pass . "'";
        //run query
        $resultQuery = $conn->selectSearchDato($sql);
        //validamos la consulta
        if($resultQuery->num_rows > 0) {
            while($row = $resultQuery->fetch_assoc()) {
                $datos = array(
                    'usuario_id' => $row["usuario_id"], 
                    'photo' => $row["photo"],
                    'userName' => $row['primer_nombre'] . " " . $row['apellido_paterno']
                );
            }

            session_start();
            $_SESSION['USER_ID'] = $datos['usuario_id'];
            $_SESSION['PHOTO'] = $datos['photo'];
            $_SESSION['USERNAME'] = $datos['userName'];

            $result = true;
        }
        
        return $result;
    }
}

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'IniciarSesion':
            // limpiamos los cmapos
            $user = DataBase::clearFields($_POST['txtUser']);
            $pass = DataBase::clearFields($_POST['txtPass']);

            $resultLogin = InisiarSesionModel::login($user, DataBase::encryption($pass));
            
            if ($resultLogin == true) {
                echo json_encode(array('result' => 1));
                
            }else {
                echo json_encode(array('result' => 0));
            }
            
            break;
        
        case 'IniciarSesion':
            # code...
            break;
    }
}

if (isset($_GET['exit'])) {
    session_start();
    session_destroy();
    header("Location: ../../front-end/view/Login/Index.php");
}
?>