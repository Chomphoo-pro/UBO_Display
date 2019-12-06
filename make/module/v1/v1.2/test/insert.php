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








                  $requete2="INSERT INTO compte VALUES ('tux',MD5('tux1234'));";
                  echo ($requete2) ;
                  $result2 = $mysqli->query($requete2); //Exécution de la requête
                    



                    $mysqli->close();
             







            ?> 