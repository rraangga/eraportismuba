<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inputnilai extends CI_Controller 
{

  public function __construct()
  {
    parent::__construct();
    chek_login();
    
    $this->load->model('TambahSiswa_Model');
    $this->load->model('DeleteSiswa_Model');
    $this->load->model('Role_Model');
    $this->load->model('Gantipass_Model');
    $this->load->model('Member');
    $this->load->model('MemberS');
    $this->load->library('CSVReader');
    

  }

  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['title'] = 'Dashboard';
    // $data['quser'] = $this->db->get('user')->result_array();
    $data['quser'] = $this->Role_Model->getroleM(); 
    $data['userr'] = $this->Role_Model->getroleG();
    $data['tmenu'] = $this->db->get('menu_admin')->result_array();
    $data['tmenu2'] = $this->db->get('menu_admin_2')->result_array();
    $data['tmenu3'] = $this->db->get('menu_admin_3')->result_array();
    $data['kelasw'] = $this->Role_Model->kelasG();
    // $data['uri'] = $this->uri->segment(2);
    
    $this->load->view('template/header', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('admin/sideadmin', $data);
    $this->load->view('guru/inputnilai', $data);
    $this->load->view('template/footer');

  }
}