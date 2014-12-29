<?php
include 'conexion.php';
/*
* a partir de aqui gestion
*/

// Al pulsar añadir
//
if(isset($_POST["btn-add"])){
    //recoger valores
    $titulo = $_POST["add-titulo"];
    $year = $_POST["add-year"];
    $duracion = $_POST["add-duracion"];
    $director = $_POST["add-director"];
    $genero = $_POST["add-genero"];

    //conexión a la bd
    $db = conectaDb();
    //recoger el género que es
    $consulta = 'SELECT id_genero FROM GENEROS WHERE genero="'.$genero.'"';
    $result = $db->query($consulta);

    // al devolver alguna linea
    //
    if($result->rowcount()==1){
        foreach ($result as $value) {
            $nuevoIdGenero = $value["id_genero"];
        }
        // procedimiento a insertar en la BD
        //
        $consulta2 = 'INSERT INTO PELICULAS(id_pelicula,titulo,year,duracion,director,id_genero) VALUES(NULL,:cTitulo,:cYear,:cDuracion,:cDirector,'.$nuevoIdGenero.')';
        $result2 = $db->prepare($consulta2);
        $result2->execute(array(":cTitulo"=>$titulo,":cYear"=>$year,":cDuracion"=>$duracion,":cDirector"=>$director));

        // mostrar resultados
        //
        if($result2->rowCount()==1)
            echo "<script>alert('Se ha insertado la película correctamente')</script>";
        else
            echo "<script>alert('No se ha podido insertar la película')</script>";
    }

    $db = null;
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Videoteca Hogareña | Añadir</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title">Videoteca Hogareña</h1>
                <nav>
                    <ul>
                        <li><a href="buscar.php">Buscar</a></li>
                        <li><a href="add.php">Añadir</a></li>
                        <li><a href="quever.php">Qué ver</a></li>
                    </ul>
                </nav>
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">

                <form action="" method="POST" name="f-add">
                    <div>
                        <label for="">Título
                            <input type="text" placeholder="Ej: 'star wars'" name="add-titulo" required/>
                        </label>
                    </div>
                    <div>
                        <label for="">Año (1900-2500)
                            <input type="number" maxlength="4" min="1900" max="2500" name="add-year" required/>
                        </label>
                    </div>
                    <div>
                        <label for="">Duración (1-999)
                            <input type="number" maxlength="3" min="1" max="999" placeholder="minutos" name="add-duracion" required/>
                        </label>
                    </div>
                    <div>
                        <label for="">Director
                            <input type="text" placeholder="Ej: Akira Kurosawa" name="add-director" required/>
                        </label>
                    </div>
                    <div>
                        <label for="">Filtrado por géneros
                            <select name="add-genero">
                                <option value="Accion">Acción</option>
                                <option value="Animacion">Animación</option>
                                <option value="Aventura">Aventura</option>
                                <option value="Belica">Bélica</option>
                                <option value="Biografia">Biografía</option>
                                <option value="Cine">Cine negro</option>
                                <option value="Comedia">Comedia</option>
                                <option value="Crimen">Crimen</option>
                                <option value="Documental">Documental</option>
                                <option value="Drama">Drama</option>
                                <option value="Fantasia">Fantasía</option>
                                <option value="Historica">Histórica</option>
                                <option value="Horror">Horror</option>
                                <option value="Misterio">Misterio</option>
                                <option value="Musical">Musical</option>
                                <option value="Romance">Romance</option>
                                <option value="Sci-Fi">Sci-Fi</option>
                                <option value="Thriller">Thriller</option>
                                <option value="Western">Western</option>
                            </select>
                        </label>
                    </div>
                    <div>
                        <input type="submit" value="Agregar" name="btn-add" />
                    </div>
                </form>

            </div> <!-- #main -->
        </div> <!-- #main-container -->


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
