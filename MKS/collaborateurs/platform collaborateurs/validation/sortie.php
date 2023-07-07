<?php   

    session_start();

    if (!$_SESSION['id']) {
        header("Location: ../../");
    }

     $id = $_SESSION["id"];
     $id_presence = $_GET['id'];

    $msg ="";
    $error="";
    $heure_sortie="";

    $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", "");

    // Je recupère l'heure actuelle de sortie
    $heure_sortie= date("H:i:s");
    $date_jour= date("Y-m-d");
    
    // Je verifie s'il a dejà pointé son absence

     
    // $today_absence = $connection->query("SELECT * FROM presence WHERE Id_utilisateur=$id AND date_jour='$date_jour' AND heure_sortie is NOT NULL");

    $today_presence = $connection->query("SELECT * FROM presence WHERE Id_utilisateur=$id AND date_jour='$date_jour' AND id='$id_presence'");

    if ($today_presence->rowCount() > 0){

        // On verifie maintenant s'il a dejà pointé son absence pour le jour J
        $today_absence = $connection->query("SELECT * FROM presence WHERE Id_utilisateur=$id AND date_jour='$date_jour' AND heure_sortie is NOT NULL");


        if($today_absence->rowCount() < 1){
            // On insère son heure de sortie  dans la base de données s'il n'a pas encore pointé sa sortie
            $req = $connection->query("UPDATE presence SET heure_sortie='$heure_sortie' WHERE Id='$id_presence'");
            $msg="Au revoir à Demain";

            Header('Location: ../tableau_presence.php?success='.$msg);
            Exit();
        }else{
            $error="Desolé Vous avez dejà pointé votre sortie !!!";
            Header('Location: ../tableau_presence.php?error='.$error);
            Exit();
        }
        
    }else{
        $error="Desolé Vous ne pouvez pas pointé votre sortie !!!";
        Header('Location: ../tableau_presence.php?error='.$error);
        Exit();
    }

?>

    
       
        
        