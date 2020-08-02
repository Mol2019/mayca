<!DOCTYPE html>
<html lang="en">

<head>
    <title>MeandYouContribution</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="{{ asset('assets/site/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/site/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/mediaelementplayer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/fl-bigmug-line.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/site/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/site/css/style.css') }}">

</head>

<body>
    <div class="site-loader"></div>
    <div class="site-wrap">

        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <!-- .site-mobile-menu -->

        <div class="border-bottom bg-white top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6 col-md-6">
                        <p class="mb-0">
                           <a href="#" class="mr-3"><span class="text-black fl-bigmug-line-phone351"></span> <span class="d-none d-md-inline-block ml-2">+225 97 653 391</span></a>
                        <a href="#"><span class="text-black fl-bigmug-line-email64"></span> <span class="d-none d-md-inline-block ml-2">meandyoucontribution@gmail.com</span></a>
                        </p>
                    </div>
                    <div class="col-6 col-md-6 text-right">
                        <a href="#" class="mr-3"><span class="text-black icon-whatsapp"></span></a>
                        <a href="#" class="mr-0"><span class="text-black icon-telegram"></span></a>
                    </div>
                </div>
            </div>

        </div>
        <div class="site-navbar">
            <div class="container py-1">
                <div class="row align-items-center">
                    <div class="col-8 col-md-8 col-lg-4">
                        <h1 class=""><a href="{{ url('/') }}" class="h5 text-uppercase text-black"><strong>MeandYouContribution<span
                                class="text-danger">.</span></strong></a></h1>
                    </div>
                    <div class="col-4 col-md-4 col-lg-8">
                        <nav class="site-navigation text-right text-md-right" role="navigation">
                            <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3">
                                <a href="#" class="site-menu-toggle js-menu-toggle text-black">
                                    <span class="icon-menu h3"></span>
                                </a>
                            </div>

                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li class="active">
                                    <a href="{{ url('/') }}">ACCUEIL</a>
                                </li>
                                <li>
                                    <a href="#">ACTUALITES</a>
                                </li>
                                <li class="has-children">
                                    <a href="#">ECONOMIE</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Mes cotisations</a></li>
                                        <li><a href="{{ url('/dashboard') }}">Mon investissement</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">BOUTIQUE</a></li>
                                <li class="has-children">
                                    <a href="#">FAQ </a>
                                    <ul class="dropdown">
                                        <li><a href="#">STATUS</a></li>
                                        <li><a href="#">REGLEMENT INTERIEUR</a></li>
                                        <li><a href="{{ route('chart') }}">COMMENT DEVENIR MEMBRE ?</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="site-section border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/site/images/about.jpg') }}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-5 ml-auto" data-aos="fade-up" data-aos-delay="200">
                    <h2>Comment devenir membre?</h2>
                    <p>Pour faire partir de notre famille :  </p>

                    <p>✅ Etre âgée de 20ANS et plus🔞,  Être porteur de projet et être ambitieux.
Avoir un bon état d'esprit étant investisseur en reinvestissant  50% de son bénéfice sur cotisation ( BSC) obligatoirement.</p>
<p>✅ Avoir au mois 02 (deux) Numéros. Chacun avec des opérateurs mobiles différents.</p>
<p>✅ Faire obligatoirement une cotisation par semaine</p>
<p>✅ Réaliser ses différentes opérations en 24hr maximum.</p>
<p>✅ Être responsable de la formation de ses filleuls et de leurs opérations.</p>
<p>✅ Ne pas régresser dans le choix du pack de  cotisation. rester au niveau initial ou progresser.</p>
<p>✅ Être discret pas de publicité sur les réseaux sociaux.</p>
<p>✅ Payer son abonnement mensuel : 25.000fr cfa soit $35</p>
<p>✅ Ouvrir un compte <a href="http://perfectmoney.com">perfect money</a></p>
<p>✅ Engager une communication respectueuses et courtoise lors des échanges.</p>

                </div>
            </div>
        </div>
    </div>


    <footer class="site-footer">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;</script>
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>

            </div>
        </div>
    </footer>

    </div>
    <script src="{{ asset('assets/site/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/site/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/mediaelement-and-player.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/aos.js') }}"></script>

    <script src="{{ asset('assets/site/js/main.js') }}"></script>

</body>

</html>
