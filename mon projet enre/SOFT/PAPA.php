<?php

$success ="";
$error="";



$connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

if(isset($_POST['valider'])){ 

   
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $motif = $_POST['motif'];

    if( isset($date_debut) || isset($date_fin) || isset($motif) ) {

        if (!empty($date_debut) && !empty($date_fin) && !empty($motif) ) {

            $query = $connection->query("INSERT INTO absence(date_debut, date_fin, motif) VALUES ('$date_debut', '$date_fin', '$motif')");
            $success = "Bravo vous avez enregistré une presence";
            header("Location: papa1.php");

        }
        else{
            $error = "Désolé veuillez recommencer !!! ";
        }

    }else{
        $error = "blabla !!! ";
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
            <span class="fas fa-clipboard-list"></span><p><a href="acceil.php"> acceil</a></p>

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
    <aside class="aside">
        <p class="demand">ABSENCES</p><br>
        <hr><br><br>
       
             <!-- <p>MOTIF</p><br>
              <p><select>
                <option value="text">autre</option>
                <option value="text">permission</option>
                <option value="text">conges</option>
                <option value="text">maladie</option>
             </select><br> 
             -->

            <form class="deu" method="POST" action="">
                <p>MOTIF</p><br>
                <p><select name="motif">
                  <option value="autre">autre</option>
                  <option value="permissions">permission</option>
                  <option value="conges">conges</option>
                  <option value="maladie">maladie</option>
               </select><br><br><br> 
            <div class="diviz">
       
                <div class="c">
                   
                    <p>Date de debut</p><br>
                    <p><input type="date" name="date_debut"/></p><br>
             
                            
                </div><br><br>
                <div class="d"> 
                    <p>Date fin</p><br>
        
                   
                  
                    <p><input type="date" name="date_fin"/></p><br>
                </div>
            </div><br><br>
                    <!-- <p>MOTIF</p><br>
                    <p><select>
                        <option value="text">autre</option>
                        <option value="text">permission</option>
                        <option value="text">conges</option>
                        <option value="text">maladie</option>
                     </select><br>
                             -->
              
                             

             <button type="submit" name="valider">envoyer</a></button>
           
            
               
                    
            </form>
          
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
        </aside>
        
        
    
        <!-- <footer>
            <div class="copy"><a href="presenz.html">presence</a>|<a href="papa1.HTML"> absences  </a>|<a href="PAPA3.HTML"> demande de permission </a>|<a href="#">parametre</a>|
               
            </div>
            <div class="copyright">Copyright © Attokpaachouester@gmail.com
               
            </div>
    
    
    
        </footer>
     -->


    
</body>
</html>