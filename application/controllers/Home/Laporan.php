<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
    }

    public function index()
    {
      $data['pulsa'] = $this->m_transaksi->gettranspulsa();
      $this->load->view('home/laporantransaksipulsa', $data);
    }




}
