<?php
	include("conexion.php");
	$base=getPDO();

	$id=$_GET["id"];
	$base->query("DELETE FROM cursos WHERE idCurso='$id'");
	header("Location:cursos.php");

?>