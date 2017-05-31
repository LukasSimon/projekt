<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auto_m extends CI_Model
{
    public function __construct()
    {
    }

    public function getAuto($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('auta');
            return $query->result_array();
        }
        $query = $this->db->get_where('auta', array('id' => $id));
        return $query->row_array();
    }

    public function get_auta_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('auta');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function insert_data($data){
        $this->db->insert('auta', $data);
        return TRUE;
    }

    public function view_data(){
        $query=$this->db->query("SELECT ud.*
                                 FROM auta ud 
                                 ORDER BY ud.id ASC");
        return $query->result_array();
    }

    public function edit_data($id){
        $query=$this->db->query("SELECT ud.*
                                 FROM auta ud 
                                 WHERE ud.id = $id");
        return $query->result_array();
    }
}
