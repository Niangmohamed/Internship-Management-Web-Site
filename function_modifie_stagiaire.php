<?php
include('includes/config.php');
$numstag=$_POST['numstag'];
$matr=$_POST['matr'];
$codeserv=$_POST['codserv'];
$debutstage=$_POST['debutstage'];
$finstage=$_POST['finstage'];
$photo=$_FILES['photo']['name'];

if(empty($_POST['matr']) || empty($_POST['codserv']) || empty($_POST['debutstage']) || empty($_POST['finstage'])){
	echo '<body onLoad="alert(\'Vous devez remplir les champs requis!\')">';
	echo '<meta http-equiv="refresh" content="0;URL=modifie_stagiaire.php?modifistag='.$numstag.'">';
}
else{
	if($_FILES['photo']['error']==0){
		copy($_FILES['photo']['tmp_name'],'photos/'.$_FILES['photo']['name'] );
	}
	if($_FILES['photo']['error']==0)
	$update="UPDATE stagiaires SET matricule='$matr', codeserv='$codeserv', debutstage='$debutstage', finstage='$finstage', photo='$photo' WHERE numstagiaire='$numstag' ";
	else
	$update="UPDATE stagiaires SET matricule='$matr', codeserv='$codeserv', debutstage='$debutstage', finstage='$finstage' WHERE numstagiaire='$numstag' ";
	mysqli_query($connexion,$update);
	echo '<meta http-equiv="refresh" content="0;URL=liste_stagiaire.php?recherche='.$numstag.'">';
}
?>