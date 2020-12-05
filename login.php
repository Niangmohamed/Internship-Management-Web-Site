<?php
$hostname='localhost';
$user='root';
$password='';
$dbase='dbstagiaires';
$connexion = mysqli_connect($hostname, $user, $password) or die ('impossible de se connecter a mysql');
$db = mysqli_select_db($connexion, $dbase);
$titre= 'Gestion des stagiaires';

session_start ();
$loginOK=false;
include('includes/config.php');
$login = trim($_POST['user']);
$password = trim($_POST['pwd']); 
 
if (empty($_POST['user']) || empty($_POST['pwd'])) { 
echo'<body onLoad="alert(\'Vous devez verifier le formulaire authentification...\')">';
echo '<meta http-equiv="refresh" content="0;URL=index.html">';
}else{
$query = "SELECT iduser,nomuser,prenom,login,password FROM utilisateur where login='$login' and password='$password'";
$results = mysqli_query($connexion, $query) or die ("echec de l'exécution de la requête<br>."  . mysqli_error());
   if(mysqli_num_rows($results) > 0){
   $data = mysqli_fetch_object($results);
   $loginOK=true;
   }else{echo'<body onLoad="alert(\'Ce utilisateur est non reconu dans le systeme...\')">';
   echo '<meta http-equiv="refresh" content="0;URL=index.html">';
   }
}
if($loginOK){
   $_SESSION['iduser']=$data->iduser;
   $_SESSION['nomuser']=$data->nomuser;
   $_SESSION['prenom']=$data->prenom;
   $_SESSION['login']=$data->login;
   $_SESSION['password']=$data->password;
   echo '<meta http-equiv="refresh" content="0;URL=gestion.php">';
}else{
echo'Une erreur est survenue lors de ouverture de la session essayer de nouveau';
}
?>