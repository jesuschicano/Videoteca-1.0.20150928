<?php
include 'conexion.php';

//al pulsar en el botón
if(isset($_POST["action"])){
	$db=conectaDb();

	$consulta = 'SELECT * FROM PELICULAS ORDER BY RAND() LIMIT 1';

	foreach($db->query($consulta) as $row){
    	echo "La película que te ha tocado es: ".$row["titulo"]; 
	}

	$db=null;
}