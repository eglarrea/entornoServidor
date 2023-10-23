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

        <h2>Listado libros de la biblioteca</h2>
        <?php include_once './lib/funcComunes.php' ?>
        
        <!-- Contenedor que alberga el formulario de introduccion de datos-->
        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ISBN</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Nº Libros Biblioteca </th>
                        <th scope="col">Reservados </th>
                        <th scope="col">Disponibles </th>
                    </tr>
                </thead>
                <tbody>
                    <?php getLibrosTableRows(); ?>
                </tbody>
            </table>
        </div>
        <hr>
    </body>
</html>