<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Lukáš
 * Date: 07.05.2017
 * Time: 23:33
 */
class Kam extends CI_Controller
{
    function __construct()
    {
        parent:: __construct();
        $this->load->model('kam_m','kamm');
    }

    public function index()
    {




        $this->data['view_data']= $this->kamm->view_data();

        $this->load->view('template/header', $this->data, FALSE);
        $this->load->view('template/navigation');
        $this->load->view('kam/index', $this->data, FALSE);
        $this->load->view('template/footer');
    }

    public function add_data()
    {

        $this->load->view('template/header');
        $this->load->view('kam/add');
        $this->load->view('template/footer');
    }
    /****************************  END OPEN ADD FORM FILE ********************/


    /****************************  START INSERT FORM DATA ********************/
    public function submit_data()
    {
        $data = array('Obec'                   => $this->input->post('Obec'),
            'Ulica'                      => $this->input->post('Ulica'));

        $insert = $this->kamm->insert_data($data);
        $this->session->set_flashdata('kam', 'Vaše dáta boli úspešne pridané');
        redirect(base_url('index.php/kam'));
    }
    /****************************  END INSERT FORM DATA ************************/


    /****************************  START FETCH OR VIEW FORM DATA ***************/
    public function view_data()
    {
        $this->data['view_data']= $this->kamm->view_data();
        $this->load->view('welcome_message', $this->data, FALSE);
    }
    /****************************  END FETCH OR VIEW FORM DATA ***************/


    /****************************  START OPEN EDIT FORM WITH DATA *************/
    public function edit_data($id)
    {
        $this->data['edit_data']= $this->kamm->edit_data($id);
        $this->load->view('template/header');
        $this->load->view('kam/edit', $this->data, FALSE);
        $this->load->view('template/footer');
    }
    /****************************  END OPEN EDIT FORM WITH DATA ***************/


    /****************************  START UPDATE DATA *************************/
    public function update_data($id)
    {
        $data = array('Obec'                   => $this->input->post('Obec'),
            'Ulica'                      => $this->input->post('Ulica'));

        $this->db->where('id', $id);
        $this->db->update('kam', $data);
        $this->session->set_flashdata('kam', 'Vaše dáta boli úspešne upravené');
        redirect(base_url('index.php/kam'));
    }
    /****************************  END UPDATE DATA ****************************/


    /****************************  START DELETE DATA **************************/
    public function delete_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kam');
        $this->session->set_flashdata('kam', 'Vaše dáta boli úspešne odstranené');
        redirect(base_url('index.php/kam'));
    }
}