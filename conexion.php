<?php
/*
@author: Jesús Chicano Ramírez
@version: 1.0
@date: 04/09/2014
*/

// función que se conecta a la base de datos
//
function conectaDb(){
	$dbname = 'videoteca';
	$user = 'root';
	$pass = 'jesus';

	try{
		$db = new PDO("mysql:host=localhost;dbname=".$dbname, $user, $pass);
		return($db);
	}catch(PDOException $e){
		echo "No se ha podido conectar a la BD";
	}
}
