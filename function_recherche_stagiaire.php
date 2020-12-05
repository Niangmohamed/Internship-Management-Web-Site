<?php
session_start();
include('includes/config.php');
$recherche=$_GET['recherche'];
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
			Utilisateur connect&eacute;<br /><br />
			<span style="color:red; font-family:arial; font-size:16px;"><?php echo ucfirst($_SESSION['prenom'])."  ".ucfirst($_SESSION['nomuser']);?></span><br /><br /><br /><br /><br /><br /><br />
			<a href="logout.php">Deconnexion</a>
		</div>
		<br /><br /><br /><br /><br /><br /><br />
	</div>
	<div id="contenu1"> 
		
		
		<br />
		<div>
			<strong style="color:red;">Vous pouvez faire une recherche sur le nom d'un stagiaire</strong>
			<form name="search" action="function_recherche_stagiaire.php" method="GET" ><br />
			<span><input type="text" name="recherche" id="recherche" size="30" maxlength="30" value="" TABINDEX="1" /></span><span><input type="submit" name="recherch" value="Rechercher" /></span>
			</form>
			<?php
				echo "<div style=\" font-size:15px; text-align:center; color:red; font-family:palatino Linotype;\"> Recherche sur le stagiaire: ".$recherche."</div><br />";
				if (strlen($recherche)<3){
					echo "<div style=\" font-size:13px; text-align:center; font-family:palatino Linotype;\">Vous devez saisir au moins 3 caracteres!</div>";
				}else{
					$req="select * from stagiaires inner join encadreurs on stagiaires.matricule=encadreurs.matricule inner join services on stagiaires.codeserv=services.codeserv where nom like '%$recherche%' order by nom";
					$connect=mysqli_query($connexion,$req) or die(mysqli_error());
					$compter=mysqli_num_rows($connect);
					if ($compter<=0){
						echo "<div style=\" font-size:13px; text-align:center; font-family:palatino Linotype;\">Ce stagiaire n'existe pas!</div>";
					}
					else{
						?><center>
						<table border=1 style="font-size:13px; text-align:center; font-family:palatino Linotype; color:black;">
						<tr><th>Numero stagiaire</th><th>Encadreur</th><th>Service</th><th>Nom</th><th>Pr&eacute;nom</th><th>sexe</th><th>D&eacute;but stage</th><th>Fin stage</th><th>Photo</th></tr>
				
						<?php
						while($donnee=mysqli_fetch_array($connect)){
						echo '<tr>';
						echo '<td>'.$donnee['numstagiaire'].'</td><td>'.strtoupper($donnee['nomenc']).'</td><td>'.strtoupper($donnee['libelleserv']).'</td><td>'.strtoupper($donnee['nom']).'</td><td>'.strtoupper($donnee['prenom']).'</td><td>'.strtoupper($donnee['sexe']).'</td><td>'.$donnee['debutstage'].'</td><td>'.$donnee['finstage'].'</td><td>'.$donnee['photo'].'</td>';
						echo'</tr>';
						}
						?>
						</table></center>
						<br/><br/><a href="gestion.php">Revenir &agrave; la page pr&eacute;c&eacute;dente !</a>
				<?php
					}
				}
			?>
			
		</div>
		<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	</div>
	</div>
	<div style="margin-bottom:2px; clear:both"></div>
	<div id="pied" >
		D&eacute;v&eacute;lopp&eacute;e par Mohamed NIANG<br />Copyright@ensae 2016. Tout droit reserv&eacute;
	</div>
</div>
</body>
</html>