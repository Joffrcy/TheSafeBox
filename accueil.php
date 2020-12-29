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
    <!-- Form -->
    <?php
         //Permet la deconnexion
         if(!empty($_GET) && isset($_GET["action"]) && $_GET["action"]=="logout"){
         	session_destroy();
         	$_SESSION=array();
         	redirect("accueil.php",0.00001);
         }
    ?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            
            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Leno</a> -->

            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="index.html"><img src="images/logo.png" alt="alternative"></a>

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
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="connexion.php?action=connexion">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="produits.html">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="terms.html">Conditions générales</a>
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
    <header id="header" class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h1>COFFRE<br>POUR <span id="js-rotating">PARTICULIER, ENTREPRISE, TOUT PUBLIC</span></h1>
                        <p class="p-large">Secur'Esaip, c'est l'opportunité de sécurisé nos biens en ayant un accès simple et efficace</p>
                        <p class="btn-solid-lg">Des questions ?</p>
                        <p class="btn-solid-lg">TheSafeBox@gmail.com</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <img class="img-fluid" src="images/coffre.png" alt="alternative">
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->

    <!-- Features -->
    <div class="tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">FEATURES</h2>
                    <div class="p-heading">Leno was designed based on input from personal development coaches and popular trainers so it offers all required features</div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">

                <!-- Tabs Links -->
                <ul class="nav nav-tabs" id="templateTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="nav-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true"><i class="fas fa-cog"></i>CONFIGURING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false"><i class="fas fa-binoculars"></i>TRACKING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false"><i class="fas fa-search"></i>MONITORING</a>
                    </li>
                </ul>
                <!-- end of tabs links -->


                <!-- Tabs Content-->
                <div class="tab-content" id="templateTabsContent">
                    
                    <!-- Tab -->
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                        <div class="container">
                            <div class="row">
                                
                                <!-- Icon Cards Pane -->
                                <div class="col-lg-4">
                                    <ul class="list-unstyled li-space-lg first">
                                        <li class="media">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="far fa-compass fa-stack-1x"></i>
                                            </span>
                                            <div class="media-body">
                                                <h4>Goal Setting</h4>
                                                <p>Like any self improving process, everything starts with setting your goals and committing to them</p>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fas fa-code fa-stack-1x"></i>
                                            </span>
                                            <div class="media-body">
                                                <h4>Visual Editor</h4>
                                                <p>Leno provides a well designed and ergonomic visual editor for you to edit your quick notes</p>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="far fa-gem fa-stack-1x"></i>
                                            </span>
                                            <div class="media-body">
                                                <h4>Refined Options</h4>
                                                <p>Each option packaged in the app's menus is provided in order to improve you personally</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div> <!-- end of col -->
                                <!-- end of icon cards pane -->

                                <!-- Image Pane -->
                                <div class="col-lg-4">
                                    <img class="img-fluid" src="images/features-smartphone-1.png" alt="alternative">
                                </div> <!-- end of col -->
                                <!-- end of image pane -->
                                
                                <!-- Icon Cards Pane -->
                                <div class="col-lg-4">
                                    <ul class="list-unstyled li-space-lg">
                                        <li class="media">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fas fa-calendar-alt fa-stack-1x"></i>
                                            </span>
                                            <div class="media-body">
                                                <h4>Calendar Input</h4>
                                                <p>Schedule your appointments, meetings and periodical evaluations using the tools</p>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fas fa-book fa-stack-1x"></i>
                                            </span>
                                            <div class="media-body">
                                                <h4>Easy Reading</h4>
                                                <p>Reading focus mode for long form articles, ebooks and other materials with long text</p>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fas fa-cube fa-stack-1x"></i>
                                            </span>
                                            <div class="media-body">
                                                <h4>Good Foundation</h4>
                                                <p>Get a solid foundation for your self development efforts. Try Leno mobile app for devices</p>
                                            </div>
                                        </li>
                                    </ul> 
                                </div> <!-- end of col -->
                                <!-- end of icon cards pane -->

                            </div> <!-- end of row -->
                        </div> <!-- end of container -->
                    </div> <!-- end of tab-pane -->
                    <!-- end of tab -->

                    <!-- Tab -->
                    <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                        <div class="container">
                            <div class="row">

                                <!-- Image Pane -->
                                <div class="col-lg-4">
                                    <img class="img-fluid" src="images/features-smartphone-2.png" alt="alternative">
                                </div> <!-- end of col -->
                                <!-- end of image pane -->
                                
                                <!-- Text And Icon Cards Area -->
                                <div class="col-lg-8">
                                    <h3>Track Result Based On Your</h3>
                                    <p class="sub-heading">After you've configured the app and settled on the data gathering techniques you can start the information trackers and begin collecting those long awaited interesting details.</p>
                                    <ul class="list-unstyled li-space-lg first">
                                        <li class="media">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fas fa-cube fa-stack-1x"></i>
                                            </span>
                                            <div class="media-body">
                                                <h4>Good Foundation</h4>
                                                <p>Get a solid foundation for your self development efforts. Try Leno mobile app now</p>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fas fa-book fa-stack-1x"></i>
                                            </span>
                                            <div class="media-body">
                                                <h4>Easy Reading</h4>
                                                <p>Reading focus mode for long form articles, ebooks and other materials with long text</p>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="far fa-compass fa-stack-1x"></i>
                                            </span>
                                            <div class="media-body">
                                                <h4>Goal Setting</h4>
                                                <p>Like any self improving process, everything starts with setting goals and comiting</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled li-space-lg">
                                        <li class="media">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fas fa-calendar-alt fa-stack-1x"></i>
                                            </span>
                                            <div class="media-body">
                                                <h4>Calendar Input</h4>
                                                <p>Schedule your appointments, meetings and periodical evaluations using the tools</p>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fas fa-code fa-stack-1x"></i>
                                            </span>
                                            <div class="media-body">
                                                <h4>Visual Editor</h4>
                                                <p>Leno provides a well designed and ergonomic visual editor for you to edit your notes</p>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="far fa-gem fa-stack-1x"></i>
                                            </span>
                                            <div class="media-body">
                                                <h4>Refined Options</h4>
                                                <p>Each option packaged in the app's menus is provided in order to improve you personally</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div> <!-- end of col -->
                                <!-- end of text and icon cards area -->

                            </div> <!-- end of row -->
                        </div> <!-- end of container -->
                    </div> <!-- end of tab-pane -->
                    <!-- end of tab -->

                    <!-- Tab -->
                    <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                        <div class="container">
                            <div class="row">

                                <!-- Text And Icon Cards Area -->
                                <div class="col-lg-8">
                                    <ul class="list-unstyled li-space-lg first">
                                        <li class="media">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fas fa-cube fa-stack-1x"></i>
                                            </span>
                                            <div class="media-body">
                                                <h4>Good Foundation</h4>
                                                <p>Get a solid foundation for your self development efforts. Try Leno mobile app today</p>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fas fa-book fa-stack-1x"></i>
                                            </span>
                                            <div class="media-body">
                                                <h4>Easy Reading</h4>
                                                <p>Reading focus mode for long form articles, ebooks and other materials with long text</p>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="far fa-compass fa-stack-1x"></i>
                                            </span>
                                            <div class="media-body">
                                                <h4>Goal Setting</h4>
                                                <p>Like any self improving process, everything starts with setting your goals and comiting</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled li-space-lg">
                                        <li class="media">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fas fa-calendar-alt fa-stack-1x"></i>
                                            </span>
                                            <div class="media-body">
                                                <h4>Calendar Input</h4>
                                                <p>Schedule your appointments, meetings and periodical evaluations using the tools</p>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fas fa-code fa-stack-1x"></i>
                                            </span>
                                            <div class="media-body">
                                                <h4>Visual Editor</h4>
                                                <p>Leno provides a well designed and ergonomic visual editor for you to edit your notes</p>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="far fa-gem fa-stack-1x"></i>
                                            </span>
                                            <div class="media-body">
                                                <h4>Refined Options</h4>
                                                <p>Each option packaged in the app's menus is provided in order to improve you personally</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <h3>Monitoring Tools Evaluation</h3>
                                    <p class="sub-heading">Monitor the evolution of your finances and health state using tools integrated in Leno. The generated real time reports can be filtered based on any desired criteria.</p>
                                </div> <!-- end of col -->
                                <!-- end of text and icon cards area -->

                                <!-- Image Pane -->
                                <div class="col-lg-4">
                                    <img class="img-fluid" src="images/features-smartphone-3.png" alt="alternative">
                                </div> <!-- end of col -->
                                <!-- end of image pane -->
                                    
                            </div> <!-- end of row -->
                        </div> <!-- end of container -->
                    </div><!-- end of tab-pane -->
                    <!-- end of tab -->

                </div> <!-- end of tab-content -->
                <!-- end of tabs content -->

            </div> <!-- end of row --> 
        </div> <!-- end of container --> 
    </div> <!-- end of tabs -->
    <!-- end of features -->

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
                            <li>Important: <a href="terms.html">Conditions Générales</a></li>
                            <li>Menu: <a href="accueil.php">Accueil</a>, <a href="produits.html">Produits</a></li>
                        </ul>
                    </div> <!-- end of footer-col -->
                    <div class="footer-col third">
                        <h6>Contact</h6>
                        <p class="p-small">Des questions ? Donnez votre avis <a href="mailto:contact@leno.com"><strong>TheSafeBox@gmail.com</strong></a></p>
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
                    <p class="p-small">Copyright ©<a href="https://inovatik.com">TheSafeBox</a></p>
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