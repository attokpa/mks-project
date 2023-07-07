<?php 
session_start();
// if (!$_SESSION['id']) {
//     header("Location:../ ");
//   }

 $id = $_SESSION["id"];
 
    


    // On se connecte a la base de données
    $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

    // Je vais faire une requete pour recuperer toutes les absences
    $all_absence = $connection->query("SELECT nom, prenom, profession, date_jour, date_debut, date_fin, motif, document FROM absence INNER JOIN utilisateur ON absence.Id_utilisateur=utilisateur.Id");
   
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
             <span class="fas fa-clipboard-list"></span><p><a href="pagA.php"> Accueil</a></p>

            </span> 
             

        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="T_PresenceAdmin.php">T_Prsences</a></p>

        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="T_AbsenceAdmin.php">T_Absences</a></p>

        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="T_PermissionAdmin.php">T_Demandes_De <br>Permisssions</a></p>

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
            <h2>TABLEAU DES ABSENCES</h2>
             <!-- <button><a href="#" class="a"> + Ajouter</a></button>  -->

        </div>
        <table>
            <tr>
                <!-- <th>id #</th> -->
                <th>Noms </th>
                <th>Prenoms</th>
                <th>Profession</th>
               
                <th>Motif</th>
                <th>Date_jour</th>
                <th>Date_debut</th>
                <th>Date_fin</th>
                <th>Document</th>
                <!-- <th style="text-align: center;">Action</th> -->
                
               
            </tr>
            </tr>
                <?php while($row = $all_absence->fetch()){ ?>
            <tr>
                <td><?= $row['nom'] ?></td>
                <td> <?= $row['prenom'] ?> </td> 
                <td> <?= $row['profession'] ?> </td> 
                <td> <?= $row['motif'] ?> </td>
                <td><?= date("d-m-Y", strtotime($row['date_jour'])) ?></td> 
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
                <!-- <td style="display: flex;">
                        <span class="status confirmed ">
                            <a href="Mod_absence.php" > Modifier</a>
                        </span> -->
      
                        <!-- <span style="margin-left: 20px;  background-color: #6ebbe4;"        class="status onprogress ">
                            <a href="Ajouter_absence.php" > Ajouter</a>
                        </span>  -->
                <!-- </td> -->
                
            </tr>
          
            <?php } ?>

               
           
        </table>
        
    

        

    </div>
    </div>
    </main>
   
</body>
</html>
             