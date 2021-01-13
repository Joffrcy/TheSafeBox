<?php session_start();?>
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
                    <h1>Conditions générales</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Basic -->
    <div class="ex-basic-1 pt-6">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="text-box mb-5">
                        <p class="p-large">La location d’un coffre individuel ou collectif permet au locataire (terme désignant indifféremment le locataire individuel ou l’un des colocatairesen cas de location collective) de mettre à l’abri des documents, titres, ou tous objets licites non  périssables considérés par lui comme étant de valeur.</p>
                    </div> <!-- end of text-box -->

                    <h2 class="mb-4">Clause n° 1 : Objet</h2>
                    <p>Les conditions générales de vente décrites ci-après détaillent les droits et obligations de la société The Safe Box et de son client dans le cadre de la vente des marchandises suivantes : Le Coffre Sécurisé.</p>
                    <p class="mb-5">Toute prestation accomplie par la société The Safe Box implique donc l'adhésion sans réserve de l'acheteur aux présentes conditions générales de vente.</p>
                    <h2 class="mb-4">Clause n° 2 : Prix</h2>
                    <p>Les prix des marchandises vendues sont ceux en vigueur au jour de la prise de commande. Ils sont libellés en euros et calculés hors taxes. Par voie de conséquence, ils seront majorés du taux de TVA et des frais de transport applicables au jour de la commande.</p>
                    <p>La société The Safe Box s'accorde le droit de modifier ses tarifs à tout moment. Toutefois, elle s'engage à facturer les marchandises commandées aux prix indiqués lors de l'enregistrement de la commande.</p>
                    <h3>2.1. Rabais et ristournes</h3>
                    <p class="mb-5">Les tarifs proposés comprennent les rabais et ristournes que la société The Safe Box serait amenée à octroyer compte tenu de ses résultats ou de la prise en charge par l'acheteur de certaines prestations.</p>
                    <h3>2.2. Escompte</h3>
                    <p class="mb-5">Aucun escompte ne sera consenti en cas de paiement anticipé. </p>
                    
                    <h2 class="mb-4">Clause n° 3 : Modalités de paiement</h2>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Soit par <strong>chèque</strong></div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Soit par <strong>carte bancaire</strong></div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Dans le cas échéant, par <strong>Paypal</strong></div>
                        </li>
                    </ul>
                    
                    <div class="text-box mb-5">
                        <h3>Retard de paiement</h3>
                        <p>En cas de défaut de paiement total ou partiel des marchandises livrées au jour de la réception, l'acheteur doit verser à la société The Safe Box une pénalité de retard égale à trois fois le taux de l'intérêt légal.
                            Le taux de l'intérêt légal retenu est celui en vigueur au jour de la livraison des marchandises.</p>
                    </div> <!-- end of text-box -->
                    <h2 class="mb-4">Clause n° 4 : Force majeure</h2>
                    <p>La responsabilité de la société The Safe Box ne pourra pas être mise en oeuvre si la non-exécution ou le retard dans l'exécution de l'une de ses obligations décrites dans les présentes conditions générales de vente découle d'un cas de force majeure. </p>
                    <p class="mb-6">À ce titre, la force majeure s'entend de tout événement extérieur, imprévisible et irrésistible au sens de l'article 1148 du Code civil.</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of basic -->


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
