<?php


    session_start();

    if (!$_SESSION['id']) {
        header("Location: ../../");
    }

    $id = $_SESSION["id"];

    $id_demande = $_GET['id'];


   // On se connecte a la base de données
   $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

   $q=$connection->query("UPDATE demande_permission SET status_demande='refusé' WHERE id='$id_demande'");

   header("Location: T_PermissionAdmin.php");
?>
