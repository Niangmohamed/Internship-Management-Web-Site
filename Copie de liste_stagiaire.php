<?php
require 'includes/config.php';
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
			<a href="index.html">Deconnexion</a>
		</div>
		<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	</div>
	<div id="contenu1"> 
		<div class="menu a">
		<span class="menutop"><a href="ajoutstagiaire.php">&nbsp;&nbsp;<strong>Ajouter un stagiaire</strong>&nbsp;&nbsp;</a></span>&nbsp;|
		<span class="menutop"><a href="chercher_stagiaire.php">&nbsp;&nbsp;<strong>Chercher un stagiaire</strong>&nbsp;&nbsp;</a></span>&nbsp;|
		<span class="menutop"><a href="liste_stagiaire.php">&nbsp;&nbsp;<strong>Liste des stagiaires</strong>&nbsp;&nbsp;</a></span>
		</div><br />
		<img src="images/liste_stagiaire.jpg" style="border:1px solid gray; height:80px; width:620px;"/>
		<div style="border:1px solid gray; width:600px; margin-left:auto; margin-right:auto; margin-top:5px; padding:10px;">
		<center><table border=1 style="font-size:13px; text-align:center; font-family:palatino Linotype; color:black;">
		<tr><th colspan="2" >Edition</th><th>Numero stagiaire</th><th>Nom</th><th>Pr&eacute;nom</th><th>Photos</th><th>Infos supplementaires</th>
		<?php
		$recherche="select * from stagiaires inner join encadreurs on stagiaires.matricule=encadreurs.matricule inner join services on stagiaires.codeserv=services.codeserv order by nom";
		$resultat_recherche=mysqli_query($connexion,$recherche);
		while($data=mysqli_fetch_array($resultat_recherche)){
		echo'<tr>';
		echo'<td><a href="modifie_stagiaire.php?modifistag='.$data['numstagiaire'].'" >Modifier</a></td><td><a href="function_supprimer_stagiaire.php?suppstag='.$data['numstagiaire'].'" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer ce stagiaire?\'));" >Supprimer</a></td><td>'.$data['numstagiaire'].'</td><td>'.strtoupper($data['nom']).'</td><td>'.strtoupper($data['prenom']).'</td><td><img width="60" height="70" src="photos/'.$data['photo'].' "></td><td><a href="function_infos_stagiaire.php?info='.$data['numstagiaire'].'" >Voir</a></td>';
		echo'</tr>';
		}
		?>
		</table></center>
		<br /><br />
		</div>
		
		<br /><br /><br /><br /><br />
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