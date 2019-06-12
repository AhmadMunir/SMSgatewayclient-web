<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class M_transaksi extends CI_Model{

  public function  gettranspulsa(){
    $this->db->where('jenis_produk', 'pulsa');
    return $this->db->get('tbl_transaksi')->result();
  }
}

?>
