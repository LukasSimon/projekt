<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vodici extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Vodic_m','vodicm');
    }
    public function index(){

        $this->data['view_data']= $this->vodicm->view_data();

        $this->load->view('template/header', $this->data, FALSE);
        $this->load->view('template/navigation');
        $this->load->view('vodic/index', $this->data, FALSE);
        $this->load->view('template/footer');
    }

    public function add_data()
    {
        $data['auta'] = $this->vodicm->getallAuta();
        $this->load->view('template/header');
        $this->load->view('vodic/add',$data);
        $this->load->view('template/footer');
    }

    public function submit_data()
    {
        $Znacka = $this->input->post('Auta_id');
        echo $Znacka;
        $query = $this->db->query("SELECT id FROM auta 
                                    WHERE Znacka LIKE '$Znacka'");
        $result = $query->result();
        $ID = $result[0]->id;

        $data = array('Meno'                   => $this->input->post('Meno'),
            'Priezvisko'                   => $this->input->post('Priezvisko'),
            'Telefonne_cislo'                   => $this->input->post('Telefonne_cislo'),
            'Auta_id'                      => $ID);

        $insert = $this->vodicm->insert_data($data);
        $this->session->set_flashdata('vodici', 'Vaše dáta boli úspešne pridané');
        redirect(base_url('index.php/vodici'));
    }

    public function view_data()
    {
        $this->data['view_data']= $this->vodicm->view_data();
        $this->load->view('welcome_message', $this->data, FALSE);
    }

    public function edit_data($id)
    {
        $data['edit_data']= $this->vodicm->edit_data($id);
        $data['auta'] = $this->vodicm->getallAuta();
        $this->load->view('template/header');
        $this->load->view('vodic/edit', $data);
        $this->load->view('template/footer');
    }

    public function update_data($id)
    {
        $Znacka = $this->input->post('Auta_id');
        echo $Znacka;
        $query = $this->db->query("SELECT id FROM auta 
                                    WHERE Znacka LIKE '$Znacka'");
        $result = $query->result();
        $ID = $result[0]->id;

        $data = array('Meno'                   => $this->input->post('Meno'),
            'Priezvisko'                   => $this->input->post('Priezvisko'),
            'Telefonne_cislo'                   => $this->input->post('Telefonne_cislo'),
            'Auta_id'                      => $ID);

        $this->db->where('id', $id);
        $this->db->update('vodici', $data);
        $this->session->set_flashdata('vodici', 'Vaše dáta boli úspešne upravené');
        redirect(base_url('index.php/vodici'));
    }

    public function delete_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('vodici');
        $this->session->set_flashdata('vodici', 'Vaše dáta boli úspešne odstranené');
        redirect(base_url('index.php/vodici'));
    }
}