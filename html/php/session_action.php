<?php
	//Ouverture d'une session
	session_start();

	/*Affectation dans des variables du pseudo/mot de passe s'ils existent,
	


	affichage d'un message sinon*/


	
                    
 	//Affichage de la requête préparé
	if ($_POST["pseudo"] && $_POST["mdp"]){
		$id=$_POST["pseudo"];
		$motdepasse=$_POST["mdp"];

		// Connexion à la base MariaDB
		$mysqli = new mysqli('localhost','zle_beuch','w3hsyumy','zfl2-zle_beuch');
		
		if ($mysqli->connect_errno) {
	 	// Affichage d'un message d'erreur
			echo "Error: Problème de connexion à la BDD \n";
	 	// Arrêt du chargement de la page
			exit();
		}
	}













	/* 1) Requête SQL de recherche du compte utilisateur (+ validité + statut du
	profil) à partir du pseudo / mot de passe saisis */
	$sql = "select prof_statut 
				from compte join profil using(`CMPT_PSEUDO`)
				where cmpt_pseudo = '".$id."'"."
				and cmpt_mot_de_passe = MD5('".$motdepasse."')
				and prof_validite = 'A';";

	echo($sql);
	/* 1bis) A NOTER : on préparera plutôt une requête avec une jointure pour
	rechercher si un compte utilisateur valide (‘A’) existe dans la table des
	données des profils et récupérer aussi son statut à partir du pseudo / mot de
	passe saisis */

	/* Exécution de la requête pour vérifier si le compte (=pseudo+mdp) existe !*/
	$resultat = $mysqli->query($sql);

	if ($resultat==false) {
	 	// La requête a echoué
		echo "Error: Problème d'accès à la base <br>";
		exit();
	} else {

		if($resultat->num_rows == 1) {
			$query = $resultat->fetch_assoc();
			//Mise à jour des données de la session
	 		$_SESSION['login']=$id;
	 		$_SESSION['statut'] = $query['prof_statut'];
			/*Redirection vers la page autorisée à cet utilisateur
			ATTENTION !! Ne pas mettre d'appel d'echo() / de balise HTML
			au-dessus de header() dans cette condition*/

			if (strcmp($_SESSION['statut'], 'R') == 0){
				//Redacteur

				//Redirection
				header("Location:redacteur_accueil.php");

			} else if (strcmp($_SESSION['statut'], 'G') == 0) {
				//Gestionnaire

				//Redirection
				//echo "<br><br><br><br>".$_SESSION['statut'];
				header("Location:gestionaire_accueil.php");

			} else {
				//Probleme
			}
			
			/*A prévoir et finaliser : récupérer puis vérifier
			 le statut du profil dans la base MariaDB,
			 puis affecter la valeur du statut dans $_SESSION['statut']
			 $_SESSION['statut']=...;
			 et enfin faire une redirection vers une page en fonction du statut
			redacteur_accueil.php si le statut est 'R'
			ou
			gestionnaire_accueil.php si le statut est 'G'... */
		} else{
		 // aucune ligne retournée
		 // => le compte n'existe pas ou n'est pas valide
			echo "pseudo/mot de passe incorrect(s) ou profil inconnu !";
			echo "<br /><a href=\"./session.php\">Cliquez ici pour reafficher
			le formulaire</a>";
		}
	//Fermeture de la communication avec la base MariaDB
	$mysqli->close();
	}
	//A COMPLETER → message à afficher/redirection vers le formulaire de connexion
?>
