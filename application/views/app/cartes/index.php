
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
                        <span class="font-weight-bold">Production de cartes d'abonnements</span>
                        <div class="page-title-subheading">
                            Veuillez selectionner une personne dont vous voulez creer une carte d'abonnement ci-dessous.
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
                            Criteres rapides
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true"
                             class="dropdown-menu dropdown-menu-right">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-inbox"></i>
                                        <span>Vehicule</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-book"></i>
                                        <span>Personne</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-header">
                <h5 class="card-title">Cartes d'abonnement de personnes identifiees</h5>
            </div>
            <?php
            //verifier si l'utilisateur a choisi la mise aa jour de donnees
            if (isset($agents)) { ?>
            <div class="card-body">

                <span style="color:red;"><b><?= $this->session->cartes; ?></b></span>
                <form class=""
                      action="<?= base_url() . 'ui/cartes/' . $agents['patient_id']; ?>"
                      method="post">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="patient_id" class="control-label"><span
                                        class="text-danger">*</span>Identifiant de la personne (readonly)</label>
                            <div class="form-group">
                                <input type="text" class="form-control text-capitalize"
                                       name="patient_id"
                                       value="<?= $agents['patient_id'] ? $agents['patient_id'] : set_value('patient_id'); ?>"
                                readonly />
                                <span class="text-danger"><?php echo form_error('patient_id'); ?></span>
                            </div>
                        </div><div class="col-md-6">
                            <label for="patient_fullname" class="control-label"><span
                                        class="text-danger">*</span>Nom
                                complet la personne (readonly)</label>
                            <div class="form-group">
                                <input type="text" class="form-control text-capitalize"
                                       name="patient_fullname"
                                       value="<?= $agents['patient_fullname'] ? $agents['patient_fullname'] : set_value('patient_fullname'); ?>"
                                readonly />
                                <span class="text-danger"><?php echo form_error('patient_fullname'); ?></span>
                            </div>
                        </div>
                        </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <label for="patient_temperature" class="control-label"><span
                                        class="text-danger">*</span>Temperature actuelle de la personne</label>
                            <div class="form-group">
                                <input type="text" class="form-control text-capitalize"
                                       name="patient_temperature"
                                       value="<?= $agents['patient_temperature'] ? $agents['patient_temperature'] : set_value('patient_temperature'); ?>"/>
                                <span class="text-danger"><?php echo form_error('patient_temperature'); ?></span>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit" name="btn_update">Mettre a jour la temperature</button>
                </form>

            </div>
            <?php } ?>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title"><?= $type_liste ?></h5>
                <div class="table-responsive">
                    <table class="mb-0 table table-sm table-hover">
                        <thead class="bg-dark text-white">
                        <tr>
                            <th>#</th>
                            <th>Nom personne</th>
                            <th>Age</th>
                            <th>Telephone</th>
                            <th>Adresse domicile</th>
                            <th>Temperature</th>
                            <th>Dernier MAJ</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $line = 1;
                        $id = $this->uri->segment(5);
                        if (isset($patients)):
                            foreach ($patients as $value): ?>
                                <tr class="<?= ($value->patient_id == $id ? 'bg-success text-light font-weight-bold' : ''); ?>">
                                    <th scope="row"><?= $line ?></th>
                                    <td class="text-capitalize">
                                        <a href="<?= base_url() . "ui/updateForm/cartes/index/" . $value->patient_id ?>">
                                        <?= $value->patient_fullname ?>
                                        </a></td>
                                    <td class="text-capitalize"><?= $value->patient_age ?></td>
                                    <td class="text-capitalize"><?= $value->patient_phone ?></td>
                                    <td class="text-capitalize"><?= $value->patient_address ?></td>
                                    <td class="text-capitalize"><?= $value->patient_temperature ?></td>
                                    <td class="text-capitalize"><?= $value->date_update ?></td>
                                    <td class="text-capitalize">
                                        <a href="<?= base_url() . "ui/updateForm/cartes/index/" . $value->patient_id ?>"
                                           class="btn btn-info btn-rounded btn-sm">
                                        <span class="table-edit" data-toggle="tooltip" data-placement="bottom"
                                              title="Cliquer pour mettre a jour les infos de cette personne">
                                        </span> Editer
                                        </a>
                                    </td>
                                </tr>
                                <?php $line++; endforeach;
                        else:?>
                            <tr>
                                <td class="text-center" colspan="5">Aucune information trouvee !</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>