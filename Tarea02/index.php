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
        
        <?php  include_once 'controller/validateForm.php'?>
        
        <!------------- TITULO DEL APARTADO ---------------------->
        <h1>Tarea Evaluativa DWES02</h1>
        <hr>

        <!---------------EJERCICIO 1 - AÑADIR SOCIOS -->

        <h2>Ejercicio 1 - Añadir Socios</h2>

        <!-- Contenedor que alberga el formulario de introduccion de datos-->
        <div class="container">
            <?php  if($arrayErrorGene!=''){ ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo $arrayErrorGene ?>
                </div>
            <?php } ?>
            <form id="formNombre" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="col-md-4">
                    <label for="fnombre">Nombre:</label>
                    <input class="form-control <?php echo $arrayErrClass['nombreErrClass'];?>" type="text" id="fnombre" name="nombre" value="<?php echo $arrayFormulario['nombre']?>">
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">                   
                        <?php echo $arrayMensPerson['nombre']?>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="fnombre">Apellidos:</label>
                    <input class="form-control <?php echo  $arrayErrClass['apellidoErrClass'];?>" type="text" id="fapellido" name="apellido" value="<?php echo $arrayFormulario['apellido']?>">
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        <?php echo $arrayMensPerson['apellido']?>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="flibro">Libro:</label>
                    <input class="form-control <?php echo  $arrayErrClass['libroErrClass'];?>" type="text" placeholder="Introducir isbn" maxlength="13" id="flibro" name="libros.isbn" value="<?php echo $arrayFormulario['libros']['isbn']?>"><span><a href="librosBiblioteca.php" target="_Blank" title="Ver libron biblioteca en nueva ventana">Ver libros biblioteca</a></span>
                    <div  class="invalid-feedback">
                        <?php echo $arrayMensPerson['libro']?>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="fmail">Email:</label>
                    <input class="form-control <?php echo  $arrayErrClass['mailErrClass'];?>" type="text" id="fmail" name="mail" value="<?php echo $arrayFormulario['mail']?>">
                    <div  class="invalid-feedback">
                        <?php echo $arrayMensPerson['mail']?>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="ffecha">Fecha Alquiler:</label>
                    <input class="form-control <?php echo  $arrayErrClass['fechaErrClass'];?>" type="date" id="ffecha" name="libros.fecha" value="<?php echo $arrayFormulario['libros']['fecha']?>">
                    <div  class="invalid-feedback">
                        <?php echo $arrayMensPerson['fecha']?>
                    </div>
                </div>
                    
                <div class="col-md-4">
                    <label for="fdni">DNI:</label>
                    <input class="form-control <?php echo  $arrayErrClass['dniErrClass'];?>" maxlength="9" type="text" id="fdni" name="dni" value="<?php echo $arrayFormulario['dni']?>">
                    <div  class="invalid-feedback">
                        <?php echo $arrayMensPerson['dni']?>
                    </div>
                </div>    
                <div class="col-md-4 mt-3"> 
                    <input type="submit" class="btn btn-outline-primary" id="butAniadirSocio" value="Enviar" name="commentData">
                </div>
            </form>
        </div> 
        <hr>
    </body>

</html>