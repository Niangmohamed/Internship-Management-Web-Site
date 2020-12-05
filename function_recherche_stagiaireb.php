<?php
session_start();
include('includes/config.php');
$recherche=$_GET['recherche'];
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
		<br /><br /><br /><br /><br /><br /><br />
	</div>
	<div id="contenu1"> 
		
		
		<br />
		<div>
			<strong style="color:red;">Vous pouvez faire une recherche sur le nom d'un stagiaire</strong>
			<form name="search" action="function_recherche_stagiaireb.php" method="GET" ><br />
			<span><input type="text" name="recherche" id="recherche" size="30" maxlength="30" value="" TABINDEX="1" /></span><span><input type="submit" name="recherch" value="Rechercher" /></span>
			</form>
			<?php
				echo "<div style=\" font-size:15px; text-align:center; color:red; font-family:palatino Linotype;\"> Recherche sur le stagiaire: ".ucfirst($recherche)."</div><br />";
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
						while($donnee=mysqli_fetch_array($connect)){?>
						<tr><td><?php echo $donnee['numstagiaire']; ?></td><td style="padding-left:5px; padding-right:5px;"><?php echo strtoupper($donnee['nomenc']); ?></td><td style="padding-left:5px; padding-right:5px;" ><?php echo strtoupper($donnee['libelleserv']); ?></td><td style="padding-left:5px; padding-right:5px;" ><?php echo strtoupper($donnee['nom']); ?></td><td style="padding-left:5px; padding-right:5px;" ><?php echo strtoupper($donnee['prenom']); ?></td><td><?php echo strtoupper($donnee['sexe']); ?></td><td style="padding-left:5px; padding-right:5px;" ><?php echo $donnee['debutstage']; ?></td><td style="padding-left:5px; padding-right:5px;" ><?php echo $donnee['finstage']; ?></td><td style="padding:5px;"><img width="60" height="70" src="photos/<?php echo $donnee['photo']; ?> "></td></tr>
						<?php }
						?>
						</table></center>
						<br/><br/><br /><br /><br /><br /><br /><br /><br /><br /><a href="gestion.php">Revenir &agrave; la page pr&eacute;c&eacute;dente !</a>
				<?php
					}
				}
			?>
			
		</div>
		<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
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