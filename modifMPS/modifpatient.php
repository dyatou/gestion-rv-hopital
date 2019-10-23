<?php
require '../connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') 
 {
    $nom1 = $prenom1 = $age1 = $numero1 = $medecin_rattache1 = $objet_consultation1 = $adresse1 = $groupe_sg1 = $poids1 = $taille1 = $tension1 = $date_ajout1 = $date_rv1 = $heure_rv1 = $statut1 = "";
     $modifier = $_GET['modifier'];
     //echo $modifier;
     $reponse = $bdd->prepare('SELECT * FROM patient WHERE id_patient=:modifier');
     $reponse -> bindparam(':modifier', $_GET['modifier']);
     $reponse->execute();

     while ($ligne = $reponse->fetch()) 
     {
         $nom1 = $ligne['nom'];
         $prenom1 = $ligne['prenom'];
         $age1 = $ligne['age'];
         $numero1 = $ligne['numero'];
         $medecin_rattache1 = $ligne['medecin_rattache'];
         $objet_consultation1 = $ligne['objet_consultation'];
         $adresse1 = $ligne['adresse'];
         $date_ajout1 = $ligne['date_ajout'];
         $date_rv1= $ligne['date_rv'];
         $heure_rv1 = $ligne['heure_rv'];
         $groupe_sg1 = $ligne['groupe_sg'];
         $poids1 = $ligne['poids'];
         $taille1 = $ligne['taille'];
         $tension1 = $ligne['tension'];
         $statut1 = $ligne['statut'];
     }
    
 }

 //pour l'enregistrement des modifications
 if ($_SERVER['REQUEST_METHOD' == 'POST']) 
 {

     $nom = $prenom = $age = $numero = $medecin_rattache = $objet_consultation = $adresse = $groupe_sg = $poids = $taille = $tension = $date_ajout = $date_rv = $heure_rv = $statut = "";
 if (isset($_POST['envoyer'])) 
 {
    $nom= $_POST['nom'];
    $prenom= $_POST['prenom'];
    $age= $_POST['age'];
    $numero= $_POST['numero'];
    $medecin_rattache = $_POST['medecin_rattache'];
    $objet_consultation = $_POST['objet_consultation'];
    $date_ajout= $_POST['date_ajout'];
    $date_rv = $_POST['date_rv'];
    $heure_rv = $_POST['heure_rv'];

    $adresse = (!empty($_POST['adresse'])) ? $_POST['adresse']: "---" ;
    $groupe_sg = (!empty($_POST['groupe_sg'])) ? $_POST['groupe_sg']: "---" ;
    $poids = (!empty($_POST['poids'])) ? $_POST['poids']: "---" ;
    $taille = (!empty($_POST['taille'])) ? $_POST['taille']: "---" ;
    $tension = (!empty($_POST['tension'])) ? $_POST['tension']: "---" ;
    $statut = (!empty($_POST['statut'])) ? $_POST['statut']: "---" ;

     $sql = $bdd->prepare('UPDATE patient SET prenom=:prenom, nom=:nom, age=:age, numero=:numero, adresse=:adresse, objet_consultation=:objet_consultation, medecin_rattache=:medecin_rattache, date_ajout=:date_ajout, date_rv=:date_rv, heure_rv=:heure_rv, groupe_sg =:groupe_sg, poids=:poids, taille=:taille, tension=:tension WHERE id_patient = :modifier');

 //$sql = $bdd->prepare('insert into patient (nom, prenom, age, numero, adresse, date_ajout, groupe_sg, poids, taille, tension, objet_consultation, medecin_rattache, date_rv, heure_rv, statut) Values (:nom, :prenom, :age, :numero, :adresse, :date_ajout, :groupe_sg, :poids, :taille, :tension, :objet_consultation, :medecin_rattache, :date_rv, :heure_rv, :statut)');

 $sql -> bindparam(':modifier', $_GET['modifier']);
 $sql -> bindparam(':nom', $nom);
 $sql -> bindparam(':prenom', $prenom);
 $sql -> bindparam(':age', $age);
 $sql -> bindparam(':numero', $numero);
 $sql -> bindparam(':adresse', $adresse);
 $sql -> bindparam(':date_ajout', $date_ajout);
 $sql -> bindparam(':groupe_sg', $groupe_sg);
 $sql -> bindparam(':poids', $poids);
 $sql -> bindparam(':taille', $taille);
 $sql -> bindparam(':tension', $tension);
 $sql -> bindparam(':objet_consultation', $objet_consultation);
 $sql -> bindparam(':medecin_rattache', $medecin_rattache);
 $sql -> bindparam(':date_rv', $date_rv);
 $sql -> bindparam(':heure_rv', $heure_rv);
 $sql -> bindparam(':statut', $statut);

 $sql->execute();
}

}
?>

