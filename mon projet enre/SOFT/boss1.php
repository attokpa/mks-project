<?php   

    // On se connecte a la base de données
    $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

    // Je vais faire une requete pour recuperer toutes les presences
    $all_absence = $connection->query("SELECT * FROM absence");
    // $all_utilisateur = $connection->query("SELECT * FROM utilisateur  WHERE nom,prenom");
    
    
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
            <span class="fas fa-clipboard-list"></span><p><a href="acceil.php"> acceil</a></p>

            </span> 
             

        </div>
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="BOSS.php">T_ presences</a></p>

        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="boss1.php">T_absences</a></p>

        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="boSS3.php">T_demandes de permission</a></p>

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
            <h2>Absences register</h2>
            <button><a href="#" class="a"> + valider</a></button>

        </div>
        <table>
            <tr>
                <th>id #</th>
                <th>noms et prenoms</th>
               
                <th>MOTIF</th>
                <th>date_debut</th>
                <th>date_fin</th>
                
               
            </tr>
            <tr>
              
                <td>a1</td>
                <td>B</td>
                <td>today</td>
                <td>d2</td>
                <td>d2</td>
               
            </tr>
            <tr>
                <td>b</td>
                <td>b1</td>
                <td>b2</td>
                <td>d2</td>
                <td>d2</td>
               
            
    
    
            </tr>
            <tr>
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
                
                
            </tr>
    
        </table>
        
    

        

    </div>
    </div>
    </main>
    <footer>
        <div class="copy"><a href="presenz.html">presence</a>|<a href="papa1.HTML"> absences  </a>|<a href="PAPA3.HTML"> demande de permission </a>|<a href="#">parametre</a>|
           
        </div>
        <div class="copyright">Copyright © Attokpaachouester@gmail.com
           
        </div>



    </footer>
</body>
</html>
             