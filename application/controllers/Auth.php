<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Member');
  }  

  public function index()
	{
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');
    if($this->form_validation->run() == false) {
      $data = [
        'title' => 'E-Raport ISMUBA | Login'
      ];
      $this->load->view('template/header_a', $data);
      $this->load->view('auth/login');
      $this->load->view('template/footer_a');
      
    } else {
      
      $this->_login();

    }
	}

  private function _login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['username' => $username])->row_array();
// Jika user ada
    if ($user) {
// jika user aktif
      if($user['active'] == 1) {
        // cek PW
        if(password_verify($password, $user['password'])) {
          $data = [
            'username' => $user['username'],
            'role_id' => $user['role_id'],
          ];
          $this->session->set_userdata($data);
          if($data['role_id'] == 1){
            redirect('admin');
            
        

          } if($data['role_id'] == 2){
            redirect('guru');
           

          } if($data['role_id'] == 3){
            redirect('walikelas');
            
          } else{
            redirect('murid');
          }
            
        } else {
          
          $this->session->set_flashdata('message', '<div 
          class="col">
          <div class="card bg-danger mb-3">
            <div class="card-header">
              <h3 class="card-title">Gagal!</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
              </div>
              </div>
              <div class="card-body">
            Password Salah!</div>
          </div>
        </div>');
        redirect('auth');
        }
// user tidak aktif
      } else {
        
        $this->session->set_flashdata('message', '<div 
        class="col">
        <div class="card bg-danger mb-3">
          <div class="card-header">
            <h3 class="card-title">Gagal!</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
              </button>
            </div>
            </div>
            <div class="card-body">
          Akun anda belum diaktifkan</div>
        </div>
      </div>');
      redirect('auth');
  

      }


    } else {
     
      $this->session->set_flashdata('message', '<div 
      class="col">
      <div class="card bg-danger mb-3">
        <div class="card-header">
          <h3 class="card-title">Gagal!</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>
          </div>
          <div class="card-body">
        User tidak ditemukan!</div>
      </div>
    </div>');
    redirect('auth');

    }

  }

  public function register()
  {
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[passwordconf]');
    $this->form_validation->set_rules('passwordconf', 'Password', 'required|trim|matches[password]');

    if($this->form_validation->run() == false) {
      
      $data = [
        'title' => 'E-Raport ISMUBA | Register'
      ];
      
      $this->load->view('template/header_a', $data);
      $this->load->view('auth/register');
      $this->load->view('template/footer_a');

    } else {
      $data = [
        'name' =>  htmlspecialchars($this->input->post('name', true)),
        'username' => htmlspecialchars($this->input->post('username', true)),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'user_image' => 'avatar5.png',
        'mapel_id' => 7,
        'wali_id' => 10,
        'role_id' => 2,
        'created' => date("Y-m-d H:i:s"),
        'modified' => date("Y-m-d H:i:s"),
        'active' => 1,

      ];

        $this->db->insert('user', $data);
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
          Akun anda sudah aktif!</div>
        </div>
      </div>');
      redirect('auth');

    }
    
  }

  // logut
  public function logout()
  {
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('role_id');

    redirect('auth');

  }

  public function blank()
  {
    $data['title'] = 'UPPSSS ERROR';

    $this->load->view('template/header_a', $data);
   
    $this->load->view('auth/error');
    $this->load->view('template/footer_a');

  }
}