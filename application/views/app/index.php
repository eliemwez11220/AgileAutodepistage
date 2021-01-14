<!-- main section -->
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Tableau de bord des elements analyses
                        <div class="page-title-subheading">
                            La vue d'ensemble de differentes composantes et des operations en cours de production.
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
                            Reporting
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true"
                             class="dropdown-menu dropdown-menu-right">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-inbox"></i>
                                        <span>
                                                            Inbox
                                                        </span>
                                        <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-book"></i>
                                        <span>
                                                            Book
                                                        </span>
                                        <div class="ml-auto badge badge-pill badge-danger">5</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-picture"></i>
                                        <span>Picture</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-6">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading text-uppercase">Total personnes</div>
                            <div class="widget-subheading">Identifiees</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white">
                                <span>
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
                                </span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-6">
                <div class="card mb-3 widget-content bg-grow-early">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading text-uppercase">Pays</div>
                            <div class="widget-subheading">Provenances</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>
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
                                </span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-premium-dark">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Products Sold</div>
                            <div class="widget-subheading">Revenue streams</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warning"><span>$14M</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- statistics -->
        <div class="row">
            <?php
            $line = 1;
            $total = 0;
            if (isset($pays)):

                foreach ($pays as $value):?>
                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-midnight-bloom">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading text-uppercase"><?= $value->libelle ?></div>
                                    <div class="widget-subheading"><?= $value->date_update ?></div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white">
                                <span>
                                    <?= $value->nombre ?>
                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="mb-3 card">
                    <div class="card-header-tab card-header-tab-animation card-header">
                        <div class="card-header-title">
                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                            Data Reporting
                        </div>
                        <ul class="nav">
                            <li class="nav-item"><a href="javascript:void(0);" class="nav-link">Last</a>
                            </li>
                            <li class="nav-item"><a href="javascript:void(0);"
                                                    class="nav-link second-tab-toggle active">Current</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs-eg-77">
                                <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                            <canvas id="canvas"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- Top users
                                  <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">
                                    Top Users</h6>
                                <div class="scroll-area-sm">
                                    <div class="scrollbar-container">
                                        <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <img width="42" class="rounded-circle"
                                                                 src="assets/images/avatars/9.jpg" alt="">
                                                        </div>
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">Ella-Rose Henry</div>
                                                            <div class="widget-subheading">Web Developer</div>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <div class="font-size-xlg text-muted">
                                                                <small class="opacity-5 pr-1"></small>
                                                                <span>129</span>
                                                                <small class="text-danger pl-2">
                                                                    <i class="fa fa-angle-down"></i>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                 -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
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
                                                        <div class="widget-numbers fsize-3 text-muted">63%</div>
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
                                                        <div class="widget-numbers fsize-3 text-muted">32%</div>
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
                                                        <div class="widget-numbers fsize-3 text-muted">71%</div>
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
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading">Total Orders</div>
                                <div class="widget-subheading">Last year expenses</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-success">1896</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading">Products Sold</div>
                                <div class="widget-subheading">Revenue streams</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-primary">$3M</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading">Followers</div>
                                <div class="widget-subheading">People Interested</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-danger">45,9%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading">Income</div>
                                <div class="widget-subheading">Expected totals</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-focus">$147</div>
                            </div>
                        </div>
                        <div class="widget-progress-wrapper">
                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="54"
                                     aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
                            </div>
                            <div class="progress-sub-label">
                                <div class="sub-label-left">Expenses</div>
                                <div class="sub-label-right">100%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Active Users
                        <div class="btn-actions-pane-right">
                            <div role="group" class="btn-group-sm btn-group">
                                <button class="active btn btn-focus">Last Week</button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Last login</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $line = 1;
                            foreach ($managers as $value) {
                                if ($value->asset_active == 'oui') {
                                    ?>
                                    <tr>
                                        <td class="text-center text-muted">#<?= $line; ?></td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="widget-content-left">
                                                            <img width="40" class="rounded-circle"
                                                                 src="<?= base_url(); ?>assets/images/avatars/user.png"
                                                                 alt="Avatar">
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left flex2 text-capitalize">
                                                        <div class="widget-heading"> <?= $value->asset_name ?></div>
                                                        <div class="widget-subheading opacity-7"> <?= $value->asset_role ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            <div class="badge badge-warning"><?= $value->asset_status; ?></div>
                                        </td>
                                        <td class="text-capitalize text-center"><?= $value->asset_email; ?></td>
                                        <td class="text-capitalize text-center"><?= $value->asset_connected; ?></td>
                                    </tr>
                                    <?php $line++;
                                }
                            } ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
