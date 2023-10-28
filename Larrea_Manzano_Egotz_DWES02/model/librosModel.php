<?php
/**
 * El acceso a esta fichero se realiza mediante el func comunes
 * 
 */
$libros=obtenerFicheroJson(ROUTE_FILE_DATA_LIBROS);

/**
 * Funcion que retorna todos los listros del fichero json
 */
function getAllLibros(){
    global $libros;
    return $libros;
}

/**
 * Funcion que los tr para pintar la tabla con todos los libros
 */
function getLibrosTableRows(){
    $libros= getAllLibros();
    foreach ($libros as $valor) {
        $classe='';
        if($valor["numejemplares"]-$valor["numejemplaresPrestados"]<=0){
            $classe='class="table-danger"';
        }
        echo "<tr $classe>"."<td>". $valor["isbn"]."</td>"."<td>". $valor["titulo"]."</td>"."<td>". $valor["autor"]."</td>"."<td>". $valor["numejemplares"]."</td>"."<td>". $valor["numejemplaresPrestados"]."</td>"."<td>".$valor["numejemplares"]-$valor["numejemplaresPrestados"]."</td>"."</tr>";
        
    }
}

/**
 * Funcion que busca un libro segun el isbn pasado
 */
function findLibroByISBN($srtFind){
    $libros= getAllLibros();
    $found_key = array_search($srtFind, array_column($libros, 'isbn'));
    if(gettype($found_key)=='integer'){
        return $libros[$found_key];
    }
    return false;
}

/**
 * Funcion que busca si un libro esta disponible para reservar
 */
function findLibroDisponibleByISBN($srtFind){
    $libros=findLibroByISBN($srtFind);
    if(gettype($libros)=='boolean'){
        return false;
    }else{
       if($libros['numejemplares']-$libros['numejemplaresPrestados']<=0){
        return false;
       }else{
        return true;
       } 
    }
}

/**
 * Funcion para añadir una reserva del libro en los libros de la biblioteca. 
 */
function reservarLibroByISBN($srtFind){
    global $libros;
    $libroReserva=findLibroByISBN($srtFind);
    if(gettype($libros)=='boolean'){
        return false;
    }else{
        if($libroReserva['numejemplares']-$libroReserva['numejemplaresPrestados']<=0){
            return false;
        }else{
            $found_key = array_search($srtFind, array_column($libros, 'isbn'));
            if(gettype($found_key)=='integer'){
                $libros[$found_key]['numejemplaresPrestados']+= 1;
                guardarFicheroJson($libros, ROUTE_FILE_DATA_LIBROS);
                return true;
            }
       } 
    }
}

?>