<!DOCTYPE html>
</html>
    <head>
        <meta charset="utf-8">
        <title>Ajout de nouveau patient</title>
        <link rel="stylesheet" href="../css/styleajoutpatient.css">
        <script type="text/javascript" src="../controle.js"></script>
        
    </head>   
    <body>
         <div id="box">
            <h3><u>AJOUT DE NOUVEAU PATIENT</u></h3>

            <H4>ID: PT-00</H4>

            
            <form action="" method="POST">
            <div id="contenu">
            <div class="col">
                <label for="prenom">Prenom</label><br><input type="text" name="prenom" value="<?php echo($prenom1) ?>" id="prenom" required="" autofocus=""><br>
                <label for="nom">Nom</label><br><input type="text" name="nom" value="<?php echo($nom1) ?>" id="nom" required=""><br>
                <label for="age">Ages</label><br><input type="number" name="age" value="<?php echo($age1) ?>" id="age" required=""><br>
                <label for="numero">Numero</label><br><input onblur="//validerNom(this.value)" type="tel" value="<?php echo($numero1) ?>" name="numero" id="numero" required=""><br>
                <label for="adresse">Adresse</label><br><input type="text" name="adresse" value="<?php echo($adresse1) ?>" id="adresse" required=""><br>
                <label for="dateAjout">Date Modification</label><br><input class="color" type="date" name="date_ajout" disabled="disabled" value="<?php echo $date= date('Y-m-d');?>"><br>
            </div>
            <div class="col">
                <label>Objet de la consultation </label><br>
                <textarea name="objet_consultation" rows="5" cols="25%" required=""><?php echo($objet_consultation1) ?></textarea><br>
                <label>Medecin specialiste</label>
                <select class="color" name="medecin_rattache">
                    <optgroup value="generaliste" label="Generaliste">
                        <option value="Generaliste">Generaliste</option>
                    </optgroup>              
                    <optgroup value="specialiste" label="specialiste">
                        <option value="Dermatologue">Dermatologue</option>
                        <option value="Hematologue">Hematologue</option>
                        <option value="Psychiatre">Psychiatre</option>
                        <option value="O.R.L">O.R.L</option>
                        <option value="Ophtalmologue">Ophtalmologue</option>
                        <option value="Obstétrique et gynécologue">Obstétrique et gynécologue</option>
                        <option value="Pediatre">Pediatre</option>
                        <option value="Urologue">Urologue</option>
                    </optgroup>
                    <optgroup value="chirugie" label="chirugien specialiste">
                        <option value="Chirurgie cardiaque">Chirurgie cardiaque</option>
                        <option value="Chirurgie colorectale">Chirurgie colorectale</option>
                        <option value="Chirurgie generale">Chirurgie générale</option>
                        <option value="Chirurgie générale oncologique">Chirurgie générale oncologique</option>
                        <option value="Chirurgie générale pédiatrique">Chirurgie générale pédiatrique</option>
                        <option value="Chirurgie orthopédique">Chirurgie orthopédique</option>
                        <option value="Chirurgie plastique">Chirurgie plastique</option>
                        <option value="Chirurgie thoracique">Chirurgie thoracique</option>
                        <option value="Chirurgie vasculaire">Chirurgie vasculaire</option>

                    </optgroup>
                </select><br><br>

            </div>

            <div class="col">
               <label for="groupeSG">Groupe SG</label><br><input type="text" name="groupe_sg"><br>
               <label for="poids">Poids</label><br><input type="number" name="poids"><br>
               <label for="Taille">Taille</label><br><input type="number" name="taille"><br>
               <label for="tension">Tension</label><br><input type="text" name="tension"><br>
               <input type="hidden" name="id_patient" value="<?php echo $modifier  ?>"><br>

               <label>Date RV</label><br><input class="color" type="date" name="date_rv" value="<?php ?>"><br>
               <label>Heure RV</label><br><input class="color" type="time" name="heure_rv" disabled="disabled" value="<?php ?>"><br><br>
            </div>

        </div>

        <div id="validation">
                <input type="submit" name="envoyer" value="ENREGISTRER"> <br>
                <input type="reset" name="annuler" value="ANNULER"><br><br>        
        </div>            
            </form>  

        <div class="deconnexion">
            <button><a href="../profil/secretariat.php">RETOUR</a></button>
        </div>

      </div> 
    </body>
</html>


