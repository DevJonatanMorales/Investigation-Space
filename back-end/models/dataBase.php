<?php
require_once('../config/config.php');
class DataBase {
    #establesemos la conexion
    public function establecerConexion(){
        // Create connection
        $openConexion = mysqli_connect(constant('HOST'), constant('USER'), constant('PASS'), constant('DB'));
        // Check connection
        if ($openConexion->connect_error) {
            die("Connection failed: " . $openConexion->connect_error);
        } /*else {
            echo 'Conexion establecida';
        }*/

        return $openConexion;
    }

    //funcion cerrar conecion
    private function cerrarConexion(){
        //capturamos la conexion
        $conexion = $this->establecerConexion();
        $conexion->close();
        //return $cerrarConexion;
    }

    //funciona para insertar datos o modificar
    public function insertUpdateDato($consulta) {
        //por defecto el resultado de la query es falso
        $resultadoConsulta = false;
        //capturamos la conexion
        $conexion = $this->establecerConexion();
        //ejecutamos y validamos la consulta
        if ($conexion->query($consulta) == true) {
            //encaso de exito
            $resultadoConsulta = true;

        }

        return $resultadoConsulta;

        $this->cerrarConexion();
    }


    //funciona para insertar datos y devuelve el ID
    public function insertLastId($consulta) {
        //capturamos la conexion
        $conexion = $this->establecerConexion();
        //ejecutamos y validamos la consulta
        if ($conexion->query($consulta) == true) {
            //encaso de exito
            $lastIdQuery = $conexion->insert_id;
            //return last  id
            if (!$lastIdQuery) {
                $lastIdQuery = false;
            }

        }

        return $lastIdQuery;

        $this->cerrarConexion();
    }

    //funcion para seleccionar o buscar datos
    public function selectSearchDato($consulta) {
        //capturamos la conexion
        $conexion = $this->establecerConexion();
        //ejecutamos la consulta
        $resultadoConsulta = $conexion->query($consulta);
        //retornamos la consulta
        return $resultadoConsulta;

        $this->cerrarConexion();
    }

	//clear txtCampos
    public static function clearFields($txtCampo){
        $txtCampo = trim($txtCampo);
        $txtCampo = stripslashes($txtCampo);
        $txtCampo = str_ireplace("<script>", "", $txtCampo);
        $txtCampo = str_ireplace("</script>", "", $txtCampo);
        $txtCampo = str_ireplace("<script src>", "", $txtCampo);
        $txtCampo = str_ireplace("<script type>", "", $txtCampo);
        $txtCampo = str_ireplace("'", "", $txtCampo);
        $txtCampo = str_ireplace("|", "", $txtCampo);
        $txtCampo = str_ireplace("^", "", $txtCampo);
        $txtCampo = str_ireplace("{", "", $txtCampo);
        $txtCampo = str_ireplace("}", "", $txtCampo);
        $txtCampo = str_ireplace("[", "", $txtCampo);
        $txtCampo = str_ireplace("]", "", $txtCampo);
        $txtCampo = str_ireplace("==", "", $txtCampo);
        $txtCampo = str_ireplace("`", "", $txtCampo);
        //retornamos el campo
        return $txtCampo;
    }

    //funcion calcular edad
    public function calcularEdad($fecha) {
        list($Y,$m,$d) = explode("-",$fecha);

        return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
    }

    //encriptar campo
    public static function encryption($string){
        $output=FALSE;
        $key=hash('sha256', '$PET@STRAR');
        $iv=substr(hash('sha256', '201956'), 0, 16);
        $output=openssl_encrypt($string, 'AES-256-CBC', $key, 0, $iv);
        $output=base64_encode($output);
        return $output;
    }

    //desencriptar campo
    public static function decryption($string){
        $key=hash('sha256', '$PET@STRAR');
        $iv=substr(hash('sha256', '201956'), 0, 16);
        $output=openssl_decrypt(base64_decode($string), 'AES-256-CBC', $key, 0, $iv);
        return $output;
    }

    //obtenemos un codigo para recuperar contraseña
    function codigoRecuperarPass() {
        $key = 'IS';
        $pattern = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $max = strlen($pattern)-1;
        for($i=0;$i < 8;$i++) $key .= $pattern{mt_rand(0,$max)};

        return $key;
    }
}

?>
