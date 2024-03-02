<?php

session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}

require_once("../db.php");

if(isset($_GET)) {

	$sql = "DELETE FROM activities WHERE sno='$_GET[sno]'";
	if($conn->query($sql)) {
		$sql1 = "DELETE FROM activities WHERE sno='$_GET[sno]'";
		if($conn->query($sql1)) {
		}
		header("Location: activityview.php");
		exit();
	} else {
		echo "Error";
	}
}