



<?php


    $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

    if(isset($_POST['valider'])){ 

        $date_jour = $_POST['date_jour'];
        $heure_arrivee = $_POST['heure_arrivee'];
        $heure_sortie = $_POST['heure_sortie'];
        $profession = $_POST['profession'];

        if( !isset($heure_arrivee) || !isset($heure_sortie) || !isset($date_jour) || !isset($profession) ) {

            $query = $connection("INSERT INTO presence(date_jour, heure_arrivee, heure_sortie, profession) VALUES ('$date_jour', '$heure_arrivee', '$heure_sortie', '$profession')");
            $success = "Bravo vous avez enregistré une presence";

        }
        else{
            $error = "Désolé veuillez recommencer !!! ";
        }
    }
?>
