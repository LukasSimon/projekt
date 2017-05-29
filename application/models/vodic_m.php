<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class vodic_m extends CI_Model
{
    public function __construct()
    {
    }

    public function getVodic($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('vodici');
            return $query->result_array();
        }
        $query = $this->db->get_where('vodici', array('id' => $id));
        return $query->row_array();
    }

    public function getallAuta()
    {
        $query = $this->db->query('SELECT * FROM auta');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function insert_data($data){
        $this->db->insert('vodici', $data);
        return TRUE;
    }
    /**************************  END INSERT QUERY ****************/


    /*************  START SELECT or VIEW ALL QUERY ***************/
    public function view_data(){
        $query=$this->db->query("SELECT v.id, v.Meno, v.Priezvisko, v.Telefonne_cislo, a.Znacka AS aZnacka
                                 FROM vodici v 
                                 INNER JOIN auta a ON v.Auta_id = a.id
                                 ORDER BY v.id ASC");
        return $query->result_array();
    }
    /***************  END SELECT or VIEW ALL QUERY ***************/


    /*************  START EDIT PARTICULER DATA QUERY *************/
    public function edit_data($id){
         $query=$this->db->query("SELECT v. *
                                 FROM vodici v
                                 WHERE v.id = $id");

        return $query->result_array();
    }
    /*************  END EDIT PARTICULER DATA QUERY ***************/

}
