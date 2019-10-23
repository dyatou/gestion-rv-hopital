<?php 
    session_start(); 
 ?>
<!DOCTYPE html>
</html>
    <head>
        <meta charset="utf-8">
        <title>Gestion de rendez-vous de l'hopital</title>
        <link rel="stylesheet" href="../css/stylemedecin.css">
    </head>   
    <body>
        <div class="box">
            <h3>Bienvenu dans l'espace Medecin <?php echo $_SESSION['utilisateur']; ?></h3>
         
            <button><a href="../index.php">Deconnexion</a></button>
            
        </div>
    </body>
</html>


