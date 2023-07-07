<?php 
    session_start();

    if (!$_SESSION['id']) {
        header("Location: ../");
        }

    $id = $_SESSION["id"];

    

    // On se connecte a la base de données
    $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

    // Je vais faire une requete pour recuperer toutes les presences
    $all_presence = $connection->query("SELECT * FROM presence INNER JOIN utilisateur ON presence.Id_utilisateur=utilisateur.Id");
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
        <div> 
            <!-- <img src="../../assets/images/1_bg.png" class=" logo"> -->
            <span> <?= $_SESSION['nom']." ".$_SESSION['prenom'] ?> </span>
        </div>
        <div class="profile">
            <!-- <span class="fas fa-search"></span> -->
            <img src="../assets/images/1_bg.png" class=" logo">
            <form action="">
                <!-- <p class="profile-name"> -->
                <div class="detail-headers">
                    <button type="submit"><a href="../deconnexion/deconnexion.php">deconnexion</a> </button></p>
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
            <span class="fas fa-clipboard-list"></span><p><a href="pageM.php">Accueil</a></p>

            </span> 
             

        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="T_Presence.php"> T_Presences</a></p>

        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="T_Absence.php">T_Absences</a></p>

        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="T_Permission.php">T_Demandes_De <br>Permissions</a></p>

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
            <h2>TABLEAU DES PRESENCES</h2>
     <!-- <button><a href="Ajouter_Presence.php" class="a"> + Ajouter</a></button>   -->

        </div>
        <table>
            <tr>
                <th>Date_jour</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Profession</th>
                <th>Heure_arrivee</th>
                <th>Heure_sortie </th>
                 <!-- <th>Actions</th>  -->
            </tr>
                <?php while($row = $all_presence->fetch()){ ?>
            <tr>
                <td><?= date("d-m-Y", strtotime($row['date_jour'])) ?></td>
                <td> <?= $row['nom'] ?> </td> 
                <td> <?= $row['prenom'] ?> </td> 
                <td> <?= $row['profession'] ?> </td> 
                <td><?= $row['heure_arrivee'] ?></td>
                <td><?= $row['heure_sortie'] ?></td>
                <!-- <td> -->
                         <!-- <span class="status confirmed ">
                            <a href="../managers/authentification managers/modifier_presence.php?id=<?=$row['Id'] ?>" > Modifier</a>
                        </span> -->
                        
                         <!-- <span style="margin-left: 20px;  background-color: #6ebbe4;" class="status onprogress ">
                            <a href="Ajouter_Presence.php" > Ajouter</a>
                        </span>  -->
                <!-- </td> -->
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
             