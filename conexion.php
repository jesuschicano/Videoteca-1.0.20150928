<?php
/*
@author: Jesús Chicano Ramírez
@version: 1.0
@date: 04/09/2014
*/

// función que se conecta a la base de datos
//
function conectaDb(){
	$host = 'localhost';
	$dbname = 'videoteca';
	$user = 'root';
	$pass = 'root';

	try{
		$db = new PDO("mysql:host=".$host.";dbname=".$dbname.";charset=utf8", $user, $pass);
		return($db);
	}catch(PDOException $e){
		echo "No se ha podido conectar a la BD";
	}
}
