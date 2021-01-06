<?php session_start(); ?>
<?php
include 'fonctions.php';
include 'formulaires.php';
include('/var/www/html/lib/phpqrcode/qrlib.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Webpage Title -->
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
                    <h1>Connexion</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Form -->
    <div class="ex-form-1 pt-6 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">

                    <?php
					if(!empty($_GET) && isset($_GET["action"]) && $_GET["action"]=="connexion"){
						afficheFormulaireConnexion();
					?>
						<h2 class="mb-4" id="nouveau">Nouveau chez Secur'Esaip ?</h2>
						<form action="connexion.php" method="GET">
                        <div class="form-group">
                            <button type="submit" name="action" value="inscription" id="inscription" class="form-control-submit-button">Créer ton compte Secur'Esaip</button>
                        </div>
                    </form>
						
					<?php
					}
					// test de la connexion
					if(!empty($_POST) && isset($_POST["mail"]) && isset($_POST["pass"]) && isset($_POST["connexion"])){
						if(compteExiste($_POST["mail"], $_POST["pass"])){
							$_SESSION["login"]=$_POST["mail"];
							if(isAdmin($_POST["mail"])) $_SESSION["statut"]= "admin";
							else $_SESSION["statut"]= "Client";
            
							// 1 : Ajout dans le fichier de log
							$monfichier = fopen('access.log', 'a+');
							fputs($monfichier, $_POST['mail']." de ".$_SERVER['REMOTE_ADDR']." à ".date('l jS \of F Y h:i:s A')." connexion acceptée");
							fputs($monfichier, "\n");
							fclose($monfichier);
							redirect("index.php",0.1);//On recharge la page ainsi que le menu s'affichera
						}
						else {
							echo '<h3>Votre Email ou Mot de passe est incorrect</h3>';
							// 1 : Ajout dans le fichier log
							$monfichier = fopen('access.log', 'a+');
							fputs($monfichier, $_POST['mail']." de ".$_SERVER['REMOTE_ADDR']." à ".date('l jS \of F Y h:i:s A')." connexion refusée");
							fputs($monfichier, "\n");
                            fclose($monfichier);
                            redirect("connexion.php?action=connexion", 3);
						}
					}
					
					//Formulaire d'inscription
					if(!empty($_GET) && isset($_GET["action"]) && $_GET["action"]=="inscription"){
						echo '<h2> Formlulaire d\'inscription :</h2></br>';
						afficheFormulaireAjoutClient();
						echo '<h3 id="nouveau">Vous possédez déjà un compte ? - <a href="connexion.php?action=connexion">Identifiez-vous </a></h3>';
					}
					if(!empty($_POST) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]) && isset($_POST["pass"]) && isset($_POST["verifpass"]) && isset($_POST["tel"]) && isset($_POST["adresse"]) && isset($_POST["cp"]) && isset($_POST["ville"]) && isset($_POST["pays"]) && isset($_POST["coffre"])){
						if (check_email_address($_POST["mail"]) == false){
							echo "<p id=\"insertion\">Le format de l'adresse mail n'est pas correct. Vous allez être redirigé automatiquement vers la page d'inscription.</p>";
							redirect("connexion.php?action=inscription", 4);
						}
						else{ 
							if($_POST["pass"]==$_POST["verifpass"]){
                                $mail = $_POST["mail"];
								$res = ajoutClient($_POST["mail"],$_POST["pass"],$_POST["nom"],$_POST["prenom"],$_POST["tel"],$_POST["adresse"],$_POST["cp"],$_POST["ville"],$_POST["pays"],"Client",$_POST["coffre"]); //Par défaut status = Client
								if($res){
									echo "<p id=\"insertion\"> Votre inscription a été effectuée correctement. Vous allez être redirigé automatiquement vers la page de connexion.</p>";
                                    QRcode::png($mail, 'qrcodes/'.$mail.'.png', QR_ECLEVEL_H, 4);
									redirect("connexion.php?action=connexion",3);
								}
								else{
									echo "<p id=\"insertion\"> Il y a eu une erreur lors de votre inscription. Veuillez reesayer. Vous allez être redirigé automatiquement vers la page d'inscription</p>";
									redirect("connexion.php?action=inscription",3);
								}
							}
							else{
								echo "<p id=\"insertion\">Les mots de passes entrés ne correspondent pas. Vous allez être redirigé automatiquement vers la page d'inscription</p>";
								redirect("connexion.php?action=inscription", 4);
							}
						}
					}
					?>

                    

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-form-1 -->
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
