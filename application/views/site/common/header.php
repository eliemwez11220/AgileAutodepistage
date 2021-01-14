<!DOCTYPE html>
<html lang="en">

<head>
    <!-- languages management -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- title website -->
    <title><?= $title; ?></title>
    <!-- SEO for website references by research robot -->
    <meta name="description"
          content="Haut-Katanga Government from Lubumbashi Town, Haut-Katanga City In Congo, Democratif Reppublic of.
     Adresse de localisation: Avenue Kasavubu, No 14, Lubumbashi, Haut-Katanga, RDC"/>
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
    <link rel="canonical" href="https://www.hautkatanga.cd"/>
    <meta property="og:locale" content="fr_FR"/>
    <meta property="og:type" content="website"/>

    <meta property="og:title" content="Life Hotel dans la ville de Lubumbashi, province du Haut-Katanga |
     Passer des instants imaginaires et inoubliables pour vos vacances, vos manifestations et votre ceremonie de mariage par exemple.
     Vous servir est notre devoir. Toute la diversité des opinions"/>
    <meta property="og:description" content="Life Hotel dans la ville de Lubumbashi, province du Haut-Katanga |
     Passer des instants imaginaires et inoubliables pour vos vacances, vos manifestations et votre ceremonie de mariage par exemple.
     Vous servir est notre devoir. "/>

    <meta property="og:url" href="https://www.hautkatanga.cd/actualites/provinciales"/>
    <meta property="og:site_name"
          content="Life Hotel est situe en République démocratique du Congo, ville de Lubumbasshi, province du Haut-Katanga"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:description" content="Life Hotel, un lieu unique pour votre ceremonie de mariage, un endroit idela pour
    votre sejour de vos vacnaces en République démocratique du Congo, ville de Lubumbasshi, province du Haut-Katanga"/>
    <meta name="twitter:title" content="Life Hotel en République démocratique du Congo, ville de Lubumbasshi, province du Haut-Katanga |
    Vous servir est notre devoir."/>
    <!-- Icone Image -->
    <link href="<?= base_url('resources/'); ?>front/img/logo/logo.png" rel="icon">
    <!-- Material design
    <title>Material Design Bootstrap</title>
    < Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href=" <?= base_url('resources/'); ?>front/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href=" <?= base_url('resources/'); ?>front/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href=" <?= base_url('resources/'); ?>front/css/style.min.css" rel="stylesheet">
    <link href=" <?= base_url('resources/'); ?>front/font/fa/fa.css" rel="stylesheet">

    <style type="text/css">
        html,
        body,
        .view {
            height: 60%;
        }

        .vue {
            height: 100%;
        }

        @media (max-width: 740px) {

            html,
            body,
            .view {
                height: 1050px;
            }

            .vue {
                height: 1050px;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            .view {
                height: 400px;
            }

            .vue {
                height: 500px;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background-color: #1C2331 !important;
                color: #050505 !important;
            }
        }

        @media (min-device-height: 200px) and (max-device-height: 250px) {
            .navbar:not(.top-nav-collapse) {
                background-color: #1C2331 !important;
                color: #050505 !important;
            }
        }

        /*
        *autres
         */
        .views {
            height: 100%;
        }

        @media (max-width: 559px) {
            .views {
                height: 1000px;
            }
        }

        @media (min-width: 560px) and (max-width: 740px) {

            .views {
                height: 700px;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {

            .views {
                height: 600px;
            }
        }

        /* Carousel*/
        .carousel,
        .carousel-item,
        .carousel-item.active {
            height: 100%;
        }

        .carousel-inner {
            height: 100%;
        }

        .map-container {
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
            height: 0;
        }

        .map-container iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }

        /* Only for snippet */
        .double-nav .breadcrumb-dn {
            color: #fff;
        }

        .button-collapse i {
            color: #fff
        }
    </style>
</head>

<body class="blue-grey lighten-4">
<header class="fixed-top unique-color">
    <!-- Navbar -->
    <div class="container-fluid d-none d-md-block">
        <div class="row">
            <div class="col-md-4">
                <a class="pull-left">
                    <img src="<?= base_url('resources/'); ?>front/img/hk/congo_democratique_pt-006.gif"
                         alt="Embleme RDC"
                         class="img-fluid site-logo w-50 mr-0 pull-right">
                </a>
            </div>
            <div class="col-md-8">
                <div class="pull-right">
                    <a class="btn btn-link white-text font-weight-bold h5<?php echo (uri_string() == 'site/rubriques/politiques') ? "active rounded border border-light" : ""; ?>"
                       href="<?= base_url('site/rubriques/politiques'); ?>" style="border-right: outset 4px white">Politique</a>
                    <a class="btn btn-link white-text font-weight-bold h5<?php echo (uri_string() == 'site/rubriques/societes') ? "active rounded border border-light" : ""; ?>"
                       href="<?= base_url('site/rubriques/societes'); ?>" style="border-right: outset 4px white">Société</a>
                    <a class="btn btn-link white-text font-weight-bold h5<?php echo (uri_string() == 'site/rubriques/securites') ? "active rounded border border-light" : ""; ?>"
                       href="<?= base_url('site/rubriques/securites'); ?>" style="border-right: outset 4px white">Sécurité</a>
                    <a class="btn btn-link white-text font-weight-bold h5<?php echo (uri_string() == 'site/rubriques/justice') ? "active rounded border border-light" : ""; ?>"
                       href="<?= base_url('site/rubriques/justice'); ?>" style="border-right: outset 4px white">Justice</a>
                    <a class="btn btn-link white-text font-weight-bold h5<?php echo (uri_string() == 'site/rubriques/sante') ? "active rounded border border-light" : ""; ?>"
                       href="<?= base_url('site/rubriques/sante'); ?>">Santé</a> <br>
                </div>
            </div>
        </div>
    </div>
    <!--Main Navigation-->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark scrolling-navbar blue-grey">
        <!-- Home return -->
        <a class="navbar-brand pull-left" href="<?php echo base_url(); ?>">
            <div class="font-weight-bold text-uppercase">
                <span class="h5">Lualaba</span>
                <small class="text-danger mt-0 pt-0">Province</small>
            </div>
        </a>
        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse font-weight-bold" id="navbarSupportedContent">
            <!-- Left -->
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav mr-auto">
                <!-- Actualités de la province -->
                <li class="nav-item <?php echo (uri_string() == '') ? "active rounded border border-primary " : ""; ?>">
                    <a href="<?= base_url(); ?>" class="nav-link">ACCUEIL
                    </a>
                </li>
                <li class="nav-item
                <?php echo (uri_string() == 'site/actualites') ? "active rounded border border-primary" : ""; ?>">
                    <a href="<?= base_url('site/actualites'); ?>" class="nav-link">A LA UNE
                    </a>
                </li>
                <li class="nav-item <?php echo (uri_string() == 'site/actualites/coronavirus') ? "active rounded border border-primary" : ""; ?>">
                    <a href="<?= base_url('site/actualites/coronavirus'); ?>" class="nav-link">COVID-19
                    </a>
                </li>
                <li class="nav-item <?php echo (uri_string() == 'site/actualites/statistics') ? "active rounded border border-primary" : ""; ?>">
                    <a href="<?= base_url('site/actualites/statistics'); ?>" class="nav-link">STATISTIQUES
                    </a>
                </li>
                <li class="nav-item <?php echo (uri_string() == 'site/apropos') ? "active rounded border border-primary" : ""; ?>">
                    <a href="<?= base_url('site/apropos'); ?>" class="nav-link">
                        A LA DECOUVERTE
                    </a>
                </li>
                <li class="nav-item dropdown d-lg-none d-md-block <?php echo (uri_string() == 'site/administration') ? "active" : ""; ?>">
                    <a class="nav-link dropdown-toggle text-uppercase" href="<?= base_url('site/administration'); ?>"
                       id="navbarDropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        Rubriques
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item btn btn-link  font-weight-bold h5<?php echo (uri_string() == 'site/rubriques/politiques') ? "active rounded border border-light" : ""; ?>"
                           href="<?= base_url('site/rubriques/politiques'); ?>">Politique</a>
                        <a class="dropdown-item btn btn-link  font-weight-bold h5<?php echo (uri_string() == 'site/rubriques/societes') ? "active rounded border border-light" : ""; ?>"
                           href="<?= base_url('site/rubriques/societes'); ?>">Société</a>
                        <a class="dropdown-item btn btn-link  font-weight-bold h5<?php echo (uri_string() == 'site/rubriques/securites') ? "active rounded border border-light" : ""; ?>"
                           href="<?= base_url('site/rubriques/securites'); ?>">Sécurité</a>
                        <a class="dropdown-item btn btn-link  font-weight-bold h5<?php echo (uri_string() == 'site/rubriques/justice') ? "active rounded border border-light" : ""; ?>"
                           href="<?= base_url('site/rubriques/justice'); ?>">Justice</a>
                        <a class="dropdown-item btn btn-link  font-weight-bold h5<?php echo (uri_string() == 'site/rubriques/sante') ? "active rounded border border-light" : ""; ?>"
                           href="<?= base_url('site/rubriques/sante'); ?>">Santé</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav nav-flex-icons font-weight-bold">
                <!--
                 <li class="nav-item <?php echo (uri_string() == 'site/urgence') ? "active" : ""; ?>">
                    <a href="<?= base_url('site/urgence'); ?>"
                       class="nav-link border border-danger rounded text-danger">
                        <i class="fa fa-warning mr-2"></i>Urgence
                    </a>
                </li>
                 -->
                <li class="nav-item <?php echo (uri_string() == 'secure') ? "active" : ""; ?>">
                    <a href="<?= base_url('secure'); ?>" class="nav-link rounded border border-light">
                        <i class="fa fa-sign-in mr-2"></i> Connexion
                    </a>
                </li>
                <!-- Multi-level dropdown -->
            </ul>
        </div>
    </nav>
</header>
<!-- Navbar -->
<!-- Full Page Intro -->
<div class="mt-lg-5 pt-lg-5 pt-sm-5 mt-sm-5">

</div>
