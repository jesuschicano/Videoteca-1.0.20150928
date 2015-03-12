<?php
define('DB_USER', 'root');
define('DB_PASSWORD', 'chiwy');
define('DB_SERVER', 'localhost');
define('DB_NAME', 'videoteca');

if(!$db = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME)){
	die($db->maxdb_connect_errno.' - '.$db->connect_error);
}

$arr = array();//array vacio
if (!empty($_POST['keywords'])) {
	
	$keywords = serialize($_POST['keywords']);
	$keywords = $db->real_escape_string($_POST['keywords']);
	
	$sql = "SELECT * FROM PELICULAS WHERE titulo LIKE '%" . $keywords . "%'";
	$result = $db->query($sql) or die ($mysqli->error);
	if ($result->num_rows > 0) {
		while ($obj = $result->fetch_object()) {
			$arr[] = array('titulo' => $obj->titulo, 'director' => $obj->director, 'year' => $obj->year, 'duracion' => $obj->duracion);
		}
	}
}
echo json_encode($arr);