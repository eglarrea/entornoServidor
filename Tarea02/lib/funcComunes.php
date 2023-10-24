<?php
include_once("./lib/constComunes.php");

/**
 * Funcion leer un fichero de una ruta y descodificar el fichero json
 */
function obtenerFicheroJson($rutaFichero){
    try {
        if (!file_exists($rutaFichero))
        {
           throw new Exception("No existe el fichero:".$rutaFichero);
        }else{
            $data = file_get_contents($rutaFichero);
            $datosJson = json_decode($data, true);
            return $datosJson;
        }     
    } catch (Exception $e) {
        session_start();
        $_SESSION["errorConfiguracion"] = $e->getMessage();
        header("Location:error.php");
    }
}

/**
 * Funcion leer un fichero de una ruta y descodificar el fichero json
 */
function guardarFicheroJson($strDatosJson, $rutaFichero){
    $json_string = json_encode($strDatosJson);
    file_put_contents($rutaFichero, $json_string);
}


/**
 * Funcion para pasar el valor a la estrucutra de datos del formulario
 * para poder presentarlos por pantalla
 *  */  
function anadirValorACampoFormulario($campo,$strValor){
    global  $arrayFormulario  ;
    $campos=explode(".",$campo,2);
    if(count($campos)==2){
      $arrayFormulario[$campos[0]][$campos[1]]=trim($strValor);
    }else{
      $arrayFormulario[$campo]=trim($strValor);
    }
  }

/**
 * Funcion para validar un DNI.Si la letra no es la correcta retorna el numero con la letra correcta
 */
function is_valid_dni($str){
    if (null!=$str && trim($str)!=''){
        if(strlen($str)==9){
            $letra=substr($str,-1);
            $numeros=(int) substr($str,0,-1);
            if(strlen($numeros)==8){
                $resto=$numeros % 23;
                return $numeros.LETRAS_DNI[$resto];
            }else{
                return false;
            }
        }
        return false;
    }
    return false;
}

/**
 * Funcion para comprobar si es texto pasado es un mail
 */  
function is_valid_email($str)
{
  return (false !== filter_var($str, FILTER_VALIDATE_EMAIL));
}


include("./model/librosModel.php");
include("./model/reservasModel.php");

?>