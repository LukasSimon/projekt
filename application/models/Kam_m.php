<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kam_m extends CI_Model
{
    public function __construct()
    {
    }

    public function getKam($limit = 0, $offset = 0){
        $query = $this->db->get('kam', $limit, $offset);
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function get_auta_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('kam');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function insert_data($data){
        $this->db->insert('kam', $data);
        return TRUE;
    }

    public function view_data($limit = 0, $offset = 0){
        $query = $this->db->get('kam', $limit, $offset);
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function edit_data($id){
        $query=$this->db->query("SELECT k.*
                                 FROM kam k 
                                 WHERE k.id = $id");
        return $query->result_array();
    }
}
