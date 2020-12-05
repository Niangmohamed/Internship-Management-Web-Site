<?php
session_start();
include('includes/config.php');
if (isset($_SESSION['login']) || isset($_SESSION['password'])){
$numstag=$_GET['modifistag'];
$ProfileStagiaire="select * from stagiaires inner join encadreurs on stagiaires.matricule=encadreurs.matricule inner join services on stagiaires.codeserv=services.codeserv where numstagiaire='$numstag' ";
$rsProgProfile=mysqli_query($connexion,$ProfileStagiaire);
$data=mysqli_fetch_array($rsProgProfile);
$matr=stripslashes($data['matricule']);
$codeserv=stripslashes($data['codeserv']);
$nomstag=stripslashes($data['nom']);
$prenomstag=stripslashes($data['prenom']);
$sexe=stripslashes($data['sexe']);
$datenais=stripslashes($data['datenais']);
$libelleserv=stripslashes($data['libelleserv']);
$nomenc=stripslashes($data['nomenc']);
$debutstage=stripslashes($data['debutstage']);
$finstage=stripslashes($data['finstage']);
$photo=stripslashes($data['photo']);
?>
<html>
<head>
	<title>Gestion des stagiaires</title>
	<link href="stylestage.css" rel="stylesheet" type="text/css">
</head>
<body>
<div>
	<div><img src="images/stagiaires1.jpg"  id="entete" /></div>
	<div style="margin-bottom:3px;"></div>
	<div id="milieu">
	<div class="menugauche">
		<div class="menu a" style="border-bottom-width:1px; border-bottom-style:solid;" >
		<div style="background-color:gray; color:white; padding:3px;  -moz-border-radius: 5px; -webkit-border-radius: 5px; font-size:16px;"><strong><i>M</i>enu</strong>&nbsp;&nbsp;<a href="gestion.php"><img height="40" width="30" src="images/stageman.jpg" alt="Accueil" /></a></div>
			<div style="margin-bottom:5px;"></div>
			<div class="lienmenu"><a href="stagiaires.php">&nbsp;&nbsp;<strong>Stagiaires</strong></a></div>
			<div style="margin-bottom:2px;"></div>
			<div class="lienmenu"><a href="encadreurs.php">&nbsp;&nbsp;<strong>Encadreurs</strong></a></div>
			<div style="margin-bottom:2px;"></div>
			<div class="lienmenu"><a href="visites.php">&nbsp;&nbsp;<strong>Visites</strong></a></div>
			<div style="margin-bottom:2px;"></div>
			<div class="lienmenu"><a href="services.php">&nbsp;&nbsp;<strong>Services</strong></a></div>
			<div style="margin-bottom:2px;"></div>
			<div class="lienmenu"><a href="fonction.php">&nbsp;&nbsp;<strong>Fonctions</strong></a></div>
		<br />
		
		</div><br />
		<div>
			Utilisateur connect&eacute;<br /><br />
			<span style="color:red; font-family:arial; font-size:16px;"><?php echo ucfirst($_SESSION['prenom'])."  ".ucfirst($_SESSION['nomuser']);?></span><br /><br /><br /><br /><br /><br /><br />
			<a href="logout.php">Deconnexion</a>
		</div>
		<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	</div>
	<div id="contenu1"> 
		<div class="menu a">
		<span class="menutop"><a href="ajoutstagiaire.php">&nbsp;&nbsp;<strong>Ajouter un stagiaire</strong>&nbsp;&nbsp;</a></span>&nbsp;|
		<span class="menutop"><a href="chercher_stagiaire.php">&nbsp;&nbsp;<strong>Chercher un stagiaire</strong>&nbsp;&nbsp;</a></span>&nbsp;|
		<span class="menutop"><a href="liste_stagiaire.php">&nbsp;&nbsp;<strong>Liste des stagiaires</strong>&nbsp;&nbsp;</a></span>
		</div><br />
		<img src="images/stagiaires1.jpg" style="border:1px solid gray; height:80px; width:520px;"/>
		<div style="border:1px solid gray; width:500px; margin-left:auto; margin-right:auto; margin-top:5px; padding:10px;">
		<form name="form" action="function_modifie_stagiaire.php" method="POST" enctype="multipart/form-data" >
		<div class="tailleimage1" style="float:right; border:solid 1px white; margin-right:30px"><img width="110" height="120" src="photos/<?php echo $photo; ?>"></div>
			
			<div style="text-align:left; padding-left:30px;">
			<label for="matr">Matricule encadreur:</label><select name="matr" id="matr">
			<option value="<?php echo $matr; ?> "><?php echo $nomenc; ?></option>
			<?php 
			//chargement combo
			$retour=mysqli_query($connexion,"select distinct matricule,nomenc from encadreurs"); // afficher les matricules
			while($a=mysqli_fetch_array($retour)){
			echo '<option value="'.$a['matricule'].'">'.$a['nomenc'].'</option>';
			} ?>
			</select><br /><br />
			<label for="codserv">Code service: </label><select name="codserv" id="codserv">
			<option value="<?php echo $codeserv; ?> "><?php echo $libelleserv; ?></option>
			<?php 
			$retourb=mysqli_query($connexion,"select distinct codeserv,libelleserv from services"); // afficher les codes services
			while($b=mysqli_fetch_array($retourb)){
			echo '<option value="'.$b['codeserv'].'">'.$b['libelleserv'].'</option>';
			} ?>
			</select><br /><br />
			<label for="nomstag">Nom stagiaire&nbsp; </label><?php echo $nomstag; ?><br /><br />
			<label for="prenomstag">Pr&eacute;nom stagiaire:</label><?php echo $prenomstag; ?><br /><br />
			
			<label for="datenais">Date de naissance:</label><?php echo $datenais; ?><br /><br />
			
			<label for="debutstag">D&eacute;but stage:</label><input type="text" name="debutstage" id="debutstage" value="<?php echo $debutstage; ?>"><br /><br />
			<label for="finstag">Fin stage:</label><input type="text" name="finstage" id="finstage" value="<?php echo $finstage; ?>"><br /><br />
			Photo:<input type="file" name="photo" id="photo" value="<?php echo $photo; ?>" /><br /><br />
			<center><input type="submit" value="Modifier" name="buttonEnregistrer" />
			<input type="reset" value="Annuler" name="buttonAnnuler" /></center>
			<input type="hidden" id="numstag" name="numstag" size="10" maxlength="7" value="<?php echo $numstag; ?>" /></div>
		</form></div>
		
		<br /><br />
		<a href="liste_stagiaire.php">Revenir &agrave; la page pr&eacute;c&eacute;dente</a>
	</div>
	</div>
	<div style="margin-bottom:2px; clear:both"></div>
	<div id="pied" >
		D&eacute;v&eacute;lopp&eacute;e par Mohamed NIANG<br />Copyright@ensae 2019. Tout droit reserv&eacute;
	</div>
</div>
</body>
</html>
<?php
}
else{
	echo'<meta http-equiv="refresh" content="0; URL=echec_cnx.html">';}
?>