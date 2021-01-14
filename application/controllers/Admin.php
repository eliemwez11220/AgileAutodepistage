<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        // verifie of login
        $this->is_logged();

        // charge all models
        $this->load->model('Secure_model');
        $this->load->model('App_model');

        //derniere connexion prise en compte
        $this->last_connexion();

    }

    /**
     *@ Check is admin is logged
     */
    private function is_logged()
    {
        if (!$this->session->authentified_admin) {
            // code...
            return redirect(base_url() . 'secure/index');
        }
    }
    //mettre a jour la date de derniere connexion
    private function last_connexion()
    {
        if ($this->session->authentified_admin) {
            // code...
            $date_connect=date('Y-m-d H:s:i');
            $data = array(
                'asset_connected' => $date_connect,
                'asset_active' => 'oui',
            );
            // update
            $id = $this->session->id;
            $this->App_model->update_data($data, 'tb_doc_assets',  array('id_asset' => $id));
        }
    }

    public function index(){
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

    ########################################   *   ########################################
    #
    #								 # AGENT FUNCTIONS
    #
    ########################################   *   ########################################

    /**
     *@ List of agents and admin
     */
    public function compteUsers()
    {
        $data['title'] = "Gestion comptes utilisateurs";
        $data['managers'] = $this->App_model->get('tb_doc_assets', 'asset_created')->result();
        $data['patients'] = $this->App_model->get('tb_doc_patients', 'pays_provenance')->result();
        $data['pays'] = $this->App_model->get('tb_doc_pays', 'libelle')->result();
        $this->load->view('includes/header', $data);
        $this->load->view('app/agent/index', $data);
        $this->load->view('includes/footer', $data);
    }

    /**
     *@ Add an agent
     */
    public function createAccount()
    {
        //recupere infos users existants
        $data['users'] = $this->App_model->get('tb_doc_assets', 'asset_created')->result();
        $data['title'] = "Creation compte utilisateur";

        //validate user fullname
        $this->form_validation->set_rules('asset_name', 'asset_name', 'required', array(
            'required' => 'Le nom complet est obligatoire',
        ));
        $this->form_validation->set_rules('asset_username', 'asset_username', 'required', array(
            'required' => 'Le nom utilisateur est obligatoire',
        ));

        $this->form_validation->set_rules('asset_email', 'asset_email', 'required', array(
            'required' => 'L\'email est obligatoire',
        ));

        $this->form_validation->set_rules('asset_password', 'asset_password', 'required', array(
            'required' => 'Le mot de passe est obligatoire',
        ));
        $this->form_validation->set_rules('asset_role', 'asset_role', 'required', array(
            'required' => 'Le role est obligatoire',
        ));

        # verifie if datas are corrects and redirect
        if ($this->form_validation->run() && $this->input->post('asset_type') != "" && $this->input->post('asset_email') != "") {

            $user_name = trim(strtolower($this->input->post('asset_name')));
            $user_username = trim(strtolower($this->input->post('asset_username')));
            $user_mail = trim(strtolower($this->input->post('asset_email')));
            $user_password_default = $this->input->post('asset_password');

            //Recuperer tous les utilisateurs par leurs username pour eviter le doublon
            $user_existant = $this->App_model->get_existant('tb_doc_assets','asset_username',$user_name);

            //Infos utilisateurs existant
            $username_db = '';
            $usermail_db = '';
            if (!empty($user_existant)) {
                //Compte utilisateur existant
                $userdata = array(
                    'asset_name' => $user_existant->asset_name,
                    'asset_username' => $user_existant->asset_username,
                    'asset_email' => $user_existant->asset_email,
                    'asset_password' => $user_existant->asset_password
                );
                $username_db = $user_existant->asset_username;
                $usermail_db = $user_existant->asset_email;
            }
            //|| ($user_existant->asset_email == $user_mail)
            if (($username_db == $user_name) || ($usermail_db == $user_mail)) {
                $this->setNotifie("L'utilisateur $user_name ayant l'adresse e-mail $user_mail existe déjà.");
                // redirection
                return redirect(base_url() . 'admin/compteUsers');
            } else {
                //ajout des elements à l'algorithme de cryptage.
                $options = array(
                    'cost' => 12,
                );
                //Mise en tableau des informations du compte a créé
                $data = array(
                    'asset_name' => $user_name,
                    'asset_username' => $user_username,
                    'asset_password' => password_hash($this->input->post('asset_password'), PASSWORD_BCRYPT, $options),
                    'asset_email' => $user_mail,
                    'asset_type' => $this->input->post('asset_type'),
                    'asset_role' => $this->input->post('asset_role'),
                );
                // insert datas in database
                $this->App_model->insert_data($data, 'tb_doc_assets');
                $this->setNotifie("Le compte utilisateur de $user_name a été créé avec succès", 'success');
                //envoi de la notification à l'utilisateur du compte créé

                $this->sendIdentifiantConnexion($user_mail, $user_name, $user_password_default,
                    "Vos identifiants de connexion à l'application Agile Sante");
                // redirection
                return redirect(base_url() . 'admin/compteUsers');
            }

        } else {
            $this->setNotifie('Erreur de création du compte utilisateur en raison système');
            $this->session->set_flashdata('type', 'compteUsers');
            $this->addForm();
        }
    }

    /**
     * Edit Agent Form
     */
    public function updateAccount()
    {
        //set title name
        $data['title'] = "Update user account";
        //validation data with form_vaalidation librairie
        $this->form_validation->set_rules('asset_name', 'asset_name', 'required', array(
            'required' => 'Le nom complet est obligatoire',
        ));
        $this->form_validation->set_rules('asset_username', 'asset_username', 'required', array(
            'required' => 'Le nom utilisateur est obligatoire',
        ));

        $this->form_validation->set_rules('asset_email', 'asset_email', 'required', array(
            'required' => 'L\'email est obligatoire',
        ));
        $this->form_validation->set_rules('asset_role', 'asset_role', 'required', array(
            'required' => 'Le role est obligatoire',
        ));

        # verifie if datas are corrects and redirect
        if ($this->form_validation->run() && $this->input->post('asset_type') != "" && $this->input->post('asset_email') != "") {

            //get data from form
            $user_name = trim(strtolower($this->input->post('asset_name')));
            $user_username = trim(strtolower($this->input->post('asset_username')));
            $user_mail = trim(strtolower($this->input->post('asset_email')));
            $user_password_default = '123456';
            $options = array(
                'cost' => 12,
            );
            //Mise en tableau des informations du compte a créé
            //put all data in array and saved
            $data = array(
                'asset_name' => $user_name,
                'asset_username' => $user_username,
                'asset_email' => $user_mail,
                'asset_password' => password_hash($user_password_default, PASSWORD_BCRYPT, $options),
                'asset_type' => $this->input->post('asset_type'),
                'asset_role' => $this->input->post('asset_role'),
            );
            // update data
            $id = $this->uri->segment(4);
            if ($this->App_model->update_data($data, 'tb_doc_assets',  array('id_asset' => $id))) {
                $this->setNotifie("Modification du compte utilisateur de $user_name effectuée avec succès", "success");
                // redirection
                $this->sendIdentifiantConnexion($user_mail, $user_username, $user_password_default,
                    "Update de vos identifiants d'access à l'application Tokdoc Monganga");
                return redirect(base_url() . 'admin/compteUsers');
            } else {
                $this->setNotifie("Erreur de modification du compte utilisateur");
                $this->session->set_flashdata('type', 'agent');
                $this->updateForm();
            }

        } else {
            //this->get_msg("Erreur de modification du compte utilisateur");
            $this->session->set_flashdata('type', 'agent');
            $this->updateForm();
        }
    }
    public function resetPassword()
    {
        //id user
        $id_user = $this->input->get('id_asset');
        //algo cryptage
        $options = array(
            'cost' => 12,
        );
        $asset_password = password_hash("123456", PASSWORD_BCRYPT, $options);
        $data_user = compact('asset_password');
        if ($this->App_model->update_data($data_user, 'tb_doc_assets', array('id_asset' => $id_user))) {

            //redirect  with message notifie
            $this->setNotifie("Réinitialisation effectuée du mot de passe utilisateur", "success");
            return redirect(base_url() . 'admin/compteUsers');

        } else {
            return redirect(base_url() . 'admin/compteUsers');
        }
    }

    # bloquer agent - desactivation d'un compte utilisateur
    public function bloquerAgent()
    {
        //id user
        $id_user = $this->input->get('id_asset');
        $asset_status = 'offline';
        $data_user = compact('asset_status');
        if ($this->App_model->update_data( $data_user,'tb_doc_assets', array('id_asset' => $id_user))) {

            //redirect  with message notifie
            $this->setNotifie("Agent bloqué - compte utilisateur désactivé avec succès", "success");
            return redirect(base_url() . 'admin/compteUsers');

        } else {
          return redirect(base_url() . 'admin/compteUsers');
        }
    }

    # débloquer agent - activation d'un compte utilisateur
    public function debloquerAgent()
    {
        //id user
        $id_user = $this->input->get('id_asset');
        $asset_status = 'online';
        $data_user = compact('asset_status');
        if ($this->App_model->update_data( $data_user,'tb_doc_assets', array('id_asset' => $id_user))) {

            //redirect  with message notifie
            $this->get_msg("Agent débloqué - compte utilisateur activé avec succès", "success");
            return redirect(base_url() . 'admin/compteUsers');

        } else {
            return redirect(base_url() . 'admin/compteUsers');
        }
    }

    ########################################   *   ########################################
    #
    #					     	# GENERIC FUNCTIONS
    #
    ########################################   *   ########################################

    /**
     *@ Add data
     */
    public function addForm()
    {
        #=================forms information======================
        $type = $this->uri->segment(3) ?? $this->session->type;
        //$typeValue = $this->uri->segment(4) ?? $this->session->type;
        $data['title'] = "Gestion de $type";
        $this->load->view('includes/header', $data);
        $this->load->view('app/'.$type.'/index', $data);
        $this->load->view('includes/footer', $data);
    }

    /**
     *@ Update data
     */
    public function updateForm()
    {

        #=======================forms update data====================
        $id = $this->uri->segment(4);
        $type = $this->uri->segment(3) ?? $this->session->type;
        //infos sessions utilisateurs for edit
        $data['agents'] = $this->App_model->get_info_by_table_by_id($id, 'tb_doc_assets', 'id_asset');
        $data['managers'] = $this->App_model->get('tb_doc_assets', 'asset_name')->result();

        //set title page
        $data['title'] = "Update de $type";
        $this->load->view('includes/header', $data);
        $this->load->view('app/'.$type.'/index', $data);
        $this->load->view('includes/footer', $data);
    }

    #====================================edition du profil utilisateur===============================charger vue profil

    /**
     * @param $type
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

        $data['title'] = "Gestion du profil admin";
        $this->load->view('includes/header', $data);
        $this->load->view('app/profil/index', $data);
        $this->load->view('includes/footer', $data);
    }
    //Traitement de la mise à jour des informations du profil
    //fonction de modification du mot de passe proprement-dite
    function updateProfil()
    {
        $data['title'] = "Gestion du profil utilisateur";
        //$asset_username = $this->session->username;
        //$asset_email = $this->session->username;
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        $options = array(
            'cost' => 12,);
        $anc_mot_pass = password_hash($this->input->post('anc_mot_pass'), PASSWORD_BCRYPT, $options);
        $validate = array();

        $this->form_validation->set_rules('new_password', 'new_password', 'min_length[6]|max_length[12]',
            array(
                'min_length' => 'Le champ %s doit contenir au moins huit caractères',
                'max_length' => 'Le champ %s doit contenir au plus douze caractères'
            ));

        $this->form_validation->set_rules('confirm_password', 'confirm_password', 'matches[new_password]',
            array(
                'matches' => 'Le champ %s doit correspondre avec le champ Nouveau Mot de passe'
            ));

        $anc_mot_pass_db = $this->Generic_model->get_unique('tb_doc_assets',
            array('asset_username' => $this->session->username))->asset_password;

        $this->form_validation->set_data(array_merge($validate, compact('new_password', 'confirm_password')));

        if ($this->form_validation->run()) {

            if ($anc_mot_pass != $anc_mot_pass_db) {
                //$asset_password=$nvo_mot_pass;
                $asset_password = empty($new_password) ? $anc_mot_pass : password_hash($new_password, PASSWORD_BCRYPT, $options);

                $data_ut = compact('asset_password');

                if ($this->Generic_model->set_update('tb_doc_assets', $data_ut,
                    array('asset_username' => $this->session->username))) {

                    //redirection with message notification success
                    $this->get_msg(' Mise à jour de votre mot de passe utilisateur effectuée avec succès', 'success');
                    redirect('admin/dashboard');

                } else {
                    $this->get_msg("Impossible de mettre à jour votre mot de passe utilisateur !");
                    $data['view'] = 'admin/vue_profil_utilisateur';
                    $this->load->view('admin/main', $data);
                }
            } else {
                $error_anc_mot_pass = TRUE;
                $this->session->set_flashdata(compact('error_anc_mot_pass'));
                $this->get_msg("Impossible de mettre à jour les données car votre 
                mot de passe en cours est incorrect");
                $data['view'] = 'admin/vue_profil_utilisateur';
                $this->load->view('admin/main', $data);
            }
            //redirect('agent/vue_profil');
        } else {
            $this->get_msg("Mise à jour du mot de passe non effectuée en raison d'une erreur survenue 
            lors de la validation de données !");
            $data['view'] = 'admin/vue_profil_utilisateur';
            $this->load->view('admin/main', $data);
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
        $this->App_model->update_data($data, 'tb_doc_assets',  array('id_asset' => $id));

        $this->session->sess_destroy();
        return redirect(base_url() . 'secure/index');
    }
    #======================================================================================================
    #============================envoi des mails de creation des comptes==================================

    public function sendIdentifiantConnexion($email, $username, $password, $subject)
    {
        require_once APPPATH.'PHPMailer/src/Exception.php';
        require_once APPPATH.'PHPMailer/src/PHPMailer.php';
        require_once APPPATH.'PHPMailer/src/SMTP.php';
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
            $mail->setFrom('mwez.rubuz@congoagile.net', 'TokDoc Application');
            $mail->addAddress($from, '');
            if (count($addresses) > 1) {
                $mail->addCC($cc1);
            }
            $mail->addCC('info@congoagile.net', 'Webmaster IT Support');
            $mail->Subject = $subject;

            $mail->isHTML(true);

            $mail->CharSet = 'UTF-8';

            $mail->Body = '<html><strong>Cher ' . $from . '<br/></strong> un compte d\'access a Agile Sante application 
                a été crée avec succès par un administrateur systeme.
            <strong> veuillez trouver ci-dessous les identifiants de connexion. <br/>Username:  ' . $username . '<br/>Mot de passe: ' . $password . '<br/></strong>
            <p> Veuillez suivre le lien ci-après pour vous connecter.</p><a href="https://tokdoc.congoagile.net"> 
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
