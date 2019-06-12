<?php
  class Paket extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_paket');
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

    $this->m_paket->simpan('tbl_transaksi', $data);
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

    $this->m_paket->simpan('tbl_transaksi', $data);
  }

  public function Axis(){
    $where = 'Axis';
    $data['paket']= $this->m_paket->getBesaran($where);
    $this->load->view('home/paketaxis', $data);
  }
  public function Telkomsel(){
    $where = 'Telkomsel';
    $data['paket']= $this->m_paket->getBesaran($where);
    $this->load->view('home/pakettelkomsel', $data);
  }
  public function Im3(){
    $where = 'Im3';
    $data['paket']= $this->m_paket->getBesaran($where);
    $this->load->view('home/paketindosat', $data);
  }
  public function Xl(){
    $where = 'Xl';
    $data['paket']= $this->m_paket->getBesaran($where);
    $this->load->view('home/paketxl', $data);
  }
  public function Tri(){
    $where = 'Tri';
    $data['paket']= $this->m_paket->getBesaran($where);
    $this->load->view('home/paket3', $data);
  }
}
 ?>
