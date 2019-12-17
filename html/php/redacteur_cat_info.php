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
                <li class="cta"><a href="../buy-tickets.PHP">achat tiquets</a></li>
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
            <?php
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


            ?>
            <span class="d-block mb-3 caption" data-aos="fade-up">gestion des informations</span>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">

           <?php
            
            $sql = "SELECT * 
            FROM categorie
            LEFT OUTER JOIN information using(CAT_NUMERO)
            where INFO_ETAT = 'L'
            ORDER BY INFO_NUMERO DESC";

            //echo($sql);

            $resultat = $mysqli->query($sql);

            if ($resultat == false) {
              // La requête a echoué
              echo "<font size='3' color='red'> Error: Affichage d'informations <br></font>";
              /*
              echo "Error: La requête a échoué  \n";
              echo "Query: " . $sql . "\n";
              echo "Errno: " . $mysqli->errno . "\n";
              echo "Error: " . $mysqli->error . "\n";
              */

              //exit() fait bugais la page
              exit();
            } else {
              $numRows = $resultat->num_rows;

              //Verifier s'il y'a des infos
              if ($numRows > 0) { // Afficher tout
                echo '<div class="container">';
                while ($information = $resultat->fetch_assoc()) {
                  echo '<div class="row mb-5" data-aos="fade-up" data-aos-delay="400">';
                  echo '
                    <h2 class="col"><a href="#">'.$information['CAT_INTITULE'].'</a></h2>
                    <p class="col">'.$information['INFO_TEXTE'].'</p>
                    <span class="col"><a href="#">'.$information['CMPT_PSEUDO'].'</a></span>';
                    echo '</div>';
                }
                echo "</div>";
              } else { //Afficher indisponible
                echo "<font size='3' color='red'> Aucune informations disponibles ...<br></font>";
              }
            }
            ?>



        </div>
        <h1>Ajouter une information</h1>
        <div class="row">
          <form action="redacteur_cat_info_action.php" method="post">
            <div class="form-group">

              <textarea required="required" class="mb-2 form-control" placeholder="information" name="information" id="" cols="30" rows="10"></textarea>

              CATEGORIE:
              <select class="mb-2 form-control" name="categorie" id="">

                <?php
                
                //$sql = "SELECT * FROM categorie WHERE CAT_STATUT_AUTORISE = '" . $_SESSION['statut'] . "'";
                $sql = "SELECT * FROM categorie";
                //echo($sql);

                $resultat = $mysqli->query($sql);

                if ($resultat == false) //Erreur lors de l’exécution de la requête
                {
                  // La requête a echoué
                  echo '<option value="">ERREUR CAT</option>';
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
                  while ($categorie = $resultat->fetch_assoc()) {
                    echo '<option value="' . $categorie['CAT_NUMERO'] . '">' . $categorie['CAT_INTITULE'] . '</option>';
                  }
                }
                ?>
            </div>
            </select>

            <input class="btn btn-primary" type="submit" value="Valider">
          </form>
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