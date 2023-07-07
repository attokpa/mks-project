<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="PRESENCE.CSS">
</head>
<body>
<section>
   
  
    <div class="class">
    <p class="p">VOUS AVEZ POINTE?</p>
    <p>Date jour</p>
    <p><input type="date"/></p>
    </div>
    
            
    <form>
       
        <div class="a">
           
            <p>Heure arrivee</p>
            <p><input type="time"/></p>
     
                    
        </div>
        <div class="b"> 
            <p>Heure sortie</p>

           
          
            <p><input type="time"/></p>
                    
        </div>
       
            
    </form><br><br><br>
    <button type="submit"><a href="#">Ajouter</a></button>
    </article> 
    <aside>
        <p class="demand">Demande d'absence</p>
        <p class="CL">selectionner le type d'absence et ajouter <br>
             une decription de votre demande de type d'absence</p>
             <p>type d'absence</p>
             <p><select>
                <option value="text">autre</option>
                <option value="text">permission</option>
                <option value="text">conges</option>
                <option value="text">maladie</option>
             </select>
             <p>Description</p>
             <textarea name="text" id="description" cols="52" rows="5"></textarea>



            <form class="deu">
       
                <div class="c">
                   
                    <p>Date de debut</p>
                    <p><input type="time"/></p>
             
                            
                </div>
                <div class="d"> 
                    <p>Date fin</p>
        
                   
                  
                    <p><input type="time"/></p>
                            
                </div>

               
                    
            </form>
            <textarea name="text" id="description" cols="52" rows="4" placeholder="messages" class="COLOR"></textarea><br><br><br>
            <button type="submit"><a href="#">envoyer</a></button>
           
            
            
    </aside>
   
</section>

        
</body>
</html> -->





<?php   
    $success ="";
    $error="";

    $connection = new PDO("mysql:host=localhost;dbname=projet;charset=UTF8",  "root", ""); 

    if(isset($_POST['valider'])){ 

        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];
        $type_absence = $_POST['type_absence'];
        $descriptions= $_POST['descriptions'];

        if( isset($date_debut) || isset($date_fin) || isset($type_absence) || isset($descriptions) ) {   

            if (!empty($date_debut) && !empty($date_fin) && !empty($type_absence) && !empty($descriptions)) {
                $query = $connection->query("INSERT INTO demande_permission(date_debut,date_fin, type_absence, descriptions) VALUES ('$date_debut', '$date_fin', '$type_absence', '$descriptions')");
                $success = "Bravo vous avez enregistré une presence";
                header("Location: papa3.php");
            } else {
                $error = "Désolé veuillez recommencer !!! ";
            }
            

        }
        else{
            $error = "Désolé veuillez recommencer !!! ";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- -->
    <link rel="stylesheet" href="1.CSS">
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
    <aside>
        <p class="demand">DEMANDE DE PERMISSIONS</p><br>
        <hr><br><br>
       

             <!-- <p>type d'absence</p><br>
             <p><select>
                <option value="text">autre</option>
                <option value="text">permission</option>
                <option value="text">conges</option>
                <option value="text">maladie</option>
             </select><br>
             <p>Description</p><br>
             <textarea name="text" id="description" cols="52" rows="5"></textarea><br>

 -->

        <form class="deu" method="POST" action="">

  
                               
                
            <div class="lign">
                <div class="c">
                   
                    <p>Date de debut</p><br>
                    <p><input type="date" name="date_debut"/></p><br>
                    
             
                            
                </div>
                <div class="d"> 
                    <p>Date fin</p><br>
        
                   
                  
                    <p><input type="date" name="date_fin"/></p><br>
                </div>        
            </div>
            <div>
                <p>type d'absence</p><br>
             <select name="type_absence">
                <option value="autre">autre</option>
                <option value="permission">permission</option>
                <option value="conges">conges</option>
                <option value="maladie">maladie</option>
             </select><br>
             <p>Descriptions</p><br>
             <textarea name="descriptions" id="description" cols="52" rows="5"></textarea>
            </div><br>
                
                             
                
                
                <div>

                <button type="submit" name="valider">envoyer</a></button>
                </div>
                 
                    
        </form>
            <div class="success" style="width:430px;background-color:lightgreen;color:white;text-align:center">
            <p> 
                <?php if ($success) {
                    echo $success;
                }  ?>  
            </p>
            </div>
            <div class="error" style="width:430px;background-color:#efa2a2;color:white;text-align:center">
            <p> 
                <?php if ($error) {
                    echo $error;
                }  ?>  
            </p>
            </div>
        

           
            
    </aside>
    <!-- <footer>
        <div class="copy"><a href="presenz.html">presence</a>|<a href="papa1.HTML"> absences  </a>|<a href="PAPA3.HTML"> demande de permission </a>|<a href="#">parametre</a>|
           
        </div>
        <div class="copyright">Copyright © Attokpaachouester@gmail.com
           
        </div>



    </footer> -->
</body>
</html>