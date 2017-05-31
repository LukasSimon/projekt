<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Grafy_m extends CI_Model{


    public function get_sluzby(){
        $query = $this->db->query("SELECT s.Datum AS datum, COUNT(s.id) AS pocet 
                                   FROM sluzba s GROUP BY s.Datum");
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function get_vodicov(){
        $query = $this->db->query("SELECT v.Meno AS meno, v.Priezvisko AS priezvisko, SUM(c.Cena) AS cena 
                                   FROM cesta c
                                   INNER JOIN vodici v ON v.id = c.Vodici_id 
                                   GROUP BY v.id");
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
    public function get_cenaabyday(){
        $query = $this->db->query("SELECT c.Datum AS datum, SUM(c.Cena) AS cena
                                   FROM cesta c
                                   GROUP BY c.Datum");
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function get_adresy(){
        $query = $this->db->query("SELECT o.Obec AS oobec, o.Ulica AS oulica, COUNT(c.Odkial_id) AS pocet
                                   FROM cesta c
                                   INNER JOIN odkial o  ON c.Odkial_id = o.id
                                   GROUP BY c.Odkial_id  
                                   ORDER BY `pocet`  DESC");
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }

    }

}