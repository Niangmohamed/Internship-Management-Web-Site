<html>
<head>
	<title>Gestion des stagiaires</title>
	<link href="css/stylestage.css" rel="stylesheet" type="text/css">
</head>
<body>
<div>
	<div><img src="images/logo_ANSD.png" id="entete" /></div>
	<div style=""></div>
	<div id="contenu">
		<div style="margin: 0 auto;"></div><br /><br />
		<div id="form">

			<strong style="font-size:17px; color:black; background-color:grey;" id="titreform">Authentification</strong>
			<div style="margin-bottom:10px;"></div>
			<form name="form" action="login.php" method="POST">
				<table align="center">
				<tr><td><label for="user">Identifiant</label></td><td><input type="text" name="user" id="user" size="25" maxlength="20" /></td></tr>
				<tr><td><label for="pwd">Mot de passe</label></td><td><input type="password" name="pwd" id="pwd" size="25" maxlength="20" /></td></tr>
				<tr><td></td><td colspan="2"><input type="submit" name="cnx" value="Connexion" /></td></tr>
				</table>
			</form>
		</div>
		<br /><br />
		<marquee direction="left" scrollamount="5"> 
	
              <img src="images/Photo1.jpg" class="tailleimage" />&nbsp;&nbsp;&nbsp;
			  <img src="images/Photo2.jpg" class="tailleimage" />&nbsp;&nbsp;
			  <img src="images/Photo3.jpg" class="tailleimage" />&nbsp;&nbsp;
	    </marquee>
		<br />
		<a><img height="30%" width="30%" src="images/stagaire.bmp" alt="Accueil" /></a><br /><a style="font-size:20px;">Soyez les bienvenues</a>
		<br />
	</div>
	<div style="margin-bottom:3px;"></div>
	<div id="pied">
		D&eacute;v&eacute;lopp&eacute;e par Mohamed NIANG<br />Copyright@ensae 2019. Tout droit reserv&eacute;
	</div>
</div>
</body>
</html>