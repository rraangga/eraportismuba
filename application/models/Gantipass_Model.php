<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Gantipass_Model extends CI_Model 
{
  public function gantip()
  {
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $oldpassword = $this->input->post('oldpassword');
    $newpassword = $this->input->post('newpassword');

    if(!password_verify($oldpassword, $data['user']['password'])){
      $this->session->set_flashdata('message', '<div class="col">
        <div class="card bg-danger mb-3">
          <div class="card-header">
            <h3 class="card-title">Gagal!</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
              </button>
            </div>
            </div>
            <div class="card-body">
          Password lama salah</div>
        </div>
        </div>');
        redirect('guru');
        
      } else {

        if($oldpassword == $newpassword) {
          $this->session->set_flashdata('message', '<div class="col">
          <div class="card bg-danger mb-3">
            <div class="card-header">
              <h3 class="card-title">Gagal!</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
              </div>
              </div>
              <div class="card-body">
            Password baru tidak boleh sama dengan password lama!</div>
          </div>
          </div>');
          redirect('guru');
        } else {
          $password_hash = password_hash($newpassword, PASSWORD_DEFAULT);

          $this->db->set('password', $password_hash);
          $this->db->where('username', $this->session->userdata('username'));
          $this->db->update('user');
          
          $this->session->set_flashdata('message', '<div class="col">
          <div class="card bg-success mb-3">
            <div class="card-header">
              <h3 class="card-title">Sukses!</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
              </div>
              </div>
              <div class="card-body">
            Password berahasil diubah!</div>
          </div>
          </div>');
          redirect('guru');
        }
      }
  }
  
  public function gantipW()
  {
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $oldpassword = $this->input->post('oldpassword');
    $newpassword = $this->input->post('newpassword');

    if(!password_verify($oldpassword, $data['user']['password'])){
      $this->session->set_flashdata('message', '<div class="col">
        <div class="card bg-danger mb-3">
          <div class="card-header">
            <h3 class="card-title">Gagal!</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
              </button>
            </div>
            </div>
            <div class="card-body">
          Password lama salah</div>
        </div>
        </div>');
        redirect('walikelas');
        
      } else {

        if($oldpassword == $newpassword) {
          $this->session->set_flashdata('message', '<div class="col">
          <div class="card bg-danger mb-3">
            <div class="card-header">
              <h3 class="card-title">Gagal!</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
              </div>
              </div>
              <div class="card-body">
            Password baru tidak boleh sama dengan password lama!</div>
          </div>
          </div>');
          redirect('walikelas');
        } else {
          $password_hash = password_hash($newpassword, PASSWORD_DEFAULT);

          $this->db->set('password', $password_hash);
          $this->db->where('username', $this->session->userdata('username'));
          $this->db->update('user');
          
          $this->session->set_flashdata('message', '<div class="col">
          <div class="card bg-success mb-3">
            <div class="card-header">
              <h3 class="card-title">Sukses!</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
              </div>
              </div>
              <div class="card-body">
            Password berahasil diubah!</div>
          </div>
          </div>');
          redirect('walikelas');
        }
      }
  }
  
  // Ganti Password User
  public function gantipU()
  {
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $oldpassword = $this->input->post('oldpassword');
    $newpassword = $this->input->post('newpassword');

    if(!password_verify($oldpassword, $data['user']['password'])){
      $this->session->set_flashdata('message', '<div class="col">
        <div class="card bg-danger mb-3">
          <div class="card-header">
            <h3 class="card-title">Gagal!</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
              </button>
            </div>
            </div>
            <div class="card-body">
          Password lama salah</div>
        </div>
        </div>');
        redirect('admin/tuser');
        
      } else {

        if($oldpassword == $newpassword) {
          $this->session->set_flashdata('message', '<div class="col">
          <div class="card bg-danger mb-3">
            <div class="card-header">
              <h3 class="card-title">Gagal!</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
              </div>
              </div>
              <div class="card-body">
            Password baru tidak boleh sama dengan password lama!</div>
          </div>
          </div>');
          redirect('admin/tuser');
        } else {
          $password_hash = password_hash($newpassword, PASSWORD_DEFAULT);

          $this->db->set('password', $password_hash);
          $this->db->where('id', $this->input->post('id'));
          // $this->db->where('username', $this->session->userdata('username'));
          $this->db->update('user');
          
          $this->session->set_flashdata('message', '<div class="col">
          <div class="card bg-success mb-3">
            <div class="card-header">
              <h3 class="card-title">Sukses!</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
              </div>
              </div>
              <div class="card-body">
            Password berahasil diubah!</div>
          </div>
          </div>');
          redirect('admin/tuser');
        }
      }
  }
}