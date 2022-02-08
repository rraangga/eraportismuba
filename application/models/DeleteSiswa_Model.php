<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DeleteSiswa_Model extends CI_Model {
  public function deleteSiswa($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('tabel_siswa');
  }
}