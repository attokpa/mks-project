



<?php


    $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

    if(isset($_POST['valider'])){ 

        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];
        $type_absence = $_POST['type_absence'];
        $description = $_POST['descriptions'];

        if( !isset($date_debut) || !isset($date_fin) || !isset($type_absence) || !isset($descriptions) ) {

            $query = $connection("INSERT INTO  demande_permission(date_debut, date_fin, type_absence, descriptions) VALUES ('$date_debut', '$date_fin', '$type_absence', '$descriptions')");
            $success = "Bravo vous avez enregistré une presence";

        }
        else{
            $error = "Désolé veuillez recommencer !!! ";
        }
    }
?>
