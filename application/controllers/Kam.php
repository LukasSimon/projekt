<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kam extends CI_Controller
{
    function __construct()
    {
        parent:: __construct();
        $this->load->model('Kam_m','kamm');
    }

    public function index()
    {
        $this->load->library('pagination');
        $query = $this->db->query("SELECT COUNT(*) AS count FROM kam");
        $result = $query->result();
        $count = $result[0]->count;
        $config = array(
            'base_url'   => base_url().'index.php/Kam/index/',
            'total_rows' => $count,
            'per_page'   => 3,
        );

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'prvý';
        $config['last_link'] = 'posledný';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $this->data['view_data']= $this->kamm->view_data($config['per_page'], $this->uri->segment(3));
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

    public function submit_data()
    {
        $data = array('Obec'                   => $this->input->post('Obec'),
            'Ulica'                      => $this->input->post('Ulica'));

        $insert = $this->kamm->insert_data($data);
        $this->session->set_flashdata('kam', 'Vaše dáta boli úspešne pridané');
        redirect(base_url('index.php/kam'));
    }

    public function view_data()
    {
        $this->data['view_data']= $this->kamm->view_data();
        $this->load->view('welcome_message', $this->data, FALSE);
    }

    public function edit_data($id)
    {
        $this->data['edit_data']= $this->kamm->edit_data($id);
        $this->load->view('template/header');
        $this->load->view('kam/edit', $this->data, FALSE);
        $this->load->view('template/footer');
    }

    public function update_data($id)
    {
        $data = array('Obec'                   => $this->input->post('Obec'),
            'Ulica'                      => $this->input->post('Ulica'));

        $this->db->where('id', $id);
        $this->db->update('kam', $data);
        $this->session->set_flashdata('kam', 'Vaše dáta boli úspešne upravené');
        redirect(base_url('index.php/kam'));
    }

    public function delete_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kam');
        $this->session->set_flashdata('kam', 'Vaše dáta boli úspešne odstranené');
        redirect(base_url('index.php/kam'));
    }
}