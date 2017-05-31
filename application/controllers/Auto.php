<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auto extends CI_Controller
{
    function __construct()
    {
        parent:: __construct();
        $this->load->model('Auto_m','autom');
    }

    public function index()
    {
        $this->data['view_data']= $this->autom->view_data();

        $this->load->view('template/header', $this->data, FALSE);
        $this->load->view('template/navigation');
        $this->load->view('Auto/index', $this->data, FALSE);
        $this->load->view('template/footer');
    }

    public function add_data()
    {

        $this->load->view('template/header');
        $this->load->view('Auto/add');
        $this->load->view('template/footer');
    }

    public function submit_data()
    {
        $data = array('Znacka'                   => $this->input->post('Znacka'),
            'Evidencne_cislo'                      => $this->input->post('Evidencne_cislo'));

        $insert = $this->autom->insert_data($data);
        $this->session->set_flashdata('message', 'Vaše dáta boli úspešne pridané');
        redirect(base_url('index.php/Auto'));
    }

    public function view_data()
    {
        $this->data['view_data']= $this->autom->view_data();
        $this->load->view('welcome_message', $this->data, FALSE);
    }

    public function edit_data($id)
    {
        $this->data['edit_data']= $this->autom->edit_data($id);
        $this->load->view('template/header');
        $this->load->view('Auto/edit', $this->data, FALSE);
        $this->load->view('template/footer');
    }

    public function update_data($id)
    {
        $data = array('Znacka'                   => $this->input->post('Znacka'),
            'Evidencne_cislo'                      => $this->input->post('Evidencne_cislo'));

        $this->db->where('id', $id);
        $this->db->update('auta', $data);
        $this->session->set_flashdata('message', 'Vaše dáta boli úspešne upravené');
        redirect(base_url('index.php/Auto'));
    }

    public function delete_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('auta');
        $this->session->set_flashdata('message', 'Vaše dáta boli úspešne odstranené');
        redirect(base_url('index.php/Auto'));
    }
}