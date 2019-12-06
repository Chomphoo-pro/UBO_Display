<!DOCTYPE html>
<html>
	<head>
		<title><?php echo ("catégorie: ".$_GET['indice']);?></title>

		<?php 
		$id[] = NULL;
			echo ("catégorie: ".$_GET['indice']."<br>");


			//Connection
			$mysqli = new mysqli('localhost','zle_beuch','w3hsyumy','zfl2-zle_beuch');

                    if ($mysqli->connect_errno)
                    {
                      // Affichage d'un message d'erreur
                      echo "Error: Problème de connexion à la BDD \n";
                      echo "Errno: " . $mysqli->connect_errno . "\n";
                      echo "Error: " . $mysqli->connect_error . "\n";
                      // Arrêt du chargement de la page
                      exit();
                    }
                    // Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
                    if (!$mysqli->set_charset("utf8")) {
                      printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
                      exit();
                    }

                    echo ("Connexion BDD réussie !</br>");



            //SELECT CAT_NUMERO FROM categorie
			$requete = "SELECT CAT_NUMERO FROM categorie";
			echo ($requete)."<br>";
			$result = $mysqli->query($requete);

			//Debug des ID
	        if ($result == false) //Erreur lors de l’exécution de la requête
				{ // La requête a echoué
					echo "Error: La requête a echoué \n";
					echo "Errno: " . $mysqli->errno . "\n";
					echo "Error: " . $mysqli->error . "\n";
					exit();
				} else {
					//Mettre num cat dans $id
					$nbrLignes = $result->num_rows;

					//Si le nombre de lignes est positif
					if ($nbrLignes > 0){

						//On enregistre dans un tableau
						for ($i=0;$i<$nbrLignes;$i++)
						{
						  $cat = $result->fetch_assoc();
						  $id[$i]=$cat['CAT_NUMERO'];
						}
					} else {

						//Sinon afficher un message d'erreur
						echo "Aucune information";
					}
					


					//Recuperer indice dans url
					$indice = $_GET['indice'];
					
					//chercher mod indice tableau
					$indiceMod = $indice % $nbrLignes;

					//Afficher
					$requete = "SELECT * FROM categorie WHERE CAT_NUMERO = ".$id[$indiceMod]; //Pseudo text date en gros
					echo ($requete)."<br>";
					$result = $mysqli->query($requete);
					$result = $result->fetch_assoc();


					echo "id: ".$result['CAT_NUMERO'].
					"<br> intitule:".$result['CAT_INTITULE'].
					"<br>";


					//indice+1 dans url
					$indiceMod += 1;
					header("refresh:5;url=affichageCategorie.php?indice=".$indiceMod);
					
				}




	         //Categorie suivante
			//header("refresh:5;url=affichageCategorie2.php");

		?>
	</head>
	<body>
		<div class="col-12 col-md-10 d-none d-xl-block">
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





	</body>
</html>