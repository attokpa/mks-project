<?php


$connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

if(isset($_POST['valider'])){ 

   
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $motif = $_POST['motif'];
    if( !isset($date_debut) || !isset($date_fin) || !isset($motif) ) {

        $query = $connection("INSERT INTO absence(date_debut, date_fin, motif) VALUES ('$date_debut', '$date_fin', '$motif')");
        $success = "Bravo vous avez enregistré une presence";

    }
    else{
        $error = "Désolé veuillez recommencer !!! ";
    }
}
?>



?>