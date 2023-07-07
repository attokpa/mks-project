<?php 

    session_start();

    if (!$_SESSION['id']) {
        header("Location: ../../");
    }

    $bdd = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", "");  

    $id_manager = $_GET['id'];

    $q = $bdd->query("DELETE FROM manager WHERE id=$id_manager");
    $_SESSION['delete_success'] = "Votre permission a été supprimée avec succès";
     header("Location:../../administrateurs/ManagersEntreprise.php");