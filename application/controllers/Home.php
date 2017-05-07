<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Lukáš
 * Date: 07.05.2017
 * Time: 23:33
 */
class Home extends CI_Controller
{
    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/navigation');
        $this->load->view('home');
        $this->load->view('template/footer');
    }


}