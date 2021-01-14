<!-- page intro -->
<div class="card unique-color">
    <div class="card-header info-color-dark text-center white-text pt-5 mt-5">
        <h3 class="h5 text-uppercase font-weight-bold">
            Bienvenue sur le site officiel de la plateforme de d'auto-depistage de la pandemie a COVID-19. Projet d'identification des individus
            iniitier par le Gouvernement provincial du Haut-Katanga.
            Vous êtes sur le site officiel de publication des informations officielles liees au depistage de COVID-19.
        </h3>
    </div>
</div>
<!--Main layout-->
<main role="main" class="pt-3 mt-3">
    <div class="container-fluid">
        <div class="mt-lg-1 pt-lg-1 pt-sm-2 mt-sm-2">
            <!--Grid row-->
            <div class="row wow fadeIn">
                <!--Grid column-->

                <div class="col-md-6  h-50">
                    <div class="card">
                        <div class="card-header info-color text-center white-text">
                            <h5 class="h5 text-uppercase font-weight-bold">Actualites provinciales et nationales</h5>
                        </div>
                        <div class="card-body">

                            <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade"
                                 data-ride="carousel">
                                <div class="carousel-inner">

                                    <?php if (isset($data['galerie'])) { ?>
                                        <?php foreach ($data['galerie'] as $galerie): ?>
                                            <div class="carousel-item">
                                                <a href="<?php echo base_url() . $galerie->slug; ?>">
                                                    <img class="d-block w-100 h-100 card-height-500"
                                                         src="<?php echo site_url(); ?>resources/images/uploads/<?php echo $galerie->nom_photo; ?>"
                                                         alt="First slide" style="border-radius: 10px;">
                                                </a>
                                                <div class="container">
                                                    <div class="carousel-caption">
                                                        <p class="font-weight-bold text-center text-dark small">
                                                            <a href="<?php echo base_url() . $galerie->slug; ?>">
                                                                <?php echo $galerie->title; ?> </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach;
                                    } else { ?>
                                        <div class="carousel-item active card-height-500">
                                            <a href="<?php echo base_url('main/view_posts'); ?>">
                                                <img class="img-thumbnail bg-transparent"
                                                     src="<?php base_url(); ?>resources/front/img/hk/haut_katanga_siege.jpg"
                                                     alt="First slide"
                                                     style="border-radius: 30px;
                                                     width: 100%!important; height: 350px!important;">
                                            </a>
                                            <div class="container">
                                                <div class="carousel-caption">
                                                    <p class="font-weight-bold text-center text-dark small">
                                                        <a href="<?php echo base_url('main/view_posts'); ?>"
                                                           class="text-dark">
                                                            Executif provincial du gouvernorat de la province du
                                                            haut-katanga.</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- deuxieme image -->
                                        <div class="carousel-item card-height-500">
                                            <img class="img-thumbnail bg-transparent"
                                                 src="<?php base_url(); ?>resources/front/img/hk/lubum_gouvernorat.jpg"
                                                 alt="First slide"
                                                 style="border-radius: 30px; width: 100%!important; height: 350px!important;">
                                            <div class="carousel-caption">
                                                <p class="font-weight-bold text-center text-dark small">
                                                    <a href="<?php echo base_url('main/view_posts'); ?>"
                                                       class="text-dark">
                                                        Batiment Du siege Administratif a Lubumbashi, province du
                                                        haut-katanga.</a>
                                                </p>
                                            </div>

                                        </div>
                                        <!-- troisieme image -->
                                        <div class="carousel-item card-height-500">
                                            <img class="img-thumbnail bg-transparent"
                                                 src="<?php base_url(); ?>resources/front/img/hk/hautkatanga_batiment.jpg"
                                                 alt="First slide"
                                                 style="border-radius: 30px; width: 100%!important; height: 350px!important;">
                                            <div class="container">
                                                <div class="container">
                                                    <div class="carousel-caption">
                                                        <p class="font-weight-bold text-center text-dark small">
                                                            Province du haut-katanga.
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- troisieme image -->
                                        <div class="carousel-item card-height-500">
                                            <a href="<?php echo base_url('main/view_posts'); ?>">
                                                <img class="img-thumbnail"
                                                     src="<?php base_url(); ?>resources/front/img/hk/lubum_mairie.png"
                                                     alt="First slide"
                                                     style="border-radius: 30px; width: 100%!important; height: 350px!important;">
                                            </a>
                                            <div class="container">
                                                <div class="carousel-caption">
                                                    <h6 class="font-weight-bold text-center text-dark">
                                                        Mairie de Lubumbashi, province du haut-katanga.
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <small class="font-weight-bold h6">
                                Derniere mise a jour, effectuee depuis lundi, 04/05/2020
                            </small>
                        </div>
                    </div>
                </div>
                <!--fin Grid column-->
                <!--Grid column-->
                <div class="col-md-6  h-50">
                    <div class="card">
                        <div class="card-header danger-color text-center">
                            <h1 class="h5 text-uppercase font-weight-bold white-text">
                                Infos d'Urgences provinciale
                            </h1>
                        </div>
                        <!--Card content-->
                        <div class="card-body">
                            <p class="text-justify">
                                Est une startup qui apporte de solutions numeriques avec les nouvelles technologies
                                de
                                l'information et de la communication.
                                *Les developpements de sites et des applications web sous divers Frameworks tels que
                                CodeIgniter et Laravel utilisant la technologie PHP/MySQL
                                qui tournent sur le serveur Apache, Django pour Python, ASP.NET pour Microsoft avec
                                IIS
                                comme serveur web. *Le developpement des applications Android et IOS avec la
                                technologie
                                Flutter utilisant Dart comme langaage de programmation et Android utilisant Java et
                                Kotlin comme langage de programmation.
                                *Bases de données avec MySQL, MS SQL Server, Access, Oracle, PostGreSQL, SQLite
                                *Administration systèmes Windows et Linux
                                *Développement mobile MIT App Inventor
                                *Programmation informatique avec Framework .NET (C# et VB), Python, C, C++, Java,
                                PHP
                                *CMS WordPress,DRUPAL
                                *ERP ODOO, TALLY 9
                                *Pack office : Excel, Word, Access, PowerPoint, Publisher
                                *Gestion des projets sous MS Projects et GanttProject
                            </p>
                        </div>
                        <div class="card-footer text-right">
                            <small class="font-weight-bold h6">
                                Publie depuis mardi, 05/05/2020 <br>
                                par le ministere de l'interieur
                            </small>
                        </div>
                    </div>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Content -->
        <!--Section: Post-->
        <section class="mt-4">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8 mb-4">

                    <!--Card provinciale-->
                    <div class="card mb-4 wow fadeIn">

                        <!--Card content-->
                        <div class="card-body">
                            <a href="">
                                <img class="img-thumbnail bg-transparent h-50 w-100"
                                     src="<?php base_url(); ?>resources/front/img/posts/002.jpg"
                                     alt="First slide" style="border-radius: 20px;">
                                <p class="h5 my-3 text-uppercase text-center">Titre1 actualites provinciales</p>
                            </a>
                            <div class="card-footer text-right">
                                <small class="font-weight-bold h6">
                                    Publie depuis mardi, 05/05/2020 par le ministere de la sante<br>
                                </small>
                            </div>
                            <p class="text-justify">
                                Est une startup qui apporte de solutions numeriques avec les nouvelles technologies
                                de
                                l'information et de la communication.
                                *Les developpements de sites et des applications web sous divers Frameworks tels que
                                CodeIgniter et Laravel utilisant la technologie PHP/MySQL
                                qui tournent sur le serveur Apache, Django pour Python, ASP.NET pour Microsoft avec
                                IIS
                                comme serveur web. *Le developpement des applications Android et IOS avec la
                                technologie
                                Flutter utilisant Dart comme langaage de programmation et Android utilisant Java et
                                Kotlin comme langage de programmation.
                                *Bases de données avec MySQL, MS SQL Server, Access, Oracle, PostGreSQL, SQLite
                                *Administration systèmes Windows et Linux
                                *Développement mobile MIT App Inventor
                                *Programmation informatique avec Framework .NET (C# et VB), Python, C, C++, Java,
                                PHP
                                *CMS WordPress,DRUPAL
                                *ERP ODOO, TALLY 9
                                *Pack office : Excel, Word, Access, PowerPoint, Publisher
                                *Gestion des projets sous MS Projects et GanttProject
                            </p>
                        </div>
                        <div class="card-footer unique-color">
                            <div class="container">

                                <!-- Grid row-->
                                <div class="row py-4 d-flex align-items-center">

                                    <!-- Grid column -->
                                    <div class="col-md-6 col-lg-6 text-center text-md-left mb-4 mb-md-0">
                                        <h6 class="mb-0 white-text font-weight-bold">Give your contribution and share on
                                            social networks!</h6>
                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-md-6 col-lg-6 text-center text-md-right">

                                        <!-- Facebook -->
                                        <a class="fb-ic">
                                            <i class="fa fa-facebook-f white-text mr-4 fa-2x"> </i>
                                        </a>
                                        <!-- Twitter -->
                                        <a class="tw-ic">
                                            <i class="fa fa-twitter white-text mr-4 fa-2x"> </i>
                                        </a>
                                        <!--Linkedin -->
                                        <a class="li-ic">
                                            <i class="fa fa-linkedin white-text mr-4 fa-2x"> </i>
                                        </a>
                                    </div>
                                    <!-- Grid column -->
                                </div>
                                <!-- Grid row-->
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                    <!--Card provinciale-->
                    <div class="card mb-4 wow fadeIn">

                        <!--Card content-->
                        <div class="card-body">
                            <a href="">
                                <img class="img-thumbnail bg-transparent h-50 w-100"
                                     src="<?php base_url(); ?>resources/front/img/posts/003.jpg"
                                     alt="First slide" style="border-radius: 20px;">
                                <p class="h5 my-3 text-uppercase text-center">Titre2 actualites provinciales</p>
                            </a>
                            <div class="card-footer text-right">
                                <small class="font-weight-bold h6">
                                    Publie depuis mardi, 05/05/2020 par le ministere de l'interieur<br>
                                </small>
                            </div>
                            <p class="text-justify">
                                Est une startup qui apporte de solutions numeriques avec les nouvelles technologies
                                de
                                l'information et de la communication.
                                *Les developpements de sites et des applications web sous divers Frameworks tels que
                                CodeIgniter et Laravel utilisant la technologie PHP/MySQL
                                qui tournent sur le serveur Apache, Django pour Python, ASP.NET pour Microsoft avec
                                IIS
                                comme serveur web. *Le developpement des applications Android et IOS avec la
                                technologie
                                Flutter utilisant Dart comme langaage de programmation et Android utilisant Java et
                                Kotlin comme langage de programmation.
                                *Bases de données avec MySQL, MS SQL Server, Access, Oracle, PostGreSQL, SQLite
                                *Administration systèmes Windows et Linux
                                *Développement mobile MIT App Inventor
                                *Programmation informatique avec Framework .NET (C# et VB), Python, C, C++, Java,
                                PHP
                                *CMS WordPress,DRUPAL
                                *ERP ODOO, TALLY 9
                                *Pack office : Excel, Word, Access, PowerPoint, Publisher
                                *Gestion des projets sous MS Projects et GanttProject
                            </p>
                        </div>
                        <div class="card-footer unique-color">
                            <div class="container">

                                <!-- Grid row-->
                                <div class="row py-4 d-flex align-items-center">

                                    <!-- Grid column -->
                                    <div class="col-md-6 col-lg-6 text-center text-md-left mb-4 mb-md-0">
                                        <h6 class="mb-0 white-text font-weight-bold">Give your contribution and share on
                                            social networks!</h6>
                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-md-6 col-lg-6 text-center text-md-right">

                                        <!-- Facebook -->
                                        <a class="fb-ic">
                                            <i class="fa fa-facebook-f white-text mr-4 fa-2x"> </i>
                                        </a>
                                        <!-- Twitter -->
                                        <a class="tw-ic">
                                            <i class="fa fa-twitter white-text mr-4 fa-2x"> </i>
                                        </a>
                                        <!--Linkedin -->
                                        <a class="li-ic">
                                            <i class="fa fa-linkedin white-text mr-4 fa-2x"> </i>
                                        </a>
                                    </div>
                                    <!-- Grid column -->
                                </div>
                                <!-- Grid row-->
                            </div>
                        </div>
                    </div>
                    <!--Card-->
                    <div class="card mb-4 wow fadeIn">

                        <!--Card content-->
                        <div class="card-body">
                            <a href="">
                                <img class="img-thumbnail bg-transparent h-50 w-100"
                                     src="<?php base_url(); ?>resources/front/img/posts/001.jpg"
                                     alt="First slide" style="border-radius: 20px;">
                                <p class="h5 my-3 text-uppercase text-center">Titre actualites provinciales</p>
                            </a>
                            <div class="card-footer text-right">
                                <small class="font-weight-bold h6">
                                    Publie depuis mardi, 05/05/2020 par Elie Mwez<br>
                                </small>
                            </div>
                            <p class="text-justify">
                                Est une startup qui apporte de solutions numeriques avec les nouvelles technologies
                                de
                                l'information et de la communication.
                                *Les developpements de sites et des applications web sous divers Frameworks tels que
                                CodeIgniter et Laravel utilisant la technologie PHP/MySQL
                                qui tournent sur le serveur Apache, Django pour Python, ASP.NET pour Microsoft avec
                                IIS
                                comme serveur web. *Le developpement des applications Android et IOS avec la
                                technologie
                                Flutter utilisant Dart comme langaage de programmation et Android utilisant Java et
                                Kotlin comme langage de programmation.
                                *Bases de données avec MySQL, MS SQL Server, Access, Oracle, PostGreSQL, SQLite
                                *Administration systèmes Windows et Linux
                                *Développement mobile MIT App Inventor
                                *Programmation informatique avec Framework .NET (C# et VB), Python, C, C++, Java,
                                PHP
                                *CMS WordPress,DRUPAL
                                *ERP ODOO, TALLY 9
                                *Pack office : Excel, Word, Access, PowerPoint, Publisher
                                *Gestion des projets sous MS Projects et GanttProject
                            </p>
                        </div>
                        <div class="card-footer unique-color">
                            <div class="container">

                                <!-- Grid row-->
                                <div class="row py-4 d-flex align-items-center">

                                    <!-- Grid column -->
                                    <div class="col-md-6 col-lg-6 text-center text-md-left mb-4 mb-md-0">
                                        <h6 class="mb-0 white-text font-weight-bold">Give your contribution and share on
                                            social networks!</h6>
                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-md-6 col-lg-6 text-center text-md-right">

                                        <!-- Facebook -->
                                        <a class="fb-ic">
                                            <i class="fa fa-facebook-f white-text mr-4 fa-2x"> </i>
                                        </a>
                                        <!-- Twitter -->
                                        <a class="tw-ic">
                                            <i class="fa fa-twitter white-text mr-4 fa-2x"> </i>
                                        </a>
                                        <!--Linkedin -->
                                        <a class="li-ic">
                                            <i class="fa fa-linkedin white-text mr-4 fa-2x"> </i>
                                        </a>
                                    </div>
                                    <!-- Grid column -->
                                </div>
                                <!-- Grid row-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.Card-->


                <!--Grid column-->
                <div class="col-md-4 mb-4">
                    <!--Card : Dynamic content wrapper-->


                    <!--Card-->
                    <div class="card mb-4 wow fadeIn">

                        <div class="card-header">Dernieres actualites provinciales</div>

                        <!--Card content-->
                        <div class="card-body">

                            <ul class="list-unstyled">
                                <!-- First post -->
                                <li class="media waves-effect list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img class="d-flex mr-1 card-img-100 img-thumbnail"
                                                 src="<?= base_url('resources/'); ?>front/img/posts/ford_pickup.jpg"
                                                 alt="Generic placeholder image">

                                        </div>
                                        <div class="col-sm-8">
                                            <div class="media-body">
                                                <a href="">
                                                    <h5 class="mt-0 mb-1 font-weight-bold">Project update three</h5>
                                                </a>
                                                Cras sit amet nibh libero, in gravida nulla (...)
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Second post -->
                                <li class="media waves-effect list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img class="d-flex mr-1 card-img-100 img-thumbnail"
                                                 src="<?= base_url('resources/'); ?>front/img/posts/ford_pickup.jpg"
                                                 alt="Generic placeholder image">

                                        </div>
                                        <div class="col-sm-8">
                                            <div class="media-body">
                                                <a href="">
                                                    <h5 class="mt-0 mb-1 font-weight-bold">Project update three</h5>
                                                </a>
                                                Cras sit amet nibh libero, in gravida nulla (...)
                                            </div>
                                        </div>
                                    </div>
                                </li> <!-- Third post -->
                                <li class="media waves-effect list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img class="d-flex mr-1 card-img-100 img-thumbnail"
                                                 src="<?= base_url('resources/'); ?>front/img/posts/ford_pickup.jpg"
                                                 alt="Generic placeholder image">

                                        </div>
                                        <div class="col-sm-8">
                                            <div class="media-body">
                                                <a href="">
                                                    <h5 class="mt-0 mb-1 font-weight-bold">Project update three</h5>
                                                </a>
                                                Cras sit amet nibh libero, in gravida nulla (...)
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- fourd post -->
                                <li class="media waves-effect list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img class="d-flex mr-1 card-img-100 img-thumbnail"
                                                 src="<?= base_url('resources/'); ?>front/img/posts/ford_pickup.jpg"
                                                 alt="Generic placeholder image">

                                        </div>
                                        <div class="col-sm-8">
                                            <div class="media-body">
                                                <a href="">
                                                    <h5 class="mt-0 mb-1 font-weight-bold">Project update three</h5>
                                                </a>
                                                Cras sit amet nibh libero, in gravida nulla (...)
                                            </div>
                                        </div>
                                    </div>
                                </li><!-- five post -->

                                <li class="media waves-effect list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img class="d-flex mr-1 card-img-100 img-thumbnail"
                                                 src="<?= base_url('resources/'); ?>front/img/posts/ford_pickup.jpg"
                                                 alt="Generic placeholder image">

                                        </div>
                                        <div class="col-sm-8">
                                            <div class="media-body">
                                                <a href="">
                                                    <h5 class="mt-0 mb-1 font-weight-bold">Project update three</h5>
                                                </a>
                                                Cras sit amet nibh libero, in gravida nulla (...)
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>

                    </div>
                    <!--/.Card-->
                    <!--Card-->
                    <div class="card mb-4 wow fadeIn">
                        <div class="card-header">Derniers actualites nationales</div>
                        <!--Card content-->
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <!-- first -->

                                <li class="media waves-effect list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img class="d-flex mr-1 card-img-100 img-thumbnail"
                                                 src="<?= base_url('resources/'); ?>front/img/posts/moto_suzuki.jpg"
                                                 alt="Generic placeholder image">

                                        </div>
                                        <div class="col-sm-8">
                                            <div class="media-body">
                                                <a href="">
                                                    <h5 class="mt-0 mb-1 font-weight-bold">Project update three</h5>
                                                </a>
                                                Cras sit amet nibh libero, in gravida nulla (...)
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- second -->

                                <li class="media waves-effect list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img class="d-flex mr-1 card-img-100 img-thumbnail"
                                                 src="<?= base_url('resources/'); ?>front/img/posts/moto_suzuki.jpg"
                                                 alt="Generic placeholder image">

                                        </div>
                                        <div class="col-sm-8">
                                            <div class="media-body">
                                                <a href="">
                                                    <h5 class="mt-0 mb-1 font-weight-bold">Project update three</h5>
                                                </a>
                                                Cras sit amet nibh libero, in gravida nulla (...)
                                            </div>
                                        </div>
                                    </div>
                                </li><!-- third -->

                                <li class="media waves-effect list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img class="d-flex mr-1 card-img-100 img-thumbnail"
                                                 src="<?= base_url('resources/'); ?>front/img/posts/moto_suzuki.jpg"
                                                 alt="Generic placeholder image">

                                        </div>
                                        <div class="col-sm-8">
                                            <div class="media-body">
                                                <a href="">
                                                    <h5 class="mt-0 mb-1 font-weight-bold">Project update three</h5>
                                                </a>
                                                Cras sit amet nibh libero, in gravida nulla (...)
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- fourd -->

                                <li class="media waves-effect list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img class="d-flex mr-1 card-img-100 img-thumbnail"
                                                 src="<?= base_url('resources/'); ?>front/img/posts/moto_suzuki.jpg"
                                                 alt="Generic placeholder image">

                                        </div>
                                        <div class="col-sm-8">
                                            <div class="media-body">
                                                <a href="">
                                                    <h5 class="mt-0 mb-1 font-weight-bold">Project update three</h5>
                                                </a>
                                                Cras sit amet nibh libero, in gravida nulla (...)
                                            </div>
                                        </div>
                                    </div>
                                </li><!-- five -->
                                <li class="media waves-effect list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img class="d-flex mr-1 card-img-100 img-thumbnail"
                                                 src="<?= base_url('resources/'); ?>front/img/posts/moto_suzuki.jpg"
                                                 alt="Generic placeholder image">

                                        </div>
                                        <div class="col-sm-8">
                                            <div class="media-body">
                                                <a href="">
                                                    <h5 class="mt-0 mb-1 font-weight-bold">Project update three</h5>
                                                </a>
                                                Cras sit amet nibh libero, in gravida nulla (...)
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>

                    </div>
                    <!--/.Card-->
                    <!--Card-->
                    <div class="card mb-4 wow fadeIn">

                        <div class="card-header">Dernieres actualites internationales</div>

                        <!--Card content-->
                        <div class="card-body">

                            <ul class="list-unstyled list-group list-group-flush">
                                <!-- post one -->
                                <li class="media waves-effect list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img class="d-flex mr-1 card-img-100 img-thumbnail"
                                                 src="<?= base_url('resources/'); ?>front/img/posts/ford_voiture.jpg"
                                                 alt="Generic placeholder image">

                                        </div>
                                        <div class="col-sm-8">
                                            <div class="media-body">
                                                <a href="">
                                                    <h5 class="mt-0 mb-1 font-weight-bold">Project update three</h5>
                                                </a>
                                                Cras sit amet nibh libero, in gravida nulla (...)
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- post two -->
                                <li class="media waves-effect list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img class="d-flex mr-1 card-img-100 img-thumbnail"
                                                 src="<?= base_url('resources/'); ?>front/img/posts/ford_voiture.jpg"
                                                 alt="Generic placeholder image">

                                        </div>
                                        <div class="col-sm-8">
                                            <div class="media-body">
                                                <a href="">
                                                    <h5 class="mt-0 mb-1 font-weight-bold">Project update three</h5>
                                                </a>
                                                Cras sit amet nibh libero, in gravida nulla (...)
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- post three -->
                                <li class="media waves-effect list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img class="d-flex mr-1 card-img-100 img-thumbnail"
                                                 src="<?= base_url('resources/'); ?>front/img/posts/ford_voiture.jpg"
                                                 alt="Generic placeholder image">

                                        </div>
                                        <div class="col-sm-8">
                                            <div class="media-body">
                                                <a href="">
                                                    <h5 class="mt-0 mb-1 font-weight-bold">Project update three</h5>
                                                </a>
                                                Cras sit amet nibh libero, in gravida nulla (...)
                                            </div>
                                        </div>
                                    </div>
                                </li><!-- post four -->
                                <li class="media waves-effect list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img class="d-flex mr-1 card-img-100 img-thumbnail"
                                                 src="<?= base_url('resources/'); ?>front/img/posts/ford_voiture.jpg"
                                                 alt="Generic placeholder image">

                                        </div>
                                        <div class="col-sm-8">
                                            <div class="media-body">
                                                <a href="">
                                                    <h5 class="mt-0 mb-1 font-weight-bold">Project update three</h5>
                                                </a>
                                                Cras sit amet nibh libero, in gravida nulla (...)
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- post five -->
                                <li class="media waves-effect list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img class="d-flex mr-1 card-img-100 img-thumbnail"
                                                 src="<?= base_url('resources/'); ?>front/img/posts/ford_voiture.jpg"
                                                 alt="Generic placeholder image">

                                        </div>
                                        <div class="col-sm-8">
                                            <div class="media-body">
                                                <a href="">
                                                    <h5 class="mt-0 mb-1 font-weight-bold">Project update three</h5>
                                                </a>
                                                Cras sit amet nibh libero, in gravida nulla (...)
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>

                    </div>
                    <!--/.Card-->
                    <!-- abonnement a la newsletter -->
                    <div class="card mb-4 text-center wow fadeIn">

                        <div class="card-header">Voulez-vous etre informer de nouvelles actualites ?</div>

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Default form login -->
                            <form>

                                <!-- Default input email -->
                                <input type="email" id="defaultFormLoginEmailEx" class="form-control"
                                       placeholder="Votre adresse e-mail">

                                <br>

                                <input type="text" id="defaultFormNameEx" class="form-control"
                                       placeholder="Votre nom complet">
                                <div class="text-center mt-4">
                                    <button class="btn btn-info btn-md" type="submit">S'abonner a la newsletter</button>
                                </div>
                            </form>
                            <!-- Default form login -->

                        </div>
                    </div>
                    <!--/.Card : Dynamic content wrapper-->
                    <div class="card mb-4">
                        <div class="card-header">Les autorites provinciales</div>
                        <!--Card content-->
                        <div class="card-body">
                            <!-- one -->
                            <div class="row">
                                <div class="text-center">
                                    <img class="card-img-100 img-thumbnail"
                                         src="<?= base_url('resources/'); ?>front/img/teams/profil.jpg"
                                         alt="Generic placeholder image" style="border-radius: 100px;">
                                    <a href="">
                                        <h5 class="font-weight-bold">Jacques Kyabula KATWE</h5>
                                    </a>
                                    <p>
                                        Son Excellence, monsieur le gouverneur de la province.
                                    </p>
                                </div>
                            </div>
                        </div> <!-- one -->
                        <div class="row">
                            <div class="col-md-4">
                                <img class="card-img-100 img-thumbnail"
                                     src="<?= base_url('resources/'); ?>front/img/teams/eliemwez.jpg"
                                     alt="Generic placeholder image" style="border-radius: 100px;">
                            </div>
                            <div class="col-md-8">
                                <a href="">
                                    <h5 class="font-weight-bold">Project update three</h5>
                                </a>
                                <p>Cras sit amet nibh libero, in gravida nulla (...)</p>
                            </div>
                        </div><!-- two -->
                        <div class="row">
                            <div class="col-md-4">
                                <img class="card-img-100 img-thumbnail"
                                     src="<?= base_url('resources/'); ?>front/img/teams/eliemwez.jpg"
                                     alt="Generic placeholder image" style="border-radius: 100px;">
                            </div>
                            <div class="col-md-8">
                                <a href="">
                                    <h5 class="font-weight-bold">Project update three</h5>
                                </a>
                                <p>Cras sit amet nibh libero, in gravida nulla (...)</p>
                            </div>
                        </div><!-- one -->
                        <div class="row">
                            <div class="col-md-4">
                                <img class="card-img-100 img-thumbnail"
                                     src="<?= base_url('resources/'); ?>front/img/teams/eliemwez.jpg"
                                     alt="Generic placeholder image" style="border-radius: 100px;">
                            </div>
                            <div class="col-md-8">
                                <a href="">
                                    <h5 class="font-weight-bold">Project update three</h5>
                                </a>
                                <p>Cras sit amet nibh libero, in gravida nulla (...)</p>
                            </div>
                        </div><!-- two -->
                        <div class="row">
                            <div class="col-md-4">
                                <img class="card-img-100 img-thumbnail"
                                     src="<?= base_url('resources/'); ?>front/img/teams/eliemwez.jpg"
                                     alt="Generic placeholder image" style="border-radius: 100px;">
                            </div>
                            <div class="col-md-8">
                                <a href="">
                                    <h5 class="font-weight-bold">Project update three</h5>
                                </a>
                                <p>Cras sit amet nibh libero, in gravida nulla (...)</p>
                            </div>
                        </div><!-- two -->

                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--Grid column-->
</main>
<!--Main layout-->

