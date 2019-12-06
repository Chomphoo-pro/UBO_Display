
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Workshop &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="../https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
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
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar py-3" role="banner">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-11 col-xl-2">
            <h1 class="mb-0"><a href="../index.php" class="text-white h2 mb-0">LES<span class="text-primary">BOUEES</span> </a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
				<li><a href="../index.php">Home</a></li>
                <li><a href="affichageCategorie.php">Catégorie</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connection.php">Connection</a></li>
                <li class="cta"><a href="../buy-tickets.html">achat tiquets</a></li>
            </ul>
            </nav>
          </div>
          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="../#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
          </div>
        </div>
      </div>
    </header>

    <div class="site-section site-hero inner">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-10">
            <span class="d-block mb-3 caption" data-aos="fade-up">Inscription</span>
            <h1 class="d-block mb-4" data-aos="fade-up" data-aos-delay="100">Profil</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        




        <div class="row mb-5">
          

          


            <div id="contenu"> 

Bonjour, <?php echo stripslashes(htmlspecialchars($_POST['pseudo']))."<br>"; ?>.
nom choisi : <?php echo stripslashes(htmlspecialchars($_POST['nom']))."<br>"; ?>.
prenom choisi : <?php echo stripslashes(htmlspecialchars($_POST['prenom']))."<br>"; ?>.
mail choisi : <?php echo stripslashes(htmlspecialchars($_POST['mail']))."<br>"; ?>

<?php
	$id=addslashes(htmlspecialchars($_POST['pseudo']));
	$mdp=addslashes(htmlspecialchars($_POST['mdp']));
	$mdp_confirme=addslashes(htmlspecialchars($_POST['mdp_confirme']));
	$nom=addslashes(htmlspecialchars($_POST['nom']));
	$prenom=addslashes(htmlspecialchars($_POST['prenom']));
	$mail=addslashes(htmlspecialchars($_POST['mail']));

	$mysqli = new mysqli('localhost','zle_beuch','w3hsyumy','zfl2-zle_beuch');
	

	if ($mysqli->connect_errno)
	{
			// Affichage d'un message d'erreur
		echo "Error: Problème de connexion à la BDD"."<br>";
		echo "Error: " . $mysqli->connect_error ."<br>";
			// Arrêt du chargement de la page
		exit();
	}
		// Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
	

	if (!$mysqli->set_charset("utf8")) {
		printf("Pb de chargement du jeu de car. utf8 : %s"."<br>", $mysqli->error);
		exit();
	}
		//Préparation de la requête à partir des chaînes saisies =>
		//concaténation (avec le point) des différents éléments composant la
		//requête
	

	

	
	if ($_POST['pseudo'] && 
		$_POST['mdp'] && 
		$_POST['mdp_confirme'] &&
		$_POST['nom'] && 
		$_POST['prenom'] && 
		$_POST['mail']
		){

		if (strcmp($_POST['mdp'],$_POST['mdp_confirme']) == 0 ){
		

			$sql="INSERT INTO compte VALUES('$id',md5('$mdp'));";			
			$result2 = $mysqli->query($sql);
						
			if ($result2 == false) //Erreur lors de l’exécution de la requête
				{
					// La requête a echoué
					echo "Erreur créaion de compte"."<br>";
					echo "<a href='inscription.php'>Formulaire d'inscription</a>";
					exit();;
				}
				//requête
				$sql="INSERT INTO profil VALUES("."'" .$id ."','".$nom."','".$prenom . "','".$mail."','D','R',CURDATE());";
				// Affichage de la requête constituée pour vérification
				//Exécution de la requête d'ajout d'un compte dans la table des comptes
				$result3 = $mysqli->query($sql);
				if ($result3 == false) //Erreur lors de l’exécution de la requête
					{
						// La requête a echoué
						echo "Erreur création de profil";


						$sql="DELETE FROM compte WHERE CMPT_PSEUDO = '$id';";
						$result4 = $mysqli->query($sql);




							echo "<a href='inscription.php'>Formulaire d'inscription</a>";

							exit();
						}
						
						else //Requête réussie
						
						{
							echo "<br />";
							echo "Création du profil réussie !" . "<br>";
						}
						//Ferme la connexion avec la base MariaDB

				} else {
					echo "Tout les mot de passe ne correspond pas"."<br>";
					echo "<a href='inscription.php'>Formulaire d'inscription</a>";
				}

			} else {
				echo "Tout les champs ne sont pas remplie"."<br>";
				echo "<a href='inscription.php'>Formulaire d'inscription</a>";
			}


			$mysqli->close();
?>


</div>




      </div>
    </div>

    
      
    <footer class="site-footer">
      
        <div class="row">
          
            <div class="col-md-12 text-center">
              <div class="border-top pt-5">
              <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-primary" aria-hidden="true"></i> by <a href="../https://colorlib.com" target="_blank" >Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
  </div>

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