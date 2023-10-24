<?php
/**
 * Libreria donde se declararan las constantes comunes a toda la aplicación
 */

/**
 * Constante que define la ruta de acceso al json de libros
 */
define('ROUTE_FILE_DATA_LIBROS', "./model/files/libros.json");

/**
 * Constante que define la ruta de acceso al json de reservas
 */
define('ROUTE_FILE_DATA_RESERVAS', "./model/files/reservas.json");

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