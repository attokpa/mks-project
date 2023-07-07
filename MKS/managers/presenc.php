<?php

    session_start();
    // require('validation/presence.php');
    
    if (isset($_GET['success'])) {
        $msg= $_GET['success'];
    }

    if(isset($_GET['error'])){
        $error = $_GET['error'];
    }

    
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
            <span class="fas fa-clipboard-list"></span><p><a href="acceil.html"> accueil</a></p>

            </span> 
             

        </div> -->
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="../../collaborateurs/platform collaborateurs/tableau_presence.php">PRESENCES</a></p>

        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="../../collaborateurs/platform collaborateurs/tableau_absence.php">ABSENCES</a></p>

        </div> 
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="../../collaborateurs/platform collaborateurs/tableau_demande_permission.php">DEMANDES DE PERMISSIONS</a></p>

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
            <h2>REGISTRES DES PRESENCES</h2>

            <!-- Affichage du message de success quand on ajoute une et une seule presence -->
             
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
                

            <!-- Affichage du message de erreur quand on ajoute autre presence alors qu'on a dejà pointé -->


            <?php if ($error) {
                echo(" 
                    <div class='error' style='width:430px;background-color:#efa2a2;color:white;text-align:center;'>
                        <p>
                            $error
                        </p>
                    </div>
                    ") ;
            }  ?> 

            <form action="" method="post">
                <input class="presence" type="submit" value="Valider" name="presence">
            </form>

            <?php
            //  var_dump($date_jour. " Et il est :" .$heure); 
             ?>

        </div>
        <!-- <div class="success" style="width:90%;background-color:lightgreen;color:white;text-align:center;margin: 20px;padding: 20px 0px">
            <p>  -->
                 
            <!-- </p>
        </div> -->
    <table>
            <tr>
                <!-- <th>id #</th> -->
                <th>Date_jour</th>
                <th>Heure_arrivee</th>
                <th>Heure_sortie </th>
                <th>Actions</th> 
                <!-- <th>Supprimer</th> -->
                <!-- <th>profession</th> -->
            </tr>
        <?php while($row = $all_presence->fetch()){ ?>
            <tr>
                   
                    <td><?= date("d-m-Y", strtotime($row['date_jour'])) ?></td>
                    <td><?= $row['heure_arrivee'] ?></td>
                    <td><?= $row['heure_sortie'] ?></td>
                    <td>
                        <span class="status confirmed ">
                            <a href="validation/sortie.php?id=<?=$row["Id"]?>" > Départ</a>
                        </span>
                        
                        <!-- <span style="margin-left: 20px;" class="status onprogress ">
                            <a href="supprimer_presence.php?id=<?=$row["Id"]?>" > Supprimer</a>
                        </span> -->
                    </td>
                    <!-- <td></td>  -->
                     
                     
                    <!-- <td> -->
                        <?
                    //  echo $row['profession'] 
                     ?>
                     <!-- </td> -->
             
                     
            </tr>
        <?php } ?>
    
    </table>

       

        <?php 
        // var_dump(gettype($id));
        ?>
        
    

        

</div>
</div>
</main>
   
</body>
</html>
             