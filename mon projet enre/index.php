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


        // if( 
        // isset($nom) && isset($prenom) && isset($email) && isset($mot_de_passe) && isset($confirmation_mot_de_passe) ) {

            if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($mot_de_passe) && !empty($confirmer_mot_de_passe)) {
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    if($mot_de_passe === $confirmer_mot_de_passe){

                        $query = $connection->query("INSERT INTO manager(nom, prenom, email, mot_de_passe, confirmer_mot_de_passe) VALUES ('$nom', '$prenom', '$email', '$mot_de_passe' , '$confirmer_mot_de_passe')");
                        // $success = "Bravo vous avez enregistré une presence";
                        header("Location:/mon projet enre/connexion.php");
                    }else{
                        $error = "Mot de passe non identiques !!! ";
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
    <link rel="stylesheet" href="copie.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    
    <title>Document</title>
</head>
<body>
<nav class="navbar">
        <h4>mks soft technologies</h4>
        <div class="profile">
            <!-- <span class="fas fa-search"></span> -->
            <img src="images/1_bg.png" class=" logo">
           
           
        </div>
        
        

    </nav>
<!-- <input type="checkbox" id="toggle">
    <label class="side-toggle"
    for="toggle"><span class="fas fa-bars"></span></label>
    <div class="sidebar"> -->
        <!-- <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="../SOFT/acceil.html" class="ss"> overview</a></p>

            </span> 
             

        </div> -->
        <!-- <div class="sidebar-menu">
            <span class="fas fa-user"></span><p><a href="../SOFT/acceil.php" class="ss">collaborateurs</a></p>
        </div>

       
        <div class="sidebar-menu">
            <span class="fas fa-chart-line"></span><p><a href="#" class="ss">statistiques</a></p>
        </div>
        <div class="sidebar-menu">
            <span class="fas fa-id-card"></span><p><a href="#" class="ss">contact</a></p>
        </div>
        <div class="sidebar-menu">
            <span class="fas fa-cog"></span><p><a href="#" class="ss">parametre</a></p>
        </div> -->

    </div>
  
    <section>
        <!-- <article>
            <h1>RESEARCH</h1><br><br><br>
            <div class="img2"></div><br><br>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.  Qui vero sit tempore? Corrupti sequi autem optio eveniet dolor veritatis.  Eos sunt nihil iste  dignissimos quidem voluptate iure sed sint amet.</p>

    

        </article> -->
        <aside>
        <!-- <div class="button">
            <li class="LI"><a href="index.php"> s'insrire</a></li>
            <li class="LIE"><a href="copie.php">connecter</a></li>
        </div><br><br><br><br>    -->
        <div class="login-box">
            <form method="POST" action="" >
                <p class="CONNECT">inscription</p>
                <div class="input-box">
                    <input type="text" name="nom" >
                    <label> nom</label>
                </div>
                <div class="input-box">
                    <input type="text" name="prenom" >
                    <label>prenom</label>
                </div>
        
        
                <div class="input-box">
                    <input type="text" name="email" >
                    <label>Email</label>
                </div>
        
                    
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="mot_de_passe" >
                    <label>Mot de passe</label>
                </div>
                <div class="input-box">
                   <input type="password" name="confirmer_mot_de_passe" >
                   <label> Confirmer mot de passe</label>
                </div>
                <div class="input-box">
                            <label>PROFESSION :</label>
                            <select name="motif">
                                    <option value="autre">developpeur</option>
                                    <option value="permissions">secretaire</option>
                                    <option value="conges">manager</option>
                                    <option value="maladie">ressources humains</option>
                            </select> 
            
                </div>
    
    
          
    
                <!-- <div class="remember-forgot">
                    <label>je n'ai pas de compte? </label>
                    <a href="copie.html" >creer</a> 
                </div>  -->
    
           
    
          
                <div class="vee">
                    <p><button type="submit" name="valider"> s'inscrire</button></p>
                </div>
            </form>
        </div> 
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