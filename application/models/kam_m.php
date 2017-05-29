<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class kam_m extends CI_Model
{
    public function __construct()
    {
    }

    public function getAuto($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('kam');
            return $query->result_array();
        }
        $query = $this->db->get_where('kam', array('id' => $id));
        return $query->row_array();
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
    /**************************  END INSERT QUERY ****************/


    /*************  START SELECT or VIEW ALL QUERY ***************/
    public function view_data(){
        $query=$this->db->query("SELECT k.*
                                 FROM kam k 
                                 ORDER BY k.id ASC");
        return $query->result_array();
    }
    /***************  END SELECT or VIEW ALL QUERY ***************/


    /*************  START EDIT PARTICULER DATA QUERY *************/
    public function edit_data($id){
        $query=$this->db->query("SELECT k.*
                                 FROM kam k 
                                 WHERE k.id = $id");
        return $query->result_array();
    }
    /*************  END EDIT PARTICULER DATA QUERY ***************/

}
