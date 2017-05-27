<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Lukáš
 * Date: 07.05.2017
 * Time: 23:33
 */
class Auto extends CI_Controller
{
    function __construct()
    {
        parent:: __construct();
        $this->load->model('auto_m');
        $this->load->model('auto_m','m');
    }

    public function index()
    {
        $this->data['view_data']= $this->m->view_data();

        $this->load->view('template/header', $this->data, FALSE);
        $this->load->view('template/navigation');
        $this->load->view('auto/index', $this->data, FALSE);
        $this->load->view('template/footer');
    }

    public function add_data()
    {

        $this->load->view('template/header');
        $this->load->view('auto/add');
        $this->load->view('template/footer');
    }
    /****************************  END OPEN ADD FORM FILE ********************/


    /****************************  START INSERT FORM DATA ********************/
    public function submit_data()
    {
        $data = array('Znacka'                   => $this->input->post('Znacka'),
            'Evidencne_cislo'                      => $this->input->post('Evidencne_cislo'));

        $insert = $this->m->insert_data($data);
        $this->session->set_flashdata('message', 'Vaše dáta boli úspešne pridané');
        redirect('auto/index');
    }
    /****************************  END INSERT FORM DATA ************************/


    /****************************  START FETCH OR VIEW FORM DATA ***************/
    public function view_data()
    {
        $this->data['view_data']= $this->welcome->view_data();
        $this->load->view('welcome_message', $this->data, FALSE);
    }
    /****************************  END FETCH OR VIEW FORM DATA ***************/


    /****************************  START OPEN EDIT FORM WITH DATA *************/
    public function edit_data($id)
    {
        $this->data['edit_data']= $this->m->edit_data($id);
        $this->load->view('template/header');
        $this->load->view('auto/edit', $this->data, FALSE);
        $this->load->view('template/footer');
    }
    /****************************  END OPEN EDIT FORM WITH DATA ***************/


    /****************************  START UPDATE DATA *************************/
    public function update_data($id)
    {
        $data = array('Znacka'                   => $this->input->post('Znacka'),
            'Evidencne_cislo'                      => $this->input->post('Evidencne_cislo'));

        $this->db->where('id', $id);
        $this->db->update('auta', $data);
        $this->session->set_flashdata('message', 'Vaše dáta boli úspešne upravené');
        redirect('auto/index');
    }
    /****************************  END UPDATE DATA ****************************/


    /****************************  START DELETE DATA **************************/
    public function delete_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('auta');
        $this->session->set_flashdata('message', 'Vaše dáta boli úspešne odstranené');
        redirect('auto/index');
    }
}