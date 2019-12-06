
Bonjour, <?php echo htmlspecialchars($_POST['pseudo'])."<br>"; ?>.
MDP choisi : <?php echo htmlspecialchars($_POST['mdp'])."<br>"; ?>.
nom choisi : <?php echo htmlspecialchars($_POST['nom'])."<br>"; ?>.
prenom choisi : <?php echo htmlspecialchars($_POST['prenom'])."<br>"; ?>.
mail choisi : <?php echo htmlspecialchars($_POST['mail'])."<br>"; ?>

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
	echo ("Connexion BDD réussie !")."<br>";;
		// Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
	

	if (!$mysqli->set_charset("utf8")) {
		printf("Pb de chargement du jeu de car. utf8 : %s"."<br>", $mysqli->error);
		exit();
	}
		//Préparation de la requête à partir des chaînes saisies =>
		//concaténation (avec le point) des différents éléments composant la
		//requête
	

	if (strcmp($_POST['mdp'],$_POST['mdp_confirme']) == 0 ){
		echo "Confirmation MDP = true"."<br>";
	} else {
		echo "Confirmation MDP = false"."<br>";
	}

	
	if ($_POST['pseudo'] && 
		$_POST['mdp'] && 
		$_POST['mdp_confirme'] &&
		$_POST['nom'] && 
		$_POST['prenom'] && 
		$_POST['mail'] &&
		strcmp($_POST['mdp'],$_POST['mdp_confirme']) == 0){

		echo "champs valide = true"."<br>";


	$sql="INSERT INTO compte VALUES('$id',md5('$mdp'));";			
	echo($sql)."<br>"; // Affichage de la requête constituée pour vérification
	$result2 = $mysqli->query($sql);
				
	if ($result2 == false) //Erreur lors de l’exécution de la requête
		{
			// La requête a echoué
			echo "Error: La requête a échoué"."<br>";
			echo "Query: " . $sql ."<br>";
			echo "Errno: " . $mysqli->errno ."<br>";
			echo "Error: " . $mysqli->error . "<br>";
			echo "<a href='inscription.php'>Formulaire d'inscription</a>";

			exit;
		}
		//requête
		$sql="INSERT INTO profil VALUES('$id','$nom','$prenom','$mail','D','R',CURDATE());";
		// Affichage de la requête constituée pour vérification
		echo($sql)."<br>";
		//Exécution de la requête d'ajout d'un compte dans la table des comptes
		$result3 = $mysqli->query($sql);
		if ($result3 == false) //Erreur lors de l’exécution de la requête
			{
				// La requête a echoué
				echo "Error: La requête a échoué"."<br>";
				echo "Query: " . $sql ."<br>";
				echo "Errno: " . $mysqli->errno ."<br>";
				echo "Error: " . $mysqli->error . "<br>";


				$sql="DELETE FROM compte WHERE CMPT_PSEUDO = '$id';";


				echo($sql)."<br>";
				$result4 = $mysqli->query($sql);

				if ($result4 == false) //Erreur lors de l’exécution de la requête
					{
							// La requête a echoué
						echo "Error: La requête a échoué"."<br>";
						echo "Query: " . $sql ."<br>";
						echo "Errno: " . $mysqli->errno ."<br>";
						echo "Error: " . $mysqli->error . "<br>";
						exit;
					}



					echo "<a href='inscription.php'>Formulaire d'inscription</a>";

					exit;
				}
				
				else //Requête réussie
				
				{
					echo "<br />";
					echo "Création du profil réussie !" . "<br>";
				}
				//Ferme la connexion avec la base MariaDB


			} else {
				echo "champs valide = false"."<br>";
				echo "<a href='inscription.php'>Formulaire d'inscription</a>";
			}


			$mysqli->close();
?>
