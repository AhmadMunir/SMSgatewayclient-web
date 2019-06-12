<?php
  class Pulsa extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_pulsa');
    }

    public function index(){
      redirect('Home/Home');
    }

    public function simpansukses(){
      $produk = $this->input->post('nama_produk');
      $no = $this->input->post('ke');
      $besar = $this->input->post('besar');
      $jenis = $this->input->post('jenis');

      $data = array(
          'nama_produk' => $produk,
          'nomor' => $no,
          'jenis_produk' =>$jenis,
          'nominal' => $besar,
          'status' => "sukses"
      );

      $this->m_pulsa->simpan('tbl_transaksi', $data);
    }
    public function simpangagal(){
      $produk = $this->input->post('nama_produk');
      $no = $this->input->post('ke');
      $besar = $this->input->post('besar');
        $jenis = $this->input->post('jenis');
      $ket = $this->input->post('ket');

      $data = array(
          'nama_produk' => $produk,
          'nomor' => $no,
          'jenis_produk' =>$jenis,
          'nominal' => $besar,
          'keterangan' => $ket,
          'status' => 'Gagal'
      );

      $this->m_pulsa->simpan('tbl_transaksi', $data);
    }

    public function Axis(){
      $where = 'Axis';
      $data['pulsa']= $this->m_pulsa->getBesaran($where);
      $this->load->view('home/axis', $data);
    }
    public function Telkomsel(){
      $where = 'Telkomsel';
      $data['pulsa']= $this->m_pulsa->getBesaran($where);
      $this->load->view('home/telkomsel', $data);
    }
    public function Im3(){
      $where = 'Im3';
      $data['pulsa']= $this->m_pulsa->getBesaran($where);
      $this->load->view('home/indosat', $data);
    }
    public function Xl(){
      $where = 'Xl';
      $data['pulsa']= $this->m_pulsa->getBesaran($where);
      $this->load->view('home/xl', $data);
    }
    public function Tri(){
      $where = 'Tri';
      $data['pulsa']= $this->m_pulsa->getBesaran($where);
      $this->load->view('home/3', $data);
    }
  }
 ?>
