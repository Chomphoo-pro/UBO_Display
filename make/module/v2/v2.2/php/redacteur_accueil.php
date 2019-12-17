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
                  <li><a href="redacteur_accueil.php">Accueil & mon profil</a></li>
                  <li><a href="404.php">Gestion des actualités</a></li>
                  <li><a href="404.php">Gestion des catégories</a></li>
                  <li><a href="404.php">Gestion des visuels</a></li>
                  <li><a href="404.php">Gestion des url</a></li>
                  <li><a href="redacteur_cat_info.php">Gestion des informations</a></li>
                  <?php
                  if (isset($_SESSION['login'])) {
                    echo "<li><a href='deconnection.php'>Déconnection</a></li>";
                  } else {
                    echo "<li><a href='session.php'>Connection</a></li>";
                  }
                  ?>
               
                </ul>
              </nav>
            </div>
            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
          </div>
        </div>
      </header>

      <div class="site-section site-hero inner">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-10">
              <span class="d-block mb-3 caption" data-aos="fade-up">Acceuil</span>
              <h1 class="d-block mb-4" data-aos="fade-up" data-aos-delay="100">Bienvenue rédacteur</h1>
            </div>
          </div>
        </div>
      </div>

      <div class="site-section">
        <div class="container">
          <div class="row mb-5">

            <?php

            $mysqli = new mysqli('localhost', 'zle_beuch', 'w3hsyumy', 'zfl2-zle_beuch');

            if ($mysqli->connect_errno) {
              // Affichage d'un message d'erreur
              echo "<font size='3' color='red'> Error: Problème de connexion au serveur distant ... <br></font>";

              /*
              echo "Error: La requête a échoué  \n";
              echo "Query: " . $sql . "\n";
              echo "Errno: " . $mysqli->errno . "\n";
              echo "Error: " . $mysqli->error . "\n";
              */

              // Arrêt du chargement de la page
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


            //Message connection réussie
            //echo ("Connexion BDD réussie !</br>");


            ?>

            <div class="col-md-12" data-aos="fade-up">
              
            <?php
                $sql = "SELECT * FROM profil WHERE CMPT_PSEUDO ='".$_SESSION['login']."' 
                                              AND PROF_STATUT = '".$_SESSION['statut']."' 
                                              AND PROF_VALIDITE = 'A'";
                //Affichage SQL
                //echo ($sql);



                /* Exécution de la requête pour vérifier si le compte (=pseudo+mdp) existe !*/
                $resultat = $mysqli->query($sql);

                if ($resultat == false) //Erreur lors de l’exécution de la requête
                {
                  // La requête a echoué
                  echo "<font size='3' color='red'> Error: Affichage du profile <br></font>";
                  /*
                  echo "Error: La requête a échoué  \n";
                  echo "Query: " . $sql . "\n";
                  echo "Errno: " . $mysqli->errno . "\n";
                  echo "Error: " . $mysqli->error . "\n";
                  */

                  //exit() fait bugais la page
                  /*exit();*/
                  
                } else { //Requête réussie
                  //echo "<font size='3' color='green'> Error: requête réussie ! <br></font>";
                  $query = $resultat->fetch_assoc();

                  echo "pseudo: " . $query['CMPT_PSEUDO'] . "<br>" .
                    "mail: " . $query['PROF_MAIL'] . "<br>" .
                    "nom: " . $query['PROF_NOM'] . "<br>" .
                    "prenom: " . $query['PROF_PRENOM'] . "<br>";
                }

                $mysqli->close();

            ?>
            </div>
          </div>
        </div>
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