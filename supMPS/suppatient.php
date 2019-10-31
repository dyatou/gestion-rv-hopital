<?php
session_start();
require '../connexion.php';
$supprimer = $_GET['supprimer'];
$recupe = $bdd->query("DELETE FROM patient WHERE id_patient = $supprimer");
header('location : ../listeMPS/listepatient.php');
?>


