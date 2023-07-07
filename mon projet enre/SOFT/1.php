<?php   
    $success ="";
    $error="";

    $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

    if(isset($_POST['valider'])){ 

        $date_jour = $_POST['date_jour'];
        $heure_arrivee = $_POST['heure_arrivee'];
        $heure_sortie = $_POST['heure_sortie'];
        $profession = $_POST['profession'];

        if( isset($heure_arrivee) || isset($heure_sortie) || isset($date_jour) || isset($profession) ) {   

            if (!empty($date_jour) && !empty($heure_arrivee) && !empty($heure_sortie) && !empty($profession)) {
                $query = $connection->query("INSERT INTO presence(date_jour, heure_arrivee, heure_sortie, profession) VALUES ('$date_jour', '$heure_arrivee', '$heure_sortie', '$profession')");
                $success = "Bravo vous avez enregistré une presence";
                header("Location: presenz.php");
            } else {
                $error = "Désolé veuillez recommencer !!! ";
            }
            

        }
        else{
            $error = "Désolé veuillez recommencer !!! ";
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
    <link rel="stylesheet" href="1.CSS">
    <!-- font: poppins -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    
    <title>Document</title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar">
        <h4>mks soft technologies</h4>
        <div class="profile">
            <!-- <span class="fas fa-search"></span> -->
            <img src="images/1_bg.png" class=" logo">
           
            
        </div>
    </nav>
         <!-- sidebar -->

    <input type="checkbox" id="toggle">
    <label class="side-toggle"
    for="toggle"><span class="fas fa-bars"></span></label>
    <div class="sidebar">
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="acceil.php">acceuil</a></p>

            </span> 
             

        </div>
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="presenz.php">presences</a></p>

        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="papa1.php">absences</a></p>

        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="PAPA3.php">demandes de permission</a></p>

        </div> 
        
        <!-- <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="#">document fournis</a></p>

        </div>    -->
    </div>
    <article class="articl">
        <div class="class">
        <p class="p">VOUS AVEZ POINTE?</p><br><br>
        <hr><br><br>
        
        
                
        <form method="POST" action="">

            <p>Date jour</p><br>
            <p><input name="date_jour" type="date"/></p>
            </div>
         <div class="ouvri">
           
            <div class="a">
               
                <p>Heure arrivee</p><br>
                <p><input name="heure_arrivee" type="time"/></p>
         
                        
            </div>
            <div class="b"> 
                <p>Heure sortie</p><br>
    
               
              
                <p><input  name ="heure_sortie" type="time"/></p>
                        
            </div><br>
         </div><br>
          
          
        <p class="tim">profession</p><br>
        <p><input name="profession" type="text" class="tim"></p>
        </div><br>
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
        
        
        
    </article>
    <!-- <footer>
        <div class="copy"><a href="presenz.html">presence</a>|<a href="papa1.HTML"> absences  </a>|<a href="PAPA3.HTML"> demande de permission </a>|<a href="#">parametre</a>|
           
        </div>
        <div class="copyright">Copyright © Attokpaachouester@gmail.com
           
        </div>



    </footer> -->
</body>
</html>
    
       
        
        