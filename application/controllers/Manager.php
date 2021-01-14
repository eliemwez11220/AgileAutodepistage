<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Manager extends CI_Controller
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

        //GroceryCRUD Librairie
        $this->load->library('grocery_CRUD');
    }

    /**
     *@ Check is admin is logged
     */
    private function is_logged()
    {
        if (!$this->session->authentified_agent) {
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
        $this->load->view('manager/header', $data);
        $this->load->view('manager/home', $data);
        $this->load->view('manager/footer', $data);
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

        $type=$this->uri->segment(1);
        if ($type=='manager'){
            $this->load->view('manager/header', $data);
            $this->load->view('manager/change_password', $data);
            $this->load->view('manager/footer', $data);
        }else{
            $this->load->view('includes/header', $data);
            $this->load->view('app/profil/change_password', $data);
            $this->load->view('includes/footer', $data);
        }
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

        $type=$this->uri->segment(1);
        if ($type=='manager'){
            $this->load->view('manager/header', $data);
            $this->load->view('manager/profil', $data);
            $this->load->view('manager/footer', $data);
        }else{
            $this->load->view('includes/header', $data);
            $this->load->view('app/profil/index', $data);
            $this->load->view('includes/footer', $data);
        }

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
    #-----------------------------All record from GroceryCRUD Librarie------------------------------------
    #-----------------------------------------------------------------------------------------------------

    //Function generic for output data
    #----------- 1. Medical TokDoc Sections ----------------------------------------------------------------
    /**
     *@ Home function
     */
    public function _menu_sortie($output = null)
    {
        $this->load->view('manager/header.php',(array)$output);
        $this->load->view('manager/home.php',(array)$output);
        $this->load->view('manager/footer.php',(array)$output);
    }

    //Show megamain page with css and js files
    public function megamain_management()
    {
        //affichage des operations des agents
        $this->_menu_sortie((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
    }

    //Manage cabinet medical data
    public function cabinet()
    {
        //create object from grocerycrud librairie
        $crud = new grocery_CRUD();
        //set table name
        $crud->set_table('tb_doc_cabinets');
        $crud->set_subject('admission cabinet');//rename table to display in page
        //set relation for foreign key id and display the name of field - first table
        $crud->set_relation('praticien_id','tb_doc_praticiens','praticien_fullname');
        $crud->display_as('praticien_id','Praticien medecin');
        //set relation for foreign key id and display the name of field - second table
        $crud->set_relation('ville_id','tb_doc_villes','ville_name');
        $crud->display_as('ville_id','Ville');

        //create constraint on field
        $crud->required_fields('access_code');
        //upload files and put then in server directory for storage
        $crud->set_field_upload('cabinet_file_url','assets/uploads/files');

        #interdir la suppression
        $crud->unset_delete();
        $crud->unset_clone();
        //$crud->unset_edit_fields('access_code');
        //show all data in array and display then on megamain page
        $output = $crud->render();
        //redirect to megamain page
        $this->_menu_sortie($output);
    }

    #---------------function for parameter
    //table without foreign key constraint references - manage provinces
    public function province()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('tb_doc_provinces');
        $crud->set_subject('province');
        //set required on field
        //$crud->required_fields('praticien_fullname');
        //upload files and put then in server directory for storage
        //$crud->set_field_upload('praticien_file_url','assets/uploads/files');
        $crud->unset_clone();
        $output = $crud->render();

        $this->_menu_sortie($output);
    }
    //Manage cabinet medical data
    public function ville()
    {
        //create object from grocerycrud librairie
        $crud = new grocery_CRUD();
        //set table name
        $crud->set_table('tb_doc_villes');
        $crud->set_subject('ville');//rename table to display in page
        //set relation for foreign key id and display the name of field - first table
        $crud->set_relation('province_id','tb_doc_provinces','province_name');
        $crud->display_as('province_id','Province');

        #interdir la suppression
        //$crud->unset_delete();
        $crud->unset_clone();
        //$crud->unset_edit_fields('access_code');
        //show all data in array and display then on megamain page
        $output = $crud->render();
        //redirect to megamain page
        $this->_menu_sortie($output);
    } public function commune()
    {
        //create object from grocerycrud librairie
        $crud = new grocery_CRUD();
        //set table name
        $crud->set_table('tb_doc_communes');
        $crud->set_subject('commune');//rename table to display in page
        //set relation for foreign key id and display the name of field - first table
        $crud->set_relation('ville_id','tb_doc_villes','ville_name');
        $crud->display_as('ville_id','Ville');

        #interdir la suppression
        //$crud->unset_delete();
        $crud->unset_clone();
        //$crud->unset_edit_fields('access_code');
        //show all data in array and display then on megamain page
        $output = $crud->render();
        //redirect to megamain page
        $this->_menu_sortie($output);
    }
    //table without foreign key constraint references - manage provinces
    public function assistance()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('tb_doc_aides');
        $crud->set_subject('assistance');
        //set required on field
        //$crud->required_fields('praticien_fullname');
        //upload files and put then in server directory for storage
        //$crud->set_field_upload('praticien_file_url','assets/uploads/files');
        $crud->unset_clone();
        $crud->unset_add();
        $crud->unset_delete();
        $output = $crud->render();

        $this->_menu_sortie($output);
    }
    #----------------function for blog news--------------------
    //Manage cabinet medical data
    public function article()
    {
        //create object from grocerycrud librairie
        $crud = new grocery_CRUD();
        //set table name
        $crud->set_table('tb_doc_articles');
        $crud->set_subject('article');//rename table to display in page
        //set relation for foreign key id and display the name of field - first table
        $crud->set_relation('category_id','tb_doc_categories','category_name');
        $crud->display_as('category_id','Categorie');

        $crud->set_field_upload('post_image','assets/uploads/images');
        $crud->set_field_upload('post_file','assets/uploads/files');
        $crud->set_field_upload('post_video','assets/uploads/videos');
        #interdir la suppression
        //$crud->unset_delete();
        $crud->unset_clone();
        //$crud->unset_edit_fields('access_code');
        //show all data in array and display then on megamain page
        $output = $crud->render();
        //redirect to megamain page
        $this->_menu_sortie($output);
    }
    public function categorie()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('tb_doc_categories');
        $crud->set_subject('categorie');
        //set required on field
        //$crud->required_fields('praticien_fullname');
        //upload files and put then in server directory for storage
        //$crud->set_field_upload('praticien_file_url','assets/uploads/files');
        $crud->unset_clone();
        $output = $crud->render();
        $this->_menu_sortie($output);
    }
}
