<?php
require 'includes/config.php';
$numstagiaire=$_GET['suppstag'];
$supProfile=mysqli_query($connexion,"DELETE FROM stagiaires WHERE numstagiaire='$numstagiaire'");
header ('location: liste_stagiaire.php');// redirection
?>