<!DOCTYPE html>
<html>

<head>
	<title>Connection</title>
	<?php session_start(); ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
	<link rel="stylesheet" href="../fonts/icomoon/style.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/magnific-popup.css">
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">
	<link rel="stylesheet" href="../css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
	<link rel="stylesheet" href="../css/aos.css">

	<link rel="stylesheet" href="../css/style.css">

	<div class="site-wrap">
		<div class="site-section">
			<div class="container">
				<div class="col-md-12 text-center">
					<div id="contenu">

						<?php


						//Affectation dans des variables du pseudo/mot de passe s'ils existent,


						if ($_POST["pseudo"] && $_POST["mdp"]) {
							$id = $_POST["pseudo"];
							$motdepasse = $_POST["mdp"];

							// Connexion à la base MariaDB
							$mysqli = new mysqli('localhost', 'zle_beuch', 'w3hsyumy', 'zfl2-zle_beuch');

							if ($mysqli->connect_errno) {
								// Affichage d'un message d'erreur
								echo "<font size='3' color='red'> Error: Problème de connexion au serveur distant ... <br></font>";
				  
								// Arrêt du chargement de la page
								//exit() fait bugais la page
								exit();
							  }
				  
							  // Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
							  if (!$mysqli->set_charset("utf8")) {
								  printf("<font size='3' color='red'>Erreur: lors du chargement du jeu de caractères utf8 : %s<br></font>", $mysqli->error);
								  //exit() fait bugais la page
								  exit();
							  } /*else {
								printf("Jeu de caractères courant : %s\n", $mysqli->character_set_name());
							  }
							  */
				  
							  
							  //echo ("Connexion BDD réussie !</br>");
							  
						} else {
							echo "<font size='3' color='red'> Error: session ... <br></font>";
						}













						/* 1) Requête SQL de recherche du compte utilisateur (+ validité + statut du
							profil) à partir du pseudo / mot de passe saisis */
						$sql = "select prof_statut 
										from compte join profil using(`CMPT_PSEUDO`)
										where cmpt_pseudo = '" . $id . "'" . "
										and cmpt_mot_de_passe = MD5('" . $motdepasse . "')
										and prof_validite = 'A';";


						//echo($sql);


						/* Exécution de la requête pour vérifier si le compte (=pseudo+mdp) existe !*/
						$resultat = $mysqli->query($sql);

						if ($resultat == false) {
							echo "<font size='3' color='red'> Error: requête echoué <br></font>";
							/*
							echo "Error: La requête a échoué  \n";
							echo "Query: " . $sql . "\n";
							echo "Errno: " . $mysqli->errno . "\n";
							echo "Error: " . $mysqli->error . "\n";
							*/
							exit();
						} else {

							if ($resultat->num_rows == 1) {
								$query = $resultat->fetch_assoc();


								//Mise à jour des données de la session
								$_SESSION['login'] = $id;
								$_SESSION['statut'] = $query['prof_statut'];


								if (strcmp($_SESSION['statut'], 'R') == 0) {//Redacteur

									//Redirection
									header("Location:redacteur_accueil.php");

								} else if (strcmp($_SESSION['statut'], 'G') == 0) {//Gestionnaire

									//Redirection
									header("Location:gestionnaire_accueil.php");

								} else {
									echo "<font size='3' color='red'> Error: Statut non valide <br></font>";
								}

		
							} else {// aucune ligne retournée
								// => le compte n'existe pas ou n'est pas valide
								echo "pseudo/mot de passe incorrect(s) ou profil inconnu !" .
									"<br>Redirection dans 5s ...";

								//Redirection
								header("refresh:5;url=./session.php");
							}

							//Fermeture de la communication avec la base MariaDB
							$mysqli->close();
						}

						?>

					</div>
				</div>
			</div>
		</div>
	</div>
</head>

<body>
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/jquery-migrate-3.0.1.min.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery.stellar.min.js"></script>
	<script src="../js/jquery.countdown.min.js"></script>
	<script src="../js/jquery.magnific-popup.min.js"></script>
	<script src="../js/bootstrap-datepicker.min.js"></script>
	<script src="../js/aos.js"></script>

	<script src="../js/main.js"></script>
</body>

</html>