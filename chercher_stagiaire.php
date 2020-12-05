<?php
session_start();
include('includes/config.php');
if (isset($_SESSION['login']) || isset($_SESSION['password'])){
?>
<html>
<head>
	<title>Gestion des stagiaires</title>
	<link href="css/stylestage.css" rel="stylesheet" type="text/css">
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
		<img src="images/chercher_stagiaire.jpg" style="border:1px solid gray; height:80px; width:520px;"/>
		<div style="border:1px solid gray; width:500px; margin-left:auto; margin-right:auto; margin-top:5px; padding:10px;">
		<form name="form" action="chercher_stagiaire.php" method="POST"><table align="lef">
			<strong style="color:red; font-size:15px;">Crit&egrave;re de recherche</strong>
			
			<tr><td><label for="nomstag">Nom stagiaire:</label></td><td><input type="text" id="nomstag" name="nomstag" size="20" maxlength="20" /></td></tr>
			<tr><td><label for="prenomstag">Pr&eacute;nom stagiaire:</label></td><td><input type="text" id="prenomstag" name="prenomstag" size="20" maxlength="20" /></td></tr>
			
			<tr><td><label for="codserv">Vous pouvez pr&eacute;cisez<br /> le nom du service:</label></td><td><select name="codserv" id="codserv">
			<?php 
			$retourb=mysqli_query($connexion,"select distinct codeserv,libelleserv from services"); // afficher les codes services
			while($b=mysqli_fetch_array($retourb)){
			echo '<option value="'.$b['codeserv'].'">'.$b['libelleserv'].'</option>';
			} ?>
			</select></td></tr></table>
			
			<fieldset>
			<legend>Vous pouvez pr&eacute;cisez la p&eacute;riode de stage</legend><table align="left">
			<tr><td><label for="debutstag">D&eacute;but stage:</label></td><td><select name="jdebutstage" id="jdebutstage">
			<option value="" disabled="disabled" selected="selected" >Jour</option>
			<option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
			<option value="13">13</option><option value="14">14</option><option value="15">15</option>><option value="16">16</option>><option value="17">17</option>><option value="18">18</option>><option value="19">19</option>><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
			<option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
			</select>
			<select name="mdebutstage" id="mdebutstage">
			<option value="" disabled="disabled" selected="selected">Mois</option>
			<option value="01">Janvier</option><option value="02">F&eacute;vrier</option><option value="03">Mars</option><option value="04">Avril</option><option value="05">Mais</option><option value="06">Juin</option>
			<option value="07">Juillet</option><option value="08">Ao&ucirc;t</option><option value="09">Septembre</option><option value="10">Octobre</option><option value="11">Novembre</option><option value="12">Decembre</option>
			</select>
			<select name="adebutstage" id="adebutstage">
			<option value="" disabled="disabled" selected="selected">Ann&eacute;e</option>
			<option value="2018">2018</option><option value="2019">2019</option>
			</select></td>
			</tr>
			
			<tr><td><label for="finstag">Fin stage:</label></td><td><select name="jfinstage" id="jfinstage">
			<option value="" disabled="disabled" selected="selected">Jour</option>
			<option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
			<option value="13">13</option><option value="14">14</option><option value="15">15</option>><option value="16">16</option>><option value="17">17</option>><option value="18">18</option>><option value="19">19</option>><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
			<option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
			</select>
			<select name="mfinstage" id="mfinstage">
			<option value="" disabled="disabled" selected="selected">Mois</option>
			<option value="01">Janvier</option><option value="02">F&eacute;vrier</option><option value="03">Mars</option><option value="04">Avril</option><option value="05">Mais</option><option value="06">Juin</option>
			<option value="07">Juillet</option><option value="08">Ao&ucirc;t</option><option value="09">Septembre</option><option value="10">Octobre</option><option value="11">Novembre</option><option value="12">Decembre</option>
			</select>
			<select name="afinstage" id="afinstage">
			<option value="" disabled="disabled" selected="selected">Ann&eacute;e</option>
			<option value="2018">2018</option><option value="2019">2019</option>
			</select></td>
			</tr></table>
			</fieldset>
			<table align="center">
			<tr></tr>
			<tr>
			<td></td>
			<td><input type="submit" value="Rechercher" name="buttonEnregistrer" />
			<input type="reset" value="Annuler" name="buttonAnnuler" /></td>
			</tr>
		</table>
		</form></div>
		<br /><br /><br /><br />
		<a href="stagiaires.php">Revenir &agrave; la page pr&eacute;c&eacute;dente</a><br /><br />
		
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