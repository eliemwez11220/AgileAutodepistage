<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="lnr-picture text-danger">
                        </i>
                    </div>
                    <div>
                        <span class="font-weight-bold">Identification des etablissements medicaux</span>
                        <div class="page-title-subheading">
                            Inline validation is very easy to implement using the
                            Architect Framework.
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
                            Buttons
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
                                        <span>
                                                            Picture
                                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a disabled href="javascript:void(0);" class="nav-link disabled">
                                        <i class="nav-link-icon lnr-file-empty"></i>
                                        <span>
                                                            File Disabled
                                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h3 class="card-title">Identification de structures medicales</h3>
                <hr>
                <div>
                    <p><strong>Agile CovidRiposte</strong> simplifie votre quotidien en vous proposant un service de
                        prise de rendez-vous
                        medicaux en ligne associe a un agenda sur-mesure et a d'autres services innovants.
                        Fiche d'identification d'un cabinet
                        <strong> cabinet medical (etablissement) </strong> <br>
                        avec des informations basiques, vous pourrez completer plus tard via
                        <strong>l'interface<span class="text-lowercase">
                            pour les professionnels de sante et l'agenda numerique</span></strong>
                    </p>
                </div>
                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="identifiant_login">Identifiant login(*) </label>
                            <input type="text" id="identifiant_login" class="form-control bg-light"
                                   name="identifiant_login"
                                   autofocus>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="medecin_phone">Numero telephone (*)</label>
                            <input type="text" id="medecin_phone" class="form-control bg-light"
                                   name="medecin_phone" value="+243">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="medecin_email">Email(*)</label>
                            <input type="email" id="medecin_email" class="form-control bg-light"
                                   name="medecin_email">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="medecin_prenom">Specialite de votre etablissement(*)</label>
                            <select name="medecin_specialite" id="medecin_specialite" class="custom-select bg-light">
                                <option selected disabled>Selectionner votre specialite(*)</option>
                                <option>Chirurgien-dentiste</option>
                                <option>Médécin généraliste</option>
                                <option>Pédiatre</option>
                                <option>Gynécologue médical et obstétrique</option>
                                <option>Ophtalmologue</option>
                                <option>Dematologue et vénérologue</option>
                                <option>Ostéopathe</option>
                                <option>Masseur-kinésithérapeute</option>
                                <option>Pédicure-podologue
                                <option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="medecin_adresse">Votre adresse de travail(*)</label>
                            <input type="text" id="medecin_adresse" class="form-control bg-light"
                                   name="medecin_adresse">

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="medecin_prenom">Nom de votre etablissement(*)</label>
                            <input type="text" id="medecin_prenom" class="form-control bg-light"
                                   name="medecin_prenom">

                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="position-relative form-group">
                                <label for="exampleSelectMulti" class="">Commune</label>
                                <select name="select" id="exampleSelect" class="custom-select bg-light">
                                    <option>Lubumbashi</option>
                                    <option>Kamalondo</option>
                                    <option>Kampemba</option>
                                    <option>Kenya</option>
                                    <option>Katuba</option>
                                    <option>Annexe</option>
                                    <option>Rwashi</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="position-relative form-group">
                                <label for="exampleFile" class="">Piece jointe
                                    <small class="text-muted">
                                        (Format de fichier acceptes .pdf|.docx|.xlxs|.txt)
                                    </small>
                                </label>
                                <input name="file" id="exampleFile" type="file" class="form-control bg-light">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p><strong>Choisir les horaires d'ouverture</strong> <br>
                                <small>Vous pourrez toujours apporter des modifications par la suite</small>
                            </p>
                            <textarea name="horaire_travail" id="" cols="30" rows="5" class="form-control bg-light"
                                      style="border-radius: 10px;" maxlength="500"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="font-weight-bold">Breve description de votre etablissement(*)
                                <br>
                                <small>Vous pourrez toujours apporter des modifications par la suite</small></p>
                            <textarea name="breve_description" id="" cols="30" rows="5" maxlength="500"
                                      class="form-control bg-light"
                                      style="border-radius: 10px;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Cet etablissement est-il d'accord avec nos <a href="">termes</a> et <a
                                        href="">conditions</a> d'utilisation de ses donnees ?
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                            <p>
                                <strong>Acceptez de reservation 24/7</strong><br>
                            </p>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Sauvegarder les donnees</button>

                    </div>
                </form>

            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Liste des personnes deja identifiees</h5>
                <div class="table-responsive">
                    <table class="mb-0 table table-sm table-hover">
                        <thead class="bg-dark text-white">
                        <tr>
                            <th>#</th>
                            <th>Table heading</th>
                            <th>Table heading</th>
                            <th>Table heading</th>
                            <th>Table heading</th>
                            <th>Table heading</th>
                            <th>Table heading</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="app-wrapper-footer">
        <div class="app-footer">
            <div class="app-footer__inner">
                <div class="app-footer-left">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                Footer Link 1
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                Footer Link 2
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="app-footer-right">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                Footer Link 3
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <div class="badge badge-success mr-1 ml-0">
                                    <small>NEW</small>
                                </div>
                                Footer Link 4
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>