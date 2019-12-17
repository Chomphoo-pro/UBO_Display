<!DOCTYPE html>
<html lang="en">

<head>

    <title>Festival des bouées</title>
    <?php

    session_start();

    if (
        !isset($_SESSION['statut']) ||
        !isset($_SESSION['login'])
    ) {
        //Redirection
        header("Location:session.php");
    }

    if (strcmp($_SESSION['statut'], 'G') != 0) {
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

                $actualite = $_POST['id'];
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


                $sql = "DELETE FROM actualite WHERE ACT_NUMERO = '" . $actualite . "'";
                //echo($sql);

                $resultat = $mysqli->query($sql);

                if ($resultat == false) //Erreur lors de l’exécution de la requête
                {
                    // La requête a echoué
                    echo "<font size='3' color='red'> Error: Suppression de l'actualité <br></font>";
                    /*
    echo "Error: La requête a échoué  \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    */

                    //exit() fait bugais la page
                    exit();
                } else { //Requête réussie
                    echo "<font size='3' color='green'> Actualité supprimé ! <br></font>";
                }
                ?>
            </div>
            <?php
            echo "<br>Redirection dans 5s ...<br>";

            //Redirection
            header("refresh:5;url=./gestionnaire_actualites.php");
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