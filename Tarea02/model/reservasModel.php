<?php

$reservas=obtenerFicheroJson(ROUTE_FILE_DATA_RESERVAS);
/*$data = file_get_contents("./model/reservas.json");
$reservas = json_decode($data, true);*/

/**
 * Funcion que retorna todos los listros del fichero json
 */
function getAllReservas(){
    global $reservas;
    return $reservas;
}


function getUsuarioByDNI($strDni){
    $reservas= getAllReservas();
    $found_key=array_search($strDni,array_column($reservas,"dni"));
    if(gettype($found_key)=="integer"){
        return $reservas[$found_key];
    }
    return false;
}
function gePosiciontUsuarioByDNI($strDni){
    $reservas= getAllReservas();
    $found_key=array_search($strDni,array_column($reservas,"dni"));
    if(gettype($found_key)=="integer"){
        return $found_key;
    }
    return false;
}

function getUsuarioCantidadReservas($strDni){
    $usuario = getUsuarioByDNI($strDni);
            
    if(gettype($usuario)=='array'){
        if(count($usuario["libros"])>=NUMERO_RESERVAS_MAXIMAS_PERMITIDAS){
            return false;
        }else{
            return true;
        }

    }   
    return false;
}

function getUsuarioTieneEseLibro($strDni,$strISBN){
    $usuario = getUsuarioByDNI($strDni);
    if(gettype($usuario)=='array'){
        $found_key=array_search($strISBN,array_column($usuario['libros'],"isbn"));  
        if(gettype($found_key)=='integer'){
            return true;
        }else{
            return false;
        }
    }   
    return false;
}

function isUsuarioLibroSuperaFechaDevolucion($strDni){
    $usuario = getUsuarioByDNI($strDni);
    if(gettype($usuario)=='array'){
        if(count($usuario["libros"])>0){
            foreach ($usuario["libros"] as $libro){
                $fechaRetorno=date("Ymd",strtotime($libro['fecha']."+ ".NUMERO__MAXIMO_DIAS."days"));
                $fecha_actual = date("Ymd");
                if($fechaRetorno<$fecha_actual){
                    return true;
                }
                
            }
        }
        return false;
    } 
}


function guardarReservar($datosFormulario){
    global $libros;
    global $reservas;
    $libroReserva=findLibroByISBN($datosFormulario['libros']['isbn']);
    if(gettype($libros)=='boolean'){
        return false;
    }else{
        if(reservarLibroByISBN($datosFormulario['libros']['isbn'])){
            $found_key = gePosiciontUsuarioByDNI($datosFormulario['dni']);
            if(gettype($found_key)=='integer'){
              array_push($reservas[$found_key]['libros'], array("isbn"=>$datosFormulario['libros']['isbn'], "fecha"=>$datosFormulario['libros']['fecha']));
            }else{
               $myarray[] = array("isbn"=>$datosFormulario['libros']['isbn'], "fecha"=>$datosFormulario['libros']['fecha']);
               array_push($reservas,array('dni'=>$datosFormulario['dni'],'nombre'=>$datosFormulario['nombre'],'apellido'=>$datosFormulario['apellido'],'email'=>$datosFormulario['mail'],'libros'=> $myarray));
            }
            guardarFicheroJson($reservas, ROUTE_FILE_DATA_RESERVAS);
        }
    }
}

//isUsuarioLibroSuperaFechaDevolucion('11111111h');
/*getUsuarioTieneEseLibro('11111111H','9788401032004');
$a="";*/
?>


