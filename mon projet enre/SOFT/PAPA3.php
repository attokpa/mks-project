<?php
 // On se connecte a la base de données
 $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

 // Je vais faire une requete pour recuperer toutes les presences
 $all_demande_permission = $connection->query("SELECT * FROM demande_permission");
 
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
           
            
        </div>
    </nav>
         <!-- sidebar -->

    <input type="checkbox" id="toggle">
    <label class="side-toggle"
    for="toggle"><span class="fas fa-bars"></span></label>
    <div class="sidebar">
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="acceil.php"> acceuil</a></p>

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
            <h2>Demande absences</h2>
            <button><a href="PRESENCE.php" class="a"> + Demander</a></button>

        </div>
        <table>
            <tr>
                <th>id #</th>
               
                <th>date debut</th>
                <th>date fin</th>
                <th>type absence</th>
                <th>description</th>
                
               
            </tr>
            <?php while($row = $all_demande_permission->fetch()){ ?>
                <tr>
                    <td> <?= $row['id'] ?></td>
                    <td> <?= $row['date_debut'] ?></td>
                    <td><?= $row['date_fin'] ?></td>
                    <td><?= $row['type_absence'] ?></td>
                    <td><?= $row['descriptions'] ?></td>
                   
                </tr>
            <?php } ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

               
            
    
    
            </tr>
            <!-- <tr>
                <td>c</td>
                <td>c1</td>
                <td>c2</td>
                <td>d2</td>
                <td>d2</td>
            
                
    
            </tr>
            <tr> <td>d</td>
                <td>d1</td>
                <td>d2</td>
                <td>d2</td>
                <td>d2</td>
                
                
            </tr>
            <tr> 
                <td>d</td>
                <td>d1</td>
                <td>d2</td>
                <td>d2</td>
                <td>d2</td>
               
                
            </tr>
            <tr> 
                <td>d</td>
                <td>d1</td>
                <td>d2</td>
                <td>d2</td>
                <td>d2</td>
                
                
            </tr> -->
     
        </table>
        
    

        

    </div>
    </div>
    </main>
    <!-- <footer>
        <div class="copy"><a href="presenz.html">presence</a>|<a href="papa1.HTML"> absences  </a>|<a href="PAPA3.HTML"> demande de permission </a>|<a href="#">parametre</a>|
           
        </div>
        <div class="copyright">Copyright © Attokpaachouester@gmail.com
           
        </div>



    </footer> -->

</body>
</html>
             