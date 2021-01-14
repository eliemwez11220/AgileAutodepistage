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
                        <span class="font-weight-bold">Gestion du profil d'utilisation</span>
                        <div class="page-title-subheading">
                            Cette interface affiche les differentes informations sur les comptes des utilisateurs prealablement crees.
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
            </div>
        </div>
        <div class="main-card mb-3 mt-1 pt-1">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title font-weight-bold">
                                <span>Mise a jour de coordonnees du compte utilisateur</span>
                            </h5>
                        </div>
                            <div class="box-body">
                                <span style="color:red;"><b><?= $this->session->Admin; ?></b></span>
                                <span style="color:red;"><b><?= $this->session->Agent; ?></b></span>
                                <form class=""
                                      action="<?= base_url() . 'admin/updateAccount/agent/' . $agents['id_asset']; ?>"
                                      method="post">
                                    <div class="row clearfix mx-2">
                                        <div class="col-md-6">
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

                                        <div class="col-md-6">
                                            <label for="asset_email" class="control-label"><span
                                                        class="text-danger">*</span>Adresse
                                                Email</label>
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="asset_email"
                                                       value="<?= $agents['asset_email'] ? $agents['asset_email'] : set_value('asset_email'); ?>"/>
                                                <span class="text-danger"><?php echo form_error('asset_email'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="asset_username" class="control-label"><span class="text-danger">*</span>Nom
                                                utilisateur</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="asset_username"
                                                       value="<?= $agents['asset_username'] ? $agents['asset_username'] : set_value('asset_username'); ?>"/>
                                                <span class="text-danger"><?php echo form_error('asset_username'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="asset_password" class="control-label"><span class="text-danger">*</span>
                                            Ancien mot de passe</label>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="asset_password" readonly
                                                       value="<?= $agents['asset_password'] ? $agents['asset_password'] : set_value('asset_password'); ?>"/>
                                                <span class="text-danger"><?php echo form_error('asset_password'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="asset_role" class="control-label"><span class="text-danger">*</span>
                                                    Role utilisateur</label>
                                                <select class="browser-default custom-select" name="asset_role">
                                                    <?php
                                                    if ($agents['asset_role'] != "") { ?>
                                                        <option value="<?= $agents['asset_role']; ?>">
                                                            <?= $agents['asset_role']; ?>
                                                        </option>

                                                    <?php } else { ?>
                                                        <option value="agent">Aucun role</option>
                                                    <?php } ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('asset_role'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="asset_type" class="control-label"><span class="text-danger">*</span>Type
                                                    compte
                                                </label>
                                                <select class="browser-default custom-select select2" name="asset_type"
                                                        id="asset_type">
                                                    <?php
                                                    if ($agents['asset_type'] != "") { ?>
                                                        <option selected value="<?= $agents['asset_type']; ?>">
                                                            <?= $agents['asset_type']; ?>
                                                        </option>
                                                    <?php } else { ?>
                                                        <option value="utilisateur">Utilisateur</option>
                                                    <?php } ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('asset_type'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center align-middle mb-3 pb-3">
                                        <input type="submit" class="btn btn-primary btn-lg"
                                               value="Appliquer les modifications">
                                        <?php
                                        $link = $this->uri->segment(1)
                                        ?>
                                        <a href="<?= base_url() . "$link/changePassword"; ?>" class="btn btn-outline-primary btn-lg">
                                            Modifier le mot de passe
                                        </a>
                                    </div>
                                </form>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
