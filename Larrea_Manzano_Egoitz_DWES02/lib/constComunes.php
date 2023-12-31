<?php
/**
 * Libreria donde se declararan las constantes comunes a toda la aplicación
 */
define('ROUTE_PADRE','../');

define('ROUTE_LIB',ROUTE_PADRE.'lib/');
define('ROUTE_VIEWS',ROUTE_PADRE."views/");
define('ROUTE_MODEL',ROUTE_PADRE."model/");
define('ROUTE_CONTROLLER',ROUTE_PADRE."controller/");
/**
 * Constante que define la ruta de acceso al json de libros
 */
define('ROUTE_FILE_DATA_LIBROS', ROUTE_MODEL."files/libros.json");

/**
 * Constante que define la ruta de acceso al json de reservas
 */
define('ROUTE_FILE_DATA_RESERVAS', ROUTE_MODEL."files/reservas.json");

/**
 * Constante que define el estilo de campo invalido
 */
define('ERROR_CLASS_FIELD', "is-invalid");

/**
 * Constante que define el nombre de session para datos alquiler
 */
define('CLAVE_SESSION_ALQUILER', "datosAlquiler");

/**
 * Constante que define el numero maximo de libros que puede reservar un usuario
 */
define('NUMERO_RESERVAS_MAXIMAS_PERMITIDAS', 2);

/**
 * Constante para indicar el número maximo de dias permitodos para tener un libro
 */
define('NUMERO__MAXIMO_DIAS', 10);

/**
 * Constante para indicar las letras para el calculo de los DNI
 */
define('LETRAS_DNI',["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"]);

?>