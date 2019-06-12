<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class M_paket extends CI_Model{

    public function getAll(){
      $this->db->distinct();
      $this->db->select('nama_produk');
      return $this->db->get('tbl_paket')->result();
    }

    public function getPaket(){
      $this->db->distinct();
      $this->db->select('nama_produk');
      return $this->db->get('tbl_paket')->result();
    }

    public function simpan($table, $data){
      return $this->db->insert($table, $data);
    }

    public function getBesaran($where){
      $this->db->where('nama_produk', $where);
      return $this->db->get('tbl_paket')->result();
    }
  }

?>
