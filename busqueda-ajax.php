<?php
include 'conexion.php';

$db = conectaDb();

$arr = array();//array vacio
if (!empty($_POST['keywords'])) {

	$keywords = serialize($_POST['keywords']);
	//$keywords = $db->real_escape_string($_POST['keywords']);

	$sql = "SELECT * FROM PELICULAS WHERE titulo LIKE '%" . $keywords . "%'";
	$result = $db->query($sql) or die ($mysqli->error);
	if ($result->rowCount() > 0) {
		while ($obj = $result->fetch_object()) {
			$arr[] = array('titulo' => $obj->titulo, 'director' => $obj->director, 'year' => $obj->year, 'duracion' => $obj->duracion);
		}
	}
}
echo json_encode($arr);
