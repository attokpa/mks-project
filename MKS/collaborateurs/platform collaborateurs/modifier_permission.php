<?php   
   session_start();


   if (!$_SESSION['id']) {
       header("Location: ../../");
   }

   if (!$_GET['id']) {
        header("Location: Tableau_demande_permission.php");

    }


    $id = $_SESSION["id"];
    $id_permission = $_GET['id'];


   $success ="";
   $error="";

   $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", "");
   
   // Je recupere la ligne contenant la demande de permission à modifier
   $q = $connection->query("SELECT * FROM demande_permission WHERE id=$id_permission");
   $row = $q->fetch();


    if(isset($_POST['valider'])){ 

        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];
        $type_absence = $_POST['type_absence'];
        $descriptions= $_POST['descriptions'];
        $document = $_FILES['document']['name'];
        $documentTemporaire=$_FILES['document']['tmp_name'];

        if( isset($date_debut) && isset($date_fin) && isset($type_absence) && isset($descriptions) || isset($document)) {   

            if (!empty($document)) {

                if(move_uploaded_file($documentTemporaire, '../../assets/document/justificatif/'.$document)){

                    $q=$connection->query("UPDATE demande_permission SET date_debut='$date_debut', date_fin='$date_fin', type_absence=\"$type_absence\" , descriptions=\"$descriptions\" , document='$document' WHERE Id='$id_permission'");

                    $success = "Bravo vous avez modifié une permission";
                    // header("Location: tableau_absence.php");
                }else{
                    $error = "Erreur lors du chargement du justificatif";
                }
            }else{

                $q=$connection->query("UPDATE demande_permission SET date_debut='$date_debut', date_fin='$date_fin', type_absence=\"$type_absence\" , descriptions=\"$descriptions\"  WHERE Id='$id_permission'");

                $success = "Bravo vous avez modifié une permission";
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
            <span class="fas fa-clipboard-list"></span><p><a href="acceil.php"> acceuil</a></p>

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
    <aside>
        <p class="demand">MODIFIER UNE PERMISSION </p><br>
        <hr><br><br>
       

             <!-- <p>type d'absence</p><br>
             <p><select>
                <option value="text">autre</option>
                <option value="text">permission</option>
                <option value="text">conges</option>
                <option value="text">maladie</option>
             </select><br>
             <p>Description</p><br>
             <textarea name="text" id="description" cols="52" rows="5"></textarea><br>

 -->

        <form class="deu" method="POST" action=""   enctype="multipart/form-data">

  
                               
                
            <div class="lign">
                <div class="c">
                   
                    <p>Date de debut</p><br>
                    <p><input type="date" name="date_debut"  value="<?=$row['date_debut']?>" type="date" min="<?= date("Y-m-d") ?>"/></p><br>
                    
             
                            
                </div>
                <div class="d"> 
                    <p>Date fin</p><br>
        
                   
                  
                    <p><input type="date" name="date_fin"  value="<?=$row['date_fin'] ?>" type="date" min="<?= date("Y-m-d") ?>"/></p><br>
                </div>        
            </div>
            <div>
                <p>type d'absence</p><br>
                <textarea name="type_absence"  cols="52" rows="3" type="text"  value="">
                 <?=$row['type_absence']?> 
            </textarea>
             <!-- <select name="type_absence">
             <option value="<?=$row['type_absence']?>"> <?=$row['type_absence']?> </option>
                <option value="autre">autre</option>
                <option value="permission">permission</option>
                <option value="conges">conges</option>
                <option value="maladie">maladie</option>
             </select><br> -->
             <p>Descriptions</p><br>
             
            <textarea name="descriptions"  cols="52" rows="3" type="text"  value="">
                 <?=$row['descriptions']?> 
            </textarea>
            </div><br>
            <div class="FILES">
              
              <label for="document">Chargez votre justificatif</label><br>
              <img src="../../assets/images/images.jpg"  class="logo" style="margin-right: 100%; margin-bottom:2px;" >
                      <span> <?=$row['document']?> </span>
              <input  type="file" name="document" />
           </div>
             
                
                
                             
                
                
                <div>

                <button type="submit" name="valider">envoyer</a></button>
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
        
            <?php 
            // var_dump($row)  
            ?> 

           
            
    </aside>
  
    
</body>
</html>