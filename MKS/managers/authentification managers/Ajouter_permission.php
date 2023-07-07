




<?php
    
    date_default_timezone_set('GMT');
  
    session_start();
    if (!$_SESSION['id']) {
        header("Location: ../../");
    }
    

    $id = $_SESSION["id"];

    $success ="";
    $error="";


    $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

    if(isset($_POST['valider'])){ 

        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];
        $type_absence = $_POST['type_absence'];
        $descriptions= $_POST['descriptions'];
        $document = $_FILES['document']['name'];
        $documentTemporaire=$_FILES['document']['tmp_name'];

        if( isset($date_debut) || isset($date_fin) || isset($type_absence) || isset($descriptions)  || isset($document) ) {   

        if (!empty($date_debut) && !empty($date_fin) && !empty($type_absence) && !empty($descriptions)) {
            if(!empty($document)){
                    if(move_uploaded_file($documentTemporaire, '../../assets/document/justificatif/'.$document)){
                $query = $connection->query("INSERT INTO demande_permission(date_debut,date_fin, type_absence, descriptions, document, Id_utilisateur ) VALUES ('$date_debut', '$date_fin', '$type_absence', '$descriptions', '$document', $id)");
                $success = "Bravo vous avez enregistré une permission";
                header("Location:../T_permission.php");
        } else {
                $error = "Désolé veuillez recommencer !!! ";
            }
        }
        else{

            $query = $connection->query("INSERT INTO demande_permission(date_debut,date_fin, type_absence, descriptions, Id_utilisateur ) VALUES ('$date_debut', '$date_fin', '$type_absence', '$descriptions',$id)");
            $success = "Bravo vous avez enregistré une permission";
            header("Location:../T_permission.php");
            
            
            
        }
      
            
                
            
            
            }
            else{
                $error = "desole veillez remplir tout les champs !!! ";
            }
            
        }
        else{
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
            <form action="" enctype="">
                <!-- <p class="profile-name"> -->
                <div class="detail-headers">
                    <button type="submit"><a href="../../deconnexion/deconnexion.php">deconnexion</a> </button></p>
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
            <span class="fas fa-clipboard-list"></span><p><a href="acceil.php"> acceuil</a></p>

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
        
        
    </div>
    <aside>
        <p class="demand">DEMANDE DE PERMISSIONS</p><br>
        <hr><br><br>
       

            
 

        <form class="deu" method="POST" action=""  enctype="multipart/form-data">

  
                               
                
            <div class="lign">
                <div class="c">
                   
                    <p>Date de debut</p><br>
                    <p><input type="date" name="date_debut"  min="<?= date("Y-m-d") ?>" /></p><br>
                    
             
                            
                </div>
                <div class="d"> 
                    <p>Date fin</p><br>
        
                   
                  
                    <p><input type="date" name="date_fin"  min="<?= date("Y-m-d") ?>" /></p><br>
                </div>        
            </div>
            <div>
                <p>type d'absence</p><br>
                <textarea name="type_absence" id="" cols="52" rows="3"></textarea>
            
             <p>Descriptions</p><br>
             <textarea name="descriptions" id="description" cols="52" rows="3"></textarea>
            </div><br>
            <div class="FILES">
              
                <label for="document"></label><br>

                <input type="file" name="document"/>
            </div>
                
                <div>
                    
               
                    <button type="submit" name="valider">Envoyer</a></button>
                </div>
              
                 
                    
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