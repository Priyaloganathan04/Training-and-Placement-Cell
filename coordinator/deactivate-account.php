<?php


session_start();

if(empty($_SESSION['id_coordinator'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");

if(isset($_POST)) {
	
	$sql = "UPDATE coordinator SET active='3' WHERE id_coordinator='$_SESSION[id_coordinator]'";

	if($conn->query($sql) == TRUE) {
		header("Location: ../logout.php");
		exit();
	} else {
		echo $conn->error;
	}
} else {
	header("Location: settings.php");
	exit();
}