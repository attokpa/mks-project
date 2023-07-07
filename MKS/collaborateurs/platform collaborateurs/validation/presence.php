<?php   
    date_default_timezone_set("Africa/Abidjan");
    // session_start();

    if (!$_SESSION['id'] ) {
        header("Location: ../../");
    }

    $id = $_SESSION["id"];
    $nom= $_SESSION['nom'];
    $prenom= $_SESSION['prenom'];

    $msg = "";
    $error ="";
    $date_jour="";
    $heure="";
    

    // On se connecte a la base de données
    $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

    $requete = $connection->query("SELECT * FROM utilisateur WHERE Id='$id' AND nom='$nom' AND prenom='$prenom'");
    if($requete->rowCount() < 1){
        header("Location: ../../");
    }

    // Je vais faire une requete pour recuperer toutes les presences
    $all_presence = $connection->query("SELECT * FROM presence WHERE Id_utilisateur=$id");

    // Je valide la presence du collaborateur

    if (!empty($_POST['presence'])) {
        // Je recupere la date et l'heure automatiquement
        
        $heure_arrivee= date("H:i:s");
        $date_jour= date("Y-m-d");

        // "2023-06-15" = "2023-06-15"

        // On verifie s'il a dejà pointé sa presence à la date du jour J
        $today_presence = $connection->query("SELECT * FROM presence WHERE Id_utilisateur=$id AND date_jour='$date_jour' ");
        // $row = $today_presence;
         if ($today_presence->rowCount() < 1){
            // On insère dans les infos  dans la base de données s'il n'a pas encore pointé sa presence
            $req = $connection->query("INSERT INTO presence(date_jour, heure_arrivee, Id_utilisateur) VALUES ('$date_jour', '$heure_arrivee', '$id')");
            $msg="Bonjour et bienvenue!!!";

            Header('Location: tableau_presence.php?success='.$msg);
            Exit();
         }else{
            $error="Desolé Vous avez dejà pointé votre présence !!!";
            Header('Location: tableau_presence.php?error='.$error);
            Exit();
         }

        
        
    }

    



    
?>