<?php 
    session_start();

    if (!$_SESSION['id']) {
        header("Location: ../");
        }

    $id = $_SESSION["id"];

    

    // On se connecte a la base de données
    $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

    // Je vais faire une requete pour recuperer toutes les presences
    $all_utilisateur = $connection->query("SELECT id, nom, prenom, email, profession, telephone FROM utilisateur ");
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
            <span class="fas fa-fas fa-user"></span><p><a href="T_PresenceAdmin.php">Tableaux emargements</a></p>
        </div>
          <div class="sidebar-menu">
            <span class="fas fa-fas fa-user"></span><p><a href="ManagersEntreprise.php">Managers</a></p>
        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-fas fa-user"></span><p><a href="utilisateurEntreprise.php">Collaborateurs</a></p>
        </div> 
       <div class="sidebar-menu">
            <span class="fas fa-fas fa-user"></span><p><a href="ajouter_professionPourAdministrateur.php">Ajouter une Profession</a></p>
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
            <h2>Liste des collaborateurs de MKS</h2>
            <button><a href="../authentification/inscriptions.php" class="a"> + Inscription</a></button> 

        </div>
        <table>
            <tr>
               
                <th>Nom</th>
                <th>Prenom</th>
                <th>Profession</th>
                <th>email</th>
                <th>telephone</th>
                <th>actions</th>
            </tr>
                <?php while($row = $all_utilisateur->fetch()){ ?>
            <tr>
               
                <td> <?= $row['nom'] ?> </td> 
                <td> <?= $row['prenom'] ?> </td> 
                <td> <?= $row['profession'] ?> </td> 
                <td><?= $row['email'] ?></td>
                <td><?= $row['telephone'] ?></td>
                <td style="display: flex;">
                        <span class="status confirmed ">
                        <a href="../../MKS/collaborateurs/platform collaborateurs/supprimer_utilisateur.php?id=<?=$row["id"]?>"> retirer</a>
                        </span>
                        
                        <!-- <span style="margin-left: 20px;  background-color: #6ebbe4;" class="status onprogress ">
                            <a href="../collaborateurs/authentification/inscriptions.php" >inscrire</a>
                        </span>  -->
                </td>
            </tr>
                <?php } ?>
    
        </table>
        <?php 
        //  var_dump( $all_presence->fetch() )
        ?>
        
    

        

    </div>
    </div>
    </main>
   
</body>
</html>
             