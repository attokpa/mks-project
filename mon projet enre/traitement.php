<?php








    $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

    if(isset($_POST['valider'])){ 

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email= $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];
        $confirmer_mot_de_passe = $_POST['confirmer_mot_de_passe'];


        if( !isset($nom) || !isset($prenom) || !isset($email) || !isset($mot_de_passe) || !isset($mot_de_passe) ) {

            $query = $connection("INSERT INTO utilisateur(nom, prenom, email, mot_de_passe, confirmer_mot_de_passe) VALUES ('$nom', '$prenom', '$email', '$mot_de_passe' , '$confirmer_mot_de_passe')");
            $success = "vous avez ete authentifier";

        }
        else{
            $error = "Veillez remplir tout les champs !!! ";
        }
    }


?>