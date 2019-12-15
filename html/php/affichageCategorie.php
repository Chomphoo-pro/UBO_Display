<!DOCTYPE html>
<html>

<head>
	<title><?php session_start();
			echo ("catégorie: " . $_SESSION['indice']); //Demarre une session
			?></title>
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
				<?php
				$id[] = NULL;
				//Si l'attribut session n'es pas créer
				if (!isset($_SESSION['indice'])) {
					$_SESSION['indice'] = 0; //On l'instancie avec 0;
				}

				echo ("catégorie: " . $_SESSION['indice'] . "<br>"); //Affiche de la catégorie


				//Connection
				$mysqli = new mysqli('localhost', 'zle_beuch', 'w3hsyumy', 'zfl2-zle_beuch');

				if ($mysqli->connect_errno) {
					// Affichage d'un message d'erreur
					echo "Problème de connection au serveur distant ...";
					/*
				echo "Error: Problème de connexion à la BDD \n";
				echo "Errno: " . $mysqli->connect_errno . "\n";
				echo "Error: " . $mysqli->connect_error . "\n";
				*/

					// Arrêt du chargement de la page
					exit();
				}


				// Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
				if (!$mysqli->set_charset("utf8")) {
					printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
					exit();
				}


				//Message connection réussie
				/*echo ("Connexion BDD réussie !</br>");*/



				//Requete récupération catégorie
				$sql = "SELECT CAT_NUMERO FROM categorie";


				//Affiche requête
				/*echo ($sql)."<br>"; */


				$result = $mysqli->query($sql);


				//Afficher error SQL
				if ($result == false) { // La requête a echoué
					echo "Error: La requête a echoué \n";
					echo "Errno: " . $mysqli->errno . "\n";
					echo "Error: " . $mysqli->error . "\n";
					exit();
				} else {

					//Mettre num cat dans $id
					$nbrLignes = $result->num_rows;

					//Si le nombre de lignes est positif
					if ($nbrLignes > 0) {

						//On enregistre dans un tableau
						for ($i = 0; $i < $nbrLignes; $i++) {
							$cat = $result->fetch_assoc();
							$id[$i] = $cat['CAT_NUMERO'];
						}
					} else { //Sinon afficher un message d'erreur

						echo "Aucune information";
					}


					//Recuperer indice dans url
					$indice = $_SESSION['indice'];


					//chercher mod indice tableau
					$indiceMod = $indice % $nbrLignes;


					//Requete récupération informations
					$sql = "SELECT * FROM categorie
							join information using(CAT_NUMERO)
							WHERE CAT_NUMERO = " . $id[$indiceMod]; //Pseudo text date en gros


					//Afficher SQL
					/*echo ($sql)."<br>";*/


					$result = $mysqli->query($sql);
					$result = $result->fetch_assoc();


					//Afficher error SQL


					//Affiche info
					echo 	"<font size='100' data-aos='fade-up' data-aos-delay='100'>" .
						$result["INFO_TEXTE"] .
						"</font>" .
						"<br><font size='5' data-aos='fade-up' data-aos-delay='300' >Ecrit par <font color='#c70039' > " . $result["CMPT_PSEUDO"] . "</font> le " . $result["INFO_DATE_AJOUT"] . "</font>";



					//indice+1 dans url
					$indiceMod += 1;
					$_SESSION['indice'] = $indiceMod;

					//Affraichire la page dans 5 sec 
					header("refresh:5;url=affichageCategorie.php");
				}



				?>
			</div>
		</div>
	</div>
</head>






<body>
	<!-- 		<div class="col-12 col-md-10 d-none d-xl-block">
	            <nav class="site-navigation position-relative text-right" role="navigation">
	              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
	                <li><a href="../index.php">Home</a></li>
	                <li><a href="affichageCategorie.php">Catégorie</a></li>
	                <li><a href="inscription.php">Inscription</a></li>
	                <li><a href="session.php">Connection</a></li>


	                <li class="cta"><a href="../buy-tickets.html">achat tiquets</a></li>
	              </ul>
	            </nav>
	    </div> 
-->

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