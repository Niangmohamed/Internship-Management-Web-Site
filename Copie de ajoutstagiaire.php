<?php
include('includes/config.php');
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
		<div style="background-color:gray; color:white;  -moz-border-radius: 5px; -webkit-border-radius: 5px; font-size:16px;"><strong><i>M</i>enu</strong></div>
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
			Connect&eacute;<br />
			Prenom et nom<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
			<a href="index.php">Deconnexion</a>
		</div>
		<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	</div>
	<div id="contenu1"> 
		<div class="menu a">
		<span class="menutop"><a href="ajoutstagiaire.php">&nbsp;&nbsp;<strong>Ajouter un stagiaire</strong>&nbsp;&nbsp;</a></span>&nbsp;|
		<span class="menutop"><a href="chercher_stagiaire.php">&nbsp;&nbsp;<strong>Chercher un stagiaire</strong>&nbsp;&nbsp;</a></span>&nbsp;|
		<span class="menutop"><a href="liste_stagiaire.php">&nbsp;&nbsp;<strong>Liste des stagiaires</strong>&nbsp;&nbsp;</a></span>
		</div><br />
		<img src="images/ajouter_stagiaire.jpg" style="border:1px solid gray; height:80px; width:520px;"/>
		<div style="border:1px solid gray; width:500px; margin-left:auto; margin-right:auto; margin-top:5px; padding:10px;">
		<form name="form" action="function_add_stagiaire.php" method="POST" enctype="multipart/form-data" ><table align="center">
			<tr><td><label for="numstag">Num&eacute;ro stagiaire:</label></td><td><input type="text" id="numstag" name="numstag" size="10" maxlength="7" /></td></tr>
			<tr><td><label for="matr">Matricule encadreur:</label></td><td><select name="matr" id="matr">
			<option value="">Choisir l'encadreur</option>
			<?php 
			//chargement combo
			$retour=mysqli_query($connexion,"select distinct matricule from encadreurs"); // afficher les matricules
			while($a=mysqli_fetch_array($retour)){
			echo '<option value="'.$a['matricule'].'">'.$a['matricule'].'</option>';
			} ?>
			</select></td></tr>
			<tr><td><label for="codserv">Code service:</label></td><td><select name="codserv" id="codserv">
			<option value="">Choisir le service</option>
			<?php 
			$retourb=mysqli_query($connexion,"select distinct codeserv from services"); // afficher les codes services
			while($b=mysqli_fetch_array($retourb)){
			echo '<option value="'.$b['codeserv'].'">'.$b['codeserv'].'</option>';
			} ?>
			</select></td></tr>
			<tr><td><label for="nomstag">Nom stagiaire:</label></td><td><input type="text" id="nomstag" name="nomstag" size="20" maxlength="20" /></td></tr>
			<tr><td><label for="prenomstag">Pr&eacute;nom stagiaire:</label></td><td><input type="text" id="prenomstag" name="prenomstag" size="20" maxlength="20" /></td></tr>
			<tr>
			<td>Sexe:</td><td><input type="radio" name="sexe" value="masculin" id="sexe" checked="checked" /><label>Masculin</label>
			<input type="radio" name="sexe" value="feminin" id="sexe" /><label>Feminin</label></td>
			</tr>
			
			<tr><td><label for="datenaiss">Date de naissance:</label></td><td><select name="journais" id="journais">
			<option value="null" disabled="disabled" selected="selected">Jour</option>
			<option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
			<option value="13">13</option><option value="14">14</option><option value="15">15</option>><option value="16">16</option>><option value="17">17</option>><option value="18">18</option>><option value="19">19</option>><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
			<option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
			</select>
			<select name="moisnais" id="moisnais">
			<option value="null" disabled="disabled" selected="selected">Mois</option>
			<option value="01">Janvier</option><option value="02">F&eacute;vrier</option><option value="03">Mars</option><option value="04">Avril</option><option value="05">Mais</option><option value="06">Juin</option>
			<option value="07">Juillet</option><option value="08">Ao&ucirc;t</option><option value="09">Septembre</option><option value="10">Octobre</option><option value="11">Novembre</option><option value="12">Decembre</option>
			</select>
			<select name="anneenais" id="anneenais">
			<option value="null" disabled="disabled" selected="selected">Ann&eacute;e</option>
			<option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option>
			<option value="2001">2001</option><option value="2002">2002</option>
			</select></td>
			</tr>
			
			<tr><td><label for="debutstag">D&eacute;but stage:</label></td><td><select name="jdebutstage" id="jdebutstage">
			<option value="">Jour</option>
			<option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
			<option value="13">13</option><option value="14">14</option><option value="15">15</option>><option value="16">16</option>><option value="17">17</option>><option value="18">18</option>><option value="19">19</option>><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
			<option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
			</select>
			<select name="mdebutstage" id="mdebutstage">
			<option value="null" disabled="disabled" selected="selected">Mois</option>
			<option value="01">Janvier</option><option value="02">F&eacute;vrier</option><option value="03">Mars</option><option value="04">Avril</option><option value="05">Mais</option><option value="06">Juin</option>
			<option value="07">Juillet</option><option value="08">Ao&ucirc;t</option><option value="09">Septembre</option><option value="10">Octobre</option><option value="11">Novembre</option><option value="12">Decembre</option>
			</select>
			<select name="adebutstage" id="adebutstage">
			<option value="null" disabled="disabled" selected="selected">Ann&eacute;e</option>
			<option value="2018">2018</option><option value="2019">2019</option>
			</select></td>
			</tr>
			
			<tr><td><label for="finstag">Fin stage:</label></td><td><select name="jfinstage" id="jfinstage">
			<option value="null" disabled="disabled" selected="selected">Jour</option>
			<option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
			<option value="13">13</option><option value="14">14</option><option value="15">15</option>><option value="16">16</option>><option value="17">17</option>><option value="18">18</option>><option value="19">19</option>><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
			<option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
			</select>
			<select name="mfinstage" id="mfinstage">
			<option value="null" disabled="disabled" selected="selected">Mois</option>
			<option value="01">Janvier</option><option value="02">F&eacute;vrier</option><option value="03">Mars</option><option value="04">Avril</option><option value="05">Mais</option><option value="06">Juin</option>
			<option value="07">Juillet</option><option value="08">Ao&ucirc;t</option><option value="09">Septembre</option><option value="10">Octobre</option><option value="11">Novembre</option><option value="12">Decembre</option>
			</select>
			<select name="afinstage" id="afinstage">
			<option value="null" disabled="disabled" selected="selected">Ann&eacute;e</option>
			<option value="2018">2018</option><option value="2019">2019</option>
			</select></td>
			</tr>
			
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