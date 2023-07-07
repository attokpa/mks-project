<?php


    session_start();
   

    $success ="";
    $error="";

    $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", "");


    if (isset($_POST['valider'])) {
    
    // Je recupere les valeurs de mes champs
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // Je verifie si mes champs sont vides
    if (!empty($email) && !empty($mot_de_passe)) {
        // Je verifie si le mail est valide
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Je verifie si l'adresse mail existe dans ma base de donnée
            $user = $connection->query("SELECT * FROM utilisateur WHERE email='$email' AND mot_de_passe='$mot_de_passe'");
            
            if ($user->rowCount() > 0) {
                $users = $user->fetch();
                $_SESSION['id'] = $users['Id'];
                $_SESSION['nom'] = $users['nom'];
                $_SESSION['prenom'] = $users['prenom'];
                $_SESSION['email'] = $users['email'];

                $success = "Super";
                header("Location: ../platform collaborateurs/tableau_presence.php ");
            } else {
                $manager = $connection->query("SELECT * FROM manager WHERE email='$email' AND mot_de_passe='$mot_de_passe'");
                if ($manager->rowCount() > 0) {
                    $managers = $manager->fetch();
                    $_SESSION['id'] = $managers['id'];
                    $_SESSION['nom'] = $managers['nom'];
                    $_SESSION['prenom'] = $managers['prenom'];
                    $_SESSION['email'] = $managers['email'];
    
                    $success = "Super";
                    header("Location: ../../managers/pageM.php ");
                } else {
                    $administrateur = $connection->query("SELECT * FROM administrateur WHERE email='$email' AND mot_de_passe='$mot_de_passe'");
                    if ($administrateur->rowCount() > 0) {
                        $administrateurs = $administrateur->fetch();
                        $_SESSION['id'] = $administrateurs['id'];
                       
                        $_SESSION['mot_de_passe'] = $administrateurs['mot_de_passe'];
                        $_SESSION['email'] = $administrateurs['email'];
        
                        $success = "Super";
                        header("Location: ../../administrateurs/PagA.php ");
                } else {
                    $error = "Aucun utilisateur n'a été trouvé dans notre base de données.";
                }
            }
        }
            
        } else {
            $error = "Email Invalide !";
        }
        
    }else{
        $error = "Veuillez remplir tous les champs";
    }
                                        
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/copie.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    
    <title>Document</title>
</head>
<body>
    <nav class="navbar">
        <h4>MKS SOFT TECHNOLOGIES 
                <!-- <div class="mon"><li><a href="../../../mon projet enre/inscription.php"> inscription managers</a></li></div> -->
               
        </h4>
        <div class="profile">
            <!-- <span class="fas fa-search"></span> -->
            <img src="../../assets/images/1_bg.png" class=" logo">
            
           
        </div>
        
        

        
    </nav>
    <!-- <input type="checkbox" id="toggle">
    <label class="side-toggle"
    for="toggle"><span class="fas fa-bars"></span></label> -->
    <!-- <div class="sidebar">
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="../SOFT/acceil.php" class="ss"> overview</a></p>

            </span> 
             

        </div>
        <div class="sidebar-menu">
            <span class="fas fa-user"></span><p><a href="../SOFT/acceil.php" class="ss">collaborateurs</a></p>


        </div> -->

       
        <!-- <div class="sidebar-menu">
            <span class="fas fa-chart-line"></span><p><a href="#" class="ss">statistiques</a></p>
        </div>
        <div class="sidebar-menu">
            <span class="fas fa-id-card"></span><p><a href="#" class="ss">contact</a></p>
        </div> -->
        <!-- <div class="sidebar-menu">
            <span class="fas fa-cog"></span><p><a href="#" class="ss">parametre</a></p>
        </div>

    </div> -->
    <section>
        <!-- <article>
            <h1>DEVELOPPEMENT</h1><br><br><br>
            <div class="img2"></div><br><br>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.  Qui vero sit tempore? Corrupti sequi autem optio eveniet dolor veritatis.  Eos sunt nihil iste  dignissimos quidem voluptate iure sed sint amet.</p>

    

        </article> -->
    <aside>
        <!-- <div class="button">
            <li class="LI"><a href="copie.php">connecter </a></li>
            <li class="LIE"><a href="index.php"> s'inscrire</a></li>
        </div><br><br><br><br>    -->
            <div class="login-box">
    <form action="" method="POST" >
                    <p class="CONNECT">Connexion</p>
        
            <div class="input-box">

                <input type="email" name="email" required>
                <label>Email</label>
            </div>      
            <div class="input-box">
                 <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="mot_de_passe" required> 
                    <label>Mot de passe</label>
            </div>
            <!-- <div class="register-link">
           <p> Je n'ai pas de compte? 
           <a href="inscription.php">inscription</a>
           </p> -->
        </div>
    
    
        
    
            <!-- <div class="remember-forgot">
                <label><input type="checkbox">se souvenir de moi </label>
                <a href="#" >mot de passe oublié?</a> 
            </div>  -->
    
           
    
          
        <div class="vee">
            <p><button type="submit" name="valider"> connexion</a></button>
           </p>
        </div>

        <div class="success" style="width:430px;background-color:lightgreen;color:white;text-align:center">
            <p> 
                <?php if ($success) {
                    echo $success;
                }  ?>  
            </p>
        </div>

        <div class="error" style="width:430px;background-color:#efa2a2;color:white;text-align:center;">
            <p> 
                <?php if ($error) {
                    echo $error;
                }  ?>  
            </p>
        </div>

    </form>
    </aside>
    </section>
    
    
</body>
</html>