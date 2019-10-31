<?php 

 //require '../classe.php';
   require ('../connexion.php');
   include_once ('../class/classe.php');

$Npatient = new Patient;

if (!empty($_POST['prenom']) && !empty($_POST['nom'])) 
    {
    
        $Npatient->set_prenom($_POST['prenom']);
        $Npatient->set_nom($_POST['nom']);
        $Npatient->set_age($_POST['age']);
        $Npatient->set_numero($_POST['numero']);
        $Npatient->set_adresse($_POST['adresse']);
        $Npatient->set_dateAjout($_POST['date_ajout']);
        $Npatient->set_objetConsultation($_POST['objet_consultation']);
        $Npatient->set_medecinRattache($_POST['medecin_rattache']);
        $Npatient->set_groupeSg($_POST['groupe_sg']);
        $Npatient->set_poids($_POST['poids']);
        $Npatient->set_taille($_POST['taille']);
        $Npatient->set_tension($_POST['tension']);
        //$Npatient->set_dateRv($_POST['date_rv']);
        //$Npatient->set_heureRv($_POST['heure_rv']);

        //echo 'Bonjour' . $Npatient->get_prenom();

        $prenom = $Npatient->get_prenom();
        $nom = $Npatient->get_nom();
        $age = $Npatient->get_age();
        $numero = $Npatient->get_numero();
        $adresse = $Npatient->get_adresse();
        $dateAjout = $Npatient->get_dateAjout();
        $objetConsultation = $Npatient->get_objetConsultation();
        $medecinRattache = $Npatient->get_medecinRattache();
        $groupeSg = $Npatient->get_groupeSg();
        $poids = $Npatient->get_poids();
        $taille= $Npatient->get_taille();
        $tension = $Npatient->get_tension();
        //$dateRv= $Npatient->get_dateRv();
        //$heureRv = $Npatient->get_heureRv();

    $requete = $bdd->prepare('INSERT into patient (nom, prenom, age, numero, adresse, date_ajout, objet_consultation, medecin_rattache, groupe_sg, poids, taille, tension) values ( :nom, :prenom, :age, :numero, :adresse, :dateAjout, :objetConsultation, :medecinRattache, :groupeSg, :poids, :taille, :tension)');

    $requete->bindparam(':nom', $nom);
    $requete->bindparam(':prenom', $prenom);
    $requete->bindparam(':age', $age);
    $requete->bindparam(':numero', $numero);
    $requete->bindparam(':adresse', $adresse);
    $requete->bindparam(':dateAjout', $dateAjout);
    $requete->bindparam(':objetConsultation', $objetConsultation);
    $requete->bindparam(':medecinRattache', $medecinRattache);
    $requete->bindparam(':groupeSg', $groupeSg);
    $requete->bindparam(':poids', $poids);
    $requete->bindparam(':taille', $taille);
    $requete->bindparam(':tension', $tension);
    //$requete->bindparam(':dateRv', $dateRv);
    //$requete->bindparam(':heureRv', $heureRv);

    $requete->execute();

}

// recuperation de l'identifiant du dernier patient
    $pt = $bdd->query('SELECT id_patient FROM patient'); 
    while ($ligne = $pt->fetch()) 
    {
        $NouveauPT = $ligne['id_patient'];  

    } 
     $NouveauPT++;
        
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ajout de nouveau patient</title>
        <link rel="stylesheet" href="../css/styleajoutpatient.css">
        <script type="text/javascript" src="../controle.js"></script>
        
    </head>   
    <body>
         <div id="box">
            <h3><u>AJOUT DE NOUVEAU PATIENT</u></h3>

            <H4>ID: PT-00<?php echo $NouveauPT; ?> </H4>

            
            <form action="" method="POST">
            <div id="contenu">
            <div class="col">
                <label for="prenom">Prenom</label><br>
                    <input type="text" name="prenom" id="prenom" required="" autofocus=""><br>
                <label for="nom">Nom</label><br>
                    <input type="text" name="nom" id="nom" required=""><br>
                <label for="age">Age</label><br>
                    <input type="number" name="age" id="age" required=""><br>
                <label for="numero">Numero</label><br>
                    <input onblur="//validerNom(this.value)" type="tel" name="numero" id="numero" required=""><br>
                <label for="adresse">Adresse</label><br>
                    <input type="text" name="adresse" id="adresse" required=""><br>
                <label for="dateAjout">Date Ajout</label><br>
                    <input class="color" type="date" name="date_ajout" disabled="disabled" value="<?php echo $date= date('Y-m-d');?>"><br>
            </div>
            <div class="col">
                <label>Objet de la consultation </label><br>
                <textarea name="objet_consultation" rows="5" cols="25%" required=""></textarea><br>

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

         

            </div>

            <div class="col">
               <label for="groupeSG">Groupe SG</label><br><input type="text" name="groupe_sg"><br>
               <label for="poids">Poids</label><br><input type="number" name="poids"><br>
               <label for="Taille">Taille</label><br><input type="number" name="taille"><br>
               <label for="tension">Tension</label><br><input type="text" name="tension"><br>

               <?php
                    //selection de la date et heure du RV selon la specialite choisie
               //liste deroulante?
                    $recupespecialite = $bdd->query('SELECT * FROM specialite');
 
               ?>

               <label>Date RV disponible</label><br><input class="color" type="date" name="date_rv" disabled="disabled" value="<?php //echo $datedispo ?>"><br>
               <label>Heure RV</label><br><input class="color" type="time" name="heure_rv" disabled="disabled" value="<?php //echo $heuredispo ?>"><br><br>
            </div>

        </div>

        <div id="validation">
                <input type="submit" name="envoyer" value="ENREGISTRER"> <br>
                <input type="reset" name="annuler" value="ANNULER"><br><br>        
        </div> 
<details><summary>Apercu</summary>
         <div id="apercu">
            
            <?php
                echo ' PRENOM : '. $prenom . '<br>'.
                     ' NOM : '. $nom . '<br>' .
                     ' AGE : '. $age . '<br>' .
                     ' OBJET CONSULTATION : '. $objetConsultation . '<br>' .
                     ' MEDECIN SPECIALISTE : ' . $medecinRattache . '<br>' .
                     ' DATE RENDEZ_VOUS : ' . $dateRv . '<br>' .
                     ' HEURE: '. $heureRv . '<br>';

            ?>
            <button>OK</button>

        </div>  
</details>         
            </form>  

        <div class="deconnexion">
            <button><a href="../profil/secretariat.php">RETOUR</a></button>
        </div>

      </div> 
    </body>
</html>
