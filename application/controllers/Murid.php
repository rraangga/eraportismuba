<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Murid extends CI_Controller 
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
    $this->load->library('CSVReader');

  }

  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['title'] = 'Profile Murid';
    // $data['quser'] = $this->db->get('user')->result_array();
    $data['quser'] = $this->Role_Model->getroleM(); 
    $data['userr'] = $this->Role_Model->getroleG();
    $data['murid'] = $this->Role_Model->dataMurid();
    $data['tmenu'] = $this->db->get('menu_murid')->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('murid/sidemurid', $data);
    $this->load->view('murid/index', $data);
    $this->load->view('template/footer');

  }
}