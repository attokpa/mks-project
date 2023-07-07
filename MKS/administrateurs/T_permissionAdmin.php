<?php   
session_start();
if (!$_SESSION['id']) {
    header("Location:../ ");
  }

 $id = $_SESSION["id"];


    // On se connecte a la base de données
    $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

    // Je vais faire une requete pour recuperer toutes les permissions
    $all_demande_permission = $connection->query("SELECT * FROM demande_permission INNER JOIN utilisateur ON demande_permission.Id_utilisateur=utilisateur.Id");
    // $all_utilisateur = $connection->query("SELECT * FROM utilisateur  WHERE nom,prenom");
    
    
?>
    



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- -->
    <link rel="stylesheet" href="../assets/css/papa1.CSS">
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
            <img src="../assets/images/1_bg.png" class=" logo">
            <form action="">
                <!-- <p class="profile-name"> -->
                <div class="detail-headers">
                    <button type="submit"><a href="../deconnexion/deconnexion.php">Deconnexion</a> </button></p>
                </div>
            </form>
               
            
        </div>
    </nav>
         <!-- sidebar -->

    <input type="checkbox" id="toggle">
    <label class="side-toggle"
    for="toggle"><span class="fas fa-bars"></span></label>
    <div class="sidebar">
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="pagA.php">Accueil</a></p>

            </span> 
             

        </div>
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="T_PresenceAdmin.php">T_Presence</a></p>

        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="T_AbsenceAdmin.php">T_Absence</a></p>

        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="T_PermissionAdmin.php">T_Demande_De <br>Permission</a></p>

        </div> 
        
        <!-- <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="#">document fournis</a></p>

        </div>    -->
    </div>
    <main>
    <div class="deshboard-container">
            <!-- 4 cards top -->
    <div class="card detail">
        <div class="detail-header">
            <h2>TABLEAUX DES PERMISSIONS</h2>
             <!-- <button><a href="PRESENCE.php" class="a"> + Ajouter</a></button>  -->

        </div>
        <table>
            <tr>
                <!-- <th>id #</th> -->
                <th>Nom </th>
                <th> Prenom</th>
                <th> Profession</th>
               
                <th>Type absences</th>
                <th>Descriptions</th>
                <th>Date_debut</th>
                <th>Date_fin</th>
                <th>Documents</th>
                <th>Actions</th>
                <!-- <th>Refuser</th> -->
                <!-- <th>Actions</th>
                <th></th> -->
                
               
            </tr>
            <?php while($row = $all_demande_permission->fetch()){ ?>
                <tr>
                    <td> <?= $row['nom'] ?> </td>
                    <td> <?= $row['prenom'] ?> </td>
                    <td> <?= $row['profession'] ?> </td>
                    <td><?= $row['type_absence'] ?></td>
                    <td><?= $row['descriptions'] ?></td>
                    <td><?= date("d-m-Y", strtotime($row['date_debut'])) ?></td>
                    <td><?= date("d-m-Y", strtotime($row['date_fin'])) ?></td>
                    <td>
                    <?php if (!empty($row['document'])) { ?> 
                        <img src="../assets/images/images.jpg"  class="logo">
                        <button>
                            <a href="../assets/document/justificatif/download_file.php?file=<?php echo($row["document"]) ?>" >
                                voir
                            </a>
                        </button>
                    <?php } ?>
                </td> 

                    <?php    if (empty($row['status_demande'])) { ?>
                        <td style="display: flex;">

                            <span class="status confirmed " style="background-color: green;">
                                <a href="confirmer_permissions.php?id=<?=$row['id']?>"> Confirmer</a>
                            </span>
                        
                            <span class="status onprogress "style="margin-left: 20px";><a href="refuser_permission.php?id=<?=$row['id']?>" >Refuser</a></span>

                        </td>

                    <?php }elseif ($row['status_demande']=="accepté") { ?>

                        <td style=" text-align:center">
                            <span style="color: green;">
                                 
                                    Confirmé
                                 
                            </span>
                        </td>

                    <?php }else{ ?>
                        <td style=" text-align:center">
                            <span style="color:red";>
                               
                                    Refusé
                                
                            </span>
                        </td>
                    
                    <!-- <td>
                        <span class="status confirmed"  style="margin-left: 20px";>
                            <a href="../collaborateurs/platform collaborateurs/modifier_permission.php?id=<?=$row["id"]?>" > Modifier</a>
                        </span>
                    </td>  -->
                   
            
                    <!-- <td><? ?></td>
                    -->
                    <!-- <td> -->
                        <?
                    //  echo $row['profession'] 
                     ?>
                     <!-- </td> -->
                </tr>
           
                <!-- <td><span class="status onprogress "><i class="fas fa-circle"><a href="#" >refuser</a></i></span></td>
                <td><span class="status confirmed "><i class="fas fa-circle"><a href="#"> confirmer</a></i></span></td> -->
            

               
            </tr>
            <?php } ?>
            <?php } ?>
           
        </table>
        
    

        

    </div>
    </div>
    </main>
    
</body>
</html>
             