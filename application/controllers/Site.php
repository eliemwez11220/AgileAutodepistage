<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller
{

    public function index()
    {
        //view home page
        $this->home();
    }

    public function home()
    {
        $data['title'] = "Bienvenue sur le site officiel du Gouvernorat de la province du Haut-Katanga.
         Vous êtes sur le site officiel de publication des informations officielles de toutes les activites de la province.";
        $this->load->view('site/common/header', $data);
        $this->load->view('site/home', $data);
        $this->load->view('site/common/footer', $data);
    }

    /**
     * urgence
     */
    public function urgence()
    {
        $data['title'] = "Etat d'urgence annonce par le Gouvernorat de la province du Haut-Katanga.";
        $this->load->view('site/common/header', $data);
        $this->load->view('site/home', $data);
        $this->load->view('site/common/footer', $data);
    }

    /**
     * a la decouverte de la plateforme
     */
    public function apropos()
    {
        $data['title'] = "Qui sommes-nous ?";
        $this->load->view('site/common/header', $data);
        $this->load->view('site/pages/apropos', $data);
        $this->load->view('site/common/footer', $data);
    }

    /**
     * Vue listing des articles
     */
    public function actualites($type = null)
    {
        //database tables requests
        $data['managers'] = $this->App_model->get('tb_doc_assets', 'asset_created')->result();
        $data['patients'] = $this->App_model->get('tb_doc_patients', 'pays_provenance')->result();
        $data['pays'] = $this->App_model->get('tb_doc_pays', 'libelle')->result();
        //set title
        $data['title'] = "Actualites $type";
        //set header page
        $this->load->view('site/common/header', $data);

        //search page news
       if ($type == 'statistics') {
            $this->load->view('site/actualites/statistics/index', $data);
        } elseif ($type == 'coronavirus') {
            //set title
            $this->load->view('site/actualites/coronavirus/index', $data);
        } else {
            $this->load->view('site/actualites/provinciales/index', $data);
        }
        $this->load->view('site/common/footer', $data);
    }

    /**
     * @param null $type
     */
    public function rubriques($type = null)
    {
        if ($type != '') {
            //si il y a une categorie selectionnee

            $data['title'] = "$type";
            $this->load->view('site/common/header', $data);
            $this->load->view('site/rubriques/index', $data);
            $this->load->view('site/common/footer', $data);
        } else {
            //si aucune
            $data['title'] = "(toutes)";
            $this->load->view('site/common/header', $data);
            $this->load->view('site/rubriques/index', $data);
            $this->load->view('site/common/footer', $data);
        }

    }

    //toutes les pages
    public function pages($page)
    {
        $data['title'] = $page;
        $this->load->view('includes/header', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('includes/footer', $data);
    }

    //ientification
    public function identification($page = null)
    {
        $data['title'] = $page;
        $this->load->view('includes/header', $data);
        if ($page == "") {
            $this->load->view('pages/index', $data);
        } else {
            $this->load->view('pages/' . $page, $data);
        }
        $this->load->view('includes/footer', $data);
    }

}
