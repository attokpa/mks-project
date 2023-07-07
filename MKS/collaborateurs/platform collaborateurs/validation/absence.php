<?php   
    date_default_timezone_set("Africa/Abidjan");
    // session_start();

    if (!$_SESSION['id'] ) {
        header("Location: ../../");
    }

    $id = $_SESSION["id"];
    $msg = "";
    $error ="";
    $date_jour="";
    $heure="";
    

    // On se connecte a la base de données
    $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

    // Je vais faire une requete pour recuperer toutes les presences
    $all_absence = $connection->query("SELECT * FROM absence WHERE Id_utilisateur=$id");

    // Je valide la presence du collaborateur

    if (!empty($_POST['absence'])) {
        // Je recupere la date et l'heure automatiquement
        
        // $heure_arrivee= date("H:i:s");
        $date_jour= date("Y-m-d");

        // "2023-06-15" = "2023-06-15"

        // On verifie s'il a dejà pointé sa presence à la date du jour J
        $today_absence = $connection->query("SELECT * FROM absence WHERE Id_utilisateur=$id AND date_jour='$date_jour' ");
        // $row = $today_presence;
         if ($today_absence->rowCount() < 1){
            // On insère dans les infos  dans la base de données s'il n'a pas encore pointé sa presence
            $req = $connection->query("INSERT INTO absence(date_jour, Id_utilisateur) VALUES ('$date_jour', '$id')");
            $msg="Success";

            Header('Location: tableau_absence.php?success='.$msg);
            Exit();
         }else{
            $error="Desolé Vous avez dejà pointé votre présence !!!";
            Header('Location: tableau_absence.php?error='.$error);
            Exit();
         }

        
        
    }

    



    
?>