<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TambahSiswa_Model extends CI_Model {
  public function TambahSiswaModel()
  {
    $data = [
      'nama_siswa' => $this->input->post('nama_siswa',true),
      'nisn' => $this->input->post('nisn',true),
      'kelas' => $this->input->post('kelas',true),
      'created' => date("Y-m-d H:i:s"),
      'modified' => date("Y-m-d H:i:s"),
      'active' => 1,
  ];
  $this->db->insert('tabel_siswa', $data);
  }

  public function detailSiswa($id)
  {
    return $this->db->get_where('tabel_siswa', ['id' => $id])->row_array();
  }

  public function editSiswa()
  {
    // return $this->db->get_where('tabel_siswa', ['id' => $id])->row_array(); 
    $data = [
      'nama_siswa' => $this->input->post('nama_siswa',true),
      'nisn' => $this->input->post('nisn',true),
      'kelas' => $this->input->post('kelas',true)
  ];
  
    
  $this->db->where('id', $this->input->post('id'));
  $this->db->update('tabel_siswa', $data);

  }

  public function detailUser($id)
  {
    return $this->db->get_where('user', ['id' => $id])->row_array();
  }

  public function editUser()
  { 
    $data = [
      'name' => $this->input->post('name',true),
      'username' => $this->input->post('username',true),
      // 'password' => $this->input->post('passwoard',true),
      'role_id' => $this->input->post('role_id',true),
      'mapel_id' => $this->input->post('mapel_id',true),
      'wali_id' => $this->input->post('wali_id',true),
      // 'upload_image' => $_FILES['image'],
      
    ];
    
    

  $this->db->where('id', $this->input->post('id'));
  $this->db->update('user', $data);
  
 
  }
  
  public function editP()
  { 
    $name = $this->input->post('name');
    $username = $this->input->post('username');
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    
    $upload_image = $_FILES['image']['name'];

    if($upload_image){
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '5048';
      $config['upload_path'] = './assets/dist/img/profile/';

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if($this->upload->do_upload('image')) {
        $old_image = $data['user']['user_image'];
        if($old_image != 'avatar5.png'){
          unlink(FCPATH . 'assets/dist/img/profile/' . $old_image);
        }


        $new_image = $this->upload->data('file_name');
        $this->db->set('user_image', $new_image);
      } else {
        echo $this->upload->display_erros();
      }
    }

    $this->db->set('name', $name);
    $this->db->where('username', $username);
    $this->db->update('user');
  }
  
  // Belum berhasil
  public function editPId()
  { 
    $data = [
      'name' => $this->input->post('name',true),
      'username' => $this->input->post('username',true),
      // 'password' => $this->input->post('passwoard',true),
      'role_id' => $this->input->post('role_id',true),
      'mapel_id' => $this->input->post('mapel_id',true),
      'wali_id' => $this->input->post('wali_id',true),
      
    ];
    
    $upload_image = $_FILES['image']['name'];
    

    if($upload_image){
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '5048';
      $config['upload_path'] = './assets/dist/img/profile1/';

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if($this->upload->do_upload('image')) {
        $old_image = $data['user']['user_image'];
        if($old_image != 'avatar5.png'){
          unlink(FCPATH . 'assets/dist/img/profile1/' . $old_image);
        }


        $new_image = $this->upload->data('file_name');
        $this->db->set('user_image', $new_image);
      } else {
        echo $this->upload->display_erros();
      }
    }

    // $this->db->set('user_image', $new_image);
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('user', $data);
  }

}