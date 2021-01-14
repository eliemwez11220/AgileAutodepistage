<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?= $title ?> - Agile COVID-19 Riposte</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <link href="<?= base_url() ?>assets/css/main.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/fonts/fa/fa.css" rel="stylesheet">
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <div class="logo-src text-center ml-2 pl-2 pt-0 mt-0">
                <img src="<?= base_url('assets/images/logo/logo-inverse.png'); ?>"
                     alt="DESPISTAGE COVID-19" class="w-100">
                <!--
                  <img src="<?= base_url('assets/images/logo/logo-inverse.png'); ?>" alt="">-->
            </div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
                <span>
                    <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
        </div>
        <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <?= form_open(base_url('ui/contacts')); ?>
                            <input type="text" class="search-input" name="critere_recherche"
                                   placeholder="Critere de recherche">
                            <button class="search-icon" type="submit"><span></span></button>
                            <?= form_close(); ?>
                        </div>
                        <button class="close"></button>
                    </div>
                </div>
            <div class="app-header-right">
                <ul class="header-menu nav">
                    <li class="btn-group nav-item">
                        <a href="javascript:void(0);" class="nav-link">
                            <i class="nav-link-icon fa fa-cog"></i>
                            Guide
                        </a>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="javascript:void(0);" class="nav-link">
                            <i class="nav-link-icon fa fa-question-circle"></i>
                            IT Support
                        </a>
                    </li>
                </ul>
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <?php
                                $link = $this->uri->segment(1)
                                ?>
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                       class="p-0 btn">
                                        <img width="42" class="rounded-circle"
                                             src="<?= base_url(); ?>assets/images/avatars/user.png" alt="Avatar">
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true"
                                         class="dropdown-menu dropdown-menu-right">
                                        <h6 tabindex="-1" class="dropdown-header">Edition profil</h6>
                                        <a tabindex="0" class="dropdown-item"
                                           href="<?= base_url() . $link . '/monProfil'; ?>">Mon compte</a>
                                        <div tabindex="-1" class="dropdown-divider"></div>
                                        <h6 tabindex="-1" class="dropdown-header">Fermeture session</h6>
                                        <a tabindex="0" class="dropdown-item"
                                           href="<?= base_url() . $link . '/logout'; ?>">
                                            Deconnexion
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left  ml-3 header-user-info">
                                <div class="widget-heading text-capitalize">
                                    <?= $this->session->fullname ?>
                                </div>
                                <div class="widget-subheading text-capitalize">
                                    <?= $this->session->role ?>
                                </div>
                            </div>
                            <!--
                             <div class="widget-content-right header-user-info ml-3">
                                <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                    <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                </button>
                            </div>
                             -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ui-theme-settings">
        <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
            <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
        </button>
        <div class="theme-settings__inner">
            <div class="scrollbar-container">
                <div class="theme-settings__options-wrapper">
                    <h3 class="themeoptions-heading">Layout Options</h3>
                    <div class="p-3">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="switch has-switch switch-container-class"
                                                 data-class="fixed-header">
                                                <div class="switch-animate switch-on">
                                                    <input type="checkbox" checked data-toggle="toggle"
                                                           data-onstyle="success">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Fixed Header
                                            </div>
                                            <div class="widget-subheading">Makes the header top fixed, always visible!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="switch has-switch switch-container-class"
                                                 data-class="fixed-sidebar">
                                                <div class="switch-animate switch-on">
                                                    <input type="checkbox" checked data-toggle="toggle"
                                                           data-onstyle="success">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Fixed Sidebar
                                            </div>
                                            <div class="widget-subheading">Makes the sidebar left fixed, always visible!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <h3 class="themeoptions-heading">
                        <div>
                            Header Options
                        </div>
                        <button type="button"
                                class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class"
                                data-class="">
                            Restore Default
                        </button>
                    </h3>
                    <div class="p-3">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h5 class="pb-2">Choose Color Scheme
                                </h5>
                                <div class="theme-settings-swatches">
                                    <div class="swatch-holder bg-primary switch-header-cs-class"
                                         data-class="bg-primary header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-secondary switch-header-cs-class"
                                         data-class="bg-secondary header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-success switch-header-cs-class"
                                         data-class="bg-success header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-info switch-header-cs-class"
                                         data-class="bg-info header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-warning switch-header-cs-class"
                                         data-class="bg-warning header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-danger switch-header-cs-class"
                                         data-class="bg-danger header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-light switch-header-cs-class"
                                         data-class="bg-light header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-dark switch-header-cs-class"
                                         data-class="bg-dark header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-focus switch-header-cs-class"
                                         data-class="bg-focus header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-alternate switch-header-cs-class"
                                         data-class="bg-alternate header-text-light">
                                    </div>
                                    <div class="divider">
                                    </div>
                                    <div class="swatch-holder bg-vicious-stance switch-header-cs-class"
                                         data-class="bg-vicious-stance header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-midnight-bloom switch-header-cs-class"
                                         data-class="bg-midnight-bloom header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-night-sky switch-header-cs-class"
                                         data-class="bg-night-sky header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-slick-carbon switch-header-cs-class"
                                         data-class="bg-slick-carbon header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-asteroid switch-header-cs-class"
                                         data-class="bg-asteroid header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-royal switch-header-cs-class"
                                         data-class="bg-royal header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-warm-flame switch-header-cs-class"
                                         data-class="bg-warm-flame header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-night-fade switch-header-cs-class"
                                         data-class="bg-night-fade header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-sunny-morning switch-header-cs-class"
                                         data-class="bg-sunny-morning header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-tempting-azure switch-header-cs-class"
                                         data-class="bg-tempting-azure header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-amy-crisp switch-header-cs-class"
                                         data-class="bg-amy-crisp header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-heavy-rain switch-header-cs-class"
                                         data-class="bg-heavy-rain header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-mean-fruit switch-header-cs-class"
                                         data-class="bg-mean-fruit header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-malibu-beach switch-header-cs-class"
                                         data-class="bg-malibu-beach header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-deep-blue switch-header-cs-class"
                                         data-class="bg-deep-blue header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-ripe-malin switch-header-cs-class"
                                         data-class="bg-ripe-malin header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-arielle-smile switch-header-cs-class"
                                         data-class="bg-arielle-smile header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-plum-plate switch-header-cs-class"
                                         data-class="bg-plum-plate header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-happy-fisher switch-header-cs-class"
                                         data-class="bg-happy-fisher header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-happy-itmeo switch-header-cs-class"
                                         data-class="bg-happy-itmeo header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-mixed-hopes switch-header-cs-class"
                                         data-class="bg-mixed-hopes header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-strong-bliss switch-header-cs-class"
                                         data-class="bg-strong-bliss header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-grow-early switch-header-cs-class"
                                         data-class="bg-grow-early header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-love-kiss switch-header-cs-class"
                                         data-class="bg-love-kiss header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-premium-dark switch-header-cs-class"
                                         data-class="bg-premium-dark header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-happy-green switch-header-cs-class"
                                         data-class="bg-happy-green header-text-light">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <h3 class="themeoptions-heading">
                        <div>Sidebar Options</div>
                        <button type="button"
                                class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-sidebar-cs-class"
                                data-class="">
                            Restore Default
                        </button>
                    </h3>
                    <div class="p-3">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h5 class="pb-2">Choose Color Scheme</h5>
                                <div class="theme-settings-swatches">
                                    <div class="swatch-holder bg-primary switch-sidebar-cs-class"
                                         data-class="bg-primary sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-secondary switch-sidebar-cs-class"
                                         data-class="bg-secondary sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-success switch-sidebar-cs-class"
                                         data-class="bg-success sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-info switch-sidebar-cs-class"
                                         data-class="bg-info sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-warning switch-sidebar-cs-class"
                                         data-class="bg-warning sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-danger switch-sidebar-cs-class"
                                         data-class="bg-danger sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-light switch-sidebar-cs-class"
                                         data-class="bg-light sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-dark switch-sidebar-cs-class"
                                         data-class="bg-dark sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-focus switch-sidebar-cs-class"
                                         data-class="bg-focus sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-alternate switch-sidebar-cs-class"
                                         data-class="bg-alternate sidebar-text-light">
                                    </div>
                                    <div class="divider">
                                    </div>
                                    <div class="swatch-holder bg-vicious-stance switch-sidebar-cs-class"
                                         data-class="bg-vicious-stance sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-midnight-bloom switch-sidebar-cs-class"
                                         data-class="bg-midnight-bloom sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-night-sky switch-sidebar-cs-class"
                                         data-class="bg-night-sky sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-slick-carbon switch-sidebar-cs-class"
                                         data-class="bg-slick-carbon sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-asteroid switch-sidebar-cs-class"
                                         data-class="bg-asteroid sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-royal switch-sidebar-cs-class"
                                         data-class="bg-royal sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-warm-flame switch-sidebar-cs-class"
                                         data-class="bg-warm-flame sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-night-fade switch-sidebar-cs-class"
                                         data-class="bg-night-fade sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-sunny-morning switch-sidebar-cs-class"
                                         data-class="bg-sunny-morning sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-tempting-azure switch-sidebar-cs-class"
                                         data-class="bg-tempting-azure sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-amy-crisp switch-sidebar-cs-class"
                                         data-class="bg-amy-crisp sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-heavy-rain switch-sidebar-cs-class"
                                         data-class="bg-heavy-rain sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-mean-fruit switch-sidebar-cs-class"
                                         data-class="bg-mean-fruit sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-malibu-beach switch-sidebar-cs-class"
                                         data-class="bg-malibu-beach sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-deep-blue switch-sidebar-cs-class"
                                         data-class="bg-deep-blue sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-ripe-malin switch-sidebar-cs-class"
                                         data-class="bg-ripe-malin sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-arielle-smile switch-sidebar-cs-class"
                                         data-class="bg-arielle-smile sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-plum-plate switch-sidebar-cs-class"
                                         data-class="bg-plum-plate sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-happy-fisher switch-sidebar-cs-class"
                                         data-class="bg-happy-fisher sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-happy-itmeo switch-sidebar-cs-class"
                                         data-class="bg-happy-itmeo sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-mixed-hopes switch-sidebar-cs-class"
                                         data-class="bg-mixed-hopes sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-strong-bliss switch-sidebar-cs-class"
                                         data-class="bg-strong-bliss sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-grow-early switch-sidebar-cs-class"
                                         data-class="bg-grow-early sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-love-kiss switch-sidebar-cs-class"
                                         data-class="bg-love-kiss sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-premium-dark switch-sidebar-cs-class"
                                         data-class="bg-premium-dark sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-happy-green switch-sidebar-cs-class"
                                         data-class="bg-happy-green sidebar-text-light">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-main">
        <div class="app-sidebar sidebar-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                        <span>
                            <button type="button"
                                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
            </div>
            <div class="scrollbar-sidebar">
                <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu">
                        <li class="app-sidebar__heading">Tableau de bord</li>

                        <li>
                            <a href="<?= base_url('ui/dashboard'); ?>"
                               class="<?php echo (uri_string() == 'ui/dashboard') ? "mm-active" : ""; ?>">
                                <i class="metismenu-icon pe-7s-diamond"></i>
                                Vue d'ensemble
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <!--
                             <ul>
                                <li>
                                    <a href="<?= base_url('site/identification/centreMedical'); ?>"
                                       class="<?php echo (uri_string() == 'site/identification/centreMedical') ? "mm-active" : ""; ?>">
                                        <i class="metismenu-icon"></i>
                                        Administrateur
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('site/identification/population'); ?>"
                                       class="<?php echo (uri_string() == 'site/identification/population') ? "mm-active" : ""; ?>">
                                        <i class="metismenu-icon"></i>
                                        Utilisateurs
                                    </a>
                                </li>
                            </ul>
                             -->
                        </li>
                        <li class="app-sidebar__heading">Saisie de donnees</li>
                        <li>
                            <a href="#" class="<?php $url = $this->uri->segment(2);
                            echo ($url == 'identification') ? "mm-active" : ""; ?>">
                                <i class="metismenu-icon pe-7s-diamond"></i>
                                Identification
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <!-- identification au niveau de postes frontaliers -->
                                <li>
                                    <a href="<?= base_url('UI/identification/population'); ?>"
                                       class="<?php echo (uri_string() == 'UI/identification/population') ? "mm-active" : ""; ?>">
                                        <i class="metismenu-icon"></i>
                                        Individus
                                    </a>
                                </li>
                                <!-- cabinets medicaux -->
                                <li>
                                    <a href="<?= base_url('site/identification/centreMedical'); ?>"
                                       class="<?php echo (uri_string() == 'site/identification/centreMedical') ? "mm-active" : ""; ?>">
                                        <i class="metismenu-icon"></i>
                                        Centres medicaux
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= base_url('ui/contacts'); ?>"
                               class="<?php echo (uri_string() == 'ui/contacts') ? "mm-active" : ""; ?>">
                                <i class="metismenu-icon pe-7s-display2"></i>
                                Trouver un contact
                            </a></li>
                        <?php
                        if ($this->session->type == 'administrateur') {
                            ?>
                            <li>
                                <a href="<?= base_url('admin/compteUsers'); ?>"
                                   class="<?php echo (uri_string() == 'admin/compteUsers') ? "mm-active" : ""; ?>">
                                    <i class="metismenu-icon fa fa-user"></i>
                                    Comptes Utilisateurs
                                </a>
                            </li>
                        <?php } ?>
                        <li class="app-sidebar__heading">Despistage et Notifications</li>
                        <li>
                            <a href="<?= base_url('ui/autoDepistage'); ?>"
                               class="<?php echo (uri_string() == 'ui/autoDepistage') ? "mm-active" : ""; ?>">
                                <i class="metismenu-icon pe-7s-display2"></i>
                                Auto-depistage
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('ui/cartes'); ?>"
                               class="<?php echo (uri_string() == 'ui/cartes') ? "mm-active" : ""; ?>">
                                <i class="metismenu-icon pe-7s-display2"></i>
                                Prelevement Temperatures
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('ui/notes'); ?>"
                               class="<?php echo (uri_string() == 'ui/notes') ? "mm-active" : ""; ?>">
                                <i class="metismenu-icon pe-7s-display2"></i>
                                Notifications Services
                            </a>
                        </li>
                        <li class="app-sidebar__heading">Reporting & Statistics</li>
                        <li>
                            <a href="#" class="<?php $url = $this->uri->segment(2);
                            echo ($url == 'identification') ? "mm-active" : ""; ?>">
                                <i class="metismenu-icon pe-7s-diamond"></i>
                                Rapports
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= base_url('site/identification/centreMedical'); ?>"
                                       class="<?php echo (uri_string() == 'site/identification/centreMedical') ? "mm-active" : ""; ?>">
                                        <i class="metismenu-icon"></i>
                                        Journalier
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('site/identification/population'); ?>"
                                       class="<?php echo (uri_string() == 'site/identification/population') ? "mm-active" : ""; ?>">
                                        <i class="metismenu-icon"></i>
                                        Hebdomadaire
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('site/identification/population'); ?>"
                                       class="<?php echo (uri_string() == 'site/identification/population') ? "mm-active" : ""; ?>">
                                        <i class="metismenu-icon"></i>
                                        Mensuel
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('site/identification/agents'); ?>"
                                       class="<?php echo (uri_string() == 'site/identification/agents') ? "mm-active" : ""; ?>">
                                        <i class="metismenu-icon"></i>
                                        Annuel
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- parametre -->
                        <li class="app-sidebar__heading">Parametres</li>
                        <li>
                            <a href="#" class="<?php $url = $this->uri->segment(2);
                            echo ($url == 'identification') ? "mm-active" : ""; ?>">
                                <i class="metismenu-icon pe-7s-diamond"></i>
                                Communes
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= base_url('site/identification/centreMedical'); ?>"
                                       class="<?php echo (uri_string() == 'site/identification/centreMedical') ? "mm-active" : ""; ?>">
                                        <i class="metismenu-icon"></i>
                                        Annexe
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('site/identification/centreMedical'); ?>"
                                       class="<?php echo (uri_string() == 'site/identification/centreMedical') ? "mm-active" : ""; ?>">
                                        <i class="metismenu-icon"></i>
                                        Lubumbashi
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('site/identification/population'); ?>"
                                       class="<?php echo (uri_string() == 'site/identification/population') ? "mm-active" : ""; ?>">
                                        <i class="metismenu-icon"></i>
                                        Kampemba
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('site/identification/population'); ?>"
                                       class="<?php echo (uri_string() == 'site/identification/population') ? "mm-active" : ""; ?>">
                                        <i class="metismenu-icon"></i>
                                        Kamalondo
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('site/identification/population'); ?>"
                                       class="<?php echo (uri_string() == 'site/identification/population') ? "mm-active" : ""; ?>">
                                        <i class="metismenu-icon"></i>
                                        Katuba
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('site/identification/agents'); ?>"
                                       class="<?php echo (uri_string() == 'site/identification/agents') ? "mm-active" : ""; ?>">
                                        <i class="metismenu-icon"></i>
                                        Kenya
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('site/identification/agents'); ?>"
                                       class="<?php echo (uri_string() == 'site/identification/agents') ? "mm-active" : ""; ?>">
                                        <i class="metismenu-icon"></i>
                                        Ruashi
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="<?php $url = $this->uri->segment(2);
                            echo ($url == 'identification') ? "mm-active" : ""; ?>">
                                <i class="metismenu-icon pe-7s-diamond"></i>
                                Villes
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= base_url('site/identification/centreMedical'); ?>"
                                       class="<?php echo (uri_string() == 'site/identification/centreMedical') ? "mm-active" : ""; ?>">
                                        <i class="metismenu-icon"></i>
                                        Lubumbashi
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('site/identification/population'); ?>"
                                       class="<?php echo (uri_string() == 'site/identification/population') ? "mm-active" : ""; ?>">
                                        <i class="metismenu-icon"></i>
                                        Likasi
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('site/identification/population'); ?>"
                                       class="<?php echo (uri_string() == 'site/identification/population') ? "mm-active" : ""; ?>">
                                        <i class="metismenu-icon"></i>
                                        Kipushi
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
