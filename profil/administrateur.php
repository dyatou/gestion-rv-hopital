<?php 
    session_start();
 ?>
<!DOCTYPE html>
</html>
    <head>
        <meta charset="utf-8">
        <title>Espace Administrateur</title>
        <link rel="stylesheet" href="../css/styleadministrateur.css">
    </head>   
    <body>
        <div class="box">
            <h3>Bienvenu Administrateur <?php echo $_SESSION['utilisateur']; ?></h3>
            <button><a href="../index.php">Deconnexion</a></button>
        <div>
         
    </body>
</html>


