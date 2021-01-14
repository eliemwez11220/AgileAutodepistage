<div class="app-main__outer">
    <div class="app-main__inner">
        <!-- notifications -->
        <?php
        if ((isset($_SESSION['success'])) OR (isset($_SESSION['error']))) { ?>
            <div class="container mt-4 pt-4">
                <span class="text-dark">
                    <?php include_once "application/views/alertes/alert-index.php"; ?>
                </span>
            </div>
        <?php } ?>
        <!-- end -->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="lnr-picture text-danger"></i>
                    </div>
                    <div>
                        <span class="font-weight-bold">Gestion des utilisateurs</span>
                        <div class="page-title-subheading">
                            Cette interface affiche les differents comptes des utilisateurs prealablement crees.
                            <ul class="app-breadcrumb breadcrumb text-capitalize">
                                <li class="breadcrumb-item font-weight-bold"><a
                                            href="<?= base_url() . $this->uri->segment(1); ?>">Accueil</a></li>
                                <li class="breadcrumb-item font-weight-bold"><a
                                            href="<?= base_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2); ?>"><?= $this->uri->segment(2) ?> </a>
                                </li>
                                <li class="breadcrumb-item disabled" disabled><?= $this->uri->segment(3) ?></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-business-time fa-w-20"></i>
                                            </span>
                            Listing
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true"
                             class="dropdown-menu dropdown-menu-right">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-inbox"></i>
                                        <span>
                                                            Administrateurs
                                                        </span>
                                        <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-book"></i>
                                        <span>
                                                            Utilisateurs
                                                        </span>
                                        <div class="ml-auto badge badge-pill badge-danger">5</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 mt-1 pt-1">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-header">
                            <h5 class="card-title font-weight-bold">
                                <span>Liste des utilisateurs et administrateurs systemes</span>
                            </h5>
                        </div>
                        <!-- formulaire des actions supplementaires-->
                        <!-- Main content -->
                        <?php

                        //verifier si l'utilisateur a choisi la mise aa jour de donnees
                        if (isset($agents)) { ?>
                            <div class="box-body">
                                <span style="color:red;"><b><?= $this->session->Admin; ?></b></span>
                                <span style="color:red;"><b><?= $this->session->Agent; ?></b></span>
                                <form class=""
                                      action="<?= base_url() . 'admin/updateAccount/agent/' . $agents['id_asset']; ?>"
                                      method="post">
                                    <div class="row clearfix mx-2">
                                        <div class="col-md-4">
                                            <label for="asset_name" class="control-label"><span
                                                        class="text-danger">*</span>Nom
                                                complet</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control text-capitalize"
                                                       name="asset_name"
                                                       value="<?= $agents['asset_name'] ? $agents['asset_name'] : set_value('asset_name'); ?>"/>
                                                <span class="text-danger"><?php echo form_error('asset_name'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="asset_username" class="control-label"><span class="text-danger">*</span>Nom
                                                utilisateur</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="asset_username"
                                                       value="<?= $agents['asset_username'] ? $agents['asset_username'] : set_value('asset_username'); ?>"/>
                                                <span class="text-danger"><?php echo form_error('asset_username'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="asset_email" class="control-label"><span
                                                        class="text-danger">*</span>Adresse
                                                Email</label>
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="asset_email"
                                                       value="<?= $agents['asset_email'] ? $agents['asset_email'] : set_value('asset_email'); ?>"/>
                                                <span class="text-danger"><?php echo form_error('asset_email'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="asset_role" class="control-label"><span class="text-danger">*</span>
                                                    Role utilisateur</label>
                                                <select class="browser-default custom-select" name="asset_role">
                                                    <?php
                                                    if ($agents['asset_role'] != "") { ?>
                                                        <option value="<?= $agents['asset_role']; ?>">
                                                            <?= $agents['asset_role']; ?>
                                                        </option>
                                                        <option value="Agent Gouvernorat">Agent Gouvernorat</option>
                                                        <option value="Agent Ministere Sante">Agent Ministere Sante</option>
                                                        <option value="Personnel Soignant">Personnel soignant</option>
                                                        <option value="Manager">Gestionnaire</option>

                                                    <?php } else { ?>
                                                        <option disabled selected>Choisissez un role</option>
                                                        <option value="Agent Gouvernorat">Agent Gouvernorat</option>
                                                        <option value="Agent Ministere Sante">Agent Ministere Sante</option>
                                                        <option value="Personnel Soignant">Personnel soignant</option>
                                                        <option value="Manager">Gestionnaire </option>
                                                    <?php } ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('asset_role'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="asset_type" class="control-label"><span class="text-danger">*</span>Type
                                                    compte
                                                </label>
                                                <select class="browser-default custom-select select2" name="asset_type"
                                                        id="asset_type">
                                                    <?php
                                                    if ($agents['asset_type'] == "utilisateur") { ?>
                                                        <option selected value="utilisateur">Utilisateur</option>
                                                        <option value="administrator">Administrateur système</option>
                                                    <?php } elseif ($agents['asset_type'] == "administrateur") { ?>
                                                        <option value="utilisateur">Utilisateur</option>
                                                        <option selected value="administrator">Administrateur système
                                                        </option>
                                                    <?php } else { ?>
                                                        <option selected disabled>Selectionnez un type compte</option>
                                                        <option value="utilisateur">Utilisateur</option>
                                                        <option value="administrator">Administrateur système</option>
                                                    <?php } ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('asset_type'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center align-middle mb-3 pb-3">
                                        <input type="submit" class="btn btn-primary btn-lg"
                                               value="Appliquer les modifications">
                                        <a href="<?= base_url() . "admin/agent/"; ?>" class="btn btn-outline-danger">
                                            <i class="fa fa-close"></i> Annuler
                                        </a>
                                    </div>
                                </form>
                            </div>
                        <?php } else { ?>
                            <div class="box-body">
                                <span style="color:red;"><b><?= $this->session->Admin; ?></b></span>
                                <form class="" action="<?= base_url() . 'admin/createAccount' ?>" method="post">
                                    <div class="row clearfix mx-2">
                                        <div class="col-md-4">
                                            <label for="asset_name" class="control-label"><span
                                                        class="text-danger">*</span>Nom
                                                complet
                                                <span data-toggle="tooltip" data-placement="top"
                                                      title="Nom, Post-nom et Prénom">
                                          <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    </span>
                                            </label>
                                            <div class="form-group">
                                                <input type="text" class="form-control text-capitalize"
                                                       name="asset_name"
                                                       id="asset_name"
                                                       value="<?= set_value('asset_name') ?>"/>
                                                <span class="text-danger"><?php echo form_error('asset_name'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="asset_username" class="control-label"><span class="text-danger">*</span>Nom
                                                utilisateur
                                                <span data-toggle="tooltip" data-placement="top"
                                                      title="Nom de connexion (login)">
                                          <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    </span>
                                            </label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="asset_username"
                                                       id="asset_username"
                                                       value="<?= set_value('asset_username') ?>"/>
                                                <span class="text-danger"><?php echo form_error('asset_username'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="asset_email" class="control-label"><span
                                                        class="text-danger">*</span>Adresse
                                                Email</label>
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="asset_email"
                                                       id="asset_email"
                                                       value="<?= set_value('asset_email') ?>"/>
                                                <span class="text-danger"><?php echo form_error('asset_email'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="asset_role" class="control-label"><span class="text-danger">*</span>Role
                                                    de travail
                                                </label>
                                                <select class="browser-default custom-select select2" name="asset_role"
                                                        id="asset_role">
                                                    <option disabled selected>Choisissez un role</option>
                                                    <option value="Agent Gouvernorat">Agent Gouvernorat</option>
                                                    <option value="Agent Ministere Sante">Agent Ministere Sante</option>
                                                    <option value="Personnel Soignant">Personnel soignant</option>
                                                    <option value="Gestionnaire">Gestionnaire Interne</option>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('asset_role'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="asset_type" class="control-label"><span class="text-danger">*</span>Type
                                                    compte
                                                </label>
                                                <select class="browser-default custom-select select2" name="asset_type"
                                                        id="asset_type">
                                                    <option disabled selected>Choisissez un type</option>
                                                    <option value="utilisateur">Utilisateur</option>
                                                    <option value="administrateur">Administrateur système</option>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('asset_type'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="asset_password" class="control-label"><span class="text-danger">*</span>Mot
                                                de passe (default)</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="asset_password"
                                                       value="123456"
                                                       id="asset_password"
                                                       readonly/>
                                                <span class="text-danger"><?php echo form_error('asset_password'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center align-middle mb-2 pb-2">
                                        <input type="submit" class="btn btn-primary btn-lg" value="Enregistrer">
                                        <input type="reset" class="btn btn-danger btn-lg" value="Annuler">
                                    </div>
                                </form>
                            </div>
                        <?php } ?>
                    </div>

                    <!-- /.content -->
                    <!-- fin formulaire -->
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- Table  -->
                                <table id="dtMaterialDesignExample" class="table table-hover table-striped table-sm">

                                    <!-- Table head -->
                                    <thead>
                                    <tr class="text-uppercase th-sm">
                                        <th>#</th>
                                        <th class="font-weight-bold">Nom complet</th>
                                        <th class="font-weight-bold">Username</th>
                                        <th class="font-weight-bold">Type compte</th>
                                        <th class="font-weight-bold">Role</th>
                                        <th class="font-weight-bold">Email</th>
                                        <th class="font-weight-bold">Derniere login</th>
                                        <th class="font-weight-bold text-right">Actions</th>
                                    </tr>
                                    </thead>
                                    <!-- Table head -->

                                    <!-- Table body -->
                                    <tbody>
                                    <?php $line = 1;
                                    foreach ($managers as $value) { ?>
                                        <tr>
                                            <td><?= $line; ?></td>
                                            <td class="text-capitalize"><?= $value->asset_name; ?></td>
                                            <td class="text-capitalize"><?= $value->asset_username; ?></td>
                                            <td class="text-capitalize"><?= $value->asset_type; ?></td>
                                            <td class="text-capitalize"><?= $value->asset_role; ?></td>
                                            <td class="">
                                                <a href="mailto:<?= $value->asset_email; ?>"
                                                   class="text-lowercase text-danger"><?= $value->asset_email; ?></a>
                                            </td>
                                            <td><?= $value->asset_connected; ?></td>
                                            <td>
                                                <a href="<?= base_url() . "admin/resetPassword?id_asset=" . $value->id_asset ?>"
                                                   onclick="return confirm('Voulez-vous vraiment réinitialiser le mot de passe de
                                                   <?= $value->asset_name ?>?') ">
                                        <span class="table-edit" data-toggle="tooltip" data-placement="bottom"
                                              title="Cliquer pour reinitialiser le mot de passe">
                                            <button type="button" class="btn-danger btn-rounded btn-sm my-0">
                                                <i class="fa fa-trash"></i></button></span>
                                                </a>
                                                <?php
                                                if ($value->asset_status == 'online') { ?>
                                                    <a href="<?= base_url() . "admin/bloquerAgent?id_asset=" . $value->id_asset ?>"
                                                       onclick="return confirm('Voulez-vous vraiment bloquer le compte utilisateur de <?= $value->asset_name ?>?')">
                                        <span class="table-edit" data-toggle="tooltip" data-placement="bottom"
                                              title="Cliquer pour désactiver ce compte utilisateur">
                                            <button type="button" class="btn-warning btn-rounded btn-sm my-0">
                                                <i class="fa fa-lock"></i></button></span>
                                                    </a>
                                                <?php } else { ?>
                                                    <a href="<?= base_url() . "admin/debloquerAgent?id_asset=" . $value->id_asset ?>"
                                                       onclick="return confirm('Voulez-vous vraiment debloquer le compte utilisateur de <?= $value->asset_name ?> ?') ">
                                        <span class="table-edit" data-toggle="tooltip" data-placement="bottom"
                                              title="Cliquer pour activer ce compte utilisateur">
                                            <button type="button" class="btn-primary btn-rounded btn-sm my-0"><i
                                                        class="fa fa-unlock"></i></button></span>
                                                    </a>
                                                <?php } ?>
                                                <a href="<?= base_url() . "admin/updateForm/agent/" . $value->id_asset ?>">
                                        <span class="table-edit" data-toggle="tooltip" data-placement="bottom"
                                              title="Cliquer pour modifier ce compte utilisateur">
                                            <button type="button" class="btn-success btn-rounded btn-sm my-0"><i
                                                        class="fa fa-edit"></i></button></span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $line++;
                                    } ?>

                                    </tbody>
                                    <!-- Table body -->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
