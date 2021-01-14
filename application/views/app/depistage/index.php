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
                        <span class="font-weight-bold">Depistage COVID-19</span>
                        <div class="page-title-subheading">
                            Auto-verification rapide de la pandemie du Coronavirus. Decouvrez les meilleurs pratiques.
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

                    <?php
                    if (isset($pageDepistages)) { ?>

                        <!-- resultat -->
                        <div class="card mt-3 pt-3">
                            <div class="card-header"><h2>Resultat de depistage</h2></div>
                            <div class="card-body">
                                <h3>Contactez votre Medecin</h3>
                                <p>Vous devriez vous rendre dans un etablissement medical et faire appel pour obtenir un
                                    test original
                                    pour COVID-19.</p>
                            </div>
                        </div>
                        <!-- prochaine etape -->
                        <div class="card mt-2 pt-2">
                            <div class="card-body">
                                <h3>Votre prochaine etape</h3>
                                <ol>
                                    <li>S'isoler des autres</li>
                                    <li>Reposez-vous et prenez soin</li>
                                    <li>Parlez a quelqu'un des tests</li>
                                    <li>Surveiller les symptomes</li>
                                </ol>
                            </div>
                        </div>
                        <!-- Reponses -->
                        <div class="card mt-2 pt-2">
                            <div class="card-body">
                                <h3>Vos reponses de depistage</h3>
                                <ul>
                                    <?php foreach ($depistages as $depistage) { ?>
                                    <?php }
                                    if ($depistage->dep_statut == 'lastIn') { ?>
                                        <li class="mt-1 pt-1"> Votre nom complet : <?= $depistage->dep_fullname; ?></li>
                                        <li class="mt-1 pt-1"> Votre age est (entre) <?= $depistage->dep_age; ?></li>
                                        <li class="mt-1 pt-1"> Vous presentez les sympomes d'experience</li>
                                        <li class="mt-1 pt-1"> Vous avez les antecedents medicaux ou conditions pertinentes</li>
                                        <li class="mt-1 pt-1"> Visite d'un endroit ou COVID-19 se repand
                                            : <?= $depistage->dep_voyage; ?></li>
                                        <li class="mt-1 pt-1"> Voyage a l'international
                                            : <?= $depistage->dep_international; ?></li>
                                        <li class="mt-1 pt-1"> Exposition a d'autres personnes
                                            : <?= $depistage->dep_contact; ?></li>
                                        <li class="mt-1 pt-1"> Auto-depistage effectue
                                            Aujourd'hui <?= $depistage->dep_date_day; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- form -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title font-weight-bold">
                                <span>Interface d'auto-verification de la pandemie coronavirus</span>
                            </h5>
                        </div>
                        <div class="box-body">
                            <span style="color:red;"><b><?= $this->session->Admin; ?></b></span>
                            <span style="color:red;"><b><?= $this->session->Agent; ?></b></span>
                            <form class=""
                                  action="<?= base_url() . 'ui/depister'; ?>"
                                  method="post">
                                <?php
                                $date_jour = date('Y-m-d');
                                $date_max = ((new DateTime())->modify('-0 day'))->format('Y-m-d');
                                $date_min = ((new DateTime())->modify('-30 day'))->format('Y-m-d');

                                ?>
                                <div class="row clearfix mx-2">
                                    <div class="col-md-6">
                                        <label for="dep_fullname" class="control-label"><span
                                                    class="text-danger">*</span>Nom
                                            complet de la personne</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control text-capitalize"
                                                   name="dep_fullname"
                                                   value="<?= set_value('dep_fullname'); ?>"/>
                                            <span class="text-danger"><?php echo form_error('dep_fullname'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="booking_dropdown">
                                            <label for="dep_date_day" class="control-label"><span
                                                        class="text-danger">*</span>
                                                Date du jour de depistage</label>
                                            <input type="date"
                                                   class="form-control"
                                                   placeholder="Jour de depistage" name="dep_date_day"
                                                   max="<?= $date_jour; ?>" min="<?= $date_min; ?>"
                                                   value="<?php echo $date_jour ? $date_jour : set_value('dep_date_day'); ?>">
                                            <label class="text-danger small"><?php echo form_error('dep_date_day'); ?></label>
                                        </div>
                                    </div>
                                    <!-- age -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <p><span class="text-danger">*</span>
                                                Age de la personne <br>
                                                <small>Cocher un ecart d'age correspondant.</small>
                                            </p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="Moins de 18 ans"
                                                       name="dep_age"
                                                       id="moins_18_ans" <?php echo set_radio('dep_age', 'Moins de 18 ans', TRUE); ?>/>
                                                <label class="form-check-label" for="moins_18_ans">
                                                    Moins de 18 ans
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                       name="dep_age" value="18-64 ans" checked
                                                       id="18_64_ans" <?php echo set_radio('dep_age', 'Entre 18 et 64 ans', TRUE); ?>/>
                                                <label class="form-check-label" for="18_64_ans">
                                                    Entre 18 et 64 ans
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                       name="dep_age" value="65 ans plus"
                                                       id="65_ans_plus" <?php echo set_radio('dep_age', '65 ans ou plus', TRUE); ?>/>
                                                <label class="form-check-label" for="65_ans_plus">
                                                    65 ans ou plus
                                                </label>
                                            </div>
                                            <span class="text-danger"><?php echo form_error('dep_age'); ?></span>
                                        </div>
                                    </div>
                                    <!-- symptomes -->
                                    <div class="col-md-8">
                                        <p class="control-label"><span
                                                    class="text-danger">*</span>
                                            La personne presente des symptomes suivants ? <br>
                                            <small>Cocher tout ce qui s'y rapporte</small>
                                        </p>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_symptomes" value="Gorge irritee"
                                                               id="gorge_irritee"
                                                            <?php echo set_checkbox('dep_symptomes', 'Gorge irritee'); ?>/>
                                                        <label class="form-check-label" for="gorge_irritee">
                                                            Gorge irritee
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_symptomes" value="Essouflement"
                                                               id="Essouflement"
                                                            <?php echo set_checkbox('dep_symptomes', 'Essouflement'); ?>/>
                                                        <label class="form-check-label" for="Essouflement">
                                                            Essouflement
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_symptomes" value="Toux" id="Toux"
                                                            <?php echo set_checkbox('dep_symptomes', 'Toux'); ?>/>
                                                        <label class="form-check-label" for="Toux">
                                                            Toux
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_symptomes"
                                                               value="Fievre, froid ou transpiration" id="fievre"
                                                            <?php echo set_checkbox('dep_symptomes', 'Fievre, froid ou transpiration'); ?>/>
                                                        <label class="form-check-label" for="fievre">
                                                            Fievre, froid ou transpiration
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_symptomes" value="Douleur a travers le corps"
                                                               id="douleurs"
                                                            <?php echo set_checkbox('dep_symptomes', 'Douleur a travers le corps'); ?>/>
                                                        <label class="form-check-label" for="douleurs">
                                                            Douleur a travers le corps
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_symptomes" value="Vomissement ou diarrhee"
                                                               id="Vomissement"
                                                            <?php echo set_checkbox('dep_symptomes', 'Vomissement ou diarrhee'); ?>/>
                                                        <label class="form-check-label" for="Vomissement">
                                                            Vomissement ou diarrhee
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_symptomes" value="Aucun symptomes ci-dessus"
                                                               id="aucun"
                                                            <?php echo set_checkbox('dep_symptomes', 'Aucun symptomes ci-dessus'); ?>/>
                                                        <label class="form-check-label" for="aucun">
                                                            Aucun symptomes ci-dessus
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="text-danger"><?php echo form_error('dep_symptomes'); ?></span>
                                        </div>
                                    </div>

                                    <!-- antecedents medicaux -->
                                    <div class="col-md-12">
                                        <hr>
                                        <p class="control-label"><span
                                                    class="text-danger">*</span>
                                            La personne presente-t-elle l'une de maladies historiques suivantes
                                            ou d'autres conditions medicales ? <br>
                                            <small>Cocher tout ce qui s'y rapporte</small>
                                        </p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_antecedents" value="Cirrhose de foie" id="foie"
                                                            <?php echo set_checkbox('dep_antecedents', 'Cirrhose de foie'); ?>/>
                                                        <label class="form-check-label" for="foie">
                                                            Cirrhose de foie
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_antecedents" value="Grossesse" id="grossesse"
                                                            <?php echo set_checkbox('dep_antecedents', 'Grossesse'); ?>/>
                                                        <label class="form-check-label" for="grossesse">
                                                            Grossesse
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_antecedents" value="Diabete" id="Diabete"
                                                            <?php echo set_checkbox('dep_antecedents', 'Diabete'); ?>/>
                                                        <label class="form-check-label" for="Diabete">
                                                            Diabete
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_antecedents" value="Besoins de dialyse"
                                                               id="dialyse"
                                                            <?php echo set_checkbox('dep_antecedents', 'Besoins de dialyse'); ?>/>
                                                        <label class="form-check-label" for="dialyse">
                                                            Besoins de dialyse
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_antecedents" value="Obesite extreme"
                                                               id="extreme"
                                                            <?php echo set_checkbox('dep_antecedents', 'Obesite extreme'); ?>/>
                                                        <label class="form-check-label" for="extreme">
                                                            Obesite extreme
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_antecedents"
                                                               value="Asthme ou maladie pulmonaire" id="pulmonaire"
                                                            <?php echo set_checkbox('dep_antecedents', 'Asthme ou maladie pulmonaire'); ?>/>
                                                        <label class="form-check-label" for="pulmonaire">
                                                            Asthme ou maladie pulmonaire
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_antecedents"
                                                               value="Maladies ou Infections qui rendent plus difficile la toux"
                                                               id="Infections"
                                                            <?php echo set_checkbox('dep_antecedents', 'Maladies ou Infections qui rendent plus difficile la toux'); ?>/>
                                                        <label class="form-check-label" for="Infections">
                                                            Maladies ou Infections qui rendent plus difficile la toux
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_antecedents"
                                                               value="Systeme immunitaire affaibli" id="immunitaire"
                                                            <?php echo set_checkbox('dep_antecedents', 'Systeme immunitaire affaibli'); ?>/>
                                                        <label class="form-check-label" for="immunitaire">
                                                            Systeme immunitaire affaibli
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_antecedents" value="Insuffisance cardiaque"
                                                               id="cardiaque"
                                                            <?php echo set_checkbox('dep_antecedents', 'Insuffisance cardiaque'); ?>/>
                                                        <label class="form-check-label" for="cardiaque">
                                                            Insuffisance cardiaque
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_antecedents" value="Insuffisance cardiaque"
                                                               id="invalidCheckAucun"
                                                            <?php echo set_checkbox('dep_antecedents', 'Insuffisance cardiaque'); ?>/>
                                                        <label class="form-check-label" for="invalidCheckAucun">
                                                            Aucun symptomes ci-dessus
                                                        </label>
                                                    </div>
                                                </div>
                                                <span class="text-danger"><?php echo form_error('dep_antecedents'); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <hr>
                                        <div class="form-group">
                                            <p><span class="text-danger">*</span>
                                                Au cours de 2 dernieres semaines, avez-vous voyage a l'international ?
                                                <br>
                                                <small>Cocher un element correspondant.</small>
                                            </p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                       name="dep_international"
                                                       value="Oui, j'ai voyage a l'international"
                                                       id="invalidCheckinter" <?php echo set_radio('dep_international', 'Oui, j\'ai voyage a l\'international', TRUE); ?>/>
                                                <label class="form-check-label" for="invalidCheckinter">
                                                    Oui, j'ai voyage a l'international
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                       name="dep_international"
                                                       value=" Non, je n'ai pas voyage a l'international"
                                                       id="invalidCheckinter2" <?php echo set_radio('dep_international', ' Non, je n\'ai pas voyage a l\'international', TRUE); ?>/>
                                                <label class="form-check-label" for="invalidCheckinter2">
                                                    Non, je n'ai pas voyage a l'international
                                                </label>
                                            </div>
                                            <span class="text-danger"><?php echo form_error('dep_international'); ?></span>
                                        </div>
                                    </div>
                                    <!-- international -->
                                    <div class="col-md-6">
                                        <hr>
                                        <div class="form-group">
                                            <p><span class="text-danger">*</span>
                                                Au cours de 2 dernieres semaines, avez-vous vecu ou visite un endroit ou
                                                COVID-19 se repand?
                                                <br>
                                                <small>Cocher une option correspondante.</small>
                                            </p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                       name="dep_voyage" value="Je vis la ou COVID-19 se repand"
                                                       id="invalidCheckcovid"
                                                    <?php echo set_checkbox('dep_voyage', 'Je vis la ou COVID-19 se repand'); ?>/>
                                                <label class="form-check-label" for="invalidCheckcovid">
                                                    Je vis la ou COVID-19 se repand
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                       name="dep_voyage"
                                                       value="J'ai visite une zone ou COVID-19 se repand"
                                                       id="invalidCheckvisite"
                                                    <?php echo set_checkbox('dep_voyage', 'J\'ai visite une zone ou COVID-19 se repand'); ?>/>
                                                <label class="form-check-label" for="invalidCheckvisite">
                                                    J'ai visite une zone ou COVID-19 se repand
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                       name="dep_voyage" value="Aucun de deux ci-dessus"
                                                       id="invalidCheckvoy"
                                                    <?php echo set_checkbox('dep_voyage', 'Aucun de deux ci-dessus'); ?>/>
                                                <label class="form-check-label" for="invalidCheckvoy">
                                                    Aucun de deux ci-dessus
                                                </label>
                                            </div>
                                            <span class="text-danger"><?php echo form_error('dep_voyage'); ?></span>
                                        </div>
                                    </div>
                                    <!-- visite aux personnes infectees-->

                                    <div class="col-md-12">
                                        <hr>
                                        <div class="form-group">
                                            <p><span class="text-danger">*</span>
                                                Au cours de 2 dernieres semaines, qu'elle est votre exposition a
                                                d'autres personnes
                                                qui sont connues pour avoir COVID-19 ? <br>
                                                <small>Cocher tout ce qui s'y rapporte .</small>
                                            </p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <?php
                                                        $info = "J'etais en contact avec quelqu'un qui a COVID-19 pendant 10
                                                            minutes. J'etais expose
                                                            dans 2 metres de quelqu'un qui est malade de la toux ou
                                                            eternueements.";
                                                        ?>
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_contact" value="<?= $info; ?>"
                                                               id="invalidCheckvoycon"
                                                            <?php echo set_checkbox('dep_contact', $info); ?>/>
                                                        <label class="form-check-label" for="invalidCheckvoycon">
                                                            J'etais en contact avec quelqu'un qui a COVID-19 pendant 10
                                                            minutes. J'etais expose
                                                            dans 2 metres de quelqu'un qui est malade de la toux ou
                                                            eternueements.
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_contact"
                                                               value="Je vis avec quelqu'un qui a COVID-19"
                                                               id="invalidCheckone"
                                                            <?php echo set_checkbox('dep_contact', 'Je vis avec quelqu\'un qui a COVID-19'); ?>/>
                                                        <label class="form-check-label" for="invalidCheckone">
                                                            Je vis avec quelqu'un qui a COVID-19
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <?php
                                                        $text = "J'etais pres de quelqu'un qui a COVID-19 au moins de 2
                                                            metres et je n'ai pas ete expose une toux ou un eternueement.";
                                                        ?>
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_contact" value="<?= $text ?>"
                                                               id="invalidCheckonete"
                                                            <?php echo set_checkbox('dep_contact', $text); ?>/>
                                                        <label class="form-check-label" for="invalidCheckonete">
                                                            J'etais pres de quelqu'un qui a COVID-19 au moins de 2
                                                            metres
                                                            et je n'ai pas ete expose une toux ou un eternueement.
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="dep_contact" value="Je n'ai pas ete expose."
                                                               id="invalidCheckbox"
                                                            <?php echo set_checkbox('dep_contact', 'Je n\'ai pas ete expose.'); ?>/>
                                                        <label class="form-check-label" for="invalidCheckbox">
                                                            Je n'ai pas ete expose.
                                                        </label>
                                                    </div>
                                                    <span class="text-danger"><?php echo form_error('dep_contact'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center align-middle mb-3 pb-3">
                                    <input type="submit" class="btn btn-primary btn-lg text-uppercase"
                                           value="Proceder a la verification">
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
