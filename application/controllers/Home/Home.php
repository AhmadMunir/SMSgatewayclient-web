<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pulsa');
    }

    public function index()
    {
      $data['paket'] = $this->m_pulsa->getPaket();
      $data['pulsa'] = $this->m_pulsa->getAll();
      $this->load->view('home/home', $data);
    }




}
