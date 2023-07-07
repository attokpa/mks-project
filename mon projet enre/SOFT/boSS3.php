<?php   

    // On se connecte a la base de données
    $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

    // Je vais faire une requete pour recuperer toutes les presences
    $all_demande_permission = $connection->query("SELECT * FROM presence");
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
            <span class="fas fa-clipboard-list"></span><p><a href="acceil.php">acceuil</a></p>

            </span> 
             

        </div>
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="BOSS.php">T_presences</a></p>

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
            <h2>Demande absences</h2>
            <button><a href="PRESENCE.php" class="a"> + Demander</a></button>

        </div>
        <table>
            <tr>
                <th>id #</th>
                <th>nom et prenom</th>
               
                <th>Type absences</th>
                <th>description</th>
                <th>date_debut</th>
                <th>date_fin</th>
                <th>accepter</th>
                <th>refuser</th>
                
               
            </tr>
            <tr>
              
                <td>a1</td>
                <td>a1</td>
                <td>B</td>
                <td>today</td>
                <td>d2</td>
                <td>d2</td>
                <td><span class="status onprogress "><i class="fas fa-circle"><a href="#" >refuser</a></i></span></td>
                <td><span class="status confirmed "><i class="fas fa-circle"><a href="#"> confirmer</a></i></span></td>
            

               
            </tr>
            <tr>
                <td>b</td>
                <td>a1</td>
                <td>a1</td>
                <td>b1</td>
                <td>b2</td>
                <td>d2</td>
                <td><span class="status onprogress "><i class="fas fa-circle"><a href="#"> refuser</a></i></span></td>
                <td><span class="status confirmed "><i class="fas fa-circle"><a href="#"> confirmer</a></i></span></td>
            

               
            
    
    
            </tr>
            <!-- <tr>
                <td>c</td>
                <td>c1</td>
                <td>c2</td>
                <td>d2</td>
                <td>d2</td>
                <td>a1</td>
                <td><span class="status onprogress "><i class="fas fa-circle"><a href="#">onprogress</a></i></span></td>
                <td><span class="status confirmed "><i class="fas fa-circle"><a href="#">confirmed</a></i></span></td>
            
                
    
            </tr>
            <tr> <td>d</td>
                <td>d1</td>
                <td>d2</td>
                <td>d2</td>
                <td>d2</td>
                <td>a1</td>
                <td><span class="status onprogress "><i class="fas fa-circle"><a href="#"> onprogress</a></i></span></td>
                <td><span class="status confirmed "><i class="fas fa-circle"><a href="#">confirmed</a></i></span></td>
            
                
            </tr>
            <tr> 
                <td>d</td>
                <td>d1</td>
                <td>d2</td>
                <td>d2</td>
                <td>d2</td>
                <td>a1</td>
                <td><span class="status onprogress "><i class="fas fa-circle"><a href="#">onprogress</a></i></span></td>
                <td><span class="status confirmed "><i class="fas fa-circle"><a href="#">confirmed</a></i></span></td>
            
                
            </tr>
            <tr> 
                <td>d</td>
                <td>d1</td>
                <td>d2</td>
                <td>d2</td>
                <td>d2</td>
                <td>a1</td>
                <td><span class="status onprogress "><i class="fas fa-circle"><a href="#">onprogress</a></i></span></td>
                <td><span class="status confirmed "><i class="fas fa-circle"><a href="#" >confirmed</a></i></span></td>
            
                
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
             