<?php
  session_start();

 
  if (!$_SESSION['id']) {
    header("Location: ../../");

    }
    $id = $_SESSION["id"];



$success ="";
$error="";



$connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

if(isset($_POST['absence'])){ 

    // $date_jour = $_POST['date_jour'];
    $date_debut = $_POST['date_debut'];
    // $date_fin = $_POST['date_fin'];
    $motif = $_POST['motif'];
    $document = $_FILES['document']['name'];
    $documentTemporaire=$_FILES['document']['tmp_name'];

    if( isset($date_debut) || isset($date_fin) || isset($motif)  || isset($document)
    || isset($date_jour) ) {
        
        if (!empty($motif) && !empty($date_debut) ) {
            if(!empty($document)){
                if(move_uploaded_file($documentTemporaire, '../../assets/document/justificatif/'.$document)){
                    $date_jour= $date_fin = date("Y-m-d");
                    $query = $connection->query("INSERT INTO absence(date_jour,date_debut,  date_fin, motif, document, Id_utilisateur) VALUES ('$date_jour','$date_debut', '$date_fin', \"$motif\", '$document', '$id')");
                    $success = "Bravo vous avez enregistré une Absence";
                    // header("Location: tableau_absence.php");
                }else{
                    $error = "Erreur lors du chargement du justificatif";
                }
            }else{
                $date_jour=$date_fin = date("Y-m-d");
                $query = $connection->query("INSERT INTO absence(date_jour,date_debut,  date_fin, motif, Id_utilisateur) VALUES ('$date_jour','$date_debut', '$date_fin', \"$motif\", '$id')");
                $success = "Bravo vous avez enregistré une Absence";
            }
        }
        else{
            $error = "Désolé veuillez remplir tous les champs !!! ";
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
            <span class="fas fa-clipboard-list"></span><p><a href="acceil.php"> acceil</a></p>

            </span> 
             

        </div> -->
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="../../collaborateurs/platform collaborateurs/tableau_presence.php">Presences</a></p>

        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="../../collaborateurs/platform collaborateurs/tableau_absence.php">Absences</a></p>

        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="../../collaborateurs/platform collaborateurs/tableau_demande_permission.php">Demandes_de <br>Permissions</a></p>

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

        <form class="deu" method="POST" action="" enctype="multipart/form-data">
             <!-- <div class="c">
                <p>Date de jour</p><br>
                <p><input type="date" name="date_jour"  min="<?= date("Y-m-d") ?>"/></p><br>
            
            </div>  -->
            <p>MOTIF</p><br>

            <!-- <input type="text" name="" id=""> -->

            <textarea name="motif" id="" cols="52" rows="3"></textarea>
            
            <!-- <select name="motif">
                <option value="autre">autre</option>
                <option value="permissions">permission</option>
                <option value="conges">conges</option>
                <option value="maladie">maladie</option>
            </select> -->
            
            <br><br><br> 
            <div class="diviz">
                <div class="c">
                   <p>Date de debut</p><br>
                   <p><input type="date" name="date_debut" max="<?= date("Y-m-d") ?>"/></p><br>
                </div><br>
                <!-- <div class="d"> 
                    <p>Date fin</p><br>
                    <p><input type="date" name="date_fin"/></p>
                </div>  -->
            </div><br>
                  
             <div class="FILES">
              
                <label for="document">Chargez votre justificatif</label><br>

                <input type="file" name="document"/>
             </div>
               

             <button type="submit" name="absence">envoyer</a></button> 
             <!-- <input class="presence" type="submit" value="Valider" name="presence"/>
             -->
               
                    
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