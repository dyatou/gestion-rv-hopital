<?php
require '../connexion.php';
include_once '../class/classe.php';

if (isset($_POST['envoyer'])) 
{
  //$prenom = (!empty($_POST['prenom'])) ? $_POST['prenom'] : "" ;
  $Nmedecin = new Medecin($_POST['prenom'], $_POST['nom'], $_POST['numero'], $_POST['mail'], $_POST['statut'], $_POST['dateajout'], $_POST['login'], $_POST['passwd']);

//        getMedecin();
        $prenom = $Nmedecin->prenom;
        $nom = $Nmedecin->nom;
        $numero = $Nmedecin->numero;
        $mail = $Nmedecin->mail;
        $statut = $Nmedecin->statut;
        $dateajout = $Nmedecin->dateajout;
        $login = $Nmedecin->login;
        $passwd = $Nmedecin->passwd;


        echo "$prenom $nom $numero $mail $statut $dateajout $login $passwd";
      }
?>
<!DOCTYPE html>
</html>
    <head>
        <meta charset="utf-8">
        <title>Ajout de nouveau de medecin</title>
        <link rel="stylesheet" href="../css/styleajoutmedecin.css">
    </head>   
    <body>
    	<div id="box">

    	<h3>Bienvenu dans l'espace ajout medecin</h3>

      		<form action="" method="POST">
            <div id="contenu">
            <div class="col">
            <fieldset><legend>Nouveau Enregistrement</legend>
                <label for="prenom">Prenom</label><br>
                    <input type="text" name="prenom" id="prenom" required="" autofocus=""><br>
                <label for="nom">Nom</label><br>
                    <input type="text" name="nom" id="nom" required=""><br>
                <label for="numero">Numero</label><br>
                    <input type="number" name="numero" id="numero" required=""><br>

                <?php
            		// recuperation des differentes specialites dans la bd
            		require '../connexion.php';

            		$recupe = $bdd->query('SELECT * FROM specialite');
            		echo '<label>Specialite </label><br><select class="color" name="specialite>';
            		while ($ligne = $recupe->fetch()) 
            		{
            			echo '<option value="'.$ligne['id_specialite'].' "> '.$ligne['nom_specialite'].'</option>';

            		}
            		echo '</select><br>';

            	?>

                <label for="dateAjout">Date Ajout</label><br>
                    <input class="color" type="date" name="date_ajout" disabled="disabled" value="<?php echo $date= date('Y-m-d');?>"><br>
               </fieldset>
           </div>
           <div class="col">
           	<fieldset><legend>Ajouter plus de detail</legend>
              <details><summary>Plus de details</summary>
                <label for="email">E-Mail</label><br>
                    <input type="email" name="mail" id="email"><br>
                <label for="statut">Statut</label><br>
                    <input type="text" name="statut" id="statut"><br>
                 <label for="login">Login</label><br>
                    <input type="text" name="login" id="login"><br>
                <label for="passwd">Passwd</label><br>
                    <input type="text" name="passwd" id="passwd"><br>
              </details>
            </fieldset>
            </div>
            <div class="col">

            	<!--
               
            	-->
            <fieldset class="checkbox"><legend>Horaire Medecin</legend>
               <label for="jour">JOUR DE TRAVAIL</label><br>
               		<input type="checkbox" name="lundi" value="lundi">lundi<br>
               		<input type="checkbox" name="mardi" value="mardi">mardi<br>
               		<input type="checkbox" name="mercredi" value="mercredi">mercredi<br>
               		<input type="checkbox" name="jeudi" value="jeudi">jeudi<br>
               		<input type="checkbox" name="vendredi" value="vendredi">vendredi<br>
               <label for="heure">HEURE DE TRAVAIL</label><br>
               		<input type="checkbox" name="matin">Matin de 8h-12h<br>
               		<input type="checkbox" name="soir">Soir de 15h-17h<br>
            </fieldset>
            </div>

 

        </div>

        <div id="validation">
                <input type="submit" name="envoyer" value="ENREGISTRER"> <br>
                <input type="reset" name="annuler" value="ANNULER"><br><br>        
        </div> 

    	</form>

    	<div class="deconnexion">
            <button><a href="../profil/administrateur.php">RETOUR</a></button>
        </div>

 	</div>
    </body>
</html>


