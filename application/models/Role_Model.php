<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_Model extends CI_Model
{
  public function getroleM()
  {
    $query = "SELECT `user`.*, `user_role`.`role`
    FROM `user` JOIN `user_role`
    ON `user`.`role_id` = `user_role`.`id`
    ";
    
    return $this->db->query($query)->result_array();
  }

  public function getroleU($id)
  {
    $query = "SELECT `user`.*, `user_role`.`role`
    FROM `user` JOIN `user_role`
    ON `user`.`role_id` = `user_role`.`id`
    WHERE `user`.`id` = $id
    ";
    
    return $this->db->query($query)->row_array();
  }

  public function getroleG()
  {
    $role_id = $this->session->userdata('role_id');
    $queryUser = "SELECT `user_role`.`id`, `user_role`.`role`
    FROM `user_role`
    JOIN `role_acces`
    ON `user_role`.`id` = `role_acces`.`role_id`
    WHERE `role_acces`.`role_id` = $role_id

    ";
    return $this->db->query($queryUser)->result_array();
  }
  
  public function mapelG()
  {
    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $u = $user['mapel_id'];
    $queryMapel = "SELECT `user`.*, `tabel_mapel`.`mapel`
    FROM `user` JOIN `tabel_mapel`
    ON `user`.`mapel_id` = `tabel_mapel`.`id`
    WHERE `tabel_mapel`.`id` = $u
    ";

    return $this->db->query($queryMapel)->result_array();
    
  }
  public function kelasG()
  {
    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $u = $user['wali_id'];
    $queryKelas = "SELECT `user`.*, `tabel_kelas`.`kelas`
    FROM `user` JOIN `tabel_kelas`
    ON `user`.`wali_id` = `tabel_kelas`.`id`
    WHERE `tabel_kelas`.`id` = $u
    ";

    return $this->db->query($queryKelas)->result_array();
  }

  public function kelasdetailG($id)
  {
    $queryKelasdetail = "SELECT `user`.*, `tabel_kelas`.`kelas`
    FROM `user` JOIN `tabel_kelas`
    ON `user`.`wali_id` = `tabel_kelas`.`id`
    WHERE `user`.`id` = $id
    ";

    return $this->db->query($queryKelasdetail)->row_array();
  }

  public function dataMurid()
  {
    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $u = $user['nomer'];
    
    $queryMurid = "SELECT *
    FROM `user` JOIN `tabel_siswa`
    ON `user`.`nomer` = `tabel_siswa`.`nomer_id`
    WHERE `tabel_siswa`.`nomer_id` = $u
    ";
        
    return $this->db->query($queryMurid)->result_array();
  
  }
}