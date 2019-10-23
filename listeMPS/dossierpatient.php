<!DOCTYPE html>
</html>
    <head>
        <meta charset="utf-8">
        <title>Dossier des patients</title>
        <link rel="stylesheet" href="../css/styledossierpatient.css">
    </head>   
    <body>
        <div class="box">

<?php

    require '../connexion.php';

    echo '<h2><u> DOSSIER PATIENT </u></h2>';

    $recherche = $_GET['dossier'];

   if (!empty($recherche))
   {
        //echo " <h3> </h3> ";

        $reponse = $bdd->prepare('SELECT * from patient where id_patient = :id');

        $reponse->bindParam(':id', $_GET['dossier']);
        $reponse->execute();

        if (empty($reponse))
        {
             echo "Probleme d'accès a la liste des patients";
        }   
        else
        {
            if ($reponse->rowCount()==0)
            {
                 echo " <h4> Matricule : $recherche Patient non repertorier!</h4>";
            }
            else
            {
                echo '<table>';

                foreach ($reponse as $ligne)
                {
                    echo 
                    '<tr>
                        <th> Prenom </th><td>'.$ligne['prenom'].'</td>
                    </tr>
                    <tr>
                        <th> Nom </th><td>'.$ligne['nom'].'</td>
                    </tr>
                    <tr>
                        <th> Age </th><td>'.$ligne['age'].'</td>
                    </tr>
                    <tr>
                        <th> Adresse </th><td>'.$ligne['adresse'].'</td>
                    </tr>
                    <tr>
                        <th> Date RV </th><td>'.$ligne['date_rv'].'</td>
                    </tr>
                    <tr>
                        <th> Heure RV </th><td>'.$ligne['heure_rv'].'</td>
                    </tr>
                    <tr>
                        <th> Specialiste </th><td>'.$ligne['medecin_rattache'].'</td>
                    </tr>
                    <tr>
                        <th> Consultation </th><td>'.$ligne['objet_consultation'].'</td>
                    </tr>
                    <tr>
                        <th> Poids </th><td>'.$ligne['poids'].'</td>
                    </tr>
                    <tr>
                        <th> Taille </th><td>'.$ligne['taille'].'</td>
                    </tr>
                    <tr>
                        <th> Groupe Sanguin </th><td>'.$ligne['groupe_sg'].'</td>
                    </tr>
                    <tr>
                        <th> Date enregistrement </th><td>'.$ligne['date_ajout'].'</td>
                    </tr>
                    <tr>
                        <th> Statut</th><td>'.$ligne['statut'].'</td>
                    </tr>';
                }

                echo '</table>';
            }
        }
    }
    echo '<br><h4><a href="listepatient.php">RETOUR</a></h4>';
?>

        </div>
    </body>
</html>