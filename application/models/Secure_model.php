<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secure_model extends CI_Model {
    /**
     *@ infos of admin
     */
    public function infos_admin($username, $password){

        $this->db->where('asset_username', $username);
        //$this->db->where('asset_email', $username);
        $this->db->where('asset_type', 'administrateur');
        $query = $this->db->get('tb_doc_assets')->result();
        if($query){
            if(password_verify($password,$query[0]->asset_password)){
                return $query[0];
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function admin_existant()
    {
        $this->db->select('*');
        $this->db->from('tb_doc_assets');
        $this->db->where('asset_type', 'administrateur');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    /**
     * get All Administrator
     */
    public function getAllAdmin(){

        $this->db->select('asset_email,asset_username');
        $this->db->from('tb_doc_assets');
        $this->db->where('asset_type', 'administrateur');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }

    }

    /**
     *@ infos of agent
     */
    public function infos_agent($username, $password){

        $this->db->where('asset_username', $username);
        //$this->db->where('asset_email', $username);
        $this->db->where('asset_type', 'utilisateur');
        $query = $this->db->get('tb_doc_assets')->result();
        if($query){
            if(password_verify($password,$query[0]->asset_password)){
                return $query[0];
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    /**
     *@ infos of agent
     */
    public function info_by_email($email){

        $this->db->where('asset_email', $email);
        $query = $this->db->get('tb_doc_assets')->result();
        if($query){
            if($query[0] != null){
                return $query[0];
            }else return false;

        }else{
            return false;
        }
    }
    //recuperer les infos d'un user existant
    public function user_existant($username, $email){

        $this->db->where('asset_username', $username);
        $this->db->where('asset_email', $email);
        $query = $this->db->get('tb_doc_assets')->result();
        if($query){
            return $query[0];
        }else{
            return false;
        }
    }
}
