<?php session_start(); ?>
<?php
include 'fonctions.php';
include 'formulaires.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Webpage Title -->
   <title>Coffre Sécurisé</title>

   <!-- Styles -->
   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
   <link href="css/bootstrap.css" rel="stylesheet">
   <link href="css/fontawesome-all.css" rel="stylesheet">
   <link href="css/swiper.css" rel="stylesheet">
   <link href="css/magnific-popup.css" rel="stylesheet">
   <link href="css/styles.css" rel="stylesheet">

   <!-- Favicon  -->
   <link rel="icon" href="images/favicon.png">
</head>

<body data-spy="scroll" data-target=".fixed-top">
   <?php
   //Vérifie session ouverte
   if (empty($_SESSION)) redirect("connexion.php", 0.1);
   //Pour pouvoir se déconnecter
   if (!empty($_GET) && isset($_GET["action"]) && $_GET["action"] == "logout") {
      session_destroy();
      $_SESSION = array();
      redirect("connexion.php", 0.1);
   }

   ?>
   <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
			
			<!-- Image Logo -->
            <a class="navbar-brand logo-image" href="accueil.php"><img src="images/logo.png" alt="alternative"></a>

			
            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="accueil.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="index.php">Compte</a>
                    </li>
                    <?php
						if(empty($_SESSION)){
					?>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="connexion.php?action=connexion">Connexion</a>
                    </li>
                    <?php
							
						}
					?>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="produits.php">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="terms.php">Conditions générales</a>
                    </li>
					<?php
						if(!empty($_SESSION)){
					?>
						<li class="nav-item">
							<a class="nav-link page-scroll" href="accueil.php?action=logout" title="Logout">Logout</a>
						</li>
					<?php
							
						}
					?>
                </ul>
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->
   <!-- Header -->
   <header class="ex-header bg-dark-blue">
      <div class="container">
         <div class="row">
            <div class="col-xl-10 offset-xl-1">
               <h1>Modification Admin</h1>
            </div> <!-- end of col -->
         </div> <!-- end of row -->
      </div> <!-- end of container -->
   </header> <!-- end of ex-header -->
   <!-- end of header -->
   <article>
      <div class="ex-form-1 pt-6 pb-5">
         <div class="container">
            <div class="row">
            <div class="col-xl-10 offset-xl-1">
                  <?php
                  afficheMenu();
                  ?>
                  <br><br>
                  <?php
                  //seul les admins ont accès
                  if (!empty($_SESSION)){
                     if (isAdmin($_SESSION["login"])) {
                        //Fonction inserer utilisateur
                        if (!empty($_GET) && isset($_GET["action"]) && $_GET["action"] == "inserer_utilisateur") {
                           afficheFormulaireAjoutClientAdmin();
                        }
                        if (!empty($_POST) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]) && isset($_POST["pass"]) && isset($_POST["verifpass"]) && isset($_POST["tel"]) && isset($_POST["adresse"]) && isset($_POST["cp"]) && isset($_POST["ville"]) && isset($_POST["pays"]) && isset($_POST["coffre"]) && isset($_POST["status"])) {
                           if ($_POST["pass"] == $_POST["verifpass"]) {
                              $res = ajoutClient($_POST["mail"], $_POST["pass"], $_POST["nom"], $_POST["prenom"], $_POST["tel"], $_POST["adresse"], $_POST["cp"], $_POST["ville"], $_POST["pays"], $_POST["status"], $_POST["coffre"]);
                              if ($res) {
                                 echo '<p id="insertionindex"> Insertion effectuée de ' . $_POST["mail"] . '</p>';
                              } else {
                                 echo '<p id="insertionindex"> Erreur insertion de ' . $_POST["mail"] . '</p>';
                              }
                           } else {
                              echo '<p id="insertionindex">Les mots de passes entrés ne correspondent pas, re-remplissez le formulaire!</p>';
                           }
                        }

                        //Formulaire choix utilisateur à modifier
                        if (!empty($_GET) && isset($_GET["action"]) && $_GET["action"] == "modifier_utilisateur") {
                           afficheFormulaireChoixClient("Modifier");
                        }
                        //Formulare modification utilisateur
                        if (!empty($_POST) && isset($_POST["mail"]) && isset($_POST["choix"]) && $_POST["choix"] == "Modifier") {
                           echo "<img src='uploads/".$_POST["mail"].".jpg' alt='Vous n avez pas encore ajouté de photo.' width='300'>";
                           afficheFormulaireModificationClient($_POST["mail"]);
                        }
                        //Fonction modification utilisateur
                        if (!empty($_POST) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]) && isset($_POST["pass"]) && isset($_POST["tel"]) && isset($_POST["adresse"]) && isset($_POST["cp"]) && isset($_POST["ville"]) && isset($_POST["pays"]) && isset($_POST["coffre"]) && isset($_POST["status"]) && isset($_POST["verif"])) {
                           $res = modifierClient($_POST["mail"], $_POST["pass"], $_POST["nom"], $_POST["prenom"], $_POST["tel"], $_POST["adresse"], $_POST["cp"], $_POST["ville"], $_POST["pays"], $_POST["status"], $_POST["coffre"], $_POST["verif"]);
                           if ($res) {
                              echo '<p id="insertionindex"> Modifcation effectuée de ' . $_POST["mail"] . '</p>';
                           } else {
                              echo '<p id="insertionindex"> Erreur Modifcation de ' . $_POST["mail"] . '</p>';
                           }
                        }

                        //Formulaire choix utilisateur à supprimer
                        if (!empty($_GET) && isset($_GET["action"]) && $_GET["action"] == "supprimer_utilisateur") {
                           afficheFormulaireChoixClient("Supprimer");
                        }
                        //Fonction supprimer client
                        if (!empty($_POST) && isset($_POST["mail"]) && isset($_POST["choix"]) && $_POST["choix"] == "Supprimer") {
                           if (supprimerClient($_POST["mail"])) {
                              //Suppression de la photo
                              unlink("uploads/".$_POST["mail"].".jpg");
                              unlink("qrcodes/".$_POST["mail"].".png");
                              unlink("/home/pi/TheSafeBox/profiles/".$_POST["mail"].".jpg");
                              echo '<p id="insertionindex"> Suppression effectuée de ' . $_POST["mail"] . '</p>';
                           }
                        }
                     
                     } else redirect("index.php", 0.1);
                  } else redirect("index.php", 0.1);
                  ?>
               </div>
            </div>
         </div>
      </div>
   </article>
   <!-- Footer -->
    <div class="footer bg-dark-blue">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-col first">
                        <h6>The Safe Box</h6>
                        <p class="p-small">The Safe Box, c'est l'opportunité de sécurisé nos biens en ayant un accès simple et efficace.</p>
                    </div> <!-- end of footer-col -->
                    <div class="footer-col second">
                        <h6>Liens</h6>
                        <ul class="list-unstyled li-space-lg p-small">
                            <li>Important: <a href="terms.php">Conditions Générales</a></li>
                            <li>Menu: <a href="accueil.php">Accueil</a>, <a href="produits.php">Produits</a></li>
                        </ul>
                    </div> <!-- end of footer-col -->
                    <div class="footer-col third">
                        <h6>Contact</h6>
                        <p class="p-small">Des questions ? Donnez votre avis <a href="mailto:TheSafeBox@gmail.com"><strong>TheSafeBox@gmail.com</strong></a></p>
                    </div> <!-- end of footer-col -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->



    <!-- Copyright -->
    <div class="copyright bg-dark-blue">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright ©TheSafeBox</p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->


   <!-- Scripts -->
   <script src="js/jquery.min.js"></script> <!-- jQuery Magueule -->
   <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
   <script src="js/morphext.min.js"></script> <!-- Les 3 textes qui changent dans le header -->
   <script src="js/scripts.js"></script> <!-- Custom scripts -->
</body>

</html>
