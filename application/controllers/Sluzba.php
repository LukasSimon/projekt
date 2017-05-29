<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Lukáš
 * Date: 07.05.2017
 * Time: 23:33
 */
class Sluzba extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('sluzba_m', 'sluzbam');
    }

    public function index(){

        $this->data['view_data']= $this->sluzbam->view_data();

        $this->load->view('template/header', $this->data, FALSE);
        $this->load->view('template/navigation');
        $this->load->view('sluzba/index', $this->data, FALSE);
        $this->load->view('template/footer');
    }

    public function add_data()
    {
        $data['vodici'] = $this->sluzbam->getallVodici();
        $this->load->view('template/header');
        $this->load->view('sluzba/add',$data);
        $this->load->view('template/footer');
    }

    public function submit_data()
    {
        $vodici = $this->input->post('Vodici_id');
        $parts = explode(" ", $vodici);
        $Meno = $parts[0];
        $Priezvisko = $parts[1];

        $query = $this->db->query("SELECT id FROM vodici 
                                    WHERE Meno LIKE '$Meno' AND Priezvisko LIKE '$Priezvisko'");
        $result = $query->result();
        $ID = $result[0]->id;

        $data = array('Datum'                   => $this->input->post('Datum'),
            'Vodici_id'                      => $ID);

        $insert = $this->sluzbam->insert_data($data);
        $this->session->set_flashdata('sluzba', 'Vaše dáta boli úspešne pridané');
        redirect(base_url('index.php/sluzba'));
    }
    /****************************  END INSERT FORM DATA ************************/


    /****************************  START FETCH OR VIEW FORM DATA ***************/
    public function view_data()
    {
        $this->data['view_data']= $this->sluzbam->view_data();
        $this->load->view('welcome_message', $this->data, FALSE);
    }
    /****************************  END FETCH OR VIEW FORM DATA ***************/


    /****************************  START OPEN EDIT FORM WITH DATA *************/
    public function edit_data($id)
    {
        $data['edit_data']= $this->sluzbam->edit_data($id);
        $data['vodici'] = $this->sluzbam->getallVodici();
        $this->load->view('template/header');
        $this->load->view('sluzba/edit', $data);
        $this->load->view('template/footer');
    }
    /****************************  END OPEN EDIT FORM WITH DATA ***************/


    /****************************  START UPDATE DATA *************************/
    public function update_data($id)
    {
        $vodici = $this->input->post('Vodici_id');
        $parts = explode(" ", $vodici);
        $Meno = $parts[0];
        $Priezvisko = $parts[1];

        $query = $this->db->query("SELECT id FROM vodici 
                                    WHERE Meno LIKE '$Meno' AND Priezvisko LIKE '$Priezvisko'");
        $result = $query->result();
        $ID = $result[0]->id;

        $data = array('Datum'                   => $this->input->post('Datum'),
            'Vodici_id'                      => $ID);

        $this->db->where('id', $id);
        $this->db->update('sluzba', $data);
        $this->session->set_flashdata('sluzba', 'Vaše dáta boli úspešne upravené');
        redirect(base_url('index.php/sluzba'));
    }
    /****************************  END UPDATE DATA ****************************/


    /****************************  START DELETE DATA **************************/
    public function delete_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sluzba');
        $this->session->set_flashdata('sluzba', 'Vaše dáta boli úspešne odstranené');
        redirect(base_url('index.php/sluzba'));
    }
}