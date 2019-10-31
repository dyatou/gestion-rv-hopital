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
        <title>Space d'acceuil secretariat</title>
        <link rel="stylesheet" href="../css/stylesecretariat.css">
    </head>   
    <body>

        <div id="box">
            
        <?php

         
         if (!empty( $_SESSION['utilisateur'])) 
         {
           echo '<h2><u>Bienvenu dans l\'espace Secretaire ' . $_SESSION['utilisateur'] . '</u></h2>';
         }
  
       // echo "<h3> Les Rendez-Vous du jour </h3>";
        
        require "../connexion.php";

        $reponse = $bdd->query('select * from patient');

            $compt = 1;
            $compt2=0;
     ?>
      <div id="bouton">

              <div class="bouton1">
                <button><a href="../ajoutMPS/ajoutpatient.php" name="click">AJOUTER PATIENT</a></button>
                <script type="text/javascript">
                  //alert(prompt('bonjour'));
                  //function alertsms()
                 // {
                    //alert(prompt('bonjour tout le monde'));
                    //onmouseout = "alertsms()";
              
                  //}
                </script>
                <button><a href="../listeMPS/listepatient.php">LISTE PATIENT </a></button>
  
              </div>
              <div class="bouton1">
                <button><a href="../deconnexion.php">DECONNEXION</a></button>
             </div>
             <script type="text/javascript">
                 // var texte;
                 // function Prompt_and_run() 
                 // {
                 // texte = prompt("Bonjour. \nEntrez votre texte :");
                 // return affiche_dans_div();
                //  }
                 // function affiche_dans_div() {
                   //   var wikitext = document.getElementById("wikitext");
                     // return wikitext.innerHTML= "Votre texte : " + texte;
                  //}
            </script>
            <!--
                <a onmouseover="Prompt_and_run();"--> <!-- la fonction est exécutée lorsque la
                souris est sur l'ancre 
              Ecrire.
            </a>
              <div id="wikitext"></div> -->
      </div>

     <div id="contenu">
     <div class="col">
        <table>
          <caption><h3><u>Les Rendez-Vous du jour</u></h3></caption>
         <th id="">Matricule</th> <th id="">PRENOM</th> <th id="">NOM</th> <th id="">MEDECIN</th> <th id="">PLUS</th>
          
     <?php

     $date = date('Y-m-d');

    while ($ligne = $reponse->fetch())
    {
       // echo '<table><tr><td><font color="white">' . $compt . ') EM-000' . $ligne['id_patient'] .' '. $ligne['prenom'] .' '. $ligne['nom'] .' '. $ligne['numero'] . '</font></td>
       // <td><button><font color="white" size=2> Dossier </font></button></td></tr></table>';
    if ($ligne['date_rv'] == $date ) 
    {
   
    ?>
       <tr>
       <td> <?php echo '<font color="bleu">' . $compt . ') PT-00' . $ligne['id_patient'] ;?> </td>
       <td> <?php echo '<font color="white">' . $ligne['prenom'] ;?> </td>
       <td> <?php echo '<font color="white">' . $ligne['nom'] ;?> </td>
       <td> <?php echo '<font color="white">' . $ligne['medecin_rattache'] ;?> </td>
       <td> 
        
          <div id="plus">
            <button><a href= "../listeMPS/dossierpatient.php?dossier=<?php echo $ligne['id_patient']; ?>" style="color: white; text-decoration:none;">PLUS</a></button>
         
         <div class="corps">
          <?php echo $ligne['prenom'].' '.$ligne['nom']. '<br>age: '.$ligne['age'].'<br> adresse: '.$ligne['adresse'].'<br> date RV: '.$ligne['date_rv'].'<br> heure RV: '.$ligne['heure_rv'].'<br> specialiste: '.$ligne['medecin_rattache'].'<br> Consultation: '.$ligne['objet_consultation'].'<br>Poids: '.$ligne['poids'].'<br>Taille: '.$ligne['taille'].'<br>Groupe Sanguin: '.$ligne['groupe_sg'].'<br>Date enregistrement: '.$ligne['date_ajout'].'<br>Statut dossier: '.$ligne['statut']; ?>
        </div>
     
          </div>
      
        </td>    
       </tr>

        <!--
            <button><a href= "../listeMPS/listepatient.php?affiche=<?php //echo $ligne['id_patient']; ?>" style="color: green; text-decoration:none;">editer</a></button>
        -->
    <?php
     $compt++;
     $compt2++;
   }

    }
    if ($compt2 == 0) 
    {
      echo "<span>Vous n'avez pas de Rendez-Vous pour aujourd'hui </span>";
    }
    ?>
        </table>
      </div>
            
        <div class="col">        
      
        </div>
      </div>
 
    </body>
</html>


