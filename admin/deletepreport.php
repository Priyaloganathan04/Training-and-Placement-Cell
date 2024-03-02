<?php

session_start();

if (empty($_SESSION['id_admin'])) {
    header("Location: index.php");
    exit();
}


require_once("../db.php");
if (isset($_GET)) {

    //Delete report using id and redirect
    $sql = "DELETE FROM preport WHERE regno ='$_GET[regno]'";
    if ($conn->query($sql)) {
        header("Location: placed.php");
        exit();
    } else {
        echo "Error";
    }
}
?>
