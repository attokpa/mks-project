<?php 

    session_start();

    if (!$_SESSION['id']) {
        header("Location: ../../");
    }

    $bdd = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", "");  

    $id_utilisateur = $_GET['id'];

    $q = $bdd->query("DELETE FROM utilisateur WHERE Id=$id_utilisateur");
    $_SESSION['delete_success'] = "Votre permission a été supprimée avec succès";
     header("Location:T_listecollaborateurs.php");