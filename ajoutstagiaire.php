<?php
session_start();
include('includes/config.php');
if (isset($_SESSION['login']) || isset($_SESSION['password'])){
?>
<html>
<head>
	<title>Gestion des stagiaires</title>
	<link href="css/stylestage.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" charset="utf-8" src="js/javascript.js"></script>
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
		<img src="images/ajoutstagiaire.png" style="border:1px solid gray; height:80px; width:520px;"/>
		<div style="border:1px solid gray; width:500px; margin-left:auto; margin-right:auto; margin-top:5px; padding:10px;">
		<form name="form" action="function_add_stagiaire.php" method="POST" enctype="multipart/form-data" onSubmit="return verif_form();"><table align="center">
			<tr><td><label for="numstag">Num&eacute;ro stagiaire:</label></td><td><input type="text" id="numstag" name="numstag" size="10" maxlength="7" /></td></tr>
			<tr><td><label for="matr">Matricule encadreur:</label></td><td><select name="matr" id="matr">
			<option value="">Choisir l'encadreur</option>
			<?php 
			//chargement combo
			$retour=mysqli_query($connexion,"select distinct matricule, nomenc from encadreurs"); // afficher les matricules
			while($a=mysqli_fetch_assoc($retour)){
			echo '<option value="'.$a['matricule'].'">'.$a['nomenc'].'</option>';
			} ?>
			</select></td></tr>
			<tr><td><label for="codserv">Code service:</label></td><td><select name="codserv" id="codserv">
			<option value="">Choisir le service</option>
			<?php 
			$retourb=mysqli_query($connexion,"select distinct codeserv, libelleserv from services"); // afficher les codes services
			while($b=mysqli_fetch_assoc($retourb)){
			echo '<option value="'.$b['codeserv'].'">'.$b['libelleserv'].'</option>';
			} ?>
			</select></td></tr>
			<tr><td><label for="nomstag">Nom stagiaire:</label></td><td><input type="text" id="nomstag" name="nomstag" size="20" maxlength="20" /></td></tr>
			<tr><td><label for="prenomstag">Pr&eacute;nom stagiaire:</label></td><td><input type="text" id="prenomstag" name="prenomstag" size="20" maxlength="20" /></td></tr>
			<tr>
			<td>Sexe:</td><td><input type="radio" name="sexe" value="m" id="sexe" checked="checked" /><label>Masculin</label>
			<input type="radio" name="sexe" value="f" id="sexe" /><label>Feminin</label></td>
			</tr>
			
			<tr><td><label for="datenaiss">Date de naissance:</label></td><td><input type="date" name="datenais" id="datenais"  /></td></tr>
			
			<tr><td><label for="debutstag">D&eacute;but stage:</label></td><td><input type="date" name="debutstage" id="debutstage" /></td>
			</tr>
			
			<tr><td><label for="finstag">Fin stage:</label></td><td><input type="date" name="finstage" id="finstage"  /></td></tr>
			
			<tr>
			<td>Photo:</td><td><input type="file" name="photo" id="photo" /></td>
			</tr>
			<tr></tr>
			<tr>
			<td></td>
			<td><input type="submit" value="Enregistrer" name="buttonEnregistrer" />
			<input type="reset" value="Annuler" name="buttonAnnuler" /></td>
			</tr>
		</table>
		</form></div>
		
		<br /><br />
		<a href="stagiaires.php">Revenir &agrave; la page pr&eacute;c&eacute;dente</a>
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
	?><?php
	echo'<meta http-equiv="refresh" content="0; URL=echec_cnx.html">';}
?>