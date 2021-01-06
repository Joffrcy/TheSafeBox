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
                    <h1>Nos Formules</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Cards -->
    <div class="ex-cards-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="package">LE COFFRE</div>
                            <div class="price"><span class="currency">€</span><span class="value">299</span></div>
                            <div class="period p-small">paiement en 3x disponible</div>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body">Correspond à vos besoins</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body">Aide & Installation à domicile</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body">Conseillé disponible 24h/24</div>
                                </li>
                            </ul>
                        </div>
                        <p class="btn-solid-reg page-scroll">TheSafeBox@gmail.com</p>
                    </div> <!-- end of card -->
                    <!-- end of card -->


                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="package">ADVANCED</div>
                            <div class="price"><span class="currency">€</span><span class="value">10</span></div>
                            <div class="period p-small">prélèvement mensuel</div>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body">Reconnaissance Facial & QR Code</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body">Assistance 24h/24</div>
                                </li>
                            </ul>
                        </div>
                        <a class="btn-solid-reg page-scroll" href="index.html#inquiry">TheSafeBox@gmail.com</a>
                    </div> <!-- end of card -->
                    <!-- end of card -->

                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="package">COMPLETE</div>
                            <div class="price"><span class="currency">€</span><span class="value">30</span></div>
                            <div class="period p-small">prélèvement mensuel</div>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body">Protection en temps réel</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body">Reconnaissance Facial & QR Code</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i>
                                    <div class="media-body">Assistance 24h/24</div>
                                </li>
                            </ul>
                        </div>
                        <a class="btn-solid-reg page-scroll" href="index.html#inquiry">TheSafeBox@gmail.com</a>
                    </div> <!-- end of card -->
                    <!-- end of card -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-cards-3 -->
    <!-- end of cards -->


    <!-- Basic -->
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">                     
                        <h2 class="mb-4">Intéréssé ?</h2>
                        <p class="mb-5">Toutes nos offres présentes sur le site sont accessible aux particuliers, proffesionel et grande entreprise. Si vous êtes intéréssé, contactez nous à l'adresse mail qui s'affiche sous chaque offre. Nous vous ferons un Devis personnalisé en fonction de vos besoins. L'équipe The Safe Box.</p>
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
