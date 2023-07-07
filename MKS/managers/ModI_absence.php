<?php   

    session_start();

    if (!$_SESSION['id']) {
         header("Location: ../../");
    }
    // if (!$_GET['id']) {
    //     header("Location: T_Absence.php");
    // }

     $id = $_SESSION["id"];
     //Je recupere l'ID du collaborateur
     $id = $_GET['id'];

    $success ="";
    $error="";
    
    

    $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", "");
    
    // Je recupere la ligne contenant la absence à modifier
    $q = $connection->query("SELECT * FROM absence WHERE id_utilisateur=$id");
    $row = $q->fetch();

    if(isset($_POST['valider'])){ 

       
        $date_debut = $_POST['date_debut'];
        $motif = $_POST['motif'];
        $document = $_FILES['document']['name'];
        $documentTemporaire=$_FILES['document']['tmp_name'];
    
        if( isset($date_debut) || isset($date_fin) || isset($motif)  || isset($document)
        || isset($date_jour) ) {

            if (!empty($document)) {

                if(move_uploaded_file($documentTemporaire, '../../assets/document/justificatif/'.$document)){

                    $q=$connection->query("UPDATE absence SET date_debut='$date_debut', motif='$motif', document='$document' WHERE Id='$id_absence'");

                    $success = "Bravo vous avez modifié une Absence";
                    header("Location: T_Absence.php");
                }else{
                    $error = "Erreur lors du chargement du justificatif";
                }
            }else{

                $q=$connection->query("UPDATE absence SET date_debut='$date_debut', motif='$motif' WHERE Id='$id_absence'");

                $success = "Bravo vous avez modifié une Absence";
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
    <link rel="stylesheet" href="../assets/css/1.CSS">
    <!-- font: poppins -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    
    <title>Modifier Ma Présence| MKS </title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar">
        <h4>MKS SOFT TECHNOLOGIES </h4>
        <div class="profile">
            <!-- <span class="fas fa-search"></span> -->
            <img src="../../assets/images/1_bg.png" class=" logo">
            <form action="">
                <!-- <p class="profile-name"> -->
                <div class="detail-headers">
                    <button type="submit"> Deconnexion</button></p>
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
            <span class="fas fa-clipboard-list"></span><p><a href="T_Presence.php"> T_PRESENCES</a></p>

        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="T_Absence.php">T_ABSENCES</a></p>

        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="T_Permission.php">T_DEMANDES DE PERMISSIONS</a></p>

        </div> 
        
        <!-- <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="#">document fournis</a></p>

        </div>    -->
    </div>
    <aside class="aside">
        <p class="demand">MODIFIER UNE ABSENCE</p><br>
        <hr><br><br>
       

        <form class="deu" method="POST" action="" enctype="multipart/form-data">

            <p>MOTIF</p><br>
           
            <textarea name="motif"  cols="52" rows="3" type="text"  value=""  min="<?= date("Y-m-d") ?>">
                 <?=$row['motif']?> 
            </textarea>
            <div class="diviz">
                <div class="c">
                   <p>Date de debut</p><br>
                   <p><input value="<?=$row['date_debut']?>" type="date" name="date_debut"  /></p><br>
                </div><br>
                
            </div><br>
                  
             <div class="FILES">
              
                <label for="document">Chargez votre justificatif</label><br>

                <input value="<?=$row['document']?>" type="file" name="document" />
             </div>
               

             <button type="submit" name="valider">Modifier</a></button>
           
            
               
                    
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
   
</body>
</html>
    
       
        
        