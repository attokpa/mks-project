<?php 
session_start();
  

  $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

  if(isset($_POST['valider'])){ 

    $nom = $_POST['nom'];
    if (!empty($nom) ){
    
        $connection->query("INSERT INTO profession(nom) VALUES ('$nom')");
        $_SESSION['msg'] = "Bravo vous avez ajouté une profession";
        $_SESSION['code'] = 1;
    
    } else {
        $_SESSION['code'] = 0;
        $_SESSION['msg'] = "Ooooops ! Vous avez oublié de renseigner la profession";
    }

    header("Location: ../../MKS/administrateurs/ajouter_professionPourAdministrateur.php");

}

?>