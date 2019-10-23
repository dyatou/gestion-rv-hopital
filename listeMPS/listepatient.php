<!DOCTYPE html>
</html>
    <head>
        <meta charset="utf-8">
        <title>Gestion de rendez-vous de l'hopital</title>
        <link rel="stylesheet" href="../css/stylelistepatient.css">
        <script type="text/javascript" src="controle.js"></script>
    </head>   
    <body>
        <div id="box">
            
            <h3><u>LISTE DES PATIENTS</u></h3>

            <form action="" method="GET">
                <label for="recherche">Recherche </label><input type="search" name="id" id="recherche" placeholder="Entrez Matricule ex: 003">
            </form>

            <div class="retour"> 
                <button ><a href="../profil/secretariat.php">RETOUR</a></button>
            </div>

            <div id="conteneur">

            <?php
require "../connexion.php";

$reponse = $bdd->query('select * from patient');

    $compt = 1;

?>
 <table>
  <caption></caption>
 <th id="">MATRICULE</th> <th id="">PRENOM</th> <th id="">NOM</th> <th id="">NUMERO</th> <th id="">ACTION</th>


<?php

while ($ligne = $reponse->fetch())
{

?>
<tr>
<td>
    <?php echo '<font color="bleu" size="3">' . $compt . ') PT-00' . $ligne['id_patient'] ;?>
</td>
<td>
    <?php echo '<font color="white" size="3">' . $ligne['prenom'] ;?>
</td>
<td>
    <?php echo '<font color="white" size="3">' . $ligne['nom'] ;?>
</td>
<td>
    <?php echo '<font color="white" size="3">' . $ligne['numero'] ;?>
</td>
<td>
    <button><a onclick="alert('voulez vous continuer');" name="dossier" href= "dossierpatient.php?dossier=<?php echo $ligne['id_patient']; ?>" style="color: orange; text-decoration:none;">dossier</a></button>
 
    <button><a href= "../modifMPS/modifpatient.php?modifier=<?php echo $ligne['id_patient']; ?>" style="color: white; text-decoration:none;">modifier</a></button>

    <button><a href= "../listeMPS/listepatient.php?supprimer=<?php echo $ligne['id_patient']; ?>" style="color: red; text-decoration:none;">supprimer</a></button>
</td>
</tr>

<?php
$compt++;
}

    $prefixeMatricule = 'PT-00';

 $recherche = $_GET['id'];
   if (!empty($recherche))
   {
        //echo " <h3> </h3> ";

        $recherche = $prefixeMatricule.$recherche;

        $sql= 'SELECT * from patient where id_patient = :id';

        $rqt = $bdd->prepare($sql);
        $saisi = (int) $_GET['id'];

        $rqt->bindParam(':id', $saisi);
        $rqt->execute();

        if (!$rqt)
        {
             echo "Probleme d'accès a la liste des patients";
        }   
        else
        {
            if ($rqt->rowCount()==0)
            {
                 echo " <h4> Matricule : $recherche Patient non repertorier!</h4>";
            }
            else
            {
                foreach ($rqt as $lignes)
                {
                    echo ' <h3> Matricule : '. $recherche .' ' . $lignes['prenom'].' '.$lignes['nom']. ' tel : ' .$lignes['numero'] . '</h3>';
                }
            }
        }
    }
?>
</table> 

         </div> 

        </div>
    </body>
</html>

