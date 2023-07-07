<?php

session_start();

    require('validation/absence.php');
    
    // if (isset($_GET['success'])) {
    //     $msg= $_GET['success'];
    // }

    // if(isset($_GET['error'])){
    //     $error = $_GET['error'];
    // }



 
if (!$_SESSION['id']) {
    header("Location: ../../");
}

$id = $_SESSION["id"];

 // On se connecte a la base de données
 $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

 // Je vais faire une requete pour recuperer toutes les presences
 $all_absence = $connection->query("SELECT * FROM absence WHERE Id_utilisateur=$id");
 
 ?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- -->
    <link rel="stylesheet" href="../../assets/css/papa1.CSS">
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
            <img src="../../assets/images/1_bg.png" class=" logo">
            
            <form action="">
                <!-- <p class="profile-name"> -->
                <div class="detail-headers">
                    <button type="submit"><a href="../../deconnexion/deconnexion.php">Deconnexion</a> </button></p>
                </div>
            </form>
          
        
            
        </div>

      
       
               
            
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
            <span class="fas fa-clipboard-list"></span><p><a href="../../collaborateurs/platform collaborateurs/tableau_demande_permission.php">Demandes_De <br>Permissions</a></p>

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
            <h2>REGISTRES DES ABSENCES</h2>
            <button><a href="../../collaborateurs/platform collaborateurs/page_absence.php" class="a"> + Absences</a></button>

        </div>
        <table>
            <tr>
                <th>date_jour</th>
                <th>date_debut</th>
                <th>date_fin</th>
                <th>MOTIF</th>
                <th>document</th>
                <th>Actions</th>
                
               
            </tr>
            <?php while($row = $all_absence->fetch()){ ?>
                <tr>
                    <td><?= date("d-m-Y", strtotime($row['date_jour'])) ?></td>
                    <td><?= date("d-m-Y", strtotime($row['date_debut'])) ?></td>
                    <td><?= date("d-m-Y", strtotime($row['date_fin'])) ?></td>
                    <td><?= $row['motif'] ?></td>
                    <td><?= $row['document'] ?></td>
                    <td>
                        <span class="status confirmed ">
                            <a href="modifier_absence.php?id=<?=$row["id"]?>" > Modifier</a>
                        </span>
                        
                        <!-- <span style="margin-left: 20px;" class="status onprogress ">
                            <a href="supprimer_absence.php?id=<?=$row["id"]?>" > Supprimer</a>
                        </span> -->
                    </td>
                   
                </tr>

            <?php } ?>
    
            <!-- <tr>
                <td>b</td>
                <td>b1</td>
                <td>b2</td>
                <td>d2</td>
               
            
    
    
            </tr>
            <tr>
                <td>c</td>
                <td>c1</td>
                <td>c2</td>
                <td>d2</td>
            
                
    
            </tr>
            -->
            
    
        </table>
        <?php 
        //  var_dump( $id )
        ?>
        
        <?php if ($msg) {

                        echo("
                            <div class='success' style='width:430px;background-color:lightgreen;color:white;text-align:center'>
                                <p>
                                    $msg
                                </p>
                            </div>
                        ") ;
                    }
         ?> 
                <?php if ($error) {
                    echo(" 
                        <div class='error' style='width:430px;background-color:#efa2a2;color:white;text-align:center;'>
                            <p>
                                $error
                            </p>
                        </div>
                        ") ;
            }  ?>  

        

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
             