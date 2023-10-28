<?php
include(ROUTE_LIB.'funcComunes.php');

$arrayErrorGene ="";

$arrayFormulario = array(
  "nombre" => '',
  "apellido" => '',
  "libros" =>array("isbn"=>'',"fecha"=>''),
  "mail" => '',
  "fecha" => '',
  "dni" => '',
);

$arrayErrClass = array(
  "nombreErrClass" => '',
  "apellidoErrClass" => '',
  "libroErrClass" => '',
  "mailErrClass" => '',
  "fechaErrClass" => '',
  "dniErrClass" => '',
);

$arrayMensPerson = array(
  "nombre" => "",
  "apellido" => "",
  "libro" => "",
  "mail" => "",
  "fecha" => "",
  "dni" => "",
);

$arrayTextosError = array(
  "nombre" => "El nombre es obligatorio",
  "apellido" => "El apellido es obligatorio",
  "libro" => "Libro es obligatorio",
  "mail" => "Mail es obligatorio",
  "mailFormato" => "El mail introducido no es correcto",
  "fecha" => "Fecha de alquiler es obligatorio",
  "fechaSuperior" => "Fecha de alquiler tiene que ser igual o superior a la actual",
  "dni" => "DNI es obligatorio",
  "dniformato" => "El formato del dni no es correcto",
  "libroNoExiste"=>"El libro buscado no exite en la biblioteca",
  "libroNoDevuelto"=>"Tienes libro/s que no has devuelto en fecha",
  "libroReservado"=>"Ya tienes ese libro reservado",
  "reservasMaximas"=>"Ya has reservado el número máximo de libros permitidos",
  "todosReservado"=>"El libro no esta disponible en la biblioteca en estos momentos"
);

/**
 * Valida el formulario y si hay errores añade los errores
 */
function validarFormulario() {
  global $arrayErrClass;
  global $arrayMensPerson;
  global $arrayTextosError;
  global $arrayErrorGene;
  
  if (empty($_POST["nombre"]) || trim($_POST["nombre"])==''){
    $arrayErrClass['nombreErrClass']=ERROR_CLASS_FIELD;
    $arrayMensPerson['nombre']=$arrayTextosError['nombre'];
  } else {
    anadirValorACampoFormulario("nombre",$_POST["nombre"]);
  }
  
  if (empty($_POST["apellido"]) || trim($_POST["apellido"])==''){
    $arrayErrClass['apellidoErrClass']=ERROR_CLASS_FIELD;
    $arrayMensPerson['apellido']=$arrayTextosError['apellido'];
  } else {
    anadirValorACampoFormulario("apellido",$_POST["apellido"]);
  }

  if (empty($_POST["libros_isbn"]) || trim($_POST["libros_isbn"])==''){
    $arrayErrClass['libroErrClass']=ERROR_CLASS_FIELD;
    $arrayMensPerson['libro']=$arrayTextosError['libro'];
  } else {
    anadirValorACampoFormulario("libros.isbn",$_POST["libros_isbn"]);
  }

  if (empty($_POST["mail"]) || trim($_POST["mail"])==''){
    $arrayErrClass['mailErrClass']=ERROR_CLASS_FIELD;
    $arrayMensPerson['mail']=$arrayTextosError['mail'];
  } else {
    anadirValorACampoFormulario("mail",$_POST["mail"]);
    if(!is_valid_email(trim($_POST["mail"]))){
      $arrayErrClass['mailErrClass']=ERROR_CLASS_FIELD;          
      $arrayMensPerson['mail']=$arrayTextosError['mailFormato'];
    }
  }

  if (empty($_POST["libros_fecha"])) {
    $arrayErrClass['fechaErrClass']=ERROR_CLASS_FIELD;
    $arrayMensPerson['fecha']=$arrayTextosError['fecha'];
  } else {
    $hoy = date("Ymd"); 
    $time_input = strtotime($_POST["libros_fecha"]);  
    anadirValorACampoFormulario("libros.fecha",$_POST["libros_fecha"]);
    if($hoy>date('Ymd ',$time_input)){
      $arrayErrClass['fechaErrClass']=ERROR_CLASS_FIELD;
      $arrayMensPerson['fecha']=$arrayTextosError['fechaSuperior'];
    }
  }
  
  if (empty($_POST["dni"])) {
    $arrayErrClass['dniErrClass']=ERROR_CLASS_FIELD;
    $arrayMensPerson['dni']=$arrayTextosError['dni'];
  } else {
    $dniVerificado=is_valid_dni(strtoupper(trim($_POST["dni"])));
    anadirValorACampoFormulario("dni",strtoupper($_POST["dni"]));
    if($dniVerificado==false){
      $arrayErrClass['dniErrClass']=ERROR_CLASS_FIELD;
      $arrayMensPerson['dni']=$arrayTextosError['dniformato'];
    }else{
      anadirValorACampoFormulario("dni",$dniVerificado);
    }
  }
}

/**
 * Función comprobar si hay algún error en el formulario
 *  */  
function hayErroresEnFormulario(){
    global  $arrayMensPerson;

    $sw_error=FALSE;

    foreach ($arrayMensPerson as $error) {
      if($error!=''){
        $sw_error=TRUE;
        break; 
      }  
    }
  return  $sw_error;
}

// Proceso que se ejecuta si se ha enviado un post desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  session_start();
  unset($_SESSION[CLAVE_SESSION_ALQUILER]);
  validarFormulario();

  if(hayErroresEnFormulario()==FALSE){

    $existeLibro=findLibroByISBN($arrayFormulario['libros']['isbn']);

    if(gettype($existeLibro)=="boolean"){
      $arrayErrorGene=$arrayTextosError['libroNoExiste'];
    }else{
      if(findLibroDisponibleByISBN($arrayFormulario['libros']['isbn'])!=false){
        $existeUsuario=getUsuarioByDNI($arrayFormulario['dni']);
        if(gettype($existeUsuario)=="boolean"){
          guardarReservar($arrayFormulario);
          $_SESSION[CLAVE_SESSION_ALQUILER] = $arrayFormulario;
          $_SESSION["datosLibro"] =  $existeLibro;              
                header("Location:libroAlquilado.php");
        }else{
          $numeroReservas=getUsuarioCantidadReservas($arrayFormulario['dni']);
          if($numeroReservas==true){
            if(isUsuarioLibroSuperaFechaDevolucion($arrayFormulario['dni'])){
              $arrayErrorGene=$arrayTextosError['libroNoDevuelto'];
            }else{
              if(!getUsuarioTieneEseLibro($arrayFormulario['dni'],$arrayFormulario['libros']['isbn'])){
                guardarReservar($arrayFormulario);
                $_SESSION[CLAVE_SESSION_ALQUILER] = $arrayFormulario;
                $_SESSION["datosLibro"] =  $existeLibro;              
                header("Location:libroAlquilado.php");
              }else{
                $arrayErrorGene=$arrayTextosError['libroReservado'];
              }
            }
          }else{
            $arrayErrorGene=$arrayTextosError['reservasMaximas'];
          }
        }
    }else{
      $arrayErrorGene=$arrayTextosError['todosReservado'];
    }
  }
 }
}
?>