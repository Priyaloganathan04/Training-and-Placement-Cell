<?php

session_start();

if(empty($_SESSION['id_admin'])) {
	header("Location: index.php");
	exit();
}


require_once("../db.php");

if(isset($_GET)) {

	//Delete coordinator using id and redirect
	$sql = "UPDATE coordinator SET active='0' WHERE id_coordinator='$_GET[id]'";
	if($conn->query($sql)) {
		header("Location: coordinator.php");
		exit();
	} else {
		echo "Error";
	}
}