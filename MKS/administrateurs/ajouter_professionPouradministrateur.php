<?php

session_start();
if (!isset($_SESSION["code"])) {
    $_SESSION["code"] = 2; 
}
 

?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/INSCRIPTION.CSS">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    
    <title>Document</title>
</head>
<body>
<nav class="navbar">
        <h4>MKS SOFT TECHNOLOGIES 
            <!-- <div class="mon"><li class="active"><a href="../../../mon projet enre/inscription.php"> pour managers</a></li></div> -->
            <div class="mun"><li><a href="pagA.php" >Accueil</a></li></div>
            
             <div class="mun"><li><a href="../index.php"> Deconnexion</a></li></div> 
            
            
        </h4>
        <div class="profile">
            <!-- <span class="fas fa-search"></span> -->
            <img src="../assets/images/1_bg.png" class=" logo">
            
           
        </div>
        
        

    </nav>
 

    </div>
  
    <section>
        
        <aside>
       
        <form method="POST" action="enregistrerProfessionPourAdministrateur.php" >
                <h3>Ajout Professions </h3>
               
                <div class="input-box">
                    <label>PROFESSION :</label>
                    <input type="text"  name="nom" >
                   
                </div>
            
                <div class="buttons">
                    <button type="submit" name="valider">Ajouter</button>
                </div>

                
        </form>
        <?php if ($_SESSION["code"] === 1 || $_SESSION["code"] === 0): ?>
            <p style="padding: 5px; font-size: 17px; "><?php echo $_SESSION["msg"] ?></p>
        <?php endif ?>
           
      
        
           
            </aside>
            </section>
        
    
</body>
</html>

<?php $_SESSION["code"] = 2; ?>