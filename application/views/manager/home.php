<!--Main layout-->
<main class="pt-5 mt-5">
    <div class="card blue-grey">
        <div class="card-header info-color-dark text-center white-text">
            <h3 class="h5 text-uppercase font-weight-bold">
                Bienvenue sur le site officiel de la plateforme de d'auto-depistage de la pandemie a COVID-19. Projet
                d'identification des individus
                iniitier par le Gouvernement provincial du Haut-Katanga.
                Vous êtes sur le site officiel de publication des informations officielles liees au depistage de
                COVID-19.
            </h3>
        </div>
    </div>
    <div class="container-fluid">
        <div class="mt-lg-1 pt-lg-1 pt-sm-2 mt-sm-2">
            <!--Grid row-->
            <?php

            if (isset($output)) { ?>
                <div style='height:20px;'></div>
                <div style="padding: 10px">
                    <?php echo $output; ?>
                </div>

            <?php } else{?>
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
            <?php } ?>
        </div>
        <!-- Content -->
        <!-- Heading -->

        <?php
        if ((isset($_SESSION['success'])) OR (isset($_SESSION['error']))) { ?>
            <div class="container mt-2">
                <h6 class="text-dark">
                    <?php include_once "application/views/alertes/alert-index.php"; ?>
                </h6>
            </div>
        <?php } ?>
        <!-- include the view -->

    </div>
</main>
<!--Main layout-->
