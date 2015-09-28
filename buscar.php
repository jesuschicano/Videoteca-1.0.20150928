<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Videoteca Hogareña | Búsqueda</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="js/main.js"></script>
        <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>

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
                <form role="form" method="POST">
                    <div>
                        <label for="">Búsqueda por título
                            <input type="text" placeholder="Ej: 'star wars'" id="keyword" name="busqueda-titulo"/>
                        </label>
                    </div>
                    <div>
                        <label for="">Filtrado por géneros
                            <select name="busqueda-genero">
                                <option value="Acción">Acción</option>
                                <option value="Animación">Animación</option>
                                <option value="Aventura">Aventura</option>
                                <option value="Bélica">Bélica</option>
                                <option value="Biografía">Biografía</option>
                                <option value="Cine">Cine negro</option>
                                <option value="Comedia">Comedia</option>
                                <option value="Crimen">Crimen</option>
                                <option value="Documental">Documental</option>
                                <option value="Drama">Drama</option>
                                <option value="Fantasía">Fantasía</option>
                                <option value="Histórica">Histórica</option>
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
                </form>

                <table id="tabla-resultados">
                    <thead>
                        <tr>
                            <th width="300">Título</th>
                            <th width="200">Director</th>
                            <th width="100">Año</th>
                            <th width="100">Duración</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div> <!-- #main -->
        </div> <!-- #main-container -->

        <script type="text/javascript">
        	$(document).ready(function() {
        		$('#keyword').on('input', function() {

        			var searchKeyword = $(this).val();

               data = {"keywords": searchKeyword};

               if (searchKeyword.length >= 1) {
						$.post('busqueda-ajax.php', data, function(data) {
							$('#tabla-resultados tbody').empty();
							$.each(data, function() {
                        $('#tabla-resultados tbody').append('<tr><td>' + this.titulo + '</td><td>' + this.director + '</td><td>' + this.year + '</td><td>' + this.duracion + '</td></tr>');
							});
						}, "json");
					}

        		});
        	});
        </script>
    </body>
</html>
