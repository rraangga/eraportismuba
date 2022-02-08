<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Walikelas extends CI_Controller 
{

  public function __construct()
  {
    parent::__construct();
    chek_login();
    
    $this->load->model('TambahSiswa_Model');
    $this->load->model('DeleteSiswa_Model');
    $this->load->model('Role_Model');
    $this->load->model('Gantipass_Model');

  }
  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['title'] = 'Profile Walikelas';
    $data['quser'] = $this->Role_Model->getroleM(); 
    $data['userr'] = $this->Role_Model->getroleG();
    $data['mapel'] = $this->Role_Model->mapelG();
    $data['kelasw'] = $this->Role_Model->kelasG();
    $data['tmenu'] = $this->db->get('menu_wali')->result_array();


    $this->form_validation->set_rules('oldpassword', 'Password', 'required|trim');
    $this->form_validation->set_rules('newpassword', 'Password', 'required|trim|min_length[5]|matches[password]');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[newpassword]');
    
    if($this->form_validation->run() == false) {
      $this->load->view('template/header', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('walikelas/sidewali', $data);
      $this->load->view('walikelas/index', $data);
      $this->load->view('template/footer');
    } else {
      $this->Gantipass_Model->gantipW();
    }
  }
  public function waliedit()
  {
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['title'] = 'Edit Profile Guru';
    $data['quser'] = $this->db->get('user')->result_array();
    $data['mapel'] = $this->Role_Model->mapelG();
    $data['userr'] = $this->Role_Model->getroleG(); 
    $data['role'] = ['Admin','Guru','Walikelas'];
    $data['kelas'] = $this->Role_Model->kelasG();
    $data['tmenu'] = $this->db->get('menu_wali')->result_array();

    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    // $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
     
    if($this->form_validation->run() == false) {
      $this->load->view('template/header', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('walikelas/sidewali',$data);
      $this->load->view('walikelas/editpg',$data);
      $this->load->view('template/footer'); 
    
    } else {
    
        $this->TambahSiswa_Model->editP(); 
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
          Profile berahasil diubah!</div>
        </div>
        </div>');
        redirect('walikelas');


    }
  }

  public function print_c()
  {
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['title'] = 'Cover Raport';
    $data['tsiswa'] = $this->db->get('tabel_siswa')->row_array();
    
    $this->load->view('walikelas/cover',$data);
  }
}