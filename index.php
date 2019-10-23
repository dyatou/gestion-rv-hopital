<?php
      session_start(); 

    if (isset($_POST['valider'])) 
    {
        require'connexion.php';
        if (isset($_POST['user']) && isset($_POST['passwd'] ))
        {
            $user = htmlspecialchars($_POST['user']);
            $passwd = htmlspecialchars($_POST['passwd']);

        $reponse = $bdd->prepare('select id_utilisateur, code, motpasse, login from utilisateur WHERE login = :user');
        
        $reponse->execute(array(
            'user' => $user));

         $ligne = $reponse->fetch();
        
        if (!$ligne) 
        {
            $erreur = "Nom d'utilisateur incorrecte";
        }
        else 
        {
           if ($passwd == $ligne['motpasse']) 
           {
   
               if ($ligne['code'] == 1) 
               {                  
                   header("Location: profil/administrateur.php");
                   //echo "vous etes administrateur";
               }
               elseif ($ligne['code'] == 2) 
               {
                   header("Location: profil/medecin.php");
                   //echo "vous etes medecin";                  
               } 
               elseif ($ligne['code'] == 3) 
               {
                   header("Location: profil/secretariat.php");
                   //echo "vous etes secretaire";
               }
               
               $_SESSION['id'] = $ligne['id_utilisateur'];
               $_SESSION['utilisateur'] = $ligne['login'];
               //echo 'Connexion reussit';
              
           }
           else 
           {
               $erreur = 'Mot de passe incorrecte';
           }
        }

    }
        
    }?>

<!DOCTYPE html>
</html>
    <head>
        <meta charset="utf-8">
        <title>Gestion de rendez-vous de l'hopital</title>
        <link rel="stylesheet" href="css/style.css">
    </head>   
    <body>
        <div class="box">
            <h3>Connexion</h3>
            <form method="POST" action="">
                <div class="inputBox">
                    <input type="text" name="user" required="">
                    <label>Utilisateur</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="passwd" required="">
                    <label>Mot de passe</label>
                </div>
                <input type="submit" name="valider" value="valider">
                <?php if (!empty($erreur)) { echo '<span style="color : red";>' . $erreur . '</span>';}?>
            </form>
        </div>
        <!--
        <div class="admin">
           <button><a href="#">Contactez Admistrateur</a></button> 
        </div>
      -->
    </body>
</html>







