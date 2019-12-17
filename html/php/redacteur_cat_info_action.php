<!DOCTYPE html>
<html lang="en">

<head>
    <title>Redacteur accueil</title>
    <!-- Verifier que la session est redacteur -->
    <?php

    session_start();

    if (
        !isset($_SESSION['statut']) ||
        !isset($_SESSION['login'])
    ) {
        //Redirection
        header("Location:session.php");
    }

    if (strcmp($_SESSION['statut'], 'R') != 0) {
        //Redirection
        header("Location:session.php");
    }




    ?>

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

</head>

<body>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <?php

                $categorie = addslashes(htmlspecialchars($_POST["categorie"]));
                $info = addslashes(htmlspecialchars($_POST["information"]));

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





                //Affichage SQL
                //echo ($sql);

                $sql = "SELECT CAT_STATUT_AUTORISE
        FROM categorie
        WHERE CAT_NUMERO = '" . $categorie . "'
        AND CAT_STATUT_AUTORISE = '" . $_SESSION["statut"] . "'";

                //echo($sql);


                //Verifier si G ou R
                $resultat = $mysqli->query($sql);

                if ($resultat == false) {
                    // La requête a echoué
                    echo "<font size='3' color='red'> Error: requête echoué <br></font>";
                    /*
                    echo "Error: La requête a échoué  \n";
                    echo "Query: " . $sql . "\n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    */
                } else {
                    if ($resultat->num_rows > 0) { // Inserer information 'en ligne'
                        $sql2 = "INSERT INTO information (INFO_NUMERO, CMPT_PSEUDO, CAT_NUMERO, INFO_TEXTE, INFO_DATE_AJOUT, INFO_ETAT) 
                    VALUES (NULL, '" . $_SESSION['login'] . "', $categorie, '" . $info . "', '" . date('Y-m-d') . "', 'L')";

                        //echo($sql2);

                        $resultat2 = $mysqli->query($sql2);
                        if ($resultat2 == false) //Erreur lors de l’exécution de la requête
                        {
                            // La requête a echoué
                            echo "<font size='3' color='red'> Error: insertion d'information <br></font>";
                            /*
                            echo "Error: La requête a échoué  \n";
                            echo "Query: " . $sql . "\n";
                            echo "Errno: " . $mysqli->errno . "\n";
                            echo "Error: " . $mysqli->error . "\n";
                            */

                            //exit() fait bugais la page
                            exit();
                        } else { //Requête réussie
                            //echo "<font size='3' color='green'> requête réussie ! <br></font>";
                            echo "<font size='3' color='green'> Ajout d'information réussie ! <br></font>";
                        }
                    } else { //message permissions
                        echo "<font size='3' color='red'> Vous n'avez pas la permission de publier dans cette catégorie <br></font>";
                    }

                    
                }
                ?>
            </div>
            <?php
            echo "<br>Redirection dans 5s ...<br>";

            //Redirection
            header("refresh:5;url=./redacteur_cat_info.php");
            ?>
        </div>
    </div>

    <footer class="site-footer">
        <div class="col-md-12 text-center">
            <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy; <script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="icon-heart text-primary" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>

    </footer>

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