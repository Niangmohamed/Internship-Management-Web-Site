<?php
$hostname='localhost';
$user='root';
$password='';
$dbase='dbstagiaires';
$connexion = mysqli_connect($hostname, $user, $password) or die ('impossible de se connecter a mysql');
$db = mysqli_select_db($connexion, $dbase);
$titre= 'Gestion des stagiaires';
?>
