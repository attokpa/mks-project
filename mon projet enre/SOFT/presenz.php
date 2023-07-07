<?php   

    // On se connecte a la base de données
    $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

    // Je vais faire une requete pour recuperer toutes les presences
    $all_presence = $connection->query("SELECT * FROM presence");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- -->
    <link rel="stylesheet" href="papa1.CSS">
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
            <p class="profile-name"><a href="#" class="z">  deconnexion</a></p>
           
            
        </div>
    </nav>
         <!-- sidebar -->

    <input type="checkbox" id="toggle">
    <label class="side-toggle"
    for="toggle"><span class="fas fa-bars"></span></label>
    <div class="sidebar">
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="acceil.html"> accueil</a></p>

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
    <main>
    <div class="deshboard-container">
            <!-- 4 cards top -->
    <div class="card detail">
        <div class="detail-header">
            <h2>Register tables</h2>
            <button><a href="1.php" class="a"> + Presences</a></button>

        </div>
        <table>
            <tr>
                <th>id #</th>
                <th>date_jour</th>
                <th>heure_arrivee</th>
                <th>heure_sortie </th>
                <th>profession</th>
            </tr>
            <?php while($row = $all_presence->fetch()){ ?>
                <tr>
                    <td> <?= $row['Id'] ?> </td>
                    <td> <?= $row['date_jour'] ?> </td>
                    <td><?= $row['heure_arrivee'] ?></td>
                    <td><?= $row['heure_sortie'] ?></td>
                    <td><?= $row['profession'] ?></td>
                </tr>
            <?php } ?>
    
        </table>
        
    

        

    </div>
    </div>
    </main>
    <footer>
        <div class="copy"><a href="presenz.php">presence</a>|<a href="papa1.php"> absences  </a>|<a href="PAPA3.HTML"> demande de permission </a>|<a href="#">parametre</a>|
           
        </div>
        <div class="copyright">Copyright © Attokpaachouester@gmail.com
           
        </div>



    </footer>

</body>
</html>
             