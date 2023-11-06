<!DOCTYPE html>
<!--Tarea Evaluativa DWES02-->
<!--Autor: Egoitz Larrea -->
<html lang="es">

  <head>
      <!-------------LAMADA SCRIPTS---------------------->
      <meta charset="utf-8">
        <!------------- TITULO DE LA PAGINA ---------------------->
        <title>Tarea Evaluativa DWEC02</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="../css/bootstrap.min.css/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </head>

  <body>
        
    <!------------- TITULO DEL APARTADO ---------------------->
    <h1>Tarea Evaluativa DWES02</h1>
    <hr>

    <?php
    include_once('../lib/constComunes.php');
        session_start();
        if (empty($_SESSION[CLAVE_SESSION_ALQUILER])) {
            header("Location:".ROUTE_PADRE."index.php");
        }
    ?>
    <div class="container">
      <h2>Datos de la reserva realizada</h2>
      <div class="card mb-3" style="width: 50rem;">
        <div class="row g-0">
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Tarjeta de reserva</h5>
              <p class="card-text fw-bold">DNI:<span class="fw-normal ms-2"><?php echo $_SESSION["datosAlquiler"]['dni'];?></span></p>
              <p class="card-text fw-bold">Nombre:<span class="fw-normal ms-2"><?php echo $_SESSION["datosAlquiler"]['nombre'];?></span></p>
              <p class="card-text fw-bold">Fecha devolución:<span class="fw-normal ms-2"><?php echo date("d/m/Y",strtotime($_SESSION["datosAlquiler"]['libros']['fecha']."+ ".NUMERO__MAXIMO_DIAS."days")); ?></span></p>
              <a href="../index.php" class="btn btn-primary">Ir a reservar</a>
            </div>
          </div>
          <div class="col-md-4">
            <img src="<?php echo  ROUTE_PADRE.$_SESSION["datosLibro"]["imagen"];?>" class="img-fluid rounded-start" alt="...">
          </div>
        </div>
      </div> 
    </div> 
  </body>
</html>