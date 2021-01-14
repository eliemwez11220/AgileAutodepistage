<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require_once 'C:\composer\vendor\autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Secure extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        // charge all models
        $this->load->model('Secure_model');
        $this->load->model('App_model');
    }

    /**
     *@ Home function
     */
    public function index()
    {
        #verification de l'existance d'un compte administrateur pour la configuration du systeme
        $data['admin_exist'] = $this->Secure_model->admin_existant();
        #redirection if admin or agent is logged
        if ($this->session->userdata('authentified_admin')) {
            // code...
            return redirect(base_url() . 'admin/dashboard');
        } elseif ($this->session->userdata('authentified_agent')) {
            // code...
            $user_session = $this->session->fullname ? $this->session->fullname : $this->session->username;
            return redirect(base_url() . $user_session . '/dashboard');
        }

        # charge of the home page
        $data['title'] = 'Authentification des utilisateurs';
        $this->load->view('site/common/header',$data);
        $this->load->view('session/login', $data);
        $this->load->view('site/common/footer',$data);
    }

    #=======================function create admin account activing all systeme
    public function adminAccount()
    {
        # recuperation of username
        $this->form_validation->set_rules('nom_complet', 'nom_complet', 'required', array(
            'required' => 'Le nom complet est obligatoire',
        ));
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => 'Le nom utilisateur est obligatoire',
        ));

        # recuperation of password
        $this->form_validation->set_rules('password', 'Paswword', 'min_length[5]|max_length[75]', 'required',
            array(
                'min_length' => 'Le champ %s doit contenir au moins cinq caractères',
                'max_length' => 'Le champ %s doit contenir au plus septante cinq caractères',
                'required' => 'Le champ %s est obligatoire',
            ));
        # confirmation mot de passe créé pour eviter la mauvaise saisie
        $this->form_validation->set_rules('password_confirmation', 'Password_confirmation', 'matches[password]',
            array(
                'matches' => 'Le champ %s doit correspondre avec le champ nouveau mot de passe'
            )
        );
        # verifie si les donnees du formulaire sont valides
        if ($this->form_validation->run()) {
            // recupere le username
            $asset_username = $this->input->post('username');
            //recupere le nom complet
            $asset_name = $this->input->post('nom_complet');
            $asset_email = $this->input->post('email');
            //le role
            $asset_type = 'administrateur';
            $asset_role = 'administrateur';
            //le statut
            $asset_status = 'online';
            //algorithme de cryptage du mot de passe
            $options = array(
                'cost' => 12,
            );
            //crypter mot de passe utilisateur
            $asset_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
            //compacter les données avant insertion dans la base
            // date creation et id_user sont auto
            $data_admin = compact('asset_name', 'asset_username', 'asset_password', 'asset_type',
                'asset_email', 'asset_role', 'asset_status');
            //insertion de données dans la base puis teste de valdation
            if ($this->Secure_model->insert_data($data_admin, 'tb_doc_assets')) {
                //confirmation par message
                $this->setNotifie("Le compte admin a ete creee avec succès!", 'success');
                //Connexion automatique
                $infos_admin = $this->Secure_model->infos_admin($asset_email, $asset_password);

                // Creation du tableau de donnees de l'admin
                $userdata = array(
                    'id' => $infos_admin->id_asset,
                    'fullname' => $infos_admin->asset_name,
                    'username' => $infos_admin->asset_username,
                    'password' => $infos_admin->asset_password,
                    'email' => $infos_admin->asset_email,
                    'status' => $infos_admin->asset_status,
                    'active' => $infos_admin->asset_active,
                    'type' => $infos_admin->asset_type,
                    'authentified_admin' => TRUE
                );
                // Stocker les infos admin dans la session
                $this->session->set_userdata($userdata);
                //message de bienvenue
                $name_admin = ucfirst($asset_name);
                $this->setNotifie("$name_admin, Bienvenue sur votre espace d'administration de 
                TokDoc Monganga Application,
                         vous êtes connecté entant qu'administrateur système", 'success');
                // rediret admin
                return redirect(base_url() . 'admin/dashboard');

            } else {
                //si difficile de creer le compte admin
                $this->setNotifie("Impossible de creer le compte administrateur");
                return redirect(base_url() . 'secure/login');
            }
        } else {
            $this->setNotifie('');
            return redirect(base_url() . 'secure/login');
        }
    }

    /**
     * @Verifie datas coming from login form
     */
    public function login()
    {
        # recuperation of username
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => 'Username is required',
        ));
        # recuperation of password
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => 'Password is required',
        ));
        # vérification de l'existance du compte administrateur

        $data['admin_exist'] = $this->Secure_model->admin_existant();

        # verifie if datas are corrects and redirect
        if ($this->form_validation->run()) {

            // stock username and password
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // checking data in the database
            if ($this->Secure_model->infos_admin($username, $password)) {
                // stock data from database
                $infos_admin = $this->Secure_model->infos_admin($username, $password);

                // stock data in array
                $userdata = array(
                    'id' => $infos_admin->id_asset,
                    'fullname' => $infos_admin->asset_name,
                    'username' => $infos_admin->asset_username,
                    'password' => $infos_admin->asset_password,
                    'email' => $infos_admin->asset_email,
                    'status' => $infos_admin->asset_status,
                    'role' => $infos_admin->asset_role,
                    'active' => $infos_admin->asset_active,
                    'type' => $infos_admin->asset_type,
                    'authentified_admin' => TRUE
                );
                if ($infos_admin->asset_status == 'online') {
                    // stock datas in the session
                    $this->session->set_userdata($userdata);
                    //message de bienvenue
                    $name_admin = ucfirst($infos_admin->asset_name);
                    $this->setNotifie("$name_admin, Bienvenue sur votre espace d'administration de 
                        Agile Sante Application, vous êtes connecté entant qu'administrateur système", 'success');
                    // rediret admin
                    return redirect(base_url() . 'admin/dashboard');
                } else {
                    # Redirect to login page and show the message error
                    $data['page_error'] = "Session administrateur bloquée, Car elle est ouverte par un autre.";
                    $data['title'] = "Session administrateur bloquée, Car elle est ouverte par un autre.";
                    $this->load->view('site/common/header',$data);
                    $this->load->view('session/login', $data);
                    $this->load->view('site/common/footer',$data);
                }

            } elseif ($this->Secure_model->infos_agent($username, $password)) {
                // stock datas from database
                $infos_agent = $this->Secure_model->infos_agent($username, $password);
                //$pass_code_default = sha1($this->_encrypt . (123456));
                $pass_code_default = "123456";
                $options = array('cost' => 12);
                // stock datas in array
                if ($infos_agent) {
                    $userdata = array(
                        'id' => $infos_agent->id_asset,
                        'fullname' => $infos_agent->asset_name,
                        'username' => $infos_agent->asset_username,
                        'password' => $infos_agent->asset_password,
                        'email' => $infos_agent->asset_email,
                        'status' => $infos_agent->asset_status,
                        'role' => $infos_agent->asset_role,
                        'phone' => $infos_agent->asset_phone,
                        'active' => $infos_agent->asset_active,
                        'type' => $infos_agent->asset_type,
                        'authentified_agent' => TRUE
                    );
                    //verification du statut de l'agent
                    if ($infos_agent->asset_status == 'online') {
                        if (password_verify($pass_code_default, $infos_agent->asset_password)) {
                            $_SESSION['users'] = $infos_agent->asset_username;
                            $_SESSION['users_id'] = $infos_agent->id_asset;
                            //$this->session->set_userdata($userdata);
                            return redirect(base_url() . 'secure/changePasswordDefault');
                        } else {
                            if($infos_agent->asset_role == 'Manager'){
                                $this->session->set_userdata($userdata);
                                //message de bienvenue
                                $username = strtoupper($infos_agent->asset_name);
                                $this->setNotifie("$username, Bienvenue sur votre espace d'administration de 
                                            Agile depistage Application, 
                                            vous êtes connecté entant qu'utilisateur manager", 'success');
                                return redirect(base_url() . 'manager/dashboard');
                            }else{
                                $this->session->set_userdata($userdata);
                                //message de bienvenue
                                $username = strtoupper($infos_agent->asset_name);
                                $this->setNotifie("$username, Bienvenue sur votre espace d'administration de 
                                            Agile Sante Application, 
                                            vous êtes connecté entant qu'utilisateur", 'success');
                                return redirect(base_url() . 'users/dashboard');
                            }
                        }
                    } else {
                        # Redirect to login page and show the message error
                        $data['page_error'] = "Votre compte utilisateur est déjà bloqué.
                     Veuillez conctacter l'administrateur système";
                        $data['title'] = "Account bloqued";
                        $this->load->view('site/common/header',$data);
                        $this->load->view('session/login', $data);
                        $this->load->view('site/common/footer',$data);
                    }
                } else {
                    // redirect if username or password is not true
                    $data['page_error'] = "Compte utilisateur non existant dans le système.";
                    $data['title'] = "User not found";
                    $this->load->view('site/common/header',$data);
                    $this->load->view('session/login', $data);
                    $this->load->view('site/common/footer',$data);
                }
            } else {
                // redirect if username or password is not true
                $data['page_error'] = "Mot de passe ou nom utilisateur incorrect.";
                $data['title'] = "Identifiants non existant ";
                $this->load->view('site/common/header',$data);
                $this->load->view('session/login', $data);
                $this->load->view('site/common/footer',$data);
            }
        } else {
            // redirect if username or password is not true
            $data['page_error'] = "Vous devez disposer un compte utilisateur pour accéder à cette application.
                         Veuillez conctacter l'administrateur système pour plus de détails.";
            $data['title'] = "Identifiants non existant ";
            $this->load->view('site/common/header',$data);
            $this->load->view('session/login', $data);
            $this->load->view('site/common/footer',$data);
        }
    }

    # ===========================functions de changement du mot de passe par defaut===================================
    public function changePasswordDefault()
    {
        $data['title'] = "Changement mot de passe pour la premiere connexion";
        $this->load->view('site/common/header',$data);
        $this->load->view('session/main', $data);
        $this->load->view('site/common/footer',$data);
    }

    //reset password
    public function resetPassword()
    {
        $data['title'] = "Reset password";
        $this->load->view('site/common/header',$data);
        $this->load->view('session/reset_password');
        $this->load->view('site/common/footer',$data);
    }

    //reset password via email link

    public function passwordResetLink()
    {
        //$data['view'] = 'session/vue_session_expire';

        $data['title'] = "Link Reset password";
        $this->load->view('session/reset_password_link');
    }

    //reset password via email
    public function passwordResetEmail()
    {
        $asset_user_email = $this->input->post('email');
        $nvo_mot_pass = $this->input->post('nvo_mot_pass');
        $conf_mot_pass = $this->input->post('conf_mot_pass');

        $options = array(
            'cost' => 12,
        );
        if ($asset_user_email != "") {
            if ($nvo_mot_pass == $conf_mot_pass) {
                //$asset_password=$nvo_mot_pass;
                $asset_password = password_hash($nvo_mot_pass, PASSWORD_BCRYPT, $options);

                $data_ut = compact('asset_password');
                //mise à jour du mot de passe
                if ($this->App_model->update_data($data_ut, 'tb_doc_assets', array('asset_email' => $asset_user_email))) {

                    $this->setNotifie("Veuillez vous connecter à nouveau.", 'success');
                    // rediret agent
                    return redirect(base_url() . 'secure/login');

                } else {
                    $this->setNotifie("Impossible de mettre à jour votre mot de passe utilisateur !");
                    $data['error_update'] = 'Impossible de mettre à jour votre mot de passe utilisateur !';
                    $this->load->view('session/login', $data);
                }
            } else {
                $this->setNotifie("Le nouveau mot de passe utilisateur doit etre égal au mot de passe de confirmation!");
                $data['error_update'] = 'Le nouveau mot de passe utilisateur doit etre égal au mot de passe de confirmation';
                $this->load->view('session/login', $data);
            }
        } else {
            $this->setNotifie("Erreur de connexion");
            $data['error_update'] = 'Adresse email incorrect';
            $data['title'] = 'Adresse email incorrect';
            $this->load->view('site/common/header',$data);
            $this->load->view('session/login', $data);
            $this->load->view('site/common/footer',$data);
        }
    }

    //reset password form
    public function resetPasswordForm()
    {
        $asset_user_email = $this->input->post('email');
        # recuperation of username
        $this->form_validation->set_rules('email', 'email', 'required', array(
            'required' => 'Email is required',
        ));

        if ($asset_user_email != "") {

            //Recuperation des infos de connexion
            $user_data = $this->Secure_model->info_by_email($asset_user_email);
            //$asset_password=$nvo_mot_pass;
            if ($user_data == false) {
                $this->setNotifie("L'adresse email $asset_user_email est introuvable!");
                $data['error_page'] = 'L\'adresse email  est introuvable!';
                $data['title'] = 'L\'adresse email  est introuvable!';
                $this->load->view('site/common/header',$data);
                $this->load->view('session/reset_password', $data);
                $this->load->view('site/common/footer',$data);
            } else {

                $time = rand(1000, 9999);
                $token = sha1(md5($time));

                $options = array(
                    'cost' => 12,
                );
                //
                $new_token = password_hash($token, PASSWORD_BCRYPT, $options);

                $data = array(
                    'email' => $asset_user_email,
                    'token' => $new_token,
                );
                if ($this->App_model->insert_data($data, 'tb_doc_passwords')) {

                    $link = base_url() . 'secure/password_reset/' . $new_token;
                    $body = "Cliquez sur le lien suivant pour réinitialiser votre mot de passe: " . $link;
                    //Email email
                    $this->sendEmail($asset_user_email, "Reinitialisation du mot de passe", $body);

                    $this->setNotifie("Un email de réinitialisation a été envoyé à votre adresse email.", 'success');
                    $data['title'] = "Reset password";
                    $this->load->view('site/common/header',$data);
                    $this->load->view('session/reset_password', $data);
                    $this->load->view('site/common/footer',$data);
                }
                else{
                    $data['page_error'] = "Erreur de sauvegarde de votre session de reinitialisation de votre de passe.";
                    $data['title'] = "Erreur email reset password";
                    $this->load->view('site/common/header',$data);
                    $this->load->view('session/reset_password', $data);
                    $this->load->view('site/common/footer',$data);
                }
            }
        }else{
            $data['page_error'] = "Veuillez saisir une adresse mail valide.";
            $data['title'] = "Erreur email manquante";
            $this->load->view('site/common/header',$data);
            $this->load->view('session/reset_password', $data);
            $this->load->view('site/common/footer',$data);
        }

    }

    //send issue recorded
    public function helpUsers()
    {
//        $tb = mb_split("/",current_url());
//        $redirect = $tb[count($tb)-2]."/".$tb[count($tb)-1];

        $tb = mb_split("/", current_url());

        $redirect = "";
        for ($i = 8; $i < count($tb); $i++) {
            $redirect = $redirect . $tb[$i] . "/";
        }

        # recuperation of username
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => 'Email is required',
        ));
//
        $this->form_validation->set_rules('name', 'name', 'required', array(
            'required' => 'Name is required',
        ));

//
        $this->form_validation->set_rules('subject', 'Subject', 'required', array(
            'required' => 'Subject is required',
        ));
//
        $this->form_validation->set_rules('issue', 'Issue', 'required', array(
            'required' => 'Issue is required',
        ));

        # verifie if datas are corrects and redirect
        if ($this->form_validation->run()) {

            $asset_user_name = $this->input->post('name');

            $asset_user_email = $this->input->post('email');

            $asset_user_subject = $this->input->post('subject');

            $asset_user_issue = $this->input->post('issue');

            if ($asset_user_name != "" && $asset_user_email != "" && $asset_user_subject != "" && $asset_user_issue != "") {

                $data = array(
                    'name' => $asset_user_name,
                    'email' => $asset_user_email,
                    'subject' => $asset_user_subject,
                    'issue' => $asset_user_issue
                );

                if ($this->App_model->insert_data($data, 'tb_doc_aides')) {
                    //send Email to Admin
                    $this->sendIssueToAdmin($data);
                    $this->setNotifie("Votre problème a été soumis avec succès", 'success');
                    // rediret agent
                    return redirect(base_url($redirect));

                }
            }
        }
    }

    //send issue to super Admin
    public function helpAdmin()
    {
        $tb = mb_split("/", current_url());

        $redirect = "";
        for ($i = 8; $i < count($tb); $i++) {
            $redirect = $redirect . $tb[$i] . "/";
        }
        # recuperation of username
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => 'Email is required',
        ));
