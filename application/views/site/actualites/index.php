<!--Main layout-->
<main class="mt-5 pt-5 mb-sm-4 pb-sm-4">
    <div class="container-fluid">
        <!-- Time Counter -->
        <!--Section: Post-->
        <section class="container">

            <div class="row">
                <div class="col-md-6 col-xl-6">

                    <div class="card">
                        <div class="card-body unique-color white-text">
                            <!-- List group links -->
                            <div class="list-group list-group-flush display-4 font-weight-bold">
                                <h4>Total des personnes</h4>
                                <a href="<?= base_url() . 'site/actualites/statistics'; ?>"
                                   class="list-group-item list-group-item-action waves-effect text-capitalize">Identifiees
                                    <span class="badge badge-success badge-pill pull-right">
                                          <?php
                                          $line = 1;
                                          $total = 0;
                                          if (isset($patients)):
                                              foreach ($patients as $value):

                                                  $total = $total + $line;

                                              endforeach;
                                              echo $total;
                                          else:?>
                                              0
                                          <?php endif; ?>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-6">
                    <div class="card">
                        <div class="card-body unique-color white-text">
                            <!-- List group links -->
                            <div class="list-group list-group-flush display-4 font-weight-bold">
                                <h4>Pays de Provenances</h4>
                                <a href="<?= base_url() . 'site/actualites/statistics'; ?>"
                                   class="list-group-item list-group-item-action waves-effect text-capitalize">Total
                                    <span class="badge badge-success badge-pill pull-right">
                                       <?php
                                       $line = 1;
                                       $total = 0;
                                       if (isset($pays)):
                                           foreach ($pays as $value):

                                               $total = $total + $line;

                                           endforeach;
                                           echo $total;
                                       else:?>
                                           0
                                       <?php endif; ?>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- statistics -->
            <h1 class="font-weight-bold">Pays Provenances</h1>
            <hr>
            <div class="row mt-3 pt-3">

                <?php
                $line = 1;
                $total = 0;
                if (isset($pays)):

                    foreach ($pays as $value):?>
                        <div class="col-md-6 col-xl-4 mt-2 pt-2">
                            <div class="card">
                                <div class="card-body unique-color-dark white-text">
                                    <!-- List group links -->
                                    <div class="list-group list-group-flush font-weight-bold">
                                        <h3> <?= $value->libelle ?></h3>
                                        <p class="pull-right text-danger">
                                               Last update <?= $value->date_update ?>
                                            </p>
                                        <a href="<?= base_url() . 'site/actualites/statistics'; ?>"
                                           class="list-group-item list-group-item-action waves-effect display-4  text-center">
                                            <span class="badge badge-success badge-pill">
                                                 <?= $value->nombre ?>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; endif; ?>
            </div>
            <div class="row ">
                <div class="col-md-12 col-lg-12">
                    <div class="mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title">
                                <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                                Value Data Reporting
                            </div>

                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tab-eg-55">
                                <div class="pt-2 card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="widget-content">
                                                <div class="widget-content-outer">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-numbers fsize-3 text-muted">1%</div>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <div class="text-muted opacity-6">Generated Leads</div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-progress-wrapper mt-1">
                                                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                 aria-valuenow="63" aria-valuemin="0"
                                                                 aria-valuemax="100" style="width: 63%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="widget-content">
                                                <div class="widget-content-outer">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-numbers fsize-3 text-muted">3%</div>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <div class="text-muted opacity-6">Submitted Tickers
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-progress-wrapper mt-1">
                                                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                 aria-valuenow="32" aria-valuemin="0"
                                                                 aria-valuemax="100" style="width: 32%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="widget-content">
                                                <div class="widget-content-outer">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-numbers fsize-3 text-muted">2%</div>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <div class="text-muted opacity-6">Server Allocation
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-progress-wrapper mt-1">
                                                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                            <div class="progress-bar bg-primary" role="progressbar"
                                                                 aria-valuenow="71" aria-valuemin="0"
                                                                 aria-valuemax="100" style="width: 71%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Section: Post-->
    </div>
</main>
<!--Main layout-->
