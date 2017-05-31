<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cesta_m extends CI_Model
{
    public function __construct()
    {
    }
    public function getSluzba($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('cesta');
            return $query->result_array();
        }
        $query = $this->db->get_where('cesta', array('id' => $id));
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

    public function getallOdkial()
    {
        $query = $this->db->query('SELECT * FROM odkial');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getallKam()
    {
        $query = $this->db->query('SELECT * FROM kam');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function insert_data($data){
        $this->db->insert('cesta', $data);
        return TRUE;
    }

    public function view_data($limit = 0, $offset = 0){
        if($offset != NULL) {
            $query=$this->db->query("SELECT c.id, c.Datum, c.Cena, v.Meno AS vMeno, v.Priezvisko AS vPriezvisko, o.Obec AS oObec, o.Ulica AS oUlica, k.Obec AS kObec, k.Ulica AS kUlica
                                 FROM cesta c
                                 INNER JOIN vodici v ON c.Vodici_id = v.id
                                 INNER JOIN odkial o ON c.Odkial_id = o.id
                                 INNER JOIN kam k ON c.Kam_id = k.id
                                 ORDER BY c.id
                                 LIMIT $offset, $limit");
            }
            else{
                $query=$this->db->query("SELECT c.id, c.Datum, c.Cena, v.Meno AS vMeno, v.Priezvisko AS vPriezvisko, o.Obec AS oObec, o.Ulica AS oUlica, k.Obec AS kObec, k.Ulica AS kUlica
                                 FROM cesta c
                                 INNER JOIN vodici v ON c.Vodici_id = v.id
                                 INNER JOIN odkial o ON c.Odkial_id = o.id
                                 INNER JOIN kam k ON c.Kam_id = k.id
                                 ORDER BY c.id
                                 LIMIT 0, $limit");
            }

            if($query->num_rows() > 0){
                return $query->result();
            }else{
                return false;
            }
    }

    public function edit_data($id){
        $query=$this->db->query("SELECT c. *
                                 FROM cesta c 
                                 WHERE c.id = $id");
        return $query->result_array();
    }
}