//
        $this->form_validation->set_rules('name', 'name', 'required', array(
            'required' => 'Name is required',
        ));

//
        $this->form_validation->set_rules('subject', 'Subject', 'required', array(
            'required' => 'Subject is required',
        ));
//
        $this->form_validation->set_rules('issue', 'Issue', 'required', array(
            'required' => 'Issue is required',
        ));

        # verifie if datas are corrects and redirect
        if ($this->form_validation->run()) {

            $asset_user_name = $this->input->post('name');

            $asset_user_email = $this->input->post('email');

            $asset_user_subject = $this->input->post('subject');

            $asset_user_issue = $this->input->post('issue');

            if ($asset_user_name != "" && $asset_user_email != "" && $asset_user_subject != "" && $asset_user_issue != "") {

                $data = array(
                    'name' => $asset_user_name,
                    'email' => $asset_user_email,
                    'subject' => $asset_user_subject,
                    'issue' => $asset_user_issue
                );

                if ($this->App_model->insert_data($data, 'tb_doc_aides')) {
                    //send Email to Admin
                    $this->sendIssueToSuperAdmin($data);
                    $this->setNotifie("Votre problème a été soumis avec succès", 'success');
                    // rediret agent
                    return redirect(base_url() . $redirect);

                }
            }
        }

    }

    #changement du mot de passe et connexion automatique après changement
    public function changePasswordSession()
    {
        $asset_user_id = trim(($this->input->post('username_id')));
        $asset_username = trim($this->input->post('username'));
        $nvo_mot_pass = trim($this->input->post('nvo_mot_pass'));
        $conf_mot_pass = trim($this->input->post('conf_mot_pass'));

        $options = array(
            'cost' => 12,
        );
        if ($asset_username != "") {
            if ($nvo_mot_pass == $conf_mot_pass) {

                //$asset_password=$nvo_mot_pass;
                $asset_password = password_hash($nvo_mot_pass, PASSWORD_BCRYPT, $options);

                $data_ut = compact('asset_password');
                //mise à jour du mot de passe
                if ($this->App_model->update_data($data_ut, 'tb_doc_assets', array('id_asset' => $asset_user_id))) {
                    //recuperation des infos de la session utilisateur du changement du mot de passe
                    $infos_agents = $this->Secure_model->infos_agent($asset_username, $nvo_mot_pass);

                    // stock datas in array
                    $userdata_session = array(
                        'id' => $infos_agents->id_asset,
                        'fullname' => $infos_agents->asset_name,
                        'username' => $infos_agents->asset_username,
                        'status' => $infos_agents->asset_status,
                        'email' => $infos_agents->asset_email,
                        'role' => $infos_agents->asset_role,
                        'active' => $infos_agents->asset_active,
                        //'authentified_agent' => TRUE
                    );
                    //test du groupe auquel l'utilisateur appartient
                    if ($infos_agents->asset_type == "administrateur") {
                        //Connexion  des administratifs
                        // stock datas in the session
                        $this->session->set_userdata($userdata_session);
                        //message de bienvenue
                        $username = strtoupper($infos_agents->asset_username);
                        $this->setNotifie("$username, Bienvenue sur votre espace d'administration de 
                                            Agile Sante Application, vous êtes connecté entant que Praticien", 'success');
                        // redirect administratif
                        return redirect(base_url() . 'admin/dashboard');

                    } elseif ($infos_agents->asset_type == "utilisateur") {
                        //Connexion  des financiers
                        // stock datas in the session
                        $this->session->set_userdata($userdata_session);
                        //message de bienvenue
                        $username = strtoupper($infos_agents->asset_username);
                        $this->setNotifie("$username, Bienvenue sur votre espace d'administration de 
                                            Agile Sante Application, 
                                            vous êtes connecté entant que gestionnaire", 'success');
                        // redirect administratif
                        return redirect(base_url() . 'users/dashboard');
                    }else{
                        $this->setNotifie("Veuillez vous connecter en nouveau", 'success');
                        // redirect administratif
                        return redirect(base_url() . 'users/dashboard');
                    }

                } else {
                    $this->setNotifie("Impossible de mettre à jour votre mot de passe utilisateur !");
                    $data['error_update'] = 'Impossible de mettre à jour votre mot de passe utilisateur !';
                    $data['title'] = 'Impossible de mettre à jour votre mot de passe utilisateur !';
                    $this->load->view('site/common/header',$data);
                    $this->load->view('session/login', $data);
                    $this->load->view('site/common/footer',$data);
                }
            } else {
                $this->setNotifie("Le nouveau mot de passe utilisateur doit etre égal au mot de passe de confirmation!");
                $data['error_update'] = 'Le nouveau mot de passe utilisateur doit etre égal au mot de passe de confirmation';
                $data['title'] = 'Le nouveau mot de passe utilisateur doit etre égal au mot de passe de confirmation';
                $this->load->view('site/common/header',$data);
                $this->load->view('session/login', $data);
                $this->load->view('site/common/footer',$data);
            }
        } else {
            $this->setNotifie("Mise à jour du mot de passe non effectuée en raison d'une erreur survenue lors de la validation de données !");
            $data['error_update'] = 'Nom utilisateur non trouvé';
            $data['title'] = 'Nom utilisateur non trouvé';
            $this->load->view('site/common/header',$data);
            $this->load->view('session/login', $data);
            $this->load->view('site/common/footer',$data);
        }
    }

    public function sendEmail($email, $subject, $body)
    {

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
            $mail->setFrom('mwez.rubuz@congoagile.net', 'School Management Application');
            $mail->addAddress($from, 'IT Support');
            if (count($addresses) > 1) {
                $mail->addCC($cc1);
            }

            $mail->addCC('info@congoagile.net', 'Webmaster IT Support');
            $mail->addCC("eliemwez.rubuz@gmail.com", "Elie Mwez Rubuz - CEO Congo Agile");
            $mail->Subject = $subject;

            $mail->isHTML(true);

            $mail->CharSet = 'UTF-8';

            $mail->Body = $body;
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
            $mail->Port = 465;

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

    //send issue to Local Administrateur
    public function sendIssueToAdmin($data)
    {
        if (is_array($data)) {

        }
        $from = $data['email'];
        $subject = $data['subject'];
        $name = $data['name'];
        $issue = $data['issue'];

        //get Admin email adsresses
        $admins = $this->Main_model->getAllAdmin();


        $mail = new PHPMailer(TRUE);
        try {
            $mail->setFrom('mwez.rubuz@congoagile.net', 'School Management Application');
            $mail->addAddress($from, $name);

            foreach ($admins as $admin) {
                $mail->addCC($admin->asset_email, $admin->asset_username);
            }
            $mail->addCC('info@congoagile.net', 'Webmaster IT Support');
            $mail->addCC("eliemwez.rubuz@gmail.com", "Elie Mwez Rubuz - CEO Congo Agile");
            $mail->Subject = $subject;

            $mail->isHTML(true);

            $mail->CharSet = 'UTF-8';

            $mail->Body = "Salut l'équipe,<br/> L'utilisateur " . $name . " a rencontré le problème décrit  ci-dessous:<br/>
                                <br/><strong>" . $issue . "</strong> <br/><br/> dans l'application School Management";

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
            $mail->Port = 465;
            //others options sending email to user
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

    //send Email to super Admin

    //send issue to Local Administrateur
    public function sendIssueToSuperAdmin($data)
    {
        if (is_array($data)) {

        }
        $from = $data['email'];
        $subject = $data['subject'];
        $name = $data['name'];
        $issue = $data['issue'];

        //get Admin email adsresses

        $mail = new PHPMailer(TRUE);
        try {

            $mail->setFrom('mwez.rubuz@congoagile.net', 'School Management Application');
            $mail->addAddress($from, $name);
            $mail->addCC('info@congoagile.net', 'Webmaster IT Support');
            $mail->addCC("eliemwez.rubuz@gmail.com", "Elie Mwez Rubuz - CEO Congo Agile");

            $mail->Subject = $subject;
            $mail->isHTML(true);

            $mail->CharSet = 'UTF-8';

            $mail->Body = "Salut l'équipe,<br/> L'administrateur " . $name . " a 
            rencontré le problème décrit  ci-dessous:<br/><br/>
            <strong>" . $issue . "</strong> <br/><br/> dans l'application School Management";

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
            $mail->Port = 465;
            //others options sending mail
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


    #=========================================================================
    #                          deconnexion function
    #=============================================================================================
    public function logout()
    {
        $this->session->sess_destroy();
        return redirect(base_url() . 'secure/index');
    }
}
