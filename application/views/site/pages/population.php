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
                        <span class="font-weight-bold">Identification des personnes</span>
                        <div class="page-title-subheading">
                            Inline validation is very easy to implement using the
                            Architect Framework.
                            <ul class="app-breadcrumb breadcrumb text-capitalize">
                                <li class="breadcrumb-item font-weight-bold"><a href="<?= base_url().$this->uri->segment(1); ?>">Accueil</a></li>
                                <li class="breadcrumb-item font-weight-bold"><a href="<?= base_url().$this->uri->segment(1).'/'.$this->uri->segment(2); ?>"><?= $this->uri->segment(2)?> </a></li>
                                <li class="breadcrumb-item disabled" disabled><?= $this->uri->segment(3)?></li>
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
                <h5 class="card-title">Identification de la population</h5>
                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Nom de la personne</label>
                            <input type="text" class="form-control" id="validationCustom01"
                                   placeholder="First name" value="Mark" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Prenom de la personne</label>
                            <input type="text" class="form-control" id="validationCustom02"
                                   placeholder="Last name" value="Otto" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustomUsername">Adresse mail de la personne</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                </div>
                                <input type="email" class="form-control" id="validationCustomUsername"
                                       placeholder="Username" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Adresse domicilaire de la personne</label>
                            <input type="text" class="form-control" id="validationCustom01"
                                   placeholder="First name" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Adresse du bureau</label>
                            <input type="text" class="form-control" id="validationCustom01"
                                   placeholder="First name" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustomUsername">Fonction de la personne</label>
                            <input type="email" class="form-control" id="validationCustomUsername"
                                   placeholder="Username" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Please choose a fonction.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Numero de telephone portable</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">+243</span>
                                </div>
                                <input type="email" class="form-control" id="validationCustomUsername"
                                       placeholder="Username" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Telephone du bureau</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">+243</span>
                                </div>
                                <input type="email" class="form-control" id="validationCustomUsername"
                                       placeholder="Username" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationCustomUsername">Combien de personnes vivent avec vous ?</label>
                            <input type="text" class="form-control" id="validationCustom02"
                                   placeholder="Last name" value="" required>
                            <div class="invalid-feedback">
                                Please choose a number.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustomUsername">Temperature de la personne</label>
                            <input type="email" class="form-control" id="validationCustomUsername"
                                   placeholder="Username" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Please choose a fonction.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustomUsername">Coordonnees de la geolocalisation</label>
                            <input type="text" class="form-control" id="validationCustom02"
                                   placeholder="Last name" value="" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Etat de sante (antecednts medicaux) de la personne</label>
                            <input type="text" class="form-control" id="validationCustom03" placeholder="City"
                                   required>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="validationCustom04">Taille</label>
                            <input type="text" class="form-control" id="validationCustom04" placeholder="State"
                                   required>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="validationCustom05">Poids</label>
                            <input type="text" class="form-control" id="validationCustom05" placeholder="Zip"
                                   required>
                            <div class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="validationCustom05">Age</label>
                            <input type="text" class="form-control" id="validationCustom05" placeholder="Zip"
                                   required>
                            <div class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="position-relative form-group">
                                <label for="exampleSelectMulti" class="">Commune</label>
                                <select name="select" id="exampleSelect" class="custom-select">
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
                                    </small></label>
                                <input name="file" id="exampleFile" type="file" class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <div class="position-relative form-group">
                                <label for="exampleText" class="">Text Area</label>
                                <textarea name="text" id="exampleText" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                La personne est-elle d'accord avec nos <a href="">termes</a> et <a
                                        href="">conditions</a> d'utilisation de ses donnees ?
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Sauvegarder les donnees</button>
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