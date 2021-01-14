<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_model extends CI_Model
{
    public function get_search($tableFils, $champsFilter =array(), $filterValue, $limit=FALSE, $offset=FALSE,
                               $champsCritere=array(),$critereValue=null,
                                  $champsFils=null,$champsPere1=null, $champsPere2=null, $tablePere1=null, $tablePere2=null){
        $statut= 'Online';
        //$this->db->select('*');
        //$this->db->from($tableFils);
        if($limit){
            $this->db->limit($limit, $offset);
        }
        if($champsFilter===false){

            $this->db->like($champsFilter, $filterValue);
            $this->db->order_by($tableFils.$champsFils,'DESC');
            $this->db->join($tablePere1,$tablePere1.$champsPere1 = $tableFils.$champsPere1);
            $this->db->join($tablePere2,$tablePere2.$champsPere2 = $tableFils.$champsPere2);
            //$query = $this->db->get();
            $query = $this->db->get_where($tableFils, array('patient_status'=>$statut));
            //return $query;
            return $query->result_array();
        }
        $query = $this->db->get_where($tableFils, $champsFilter);
        return $query->result_array();
    }
    /**
     *@ General get datas
     */
    public function getResult($table, $where = [], string $order_by = '', $order = '', $per_page = [], $position = [])
    {
        $this->db->order_by($order_by, $order);
        $this->db->limit($per_page, $position);
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }
    public function search($table, $champsFilter, $filterValue){
        $this->db->select('*');
        $this->db->from($table);
    if($champsFilter){
        $this->db->like($champsFilter, $filterValue);
        $query = $this->db->get();
        return $query;
    }
    else {
            // code...
            $this->db->order_by($filterValue, 'desc');
            //$this->db->group_by($group);
            $query = $this->db->get();
            return $query;
        }
    }
    public function get($table, $critere, $group = null, $condition = false, $table_join = null, $key1 = null, $key2 = null,
                        $details = null, $champ = null, $where = null, $detail_content = null)
    {
        $this->db->select('*');
        $this->db->from($table);
        if ($condition) {
            // code...
            $this->db->join($table_join, "$table_join.$key1 = $table.$key2");

            if ($details == $detail_content) {
                // code...
                $this->db->where($table . $champ, $where);
                $this->db->order_by($critere, 'desc');
                $this->db->group_by($group);
                $query = $this->db->get();
                return $query;
            } elseif ($details != $detail_content) {
                // code...
                $this->db->where($table . $champ, $where);
                $this->db->order_by($critere, 'desc');
                $this->db->group_by($group);
                $query = $this->db->get();
                return $query;
            } else {
                // code...
                $this->db->order_by($critere, 'desc');
                $this->db->group_by($group);
                $query = $this->db->get();
                return $query;
            }
        }
        else {
            // code...
            $this->db->order_by($critere, 'desc');
            //$this->db->group_by($group);
            $query = $this->db->get();
            return $query;
        }
    }

    /**
     *@ General get join
     */
    public function get_join($table, $critere, $array = array(), $condition = null, $champ = null, $where = null)
    {
        $this->db->select('*');
        $this->db->from($table);
        // code...
        $condition = (int)$condition;

        foreach ($array as $v) {
            // code...
            $this->db->join($v[1], "$v[1].$v[2] = $table.$v[0]");
        }

        if ($condition) {
            // code...
            if ($condition == $where) {
                // code...
                $this->db->where($champ, $where);
            } elseif ($condition == $where) {
                $this->db->where($champ, $where);
            } else {
                $this->db->where($champ, $where);
            }
        }

        $this->db->order_by($critere, 'desc');
        $query = $this->db->get();
        return $query;
    }


    /**
     *@ Get one
     */
    public function get_info_by_table_by_id($id, $table, $name_id)
    {
        return $this->db->get_where($table, array($name_id => $id))->row_array();
    }

    /**
     *@ Get one
     */
    public function get_Last_info($table, $field, $critere)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($field, $critere);
        $this->db->limit(1);
        $query = $this->db->get()->row_array();
        return $query;

    }

# ============================= fonctions de verification des doublons =====================================

    /**
     *@ Get one information
     */
    public function get_onces($id, $table, $champs)
    {
        return $this->db->get_where($table, array($champs => $id))->row_array();
    }

    /**
     *@ Get one information in view request
     */
    public function get_view_onces($id, $rubrique, $champs)
    {
        return $this->db->get_where($rubrique, array($champs => $id))->row_array();
    }

    /**
     *@ Get all information by row
     */
    public function get_result($table, $champ, $id)
    {
        return $this->db->get_where($table, array($champ => $id))->row_array();
    }

    /**
     * @param $name
     * @return bool
     * get infos
     */
    public function get_existant($table, $champ, $name)
    {

        $this->db->where($champ, $name);
        $query = $this->db->get($table)->result();
        if ($query) {
            return $query[0];
        } else {
            return false;
        }
    }

    /**
     * la fonction pour inserer un enregistrement dans une table
     * @param $table
     * @param $data les données à inserer
     * @return bool
     */
    public function insert_data($data,$table)
    {
        return $this->db->insert($table, $data);
    }

    /**
     * la fonction permettant de modifier un enregistrement dans une table
     * @param $table
     * @param $data les donnees à modifier
     * @param $where la condition de modification
     * @return bool
     */
    public function update_data($data, $table, $where)
    {
        return $this->db->update($table, $data, $where);
    }

    /**
     * la fonction pour compter le nombre d'enregistrements dans une table
     * @param $table
     * @param array $where
     * @return bool
     */
    public function count_data($table, $where = array())
    {
        return $this->db->where($where)->count_all_results($table);
    }

    /**
     * la fonction permettant d'importer un fichier lors d'une insertion dans une table
     * @param $table
     * @param $data
     * @return bool
     */
    function import_data($table, $data)
    {
        if ($this->db->insert_batch($table, $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
