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
                        <span class="font-weight-bold">Notifications des services concernes aux ripostes</span>
                        <div class="page-title-subheading">
                            Veuillez saisir les informations requises pour envoyer la notiication aux personnes concernees.
                            <ul class="app-breadcrumb breadcrumb text-capitalize">
                                <li class="breadcrumb-item font-weight-bold"><a
                                            href="<?= base_url() . $this->uri->segment(1); ?>">Accueil</a></li>
                                <li class="breadcrumb-item font-weight-bold"><a
                                            href="<?= base_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2); ?>">
                                        <?= $this->uri->segment(2) ?> </a>
                                </li>
                                <li class="breadcrumb-item disabled" disabled><?= $this->uri->segment(3) ?></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-header">
                <h5 class="card-title">Formulaire de notifications de services</h5>
            </div>

            <div class="card-body">

                <span style="color:red;"><b><?= $this->session->cartes; ?></b></span>
                <form class=""
                      action="<?= base_url() . 'ui/notes'; ?>"
                      method="post">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="asset_name" class="control-label"><span
                                        class="text-danger">*</span>Votre nom
                                complet (readonly)</label>
                            <div class="form-group">
                                <input type="text" class="form-control text-capitalize"
                                       name="asset_name"
                                       value="<?= $this->session->fullname ?? set_value('asset_name'); ?>"
                                       readonly/>
                                <span class="text-danger"><?php echo form_error('asset_name'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="asset_role" class="control-label"><span
                                        class="text-danger">*</span>Votre role de travail (readonly)</label>
                            <div class="form-group">
                                <input type="text" class="form-control text-capitalize"
                                       name="asset_role"
                                       value="<?= $this->session->role ?? set_value('asset_role'); ?>"
                                       readonly/>
                                <span class="text-danger"><?php echo form_error('asset_role'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="email" class="control-label"><span
                                        class="text-danger">*</span>Adresse mail de la personne ou service a
                                notifier</label>
                            <div class="form-group">
                                <input type="email" class="form-control text-lowercase"
                                       name="email" value="<?= set_value('email'); ?>"/>
                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="subject" class="control-label"><span
                                        class="text-danger">*</span>Objet de notification</label>
                            <div class="form-group">
                                <input type="text" class="form-control text-capitalize"
                                       name="subject" value="<?= set_value('subject'); ?>"/>
                                <span class="text-danger"><?php echo form_error('subject'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <div class="position-relative form-group">
                                <label for="exampleText" class="issue">Notes du contenu de la notification</label>
                                <textarea name="issue" id="exampleText" class="form-control text-capitalize"></textarea>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary ml-2 pl-2" type="submit" name="btn_notifie">Envoyer et archiver la
                        notification
                    </button>
                </form>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title"><?= $type_liste ?></h5>
                <div class="table-responsive">
                    <table class="mb-0 table table-sm table-hover">
                        <thead class="bg-dark text-white">
                        <tr>
                            <th>#</th>
                            <th>Agent ayant notifiee</th>
                            <th>Email service</th>
                            <th>Objet mail</th>
                            <th>Date created</th>
                            <th>Statut</th>
                            <th>Contenu</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $line = 1;
                        if (isset($aides)):
                            foreach ($aides as $value):
                                if ($value->note_status == 'active') { ?>
                                    <tr>
                                        <th scope="row"><?= $line ?></th>
                                        <td class="text-capitalize"><?= $value->name ?>
                                            <br>
                                            <small><?= $value->asset_role ?></small>
                                        </td>
                                        <td class="text-capitalize"><?= $value->email ?></td>
                                        <td class="text-capitalize"><?= $value->subject ?></td>
                                        <td class="text-capitalize"><?= $value->date_logged ?></td>
                                        <td class="text-capitalize">
                                            <a href="<?= base_url() . "ui/archiverNotes?note_id" . $value->id ?>"
                                               onclick="return confirm('Voulez-vous vraiment archiver cette notification portant sur
                                               <?= $value->subject ?>?')"
                                               class="btn btn-danger btn-rounded btn-sm">
                                        <span class="table-edit" data-toggle="tooltip" data-placement="bottom"
                                              title="Cliquer pour archiver cette notification">
                                        </span> Archiver
                                            </a>
                                        </td>

                                        <td>
                                            <a class="btn btn-primary btn-sm"
                                               href="<?php echo base_url() ?>pages/validerReservation/<?php echo $value->id; ?>"
                                               data-toggle="modal"
                                               data-target="#fluidModalRightSuccessDemo<?= $value->id; ?>"
                                               target="_blank">View</a>
                                        </td>
                                    </tr>
                                            <!-- modal validation -->

                                            <!-- Full Height Modal Right Success Demo-->

                                            <div class="">
                                                <div class="modal fade float-right"
                                                     id="fluidModalRightSuccessDemo<?= $value->id; ?>" tabindex="-1"
                                                     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                                     data-backdrop="false">
                                                    <div class="modal-dialog modal-full-height modal-right modal-notify modal-info"
                                                         role="document">
                                                        <!--Content-->
                                                        <div class="modal-content">
                                                            <!--Header-->
                                                            <div class="modal-header pt-5 mt-5">
                                                                <h5 class="heading lead font-weight-bold text-center">Notifications
                                                                    portant sur <?= $value->subject ?></h5>
                                                            </div>

                                                            <!--Body-->
                                                            <div class="modal-body">
                                                                <div class="card-body">
                                                                    <h5 class="font-weight-bold">Contenu de la
                                                                        notification effectuee depuis
                                                                       <span class="text-danger"> <?= $value->date_logged ?></span>
                                                                        par  <span class="text-success text-capitalize"><?= $value->name ?></span></h5>
                                                                    <p class="text-justify">
                                                                        <?= $value->issue ?>
                                                                    </p>
                                                                </div>
                                                                <div class="card-footer float-right">
                                                                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                    <span aria-hidden="true"
                                                                          class="white-text">Fermer</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/.Content-->
                                                    </div>
                                                </div>
                                            </div>

                                    <!-- Full Height Modal Right Success Demo-->
                                    <?php $line++;
                                } endforeach;
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
