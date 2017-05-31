<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Odkial_m extends CI_Model
{
    public function __construct()
    {
    }

    public function getAuto($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('odkial');
            return $query->result_array();
        }
        $query = $this->db->get_where('odkial', array('id' => $id));
        return $query->row_array();
    }

    public function get_auta_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('odkial');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function insert_data($data){
        $this->db->insert('odkial', $data);
        return TRUE;
    }
    /**************************  END INSERT QUERY ****************/


    /*************  START SELECT or VIEW ALL QUERY ***************/
    public function view_data($limit = 0, $offset = 0){
        $query = $this->db->get('odkial', $limit, $offset);
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
    /***************  END SELECT or VIEW ALL QUERY ***************/


    /*************  START EDIT PARTICULER DATA QUERY *************/
    public function edit_data($id){
        $query=$this->db->query("SELECT o.*
                                 FROM odkial o 
                                 WHERE o.id = $id");
        return $query->result_array();
    }
    /*************  END EDIT PARTICULER DATA QUERY ***************/

}
