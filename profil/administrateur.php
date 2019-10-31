<?php 
    session_start();
if(empty($_SESSION['utilisateur']))
{
    // Si inexistante ou nulle, on redirige vers la page de connexion
    header('Location: ../index.php');
    exit();
}
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
            <button><a href="../ajoutMPS/ajoutmedecin.php">AJOUTER MEDECIN</a></button>
            <button><a href="../ajoutMPS/ajoutspecialite.php">AJOUTER SPECIALITE</a></button><br>
            <button><a href="../index.php">Deconnexion</a></button>
            
        <div>
         
    </body>
</html>


