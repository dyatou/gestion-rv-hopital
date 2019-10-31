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
        <title>Ajout de nouveau de medecin</title>
        <link rel="stylesheet" href="../css/stylemedecin.css">
    </head>   
    <body>
        <div id="box">

        <?php   
         
           echo '<h3><u>Bienvenu dans l\'espace Medecin ' . $_SESSION['utilisateur'] . '</u></h3>';
         
         ?>

            <form action="" method="POST">
            <div id="contenu">
           <!-- <div class="col">
              <fieldset><legend>Nouveau enregistrement</legend>
                <details><summary>Ajout Medecin</summary>
                <label for="prenom">Prenom</label><br>
                    <input type="text" name="prenom" id="prenom"  autofocus=""><br>
                <label for="nom">Nom</label><br>
                    <input type="text" name="nom" id="nom"><br>
                <label for="numero">Numero</label><br>
                    <input type="number" name="numero" id="numero" ><br>
                <label for="email">E-Mail</label><br>
                    <input type="email" name="mail" id="email"><br>
                </details><br>
              </fieldset>

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

                <label for="dateAjout">Date</label><br>
                    <input class="color" type="date" name="date_ajout" disabled="disabled" value="<?php echo $date= date('Y-m-d');?>"><br>
            </div> -->
            <div class="col">

                <!--
                <label>Specialite</label>
                <select class="color" name="specialite">
                    <optgroup label="Generaliste">
                        <option value="Generaliste">Generaliste</option>
                    </optgroup>              
                    <optgroup label="specialiste">
                        <option value="Cardiologue">Cardiologue</option>
                        <option value="Cancerologue">Cancerologue</option>
                        <option value="Chirurgien">Chirurgien</option>
                        <option value="Dermatologue">Dermatologue</option>
                        <option value="Geriatre">Geriatre</option>
                        <option value="Gynecologue">Gynecologue</option>
                        <option value="Hepatologue">Hepatologue</option>
                        <option value="Hematologue">Hematologue</option>
                        <option value="Infectiologue">Infectiologue</option>
                        <option value="Nephrologue">Nephrologue</option>
                        <option value="Neurologue">Neurologue</option>
                        <option value="Obstetricien">Obstetricien</option>
                        <option value="Odontologue">Odontologue</option>
                        <option value="Ophtalmologue">Ophtalmologue</option>
                        <option value="O.R.L">O.R.L</option>
                        <option value="Pediatre">Pediatre</option>
                        <option value="Pneumologue">Pneumologue</option>
                        <option value="Psychiatre">Psychiatre</option>
                        <option value="Radiologiste">Radiologiste</option>
                        <option value="Radiotherapeute">Radiotherapeute</option>
                        <option value="Rhumatologue">Rhumatologue</option>
                        <option value="Stomatologue">Stomatologue</option>
                        <option value="Therapeute">Therapeute</option>               
                        <option value="Urologue">Urologue</option>
                        
                    </optgroup>
                </select><br>
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

            <div class="col">

            <fieldset><legend>Planning de rendez-vous</legend>
               <label>Groupe RV N<sup>o</sup>1</label><br><input class="color" type="date" name="date_rv1" value="<?php ?>"><br>
               <label>Heure RV</label><br><input class="color" type="time" name="heure_rv" value="<?php ?>"><br>
               <details><summary>Ajouter + de RV</summary>
                <?php
                    $daterv = 2;
                    $prefrv = 'date_rv';

                    for ($i=2; $i<6 ; $i++) 
                    {
                    ?>
                    <label>Groupe RV N<sup>o</sup><?php echo $i ?></label><br><input class="color" type="date" name="<?php echo $prefrv.$daterv++?>"><br>
                    <?php    
                    }
                    ?>

               </details>
        <div id="validation">
            <button><a href="../modifMPS/planning.php">Modifier Planning</a></button>
        </div> 
           </fieldset>

            </div>

        </div>

        <div id="validation">
                <input type="submit" name="envoyer" value="ENREGISTRER"> <br>
                <input type="reset" name="annuler" value="ANNULER"><br><br>        
        </div> 

        </form>

        <div class="deconnexion">
            <button><a href="../deconnexion.php">Deconnexion</a></button>
        </div>

    </div>
    </body>
</html>


