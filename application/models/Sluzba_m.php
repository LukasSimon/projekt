<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sluzba_m extends CI_Model
{
    public function __construct()
    {
    }
    public function getSluzba($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('sluzba');
            return $query->result_array();
        }
        $query = $this->db->get_where('sluzba', array('id' => $id));
        return $query->row_array();
    }

    public function getallVodici()
    {
        $query = $this->db->query('SELECT * FROM vodici');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function insert_data($data){
        $this->db->insert('sluzba', $data);
        return TRUE;
    }
    /**************************  END INSERT QUERY ****************/


    /*************  START SELECT or VIEW ALL QUERY ***************/
    public function view_data($limit = 0, $offset = 0){
        if($offset != NULL) {
        $query=$this->db->query("SELECT s.id, s.Datum, v.Meno AS vMeno, v.Priezvisko AS vPriezvisko
                                 FROM sluzba s
                                 INNER JOIN vodici v ON s.Vodici_id = v.id
                                 ORDER BY s.id ASC                    
                                 LIMIT $offset, $limit");
            }
            else{
                $query=$this->db->query("SELECT s.id, s.Datum, v.Meno AS vMeno, v.Priezvisko AS vPriezvisko
                                 FROM sluzba s
                                 INNER JOIN vodici v ON s.Vodici_id = v.id
                                 ORDER BY s.id ASC 
                                 LIMIT 0, $limit");
            }

            if($query->num_rows() > 0){
                return $query->result();
            }else{
                return false;
            }
    }
    /***************  END SELECT or VIEW ALL QUERY ***************/


    /*************  START EDIT PARTICULER DATA QUERY *************/
    public function edit_data($id){
        $query=$this->db->query("SELECT s. *
                                 FROM sluzba s 
                                 WHERE s.id = $id");

        return $query->result_array();
    }
    /*************  END EDIT PARTICULER DATA QUERY ***************/

}