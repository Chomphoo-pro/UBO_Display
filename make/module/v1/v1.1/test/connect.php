 <?php 


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

                    //Préparation de la requête récupérant tous les profils
                    $requete = "SELECT * FROM profil;";
                    //Affichage de la requête préparée
                    echo ($requete);








                    $result1 = $mysqli->query($requete);
                    if ($result1 == false) //Erreur lors de l’exécution de la requête
                    { // La requête a echoué
                      echo "Error: La requête a echoué \n";
                      echo "Errno: " . $mysqli->errno . "\n";
                      echo "Error: " . $mysqli->error . "\n";
                      exit();
                    }
                    else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
                    {
                      echo "<br />";
                      echo($result1->num_rows); //Donne le bon nombre de lignes récupérées
                      echo "<br />";

                      while ($personne = $result1->fetch_assoc())
                      {
                        echo ($personne['PROF_NOM'] . ' ' . $personne['PROF_PRENOM']);
                        echo "<br />";
                      }
                    }
                    //Ferme la connexion avec la base MariaDB
                    $mysqli->close();
             







            ?> 