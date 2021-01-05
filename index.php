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
      <title>Coffre Sécurisé</title>
      <!-- Styles -->
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/fontawesome-all.css" rel="stylesheet">
      <link href="css/swiper.css" rel="stylesheet">
      <link href="css/magnific-popup.css" rel="stylesheet">
      <link href="css/styles.css" rel="stylesheet">
      <!-- Favicon  -->
      <link rel="icon" href="images/favicon.png">
   </head>
   <body data-spy="scroll" data-target=".fixed-top">
      <!-- Form -->
      <?php
         //Redirige vers la page connexion si pas de session d'ouverte
         if (empty($_SESSION)) redirect("connexion.php?action=connexion", 0.00001);
         //Permet la deconnexion
         if (!empty($_GET) && isset($_GET["action"]) && $_GET["action"] == "logout") {
             session_destroy();
             $_SESSION = array();
             redirect("connexion.php?action=connexion", 0.00001);
         }
         ?>
      <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">

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
                  <h1>Compte</h1>
               </div>
               <!-- end of col -->
            </div>
            <!-- end of row -->
         </div>
         <!-- end of container -->
      </header>
      <!-- end of ex-header -->
      <!-- end of header -->
      <div class="ex-form-1 pt-6 pb-5">
         <div class="container">
            <div class="row">
               <div class="col-xl-10 offset-xl-1">
                  <?php
                     // Affichage du message accueil en fonction de la connexion
                     if (!empty($_SESSION)){
                          echo '<p class="mb-5" id="Sous-titre"> Vous êtes connectés sur votre session en tant que ' . $_SESSION["login"] . '</p>';
                          echo "<img src='uploads/".$_SESSION["login"].".jpg' alt='Vous n avez pas encore ajouté de photo.' width='300'>";
                          echo "<img src='qrcodes/".$_SESSION["login"].".png' alt='Votre qr code existe pas. Contactez un administrateur.' width='300'>";
                          echo "</br>";
                      }
                      
                      //Téléchargement de l'image
                      if(isset($_FILES['image'])){
                         $errors= array();
                         $file_name = $_FILES['image']['name'];
                         $file_size = $_FILES['image']['size'];
                         $file_tmp = $_FILES['image']['tmp_name'];
                         $file_type = $_FILES['image']['type'];
                         $tmp = explode('.', $file_name);
                         $file_ext=strtolower(end($tmp));
                     
                         $extensions= array("jpeg","jpg","png");
                     
                         if(in_array($file_ext,$extensions)=== false){
                             $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                         }
                     
                         if(empty($errors)==true) {
                             move_uploaded_file($file_tmp,"uploads/".$_SESSION["login"].'.'.$file_ext);
                             updateverif($_SESSION["login"]);
                             header("Refresh:0");
                         }else{
                             print_r($errors);
                         }
                     }
                     afficheMenu();
                     
                     //Affiche le QR code
                     if (!empty($_GET) && isset($_GET["action"]) && $_GET["action"] == "qrcode") {
                     }
                     //Modif pass
                     if (!empty($_GET) && isset($_GET["action"]) && $_GET["action"] == "mdp") {
                         afficheFormulaireVerificationPass();
                     }
                     //Insérer une photo
                     if (!empty($_GET) && isset($_GET["action"]) && $_GET["action"] == "photo") {
                         afficheFormulairePhoto();
                     }
                     //Afficher le profil
                     if (!empty($_GET) && isset($_GET["action"]) && $_GET["action"] == "profil") {
                         afficheFormulaireModificationProfil($_SESSION["login"]);
                     }
                     //Verification du mdp
                     if (!empty($_POST) && isset($_POST["verifpass"])) {
                         if (verifmdp($_SESSION["login"], $_POST["verifpass"])) {
                             afficheFormulaireModificationPass($_SESSION["login"]);
                         } else {
                             echo "<p>Le mot de passe que vous avez entré n'est pas le bon.</p>";
                         }
                     }
                     
                     //Fonction modification utilisateur
                     if (!empty($_POST) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]) && isset($_POST["tel"]) && isset($_POST["adresse"]) && isset($_POST["cp"]) && isset($_POST["ville"]) && isset($_POST["pays"]) && isset($_POST["coffre"])) {
                         $res = modifierProfil($_POST["mail"], $_POST["nom"], $_POST["prenom"], $_POST["tel"], $_POST["adresse"], $_POST["cp"], $_POST["ville"], $_POST["pays"], $_POST["coffre"]);
                         if ($res) {
                             echo '<p id="insertionindex"> Votre modification a bien été prise en compte</p>';
                         } else {
                             echo '<p id="insertionindex"> Il y a eu une erreur lors de la modification veuillez réessayer.</p>';
                         }
                     }
                     //Fonction modification mot de passe
                     if (!empty($_POST) && isset($_POST["nouveaupass"]) && isset($_POST["nouveauverifpass"])) {
                         if ($_POST["nouveaupass"] == $_POST["nouveauverifpass"]) {
                             $res = modifierMdp($_SESSION["login"], $_POST["nouveaupass"]);
                             if ($res) {
                                 echo '<p id="insertionindex"> Votre modification a bien été prise en compte</p>';
                             } else {
                                 echo '<p id="insertionindex"> Il y a eu une erreur lors de la modification veuillez réessayer.</p>';
                             }
                         }
                     }
                     ?>
                  </br></br>
                  <p class="mb-5">Besoin d'aide ? Contactez nous à TheSafeBox@gmail.com</p>
               </div>
               <!-- end of col -->
            </div>
            <!-- end of row -->
         </div>
         <!-- end of container -->
      </div>
      <!-- end of ex-form-1 -->
      <!-- end of form -->
      <!-- Footer -->
    <div class="footer bg-dark-blue">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-col first">
                        <h6>Secur Esaip</h6>
                        <p class="p-small">Secur'Esaip, c'est l'opportunité de sécurisé nos biens en ayant un accès simple et efficace.</p>
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
