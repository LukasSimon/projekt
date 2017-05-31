<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Lukáš
 * Date: 07.05.2017
 * Time: 23:33
 */
class Grafy extends CI_Controller
{
    function __construct(){
        parent:: __construct();
        $this->load->model('grafy_m', 'grafym');
    }
    public function index()
    {
        $data['sluzby'] = $this->grafym->get_sluzby();
        $data['vodici'] = $this->grafym->get_vodicov();
        $data['cesta'] = $this->grafym->get_cenaabyday();
        $data['adresy'] = $this->grafym->get_adresy();
        $this->load->view('template/header');
        $this->load->view('template/navigation');
        $this->load->view('Grafy/grafy', $data);
        $this->load->view('template/footer');
    }


}