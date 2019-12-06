<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Workshop &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
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
            <h1 class="mb-0"><a href="index.php" class="text-white h2 mb-0">LES<span class="text-primary">BOUEES</span> </a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="php/affichageCategorie.php">Catégorie</a></li>
                  <li><a href="php/inscription.php">Inscription</a></li>
                  <li><a href="php/session.php">Connection</a></li>
                  <li class="cta"><a href="buy-tickets.html">achat tiquets</a></li>
                </ul>
            </nav>
          </div>
          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
          </div>
        </div>
      </div>
    </header>

    <div class="site-section site-hero inner">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-10">
            <span class="d-block mb-3 caption" data-aos="fade-up">Updates</span>
            <h1 class="d-block mb-4" data-aos="fade-up" data-aos-delay="100">News</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        




        <div class="row mb-5">
          

          


            <div id="contenu"> 
              <?php 


                    $mysqli = new mysqli('localhost','zle_beuch','w3hsyumy','zfl2-zle_beuch');

                    if ($mysqli->connect_errno)
                    {
                      // Affichage d'un message d'erreur
                      //echo "Error: Problème de connexion à la BDD <br>";

                      // Arrêt du chargement de la page
                      exit();
                    }
                    // Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
                    if (!$mysqli->set_charset("utf8")) {
                      printf("Pb de chargement du jeu de car. utf8 : %s<br>", $mysqli->error);
                      exit();
                    }

                    //echo ("Connexion BDD réussie !</br>");

                    //Préparation de la requête récupérant tous les profils
                    $requete = "SELECT * FROM actualite WHERE ACT_ETAT = 'L';";
                    
                    //Affichage de la requête préparé
                    $result1 = $mysqli->query($requete);
                    if ($result1 == false) //Erreur lors de l’exécution de la requête
                    { // La requête a echoué
                      echo "Error: l'actualite a echoué <>";

                      exit();
                    }
                    else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
                    {

                      while ($actualite = $result1->fetch_assoc())
                      {
                        echo ('titre: <h2 class="mb-4"><a href="#">' . $actualite['ACT_TITRE'] . '</a></h2>'
                              . '<br> text: ' . $actualite['ACT_TEXTE']
                              . '<br> date: ' . $actualite['ACT_DATE_DE_PUBLICATION']
                              . '<br> pseudo: '. $actualite['CMPT_PSEUDO']
                              .'<br><br><br><br><br><br><br>'
                            );
                        echo "<br />";
                      }
                    }



                  //Ferme la connexion avec la base MariaDB
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
              Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-primary" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>