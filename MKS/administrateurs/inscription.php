<?php

    $success ="";
    $error="";

    $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

    if(isset($_POST['valider'])){ 

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email= $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];
        $confirmer_mot_de_passe = $_POST['confirmer_mot_de_passe'];
        $profession= $_POST['profession'];
        $telephone= $_POST['telephone'];

        // if( 
        // isset($nom) && isset($prenom) && isset($email) && isset($mot_de_passe) && isset($confirmation_mot_de_passe) ) {

            if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($mot_de_passe) && !empty($confirmer_mot_de_passe)  && !empty($profession)  && !empty($telephone)) {
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    // je fais une recherche dans la bdd pour savoir si l'utilisateur existe deja
                    $req = $connection->query("SELECT * FROM MANAGER WHERE email='$email'");
                    $user = $req->fetch();
                    if(!$user){
                        if($mot_de_passe === $confirmer_mot_de_passe){

                            $query = $connection->query("INSERT INTO MANAGER(nom, prenom, email, mot_de_passe, confirmer_mot_de_passe,profession, telephone) VALUES ('$nom', '$prenom', '$email', '$mot_de_passe' , '$confirmer_mot_de_passe' ,' $profession' , '$telephone')");
                            $success = "Bravo vous avez enregistré une presence";
                            header("administrateurs/PagA.php");
                        }else{
                            $error = "Mot de passe non identiques !!! ";
                        }
                    }else{
                        $error= "Cette adresse existe dejà";
                    }
                    
                }else{
                    $error ="Email invalide !!!";
                }
            }else{
                $error = "Veuillez remplir tous les champs!!! ";
            }
        
        // }else{
        //         $error = "veillez remplir tout les champs !!! ";
        //     }
    }

            

        
    


            
?>     

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/INSCRIPTION.CSS">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    
    <title>Document</title>
</head>
<body>
<nav class="navbar">
        <h4>MKS SOFT TECHNOLOGIES 
           
             <div class="mun"><li><a href="administrateurs/ManagersEntreprise.php"> Accueil</a></li></div>
             <div class="mun"><li><a href="../index.php"> deconnexion</a></li></div> 
             <!-- <div class="mun"><li><a href="../MKS/administrateurs/ManagersEntreprise.php"> Retirer un manager</a></li></div>  -->
            
            
        
            
          
            
        </h4>
        <div class="profile">
            <!-- <span class="fas fa-search"></span> -->
            <img src="../assets/images/1_bg.png" class=" logo">
            
           
        </div>
        
        

    </nav>

        <form method="POST" action="" >
                <h2>INSCRIRE MANAGERS</h2>
                <div class="input-box">
        
                    <label>NOM     :</label>
                    <input type="text"  name="nom" placeholder="Entrez votre nom">
        
        

                </div>
        
                    
                <div class="input-box">

                <label>PRENOM     :</label>
                <input type="text"  name="prenom" >
                </div>


                  <div class="input-box">
                <label>TELEPHONE:</label>
                <input type="phone"  name="telephone" >
            
                </div>  
                <div class="input-box">
                    <label>PROFESSION :</label>
                    <select name="profession">
                        <?php
                        $req=$connection->query("SELECT nom FROM profession;");
                        $professions=$req->fetchAll();
                        echo $professions;
                        foreach($professions as $profession){
                        ?>
                        <option value="<?php print_r($profession['nom']); ?>"><?php print_r($profession['nom']); ?></option>
                        <?php   
                        }
                        ?>
                    </select> 
                </div>

        
                <div class="input-box">
                    <label>EMAIL :</label>
                    <input type="text"  name="email" >
            
                </div>


                <div class="input-box">
                    <label>MOT DE PASS :</label>
                    <input type="password" name="mot_de_passe" >
        
                </div>


                <div class="input-box">
                    <label>CONFIRMER MOT DE PASS  :</label>
                    <input type="password"  name="confirmer_mot_de_passe" >
                    
            
                </div> 

        

              
                <div class="button">
                    <button type="submit" name="valider">S'INSCRIRE</button>
                
                </div>
    </form>
        <div class="success" style="width:430px;background-color:lightgreen;color:white;text-align:center; ">
            <p style="color:black"> 
                <?php if ($success) {
                    echo $success;
                }  ?>  
            </p>
        </div>

        <div class="error" style="width:430px;background-color:#efa2a2;color:white;text-align:center">
            <p style="color:black"> 
                <?php if ($error) {
                    echo $error;
                }  ?>  
            </p>
        </div>
        
           
            </aside>
            </section>
        
    
</body>
</html>