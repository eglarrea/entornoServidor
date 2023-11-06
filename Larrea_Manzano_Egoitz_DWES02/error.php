<!DOCTYPE html>

<html lang="es">

    <head>

        <!-------------LAMADA SCRIPTS---------------------->
        <meta charset="utf-8">

        
        <!------------- TITULO DE LA PAGINA ---------------------->
        <title>Tarea Evaluativa DWEC02</title>
        <link href="./css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="./css/bootstrap.min.css/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>

    <body>
        
        <!------------- TITULO DEL APARTADO ---------------------->
        <h1>Tarea Evaluativa DWES02</h1>
        <hr>
        <!--------------- Pagina de error generales-->
        <?php session_start();
        if (empty($_SESSION["errorConfiguracion"])) {
            header("Location:index.php");
        }?>
        <!-- Contenedor que alberga el container con el error-->
        <div class="container">
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION["errorConfiguracion"]?>
                <?php unset($_SESSION["errorConfiguracion"]);?>
            </div>
        </div>
    </body>

</html>