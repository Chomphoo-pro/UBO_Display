<!DOCTYPE html>
<html lang="en">

<head>

  <title>Festival des bouées</title>
  <?php session_start();
  unset($_SESSION['statut']);
  unset($_SESSION['login']);
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
                <li><a href="../index.php">Home</a></li>
                <li><a href="affichageCategorie.php">Catégorie</a></li>
                <li><a href="inscription.php">Inscription</a></li>
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
  </div>
  </header>

  <div class="site-section site-hero inner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-10">
          <span class="d-block mb-3 caption" data-aos="fade-up">Inscription</span>
          <h1 class="d-block mb-4" data-aos="fade-up" data-aos-delay="100">Profil</h1>
        </div>
      </div>
    </div>
  </div>




  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6" data-aos="fade-up">
          <form action="action.php" method="post">
            <div class="form-group">

              <div class="input-group mb-3">
                <input required="required" name="pseudo" type="text" class="form-control" placeholder="pseudo" aria-describedby="basic-addon1">
              </div>


              <div class="input-group mb-3">
                <input required="required" name="mdp" type="password" class="form-control" placeholder="mot de passe" aria-describedby="basic-addon1">
              </div>


              <div class="input-group mb-3">
                <input required="required" name="mdp_confirme" type="password" class="form-control" placeholder="confirmer mot de passe" aria-describedby="basic-addon1">
              </div>


              <div class="input-group mb-3">
                <input required="required" name="nom" type="text" class="form-control" placeholder="nom" aria-describedby="basic-addon1">
              </div>



              <div class="input-group mb-3">
                <input required="required" name="prenom" type="text" class="form-control" placeholder="prenom" aria-describedby="basic-addon1">
              </div>


              <div class="input-group mb-3">
                <input required="required" name="mail" type="email" class="form-control" placeholder="mail" aria-describedby="basic-addon1">
              </div>

              <!-- <p>pseudo :</p>
                    <input type="text" 
                    <br>
                    <br>


                    <p>mot de passe :</p>
                    <input type="text" 
                    <br>
                    <br>

                    <p>confirmation mot de passe :</p>
                    <input type="text" 
                    <br>
                    <br>


                    <p>nom :</p>
                    <input type="text" 
                    <br>
                    <br>


                    <p>prénom :</p>
                    <input type="text" 
                    <br>
                    <br>


                    <p>mail :</p>
                    <input type="text" 
                    <br>
                    <br> -->


              <p><input class="btn btn-primary" type="submit" value="Valider"></p>
            </div>
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