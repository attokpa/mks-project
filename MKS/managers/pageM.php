<?php
session_start();
if (!$_SESSION['id']) {
    header("Location:../ ");
  }

$id = $_SESSION["id"];


  ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- -->
    <link rel="stylesheet" href="../assets/css/aceil.css">
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
                    <button type="submit"><a href="../deconnexion/deconnexion.php">Deconnexion</a> </button></p>
                </div>
            </form>
            
           
            <!-- <p class="profile-name"><a href="../maman/index.php" class="z">  + connecter</a></p> -->
        </div>
        
        

    </nav>
    <!-- sidebar -->

    <input type="checkbox" id="toggle">
    <label class="side-toggle"
    for="toggle"><span class="fas fa-bars"></span></label>
    <div class="sidebar">
        <!-- <div class="sidebar-menu">
            <span class="fa-calendrier-plus"></span><p><a href="acceil.html"> acceil</a></p>

            </span> 
             

        </div> -->


        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="pageM.php"> Accueil</a></p>

            </span> 
             

        </div>


        <!-- <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p><a href="acceil.html"> overview</a></p>

            </span> 
             

        </div> -->
        <!-- <div class="sidebar-menu">
            <span class="fas fa-user"></span><p><a href="../maman/index.php" >collaborateurs</a></p>


        </div> -->

        <div class="sidebar-menu">
            <span class="fas fa-fas fa-user"></span><p><a href="../managers/T_Presence.php"> Tableaux<br>D'emargements</a></p>
        </div>
           <div class="sidebar-menu">
            <span class="fas fa-chart-line"></span><p><a href="T_listecollaborateurs.php"> Collaborateurs</a></p>
        </div>  
        <div class="sidebar-menu">
            <span class="fas fa-id-card"></span><p><a href="../authentification/ajouter_profession.php" >Ajouter une  Professsion</a></p>
        </div> 
        <!-- <div class="sidebar-menu">
            <span class="fas fa-cog"></span><p>parametre </p>
        </div>  -->

    </div>
    <!-- main dashboard -->
    <main>
        <div class="deshboard-container">
            <!-- 4 cards top -->
            <div class="card total1">
                <div class="info">

                   <div class="info-detail">
                    <h3>vous avez pointés</h3><br>
                    <hr><br>
                    <p>heure arrivee</p><br>
                    <p>heure sortie</p><br>
                    <h2>0h 0m<span></span></h2>

                    <!-- <a href="#" class="p">ajouter</a> -->
                    
                   </div>
                    <div class="info-image">
                    <i class="  fas fa-clock fa-spin fa-3X"></i> 

                   </div> 
                </div>


            </div>
            <div class="card total2">
                <div class="info">
                <div class="info-detail">
                    <h3>pointés vos absences</h3><br>
                    <hr><br>
                    <p>date</p><br>
                    <p>motif</p><br>
                    <h2>j/m/a</h2>
                    <!-- <a href="#" class="p">pointe</a> -->
                    

                </div>
                <div class="info-image">
                    <i class="fas fa-hourglass-half fa-spin fa-3X"></i> 

                </div> 

            
                </div>

            </div>
            <div class="card total3">
                <div class="info">
                    <div class="info-detail">
                        <h3>demandes absences</h3><br><hr><br>
                        <p>demandez vos absences <br><br> en cas d'absences</p><br>
                        <h2>n fois</h2>
                        <!-- <a href="#" class="p">demandez</a> -->
                    

                    </div>
                     <div class="info-image">
                     <i class="fas fa-keyboard "></i> 

                    </div> 

                </div>

            </div>
            <div class="card total4">
                <div class="info">
                    <div class="info-detail">
                        <h3>parametre</h3><br><hr><br><br>
                        <!-- <p>se connecter</p><br><br><br><br> -->
                        <!-- <a href="#" class="p">conne</a> -->


                    </div>
                    </div>
                     <div class="info-image">
                     <i class="fas fa-cog"></i> 

                    </div> 

                </div>
            </div>


            <!-- 2 cards bottom -->
            <div class="card detail">
                <div class="detail-header">
                    <h2>Tableaux de registres</h2>
                    <!-- <button>enregistrer</button> -->

                </div>
                <table>
                    <tr>
                        <th>id #</th>
                        <th>nom et prenom </th>
                        <th>profession</th>
                        <th>date_jour</th>
                        <th>heure_arrivee</th>
                        <th>heure_sortie </th>
                       
                    </tr>
                    <tr>
                        <td>a</td>
                        <td>a1</td>
                        <td>B</td>
                        <td>today</td>
                        <td>a3</td>
                        <td>a3</td>
                    </tr>
                    <tr>
                        <td>b</td>
                        <td>b1</td>
                        <td>b2</td>
                        <td>b3</td>
                        <td>a3</td>
                        <td>a3</td>
            
            
                    </tr>
                    <tr>
                        <td>c</td>
                        <td>c1</td>
                        <td>c2</td>
                        <td>c3</td>
                        <td>a3</td>
                        <td>a3</td>
            
                    </tr>
                    <tr> <td>d</td>
                        <td>d1</td>
                        <td>d2</td>
                        <td>d3</td>
                        <td>a3</td>
                        <td>a3</td>
                    </tr>
                    <tr> 
                        <td>d</td>
                        <td>d1</td>
                        <td>d2</td>
                        <td>d3</td>
                        <td>a3</td>
                        <td>a3</td>
                    </tr>
                    <tr> 
                        <td>d</td>
                        <td>d1</td>
                        <td>d2</td>
                        <td>d3</td>
                        <td>a3</td>
                        <td>a3</td>
                    </tr>
            
                </table>
                
            
 
                

            </div>
            <!-- <div class="card customer"></div> 
           



        </div> -->

        </div>
    </main>

    
</body>
</html>