<?php   

    session_start();

    if (!$_SESSION['id']) {
        header("Location: ../../");
    }
    // if (!$_GET['id']) {
    //     header("Location: ../T_presence.php");
    // }

     $id = $_SESSION["id"];
     $id_presence = $_GET['id'];

    $success ="";
    $error="";

    $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", "");
    
    // Je recupere la ligne contenant la absence à modifier
    $q = $connection->query("SELECT * FROM presence WHERE id_utilisateur=$id_presence");
    $row = $q->fetch();

    if(isset($_POST['valider'])){ 

        // $date_jour = $_POST['date_jour'];
        $date_jour = $_POST['date_jour'];
        // $date_fin = $_POST['date_fin'];
        $heure_arrivee = $_POST['heure_arrivee'];
        $heure_sortie = $_POST['heure_sortie'];
       
    
        if( isset($date_jour) || isset($heure_arrivee) || isset($heure_sortie)  ) {
            if (!empty($date_jour) || !empty($heure_arrivee)  ||  !empty($heure_sortie)) {


                $q=$connection->query("UPDATE presence SET date_jour='$date_jour', heure_arrivee='$heure_arrivee', heure_sortie='$heure_sortie' WHERE Id='$id_presence'");

                $success = "Bravo vous avez modifié une presence";
                header("Location: ../T_presence.php");
            }

        }else{
            $error = "Veuillez entrez toutes les informations !!! ";
        }
    }
    
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- -->
    <link rel="stylesheet" href="../../assets/css/1.CSS">
    <!-- font: poppins -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    
    <title>Document</title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar">
        <h4>MKS SOFT TECHNOLOGIES</h4>
        <div class="profile">
            <!-- <span class="fas fa-search"></span> -->
            <img src="../../assets/images/1_bg.png" class=" logo">
            <form action="">
                <!-- <p class="profile-name"> -->
                <div class="detail-headers">
                    <button type="submit"><a href="../../deconnexion/deconnexion.php">Deconnexion</a> </button></p>
                </div>
            </form>
               
            
        </div>
    </nav>
         <!-- sidebar -->

    <input type="checkbox" id="toggle">
    <label class="side-toggle"
    for="toggle"><span class="fas fa-bars"></span></label>
    <div class="sidebar">
        <!-- <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="acceil.php">acceuil</a></p>

            </span> 
             

        </div> -->
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="../T_Presence.php"> T_PRESENCES</a></p>

        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="../T_Absence.php">T_ABSENCES</a></p>

        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="../T_Permission.php">T_DEMANDES DE PERMISSIONS</a></p>

        </div> 
        <!-- <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="#">document fournis</a></p>

        </div>    -->
    </div>
    <article class="articl">
        <div class="class">
        <p class="p">MODIFIER VOS PRESENCES</p><br><br>
        <hr><br><br>
        
        
                
        <form method="POST" action="" enctype="multipart/form-data">

            <p>Date jour</p><br>
            <p><input name="date_jour" type="date"  value="<?=$row['date_jour']?>" min="<?= date("Y-m-d") ?>"  max="<?= date("Y-m-d") ?>" /></p>
            </div>
         <div class="ouvri">
           
            <div class="a">
               
                <p>Heure arrivee</p><br>
                <p><input name="heure_arrivee"   type="time"   value="<?=$row['heure_arrivee']?>"/></p>
         
                        
            </div>
            <div class="b"> 
                <p>Heure sortie</p><br>
    
               
              
                <p><input  name ="heure_sortie" type="time"  value="<?=$row['heure_sortie']?>" /></p>
                        
            </div><br>
         </div><br>
          
          
        <!-- <p class="tim">profession</p><br>
        <p><input name="profession" type="text" class="tim"></p>
        </div><br> -->
        <button type="submit" name="valider">Ajouter</button>
           
                
        </form>  <br>

        <div class="success" style="width:430px;background-color:lightgreen;color:white;text-align:center">
            <p> 
                <?php if ($success) {
                    echo $success;
                }  ?>  
            </p>
        </div>

        <div class="error" style="width:430px;background-color:#efa2a2;color:white;text-align:center">
            <p> 
                <?php if ($error) {
                    echo $error;
                }  ?>  
            </p>
        </div>

        <?php 
            // var_dump(date('h:m:s'))
        ?> 
        
        
        
    </article>
    <!-- <footer>
        <div class="copy"><a href="presenz.html">presence</a>|<a href="papa1.HTML"> absences  </a>|<a href="PAPA3.HTML"> demande de permission </a>|<a href="#">parametre</a>|
           
        </div>
        <div class="copyright">Copyright © Attokpaachouester@gmail.com
           
        </div>



    </footer> -->
</body>
</html>
    
       
        
        