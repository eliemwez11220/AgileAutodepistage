<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class UI extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        // charge all models
        $this->load->model('Secure_model');
        $this->load->model('App_model');
        //derniere connexion prise en compte
        // verifie of login
        //$this->is_logged();
        //last connection
        $this->last_connexion();
    }

    /**
     *@ Check is admin is logged
     */
    private function is_logged()
    {
        if (!$this->session->userdata('authentified_admin')) {
            // code...
            return redirect(base_url() . 'secure');
        } elseif (!$this->session->userdata('authentified_agent')) {
            // code...
            return redirect(base_url() . 'secure');
        }
    }

    //mettre a jour la date de derniere connexion
    private function last_connexion()
    {
        if ($this->session->authentified_admin || $this->session->authentified_agent) {
            // code...
            $date_connect = date('Y-m-d H:s:i');
            $data = array(
                'asset_connected' => $date_connect,
                'asset_active' => 'oui',
            );
            // update
            $id = $this->session->id;
            $this->App_model->update_data($data, 'tb_doc_assets', array('id_asset' => $id));
        }
    }

    #===================================deconnexon - fermeture de session===========================================
    public function logout()
    {
        $data = array(
            'asset_active' => 'non',
        );
        // update
        $id = $this->session->id;
        $this->App_model->update_data($data, 'tb_doc_assets', array('id_asset' => $id));

        $this->session->sess_destroy();
        return redirect(base_url() . 'secure/index');
    }

    public function index()
    {
        //chargement du tableau de bord
        $this->dashboard();
    }
    ########################################   *   ########################################
    #
    #						    # DASHBORAD FUNCTIONS
    #
    ########################################   *   ########################################

    public function dashboard()
    {
        //set page title
        $data['title'] = "Page de demarrage menu administrateur";
        //show all users
        $data['managers'] = $this->App_model->get('tb_doc_assets', 'asset_created')->result();
        $data['patients'] = $this->App_model->get('tb_doc_patients', 'pays_provenance')->result();
        $data['pays'] = $this->App_model->get('tb_doc_pays', 'libelle')->result();
        $this->load->view('includes/header', $data);
        $this->load->view('app/index', $data);
        $this->load->view('includes/footer', $data);
    }

    /**
     * Identification function
     * @param null $page
     */
    public function identification($page = null)
    {
        //listing
        $data['patients'] = $this->App_model->get('tb_doc_patients', 'pays_provenance')->result();
        //title
        $data['title'] = $page;
        $this->load->view('includes/header', $data);
        if ($page == "") {
            $this->load->view('app/identification/index', $data);
        } else {
            $this->load->view('app/identification/' . $page, $data);
        }
        $this->load->view('includes/footer', $data);
    }

    /**
     *@ Add an agent
     */
    public function addPatient()
    {
        //recupere infos users existants
        $data['patients'] = $this->App_model->get('tb_doc_assets', 'asset_created')->result();

        $data['title'] = "Creation compte utilisateur";

        //validate user fullname
        $this->form_validation->set_rules('patient_name', 'patient_name', 'required', array(
            'required' => 'Le nom est obligatoire',
        ));
        $this->form_validation->set_rules('patient_lastname', 'patient_lastname', 'required', array(
            'required' => 'Le prenom est obligatoire',
        ));

        $this->form_validation->set_rules('patient_email', 'patient_email', 'required', array(
            'required' => 'L\'email est obligatoire',
        ));
        $this->form_validation->set_rules('pays_provenance', 'pays_provenance', 'required', array(
            'required' => 'Le pays est obligatoire',
        ));


        # verifie if datas are corrects and redirect
        if ($this->form_validation->run() && $this->input->post('patient_name') != "" && $this->input->post('patient_email') != "") {

            //Recuperation des valeurs pour le test de l'existance de la personne dans le systeme
            $patient_fullname = trim(strtolower($this->input->post('patient_name'))) . ' ' . trim(strtolower($this->input->post('patient_lastname')));
            $patient_email = trim(strtolower($this->input->post('patient_email')));
            $patient_phone = trim(strtolower($this->input->post('patient_phone')));


            //Recuperer tous les utilisateurs par leurs username pour eviter le doublon
            $patient_existant = $this->App_model->get_existant('tb_doc_patients', 'patient_fullname', $patient_fullname);


            //Infos utilisateurs existant
            $fullname_db = '';
            $email_db = '';
            $phone_db = '';

            if (!empty($patient_existant)) {
                //Compte utilisateur existant
                $userdata = array(
                    'patient_fullname' => $patient_existant->patient_fullname,
                    'patient_email' => $patient_existant->patient_email,
                    'patient_phone' => $patient_existant->patient_phone,
                );
                $fullname_db = $patient_existant->patient_fullname;
                $email_db = $patient_existant->patient_email;
                $phone_db = $patient_existant->patient_phone;
            }
            //|| ($user_existant->asset_email == $user_mail)
            if (($fullname_db == $patient_fullname) || ($email_db == $patient_email) || ($phone_db == $patient_phone)) {
                $this->setNotifie("La personne $patient_fullname ayant l'adresse e-mail $patient_email existe déjà.
                Veuillez verifier ses coordonnees en effectuant une recherche generique");
                // redirection
                return redirect(base_url() . 'UI/identification/population');
            } else {

                //Mise en tableau des informations a créés
                $data = array(

                    'patient_fullname' => $patient_fullname,
                    'patient_phone' => $patient_phone,
                    'patient_email' => $patient_email,
                    'patient_address' => trim(strtolower($this->input->post('patient_address'))),
                    'office_address' => trim(strtolower($this->input->post('office_address'))),
                    'office_phone' => trim(strtolower($this->input->post('office_phone'))),
                    'patient_profession' => trim(strtolower($this->input->post('patient_profession'))),
                    'personne_contact' => trim(strtolower($this->input->post('personne_contact'))),
                    'patient_temperature' => trim(strtolower($this->input->post('patient_temperature'))),
                    'patient_maps' => trim(strtolower($this->input->post('patient_maps'))),
                    'patient_symptome' => trim(strtolower($this->input->post('patient_symptome'))),
                    'patient_taille' => trim(strtolower($this->input->post('patient_taille'))),
                    'patient_poids' => trim(strtolower($this->input->post('patient_poids'))),
                    'patient_age' => trim(strtolower($this->input->post('patient_age'))),
                    'commune_habitee' => trim(strtolower($this->input->post('commune_habitee'))),
                    'piece_jointe' => trim(strtolower($this->input->post('piece_jointe'))),
                    'patient_resume' => trim(strtolower($this->input->post('patient_resume'))),
                    'pays_provenance' => trim(strtolower($this->input->post('pays_provenance'))),
                    'date_heure_entree' => trim(strtolower($this->input->post('date_heure_entree'))),
                    'poste_frontalier' => trim(strtolower($this->input->post('poste_frontalier'))),
                    'nom_chauffeur' => trim(strtolower($this->input->post('nom_chauffeur'))),
                    'numero_plaque' => trim(strtolower($this->input->post('numero_plaque')))
                );
                //`pays_provenance`, ``, ``, ``, ``,
                $pays_form = trim(strtolower($this->input->post('pays_provenance')));
                $pays_existant = $this->App_model->get_existant('tb_doc_pays', 'libelle', $pays_form);

                $nombre = 0;
                $pays_db = '';
                $total_db = 0;
                if (!empty($pays_existant)) {
                    $userdata_pays = array(
                        'libelle' => $pays_existant->libelle,
                        'nombre' => $pays_existant->nombre,
                    );
                    $pays_db = $pays_existant->libelle;
                    $total_db = $pays_existant->nombre;
                }
                //$this->dd($pays_existant);

                if ($pays_form == $pays_db) {
                    $nombre = $total_db + 1;
                    $date_update = date('Y-m-d H:i:s');
                    $dataValidate = compact('nombre', 'date_update');
                    $this->App_model->update_data($dataValidate, 'tb_doc_pays', array('libelle' => $pays_form));
                } else {
                    $libelle = $pays_form;
                    $nombre = 1;
                    $date_update = date('Y-m-d H:i:s');
                    $dataPays = compact('libelle', 'nombre', 'date_update');
                    $this->App_model->insert_data($dataPays, 'tb_doc_pays');
                }
                // insert datas in database

                $this->App_model->insert_data($data, 'tb_doc_patients');
                $this->setNotifie("La personne portant le nom de $patient_fullname a été créé avec succès", 'success');
                //envoi de la notification à l'utilisateur du compte créé

                $this->sendIdentifiantConnexion($patient_fullname, $patient_email, $patient_phone,
                    "Vos coordonnees d'identification à l'application Agile Sante");
                // redirection
                return redirect(base_url() . 'UI/identification/population');
            }

        } else {

            $this->setNotifie('Erreur de donnees non valide');
            //$this->session->set_flashdata('type', 'population');
            $this->addForm('identification', 'population');
        }
    }

    public function contacts()
    {

        $critere_recherche = trim(strtolower($this->input->post('critere_recherche')));
        $date_heure_entree = trim(strtolower($this->input->post('date_heure_entree')));
        $zone_selection_critere = trim(strtolower($this->input->post('zone_selection_critere')));

        $critere_value = ($critere_recherche != '') ? $critere_recherche : $date_heure_entree;

        if (($critere_value != "")) {
            //set page title
            $data['title'] = "Resultat recherche contact";
            $data['type_liste'] = "Resultat trouve de la recherche du contact selon le critere $critere_value";
            if ($zone_selection_critere == 'fullname') {
                //recherche par nom de la personne
                $data['patients'] = $this->App_model->search('tb_doc_patients', 'patient_fullname', $critere_value)->result();
            }
            if ($zone_selection_critere == 'pays') {
                //recherche par nom de la personne
                $data['patients'] = $this->App_model->search('tb_doc_patients', 'pays_provenance', $critere_value)->result();
            }
            if ($zone_selection_critere == 'plaque') {
                //recherche par nom de la personne
                $data['patients'] = $this->App_model->search('tb_doc_patients', 'numero_plaque', $critere_value)->result();
            }
            if ($zone_selection_critere == 'datetime') {
                //recherche par nom de la personne
                $data['patients'] = $this->App_model->search('tb_doc_patients', 'date_heure_entree', $critere_value)->result();
            }

            //$this->dd($data['patients']);

        } else {
            //set page title
            $data['title'] = "Trouver un contact";
            $data['type_liste'] = "Liste des personnes deja identifiees";
            //show all users
            $data['patients'] = $this->App_model->get('tb_doc_patients', 'pays_provenance')->result();
        }

        $this->load->view('includes/header', $data);
        $this->load->view('app/contacts/index', $data);
        $this->load->view('includes/footer', $data);
    }

    /**
     * View cartes
     */

    public function cartes()
    {
        /*
         * Form Data Validate
         */
        //validate id
        $this->form_validation->set_rules('patient_id', 'patient_id', 'required', array(
            'required' => 'Identifaint obligatoire',
        ));
        //validate temperature
        $this->form_validation->set_rules('patient_temperature', 'patient_temperature', 'required', array(
            'required' => 'Temperature obligatoire',
        ));
        $btn_update = $this->input->post('btn_update');
        if (isset($btn_update)) {
            if ($this->form_validation->run()) {
                //data validate
                $patient_temperature = trim(strtolower($this->input->post('patient_temperature')));
                $patient_id = trim(strtolower($this->input->post('patient_id')));
                //array data
                $date_update = date('Y-m-d H:i:s');
                $dataValidate = compact('patient_temperature', 'date_update');
                $this->App_model->update_data($dataValidate, 'tb_doc_patients', array('patient_id' => $patient_id));
                return redirect(base_url() . 'ui/cartes');
            } else {
                $this->setNotifie('Erreur de donnees non valide');
                //$this->session->set_flashdata('type', 'population');
                $this->updateForm('cartes', 'index');
            }
        } else {
            //set page title
            $data['title'] = "Trouver un contact";
            $data['type_liste'] = "Liste des personnes deja identifiees";
            //show all users
            $data['patients'] = $this->App_model->get('tb_doc_patients', 'pays_provenance')->result();
            $this->load->view('includes/header', $data);
            $this->load->view('app/cartes/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    /**
     *Create notifications
     */
    public function notes()
    {
        /*
         * Form Data Validate
         */
        //validate name user
        $this->form_validation->set_rules('asset_name', 'asset_name', 'required', array(
            'required' => 'Votre nom est obligatoire',
        )); //validate role user
        $this->form_validation->set_rules('asset_role', 'asset_role', 'required', array(
            'required' => 'Votre role est obligatoire',
        ));
        //validate subject
        $this->form_validation->set_rules('subject', 'subject', 'required', array(
            'required' => 'Objet obligatoire',
        )); //validate temperature
        $this->form_validation->set_rules('issue', 'issue', 'required', array(
            'required' => 'Contenu obligatoire',
        )); //validate temperature
        $this->form_validation->set_rules('email', 'email', 'required|valid_email', array(
            'required' => 'Contenu obligatoire',
            'valid_email' => 'Adresse mail non valide',
        ));
        $btn_update = $this->input->post('btn_notifie');
        if (isset($btn_update)) {
            if ($this->form_validation->run()) {
                //data validate
                /*
                 * `name`, `email`, `subject`, ``, `date_logged`, `note_status`, `asset_role`
                 */
                $asset_role = trim(strtolower($this->input->post('asset_role')));
                $name = trim(strtolower($this->input->post('asset_name')));
                $email = trim(strtolower($this->input->post('email')));
                $subject = trim(strtolower($this->input->post('subject')));
                $issue = trim(strtolower($this->input->post('issue')));
                //array data
                $dataValidate = compact('asset_role', 'name', 'email', 'subject', 'issue');
                $this->App_model->insert_data($dataValidate, 'tb_doc_aides');
                //send notification by email

                $this->sendNotification($name, $email, $subject, $issue);
                //redirection to list
                return redirect(base_url() . 'ui/notes');
            } else {
                $this->setNotifie('Erreur de donnees non valide');
                //$this->session->set_flashdata('type', 'population');
                $this->addForm('notes', 'index');
            }
        } else {
            //set page title
            $data['title'] = "Notifier un service ou un ministere";
            $data['type_liste'] = "Liste des notifications precedentes";
            //show all users
            $data['aides'] = $this->App_model->get('tb_doc_aides', 'subject')->result();
            $data['patients'] = $this->App_model->get('tb_doc_patients', 'pays_provenance')->result();
            $this->load->view('includes/header', $data);
            $this->load->view('app/notes/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }
    /**
     * Archivage de notes
     */
    //suppression d'un journal
    public function archiverNotes()
    {
        //id note
        $note_id = $this->input->get('note_id');
        $note_status = 'archive';
        $data_log = compact('note_status');
        if ($this->App_model->update_data($data_log, 'tb_doc_aides', array('id' => $note_id))) {

            //redirect  with message notifie
            $this->setNotifie("Archivage de la notification effectuée avec succès", "success");
            return redirect(base_url() . 'ui/notes');
        } else {
            //redirect  with message notifie
            $this->setNotifie("Erreur d'archivage de la notification");
            return redirect(base_url() . 'ui/notes');
        }
    }

    /**
     * change password user and admin
     */
    public function autoDepistage()
    {
        $id = $this->session->id;
        $data['agents'] = $this->App_model->get_onces($id, 'tb_doc_assets', 'id_asset');
        $data['depistages'] = $this->App_model->get('tb_doc_depistages', 'dep_date_update')->result();

        $data['title'] = "Auto-depistage de COVID-19";
        $this->load->view('includes/header', $data);
        $this->load->view('app/depistage/index', $data);
        $this->load->view('includes/footer', $data);
    }

    /**
     * resultats
     */
    public function depistage()
    {
        $id = $this->session->id;
        $data['agents'] = $this->App_model->get_onces($id, 'tb_doc_assets', 'id_asset');
       //$data['depistages'] = $this->App_model->get_onces($dep_fullname, 'tb_doc_depistages', 'dep_statut');
      $data['depistages'] = $this->App_model->get('tb_doc_depistages', 'dep_statut')->result();

        $data['pageDepistages'] = "Resultats d'Auto-depistage de COVID-19";

        $data['title'] = "Auto-depistage de COVID-19";
        $this->load->view('includes/header', $data);
        $this->load->view('app/depistage/index', $data);
        $this->load->view('includes/footer', $data);
    }

    /**
     * Save depistage data
     */
    public function depister()
    {
        //set page title
        $data['title'] = "Auto-depistage de COVID-19";

        //recupere infos users existants
        $data['depistages'] = $this->App_model->get('tb_doc_depistages', 'dep_date_update')->result();

        //validate user fullname
        $this->form_validation->set_rules('dep_fullname', 'dep_fullname', 'required', array(
            'required' => 'Le nom est obligatoire',
        ));
        $this->form_validation->set_rules('dep_age', 'dep_age', 'required', array(
            'required' => 'Age obligatoire',
        ));

        $this->form_validation->set_rules('dep_date_day', 'dep_date_day', 'required', array(
            'required' => 'Date obligatoire',
        ));
        $this->form_validation->set_rules('dep_symptomes', 'dep_symptomes', 'required', array(
            'required' => 'Symptomes obligatoire',
        ));
        $this->form_validation->set_rules('dep_antecedents', 'dep_antecedents', 'required', array(
            'required' => 'Antecedents medicaux obligatoire',
        ));
        $this->form_validation->set_rules('dep_voyage', 'dep_voyage', 'required', array(
            'required' => 'Champ obligatoire',
        ));
        $this->form_validation->set_rules('dep_international', 'dep_international', 'required', array(
            'required' => 'Champ obligatoire',
        ));
        $this->form_validation->set_rules('dep_contact', 'dep_contact', 'required', array(
            'required' => 'Champ obligatoire',
        ));

        # verifie if datas are corrects and redirect
        if ($this->form_validation->run() && $this->input->post('dep_age') != "" && $this->input->post('dep_fullname') != "") {

            $dataDep=array(
                'dep_fullname'=>trim(strtolower($this->input->post('dep_fullname'))),
                'dep_date_day'=>trim(strtolower($this->input->post('dep_date_day'))),
                'dep_age'=>trim(strtolower($this->input->post('dep_age'))),
                'dep_symptomes'=>trim(strtolower($this->input->post('dep_symptomes'))),
                'dep_antecedents'=>trim(strtolower($this->input->post('dep_antecedents'))),
                'dep_voyage'=>trim(strtolower($this->input->post('dep_voyage'))),
                'dep_international'=>trim(strtolower($this->input->post('dep_international'))),
                'dep_contact'=>trim(strtolower($this->input->post('dep_contact'))),
                'dep_statut'=>trim('lastIn')
            );
            $this->App_model->insert_data($dataDep, 'tb_doc_depistages');
            //send notification by email
            //$this->sendNotification($name, $email, $subject, $issue);
            //redirection to list
            $dep_statut=trim('lastIn');
            return redirect(base_url() . 'ui/depistage');
        } else {
            $this->setNotifie('Erreur de donnees non valide');
            //$this->session->set_flashdata('type', 'population');
            $this->addForm('depistage', 'index');
        }
    }

    /**
     * change password user and admin
     */
    public function changePassword()
    {
        $id = $this->session->id;
        $data['agents'] = $this->App_model->get_onces($id, 'tb_doc_assets', 'id_asset');

        $data['title'] = "Modification du mot de passe utilisateur";
        $this->load->view('includes/header', $data);
        $this->load->view('app/profil/change_password', $data);
        $this->load->view('includes/footer', $data);
    }

    /**
     * @param $type
     * user profil
     */
    public function monProfil()
    {
        $id = $this->session->id;
        $data['agents'] = $this->App_model->get_onces($id, 'tb_doc_assets', 'id_asset');

        $data['title'] = "Gestion du profil";
        $this->load->view('includes/header', $data);
        $this->load->view('app/profil/index', $data);
        $this->load->view('includes/footer', $data);
    }

    /**
     *@ Add form data
     */
    public function addForm($type = null, $page = null)
    {
        #=================forms information======================
        //$type = $this->session->type;
        $data['title'] = "create $type/$page";

        $this->load->view('includes/header', $data);
        $this->load->view('app/' . $type . '/' . $page, $data);
        $this->load->view('includes/footer', $data);
    }

    /**
     *@ Update data
     */
    public function updateForm($types = null, $page = null)
    {

        #=======================forms update data====================
        $id = $this->uri->segment(5);
        $type = $this->uri->segment(3) ?? $this->session->type;
        //infos sessions utilisateurs for edit

        $data['managers'] = $this->App_model->get('tb_doc_assets', 'asset_name')->result();
        $data['patients'] = $this->App_model->get('tb_doc_patients', 'patient_fullname')->result();

        $data['agents'] = $this->App_model->get_onces($id, 'tb_doc_patients', 'patient_id');

        $data['type_liste'] = "Liste de $type";
        $data['title'] = "update $type";
        $this->load->view('includes/header', $data);
        if ($types != '') {
            $this->load->view('app/' . $types . '/' . $page, $data);
        } else {
            $this->load->view('app/' . $type . '/index', $data);
        }
        $this->load->view('includes/footer', $data);
    }

    #======================================================================================================
    #============================envoi des mails de creation des comptes==================================

    public function sendNotification($username, $email, $subject, $content)
    {
        require_once APPPATH . 'PHPMailer/src/Exception.php';
        require_once APPPATH . 'PHPMailer/src/PHPMailer.php';
        require_once APPPATH . 'PHPMailer/src/SMTP.php';
        $from = "";
        $cc1 = "";
        $addresses = mb_split(";", $email);
        if (count($addresses) > 1) {
            $from = $addresses[0];
            $cc1 = $addresses[1];
        } else {
            $from = $email;
        }
        $mail = new PHPMailer(TRUE);
        try {
            $mail->setFrom('mwez.rubuz@congoagile.net', 'Agile Sante Application');
            $mail->addAddress($from, $email);
            if (count($addresses) > 1) {
                $mail->addCC($cc1);
            }
            //$mail->addCC('info@congoagile.net', 'Webmaster IT Support');
            $mail->Subject = $subject;

            $mail->isHTML(true);

            $mail->CharSet = 'UTF-8';

            $mail->Body = '<html><strong>Voici la notification envoyee par notre agent  ' . $username . '<br/></strong>
            au sujet de ' . $subject . '<br/>.
            <strong> Veuillez trouver ci-dessous les details ci-apres  <br/>
            ' . $content . '<br/></strong>
            <p> Veuillez suivre le lien ci-après pour vous connecter.</p><a href="https://agilesante.congoagile.net"> 
            Agile Sante Application.</a></html>';

            /* SMTP parameters. */

            $mail->isSMTP();

            //$mail->SMTPDebug = 2;

            /* SMTP server address. */
            $mail->Host = 'mail.congoagile.net';

            /* Use SMTP authentication. */
            $mail->SMTPAuth = TRUE;

            /* Set the encryption system. */
            $mail->SMTPSecure = 'tls';

            /* SMTP authentication username. */
            $mail->Username = 'mwez.rubuz@congoagile.net';

            /* SMTP authentication password. */
            $mail->Password = '*ELIEMWEZ@EMAR.RUCHI11220';

            /* Set the SMTP port. */
            $mail->Port = 587;
            //$mail->Port = 465;

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            /* Finally send the mail. */
            //$mail->send();
            //return $redirect;
            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
            }

        } catch (Exception $e) {
            //return $redirect;
            //echo $e->errorMessage();
        }
    }
}