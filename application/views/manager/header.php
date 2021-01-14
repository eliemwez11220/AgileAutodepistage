<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Manager - Agile Depistage Application</title>

    <!-- icon -->
    <link rel="icon" href="<?= base_url(); ?>resources/assist/logo.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href=" <?= base_url('resources/'); ?>front/font/fa/fa.css" rel="stylesheet">

    <!-- Bootstrap core CSS for mobile adaptation-->
    <link href="<?= base_url('assets/') ?>mobile/main.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('resources/') ?>back/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?= base_url('resources/') ?>back/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?= base_url('resources/') ?>back/css/style.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="<?= base_url('resources/') ?>back/css/addons/datatables.min.css" rel="stylesheet">
    <!-- DataTables Select CSS -->
    <link href="<?= base_url('resources/') ?>back/css/addons/datatables-select.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" type="text/css"
          href="<?= base_url('resources/') ?>back/css/plugins/bootstrap4.1.3/daterangepicker.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>

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
    </style>

    <?php
    if (isset($output)) {
    //grocery CRUD librairie
    foreach ($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>"/>
    <?php endforeach; } ?>

</head>

<body class="app sidebar-mini rtl">

<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-md navbar-light white">

    <div class="container-fluid">
        <div class="ml-0 pl-0 float-left pull-left">
            <a class="navbar-brand" href="<?php echo base_url('admin/dashboard'); ?>">
                <span class="font-weight-bold large">Manager UI</span>
            </a>
        </div>
        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left -->
            <ul class="navbar-nav mr-auto">

                <li class="nav-item d-lg-none">
                    <a class="nav-link <?php echo (uri_string() == 'manager/province') ? "active" : ""; ?>"
                       href="<?php echo base_url('manager/province'); ?>">Provinces</a>
                </li>
                <li class="nav-item d-lg-none">
                    <a class="nav-link <?php echo (uri_string() == 'manager/ville') ? "active" : ""; ?>"
                       href="<?php echo base_url('manager/ville'); ?>">Villes</a>
                </li>  <li class="nav-item d-lg-none">
                    <a class="nav-link <?php echo (uri_string() == 'manager/commune') ? "active" : ""; ?>"
                       href="<?php echo base_url('manager/commune'); ?>">Communes</a>
                </li>
                <li class="nav-item d-lg-none">
                    <a class="nav-link <?php echo (uri_string() == 'manager/assistance') ? "active" : ""; ?>"
                       href="<?php echo base_url('manager/assistance'); ?>">Assistances</a>
                </li>
                <li class="nav-item d-lg-none">
                    <a class="nav-link <?php echo (uri_string() == 'manager/cabinet') ? "active" : ""; ?>"
                       href="<?php echo base_url('manager/cabinet'); ?>">Cabinet medical</a>
                </li>
            </ul>

            <!-- Right -->
            <ul class="navbar-nav nav-flex-icons">

                <li class="nav-item">
                    <a class="nav-link waves-effect text-info font-weight-bold" href="" target="_blank"
                       data-toggle="modal"
                       data-target="#modalContactForm">
                        Feedback
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect text-info font-weight-bold" href=""
                       data-toggle="modal" data-target="#fluidModalRightSuccessDemo"
                       target="_blank"> <i class="fa fa-question"></i> Aide</a>
                </li>

                <li data-toggle="tooltip" data-placement="bottom" class="nav-item dropdown">
                    <a class="nav-link waves-effect app-nav__item dropdown-toggle" href="#"
                       data-toggle="dropdown">
                        <i class="fa fa-user"></i>
                        <span class="text-capitalize text-info font-weight-bold">
                                    <?= $this->session->fullname ?></span>
                    </a>
                    <ul class="dropdown-menu settings-menu dropdown-menu-right">
                        <li>
                            <a href="<?php echo base_url() . 'manager/dashboard'; ?>"
                               class="logo-wrapper waves-effect text-center mt-3 pt-3">
                                <img src="<?= base_url() ?>resources/tokdoc/ProfilDr.png" alt="Logo App"
                                     class="h-50 w-50">
                            </a>
                        </li>
                        <li><a class="dropdown-item"
                               href="<?= base_url('manager/monProfil'); ?>">
                                <i class="fa fa-edit"></i> Editer profil</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('manager/logout'); ?>">
                                <i class="fa fa-sign-out"></i> Déconnexion</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>
<!-- Navbar -->

<aside class="position-fixed app-sidebar white fixed-top sidebar-fixed">
    <a href="<?= base_url('manager/index'); ?>" class="waves-effect text-center mt-4 pt-4">
        <img src="<?= base_url(); ?>assets/images/avatars/user.png" alt="Logo App"
             class="img-fluid w-50 h-50">
        <br>
        <span class="text-capitalize font-weight-bold text-dark">
        <?= $this->session->fullname ?></span> <br>
        <span class="text-uppercase grey-text font-weight-bold">
        ID <?= $this->session->id ?>-00243</span>
    </a>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5>25</h5>
                <small>Age</small>
            </div>
            <div class="col-md-3">
                <h5>75<span style="font-size: 14px!important;">kg</span></h5>
                <small>poids</small>
            </div>
            <div class="col-md-6">
                <h5>AB<span style="font-size: 14px!important;">+</span></h5>
                <small>Grp. Sanguin</small>
            </div>
        </div>
    </div>
    <div class="list-group list-group-flush">
        <h5 class="grey-text mt-2 pt-2">Menu</h5>
        <!-- Preferences rubrique -->
        <a href="<?php echo base_url('manager/dashboard'); ?>"
           class="list-group-item list-group-item-action waves-effect small
           <?php echo (uri_string() == 'manager/dashboard') ? "active" : ""; ?>">
            <i class="fas fa-caret-right"></i> <span class="font-weight-bold">Vue d'ensemble</span></a>
        <a href="<?php echo base_url('manager/preferences'); ?>"
           class="list-group-item list-group-item-action waves-effect small
           <?php echo (uri_string() == 'manager/preferences') ? "active" : ""; ?>">
            <i class="fas fa-caret-right"></i> <span class="font-weight-bold">Preferences</span></a>
        <!-- Mes proches rubrique -->
        <a href="<?php echo base_url('manager/monProfil'); ?>"
           class="list-group-item list-group-item-action waves-effect small
           <?php echo (uri_string() == 'manager/monProfil') ? "active" : ""; ?>">
            <i class="fas fa-heart-o"></i> <span class="font-weight-bold">Mon profile</span></a>

        <div class="dropdown">
            <a class="list-group-item list-group-item-action dropdown-toggle small
            <?php
        $seg1 = $this->uri->segment(1);
        $seg2 = $this->uri->segment(2);
        if ($seg2 == 'categorie' | $seg2 == 'article') {
            echo (uri_string() == 'manager/' . $seg2) ? "active" : "";
        }
        ?>"
               id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
               aria-expanded="false">
                <i class="fas fa-gears"></i> <strong>Actualites</strong></a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item  <?php echo (uri_string() == 'manager/categorie') ? "active" : ""; ?>"
                   href="<?php echo base_url('manager/categorie'); ?>">Categories</a>
                <a class="dropdown-item <?php echo (uri_string() == 'manager/article') ? "active" : ""; ?>"
                   href="<?php echo base_url('manager/article'); ?>">Articles</a>
            </div>
        </div>
        <!-- Dropdown parametres-->
        <div class="dropdown">
            <a class="list-group-item list-group-item-action dropdown-toggle small
            <?php
            $seg1 = $this->uri->segment(1);
            $seg2 = $this->uri->segment(2);
            if ($seg2 == 'province' | $seg2 == 'ville' | $seg2 == 'assistance') {
                echo (uri_string() == 'manager/' . $seg2) ? "active" : "";
            }
            ?>"
               id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
               aria-expanded="false">
                <i class="fas fa-gears"></i> <strong>Parametres</strong></a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item  <?php echo (uri_string() == 'manager/province') ? "active" : ""; ?>"
                   href="<?php echo base_url('manager/province'); ?>">Provinces</a>
                <a class="dropdown-item <?php echo (uri_string() == 'manager/ville') ? "active" : ""; ?>"
                   href="<?php echo base_url('manager/ville'); ?>">Villes</a>
                <a class="dropdown-item <?php echo (uri_string() == 'manager/commune') ? "active" : ""; ?>"
                   href="<?php echo base_url('manager/commune'); ?>">Communes</a>
                <a class="dropdown-item <?php echo (uri_string() == 'manager/assistance') ? "active" : ""; ?>"
                   href="<?php echo base_url('manager/assistance'); ?>">Assistances</a>
            </div>
        </div>
        <!-- Fermeture de la session -->
        <a href="<?php echo base_url('manager/logout'); ?>"
           class="list-group-item list-group-item-action waves-effect small"
           onclick="return confirm('Voulez-vous vraiment fermer la session ? notez que toutes les opéations encours seront annulées') ">
            <i class="fas fa-sign-out"></i> <strong>Deconnexion</strong></a>
    </div>
</aside>
<!-- Sidebar -->