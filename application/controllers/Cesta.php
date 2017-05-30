<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Lukáš
 * Date: 07.05.2017
 * Time: 23:33
 */
class Cesta extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('cesta_m', 'cestam');
    }

    public function index(){

        $this->data['view_data']= $this->cestam->view_data();

        $this->load->view('template/header', $this->data, FALSE);
        $this->load->view('template/navigation');
        $this->load->view('cesta/index', $this->data, FALSE);
        $this->load->view('template/footer');
    }

    public function add_data()
    {
        $data['vodici'] = $this->cestam->getallVodici();
        $data['odkial'] = $this->cestam->getallOdkial();
        $data['kam'] = $this->cestam->getallKam();
        $this->load->view('template/header');
        $this->load->view('cesta/add',$data);
        $this->load->view('template/footer');
    }

    public function submit_data()
    {

        $str = $this->input->post('Vodici_id');
        $boolean = 1;
        $Meno = "";
        $Priezvisko = "";
        $parts = explode(" ", $str);
        $arrlength = count($parts);
        for($x = 0; $x < $arrlength; $x++) {
            if($boolean == 1)
                $Meno = $Meno . " " . $parts[$x];
            else
                $Priezvisko = $Priezvisko . " " . $parts[$x];
            if (stristr($parts[$x], ',')) {
                $boolean = 0;
            }
        }
        $Meno = substr($Meno, 0, -1);
        $Meno = substr($Meno, 1);
        $Priezvisko = substr($Priezvisko, 1);

        $query = $this->db->query("SELECT id FROM vodici 
                                    WHERE Meno LIKE '$Meno' AND Priezvisko LIKE '$Priezvisko'");
        $result = $query->result();
        $ID_vodici = $result[0]->id;

        echo $ID_vodici;






        $str = $this->input->post('Odkial_id');
        $boolean = 1;
        $Obec_odkial = "";
        $Ulica_odkial = "";
        $parts = explode(" ", $str);
        $arrlength = count($parts);
        for($x = 0; $x < $arrlength; $x++) {
            if($boolean == 1)
                $Obec_odkial = $Obec_odkial . " " . $parts[$x];
            else
                $Ulica_odkial = $Ulica_odkial . " " . $parts[$x];
            if (stristr($parts[$x], ',')) {
                $boolean = 0;
            }
        }
        $Obec_odkial = substr($Obec_odkial, 0, -1);
        $Obec_odkial = substr($Obec_odkial, 1);
        $Ulica_odkial = substr($Ulica_odkial, 1);

        $query = $this->db->query("SELECT id FROM odkial 
                                    WHERE Obec LIKE '$Obec_odkial' AND Ulica LIKE '$Ulica_odkial'");
        $result = $query->result();
        $ID_odkial =$result[0]->id;
        echo $ID_odkial;





        $str = $this->input->post('Kam_id');
        $boolean = 1;
        $Obec_kam = "";
        $Ulica_kam = "";
        $parts = explode(" ", $str);
        $arrlength = count($parts);
        for($x = 0; $x < $arrlength; $x++) {
            if($boolean == 1)
                $Obec_kam = $Obec_kam . " " . $parts[$x];
            else
                $Ulica_kam = $Ulica_kam . " " . $parts[$x];
            if (stristr($parts[$x], ',')) {
                $boolean = 0;
            }
        }
        $Obec_kam = substr($Obec_kam, 0, -1);
        $Obec_kam = substr($Obec_kam, 1);
        $Ulica_kam = substr($Ulica_kam, 1);

        $query = $this->db->query("SELECT id FROM kam 
                                    WHERE Obec LIKE '$Obec_kam' AND Ulica LIKE '$Ulica_kam'");
        $result = $query->result();
        $ID_kam = $result[0]->id;
        echo $ID_kam;


        $data = array('Datum'                   => $this->input->post('Datum'),
            'Cena'                   => $this->input->post('Cena'),
            'Vodici_id'                      => $ID_vodici,
            'Odkial_id'                      => $ID_odkial,
            'Kam_id'                      => $ID_kam);

        $insert = $this->cestam->insert_data($data);
        $this->session->set_flashdata('cesta', 'Vaše dáta boli úspešne pridané');
        redirect(base_url('index.php/cesta'));
    }
    /****************************  END INSERT FORM DATA ************************/


    /****************************  START FETCH OR VIEW FORM DATA ***************/
    public function view_data()
    {
        $this->data['view_data']= $this->cestam->view_data();
        $this->load->view('welcome_message', $this->data, FALSE);
    }
    /****************************  END FETCH OR VIEW FORM DATA ***************/


    /****************************  START OPEN EDIT FORM WITH DATA *************/
    public function edit_data($id)
    {
        $data['edit_data']= $this->cestam->edit_data($id);
        $data['vodici'] = $this->cestam->getallVodici();
        $data['odkial'] = $this->cestam->getallOdkial();
        $data['kam'] = $this->cestam->getallKam();
        $this->load->view('template/header');
        $this->load->view('cesta/edit', $data);
        $this->load->view('template/footer');
    }
    /****************************  END OPEN EDIT FORM WITH DATA ***************/


    /****************************  START UPDATE DATA *************************/
    public function update_data($id)
    {
        $str = $this->input->post('Vodici_id');
        $boolean = 1;
        $Meno = "";
        $Priezvisko = "";
        $parts = explode(" ", $str);
        $arrlength = count($parts);
        for($x = 0; $x < $arrlength; $x++) {
            if($boolean == 1)
                $Meno = $Meno . " " . $parts[$x];
            else
                $Priezvisko = $Priezvisko . " " . $parts[$x];
            if (stristr($parts[$x], ',')) {
                $boolean = 0;
            }
        }
        $Meno = substr($Meno, 0, -1);
        $Meno = substr($Meno, 1);
        $Priezvisko = substr($Priezvisko, 1);

        $query = $this->db->query("SELECT id FROM vodici 
                                    WHERE Meno LIKE '$Meno' AND Priezvisko LIKE '$Priezvisko'");
        $result = $query->result();
        $ID_vodici = $result[0]->id;

        echo $ID_vodici;






        $str = $this->input->post('Odkial_id');
        $boolean = 1;
        $Obec_odkial = "";
        $Ulica_odkial = "";
        $parts = explode(" ", $str);
        $arrlength = count($parts);
        for($x = 0; $x < $arrlength; $x++) {
            if($boolean == 1)
                $Obec_odkial = $Obec_odkial . " " . $parts[$x];
            else
                $Ulica_odkial = $Ulica_odkial . " " . $parts[$x];
            if (stristr($parts[$x], ',')) {
                $boolean = 0;
            }
        }
        $Obec_odkial = substr($Obec_odkial, 0, -1);
        $Obec_odkial = substr($Obec_odkial, 1);
        $Ulica_odkial = substr($Ulica_odkial, 1);

        $query = $this->db->query("SELECT id FROM odkial 
                                    WHERE Obec LIKE '$Obec_odkial' AND Ulica LIKE '$Ulica_odkial'");
        $result = $query->result();
        $ID_odkial =$result[0]->id;
        echo $ID_odkial;





        $str = $this->input->post('Kam_id');
        $boolean = 1;
        $Obec_kam = "";
        $Ulica_kam = "";
        $parts = explode(" ", $str);
        $arrlength = count($parts);
        for($x = 0; $x < $arrlength; $x++) {
            if($boolean == 1)
                $Obec_kam = $Obec_kam . " " . $parts[$x];
            else
                $Ulica_kam = $Ulica_kam . " " . $parts[$x];
            if (stristr($parts[$x], ',')) {
                $boolean = 0;
            }
        }
        $Obec_kam = substr($Obec_kam, 0, -1);
        $Obec_kam = substr($Obec_kam, 1);
        $Ulica_kam = substr($Ulica_kam, 1);

        $query = $this->db->query("SELECT id FROM kam 
                                    WHERE Obec LIKE '$Obec_kam' AND Ulica LIKE '$Ulica_kam'");
        $result = $query->result();
        $ID_kam = $result[0]->id;
        echo $ID_kam;


        $data = array('Datum'                   => $this->input->post('Datum'),
            'Cena'                   => $this->input->post('Cena'),
            'Vodici_id'                      => $ID_vodici,
            'Odkial_id'                      => $ID_odkial,
            'Kam_id'                      => $ID_kam);

        $this->db->where('id', $id);
        $this->db->update('cesta', $data);
        $this->session->set_flashdata('cesta', 'Vaše dáta boli úspešne upravené');
        redirect(base_url('index.php/cesta'));
    }
    /****************************  END UPDATE DATA ****************************/


    /****************************  START DELETE DATA **************************/
    public function delete_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('cesta');
        $this->session->set_flashdata('cesta', 'Vaše dáta boli úspešne odstranené');
        redirect(base_url('index.php/cesta'));
    }
}