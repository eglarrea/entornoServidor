<!DOCTYPE html>

<html lang="es">

    <head>

        <!-------------LAMADA SCRIPTS---------------------->
        <meta charset="utf-8">

        
        <!------------- TITULO DE LA PAGINA ---------------------->
        <title>Tarea Evaluativa DWEC02</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>

    <body>
        
      
        
        <!------------- TITULO DEL APARTADO ---------------------->
        <h1>Tarea Evaluativa DWES02</h1>
        <hr>

        <!---------------EJERCICIO 1 - AÑADIR SOCIOS -->

        <h2>Ejercicio 1 - Añadir Socios</h2>
<?php
include_once('./lib/constComunes.php');
    session_start();
    if (empty($_SESSION[CLAVE_SESSION_ALQUILER])) {
        header("Location:index.php");
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Nombre de Usuario: <?php echo $_SESSION["datosAlquiler"]['nombre'];?></h1>
            <h1>Fecha de devolución:<?php echo date("d/m/Y",strtotime($_SESSION["datosAlquiler"]['libros']['fecha']."+ ".NUMERO__MAXIMO_DIAS."days")); ?></h1>
            <h1>DNI: <?php echo $_SESSION["datosAlquiler"]['dni'];?></h1>
        </div>       
        <div class="col-md-6">
        <img width="50%" src='<?php echo $_SESSION["datosLibro"]["imagen"];?>' alt="MDN" />
        </div>       
    </div>   
</div>   


<a href="index.php" >Ir a reservar</a>
    </body>


</html>