<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
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
    $this->load->view('admin/index', $data);
    $this->load->view('template/footer');

  }
  
  public function tuser()
  {
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['title'] = 'Table User';
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
    $this->load->view('admin/tabel_user', $data);
    $this->load->view('template/footer');
  }
  
  public function import(){
    $data = array();
    $memData = array();
    
    // If import request is submitted
    if($this->input->post('importSubmit')){
        // Form field validation rules
        $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
       
        // Validate submitted form data
        if($this->form_validation->run() == true){
            $insertCount = $updateCount = $rowCount = $notAddCount = 0;
            
            // If file uploaded
            if(is_uploaded_file($_FILES['file']['tmp_name'])){
                // Load CSV reader library
                $this->load->library('CSVReader');
                
                // Parse data from CSV file
                $csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);
                
                // Insert/update CSV data into database
                if(!empty($csvData)){
                    foreach($csvData as $row){ $rowCount++;
                   
                        // Prepare data for DB insertion
                        $memData = array(
                            'nomer' => $row['No'],
                            'name' => $row['Name'],
                            'username' => $row['Username'],
                            'password' => $row['Password'],
                            'user_image' => $row['Image'],
                            'role_id' => $row['Role'],
                            'active' => $row['Active'],
                        );
                        
                        // Check whether email already exists in the database
                        $con = array(
                            'where' => array(
                                'username' => $row['Username']
                            ),
                            'returnType' => 'count'
                        );
                        $prevCount = $this->Member->getRows($con);
                        
                        if($prevCount > 0){
                            // Update Member data
                            $condition = array('username' => $row['Username']);
                            $update = $this->Member->update($memData, $condition);
                            
                            if($update){
                                $updateCount++;
                            }
                        }else{
                            // Insert Member data
                            $insert = $this->Member->insert($memData);
                            
                            if($insert){
                                $insertCount++;
                            }
                        }
                    }
                    
                    // Status message with imported data count
                    $notAddCount = ($rowCount - ($insertCount + $updateCount));
                    $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                    $this->session->set_userdata('success_msg', $successMsg);
                }
            }else{
                $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
            }
        }else{
            $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
        }
    }
    redirect('admin/tuser');
}

/*
 * Callback function to check file value and type during validation
 */
public function file_check($str){
    $allowed_mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
        $mime = get_mime_by_extension($_FILES['file']['name']);
        $fileAr = explode('.', $_FILES['file']['name']);
        $ext = end($fileAr);
        if(($ext == 'csv') && in_array($mime, $allowed_mime_types)){
            return true;
        }else{
            $this->form_validation->set_message('file_check', 'Please select only CSV file to upload.');
            return false;
        }
    }else{
        $this->form_validation->set_message('file_check', 'Please select a CSV file to upload.');
        return false;
    }
}

  public function tsiswa()
  {
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['title'] = 'Table Siswa';
    $data['tsiswa'] = $this->db->get('tabel_siswa')->result_array();
    $data['kelas'] = ['7A','7B','7C','8A','8B','8C','9A','9B','9C',];
    $data['userr'] = $this->Role_Model->getroleG(); 
    $data['tmenu'] = $this->db->get('menu_admin')->result_array();
    $data['tmenu2'] = $this->db->get('menu_admin_2')->result_array();
    $data['tmenu3'] = $this->db->get('menu_admin_3')->result_array();
    $data['kelasw'] = $this->Role_Model->kelasG();
    // $data['uri'] = $this->uri->segment(2);
    
    $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
    $this->form_validation->set_rules('nisn', 'NISN', 'required|numeric');
    $this->form_validation->set_rules('kelas', 'Kelas', 'required');

    if($this->form_validation->run() == false) {
      $this->load->view('template/header', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('admin/sideadmin', $data);
      $this->load->view('guru/tsiswa', $data);
      $this->load->view('template/footer');
    
    } else {

      $this->TambahSiswa_Model->TambahSiswaModel('tabel_siswa', $data);
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
        Data sukses ditambah!</div>
      </div>
    </div>');
      redirect('admin/tsiswa');
    }

  }
  
  public function delete($id)
  {
     $this->DeleteSiswa_Model->deleteSiswa($id);
     $this->session->set_flashdata('message', '<div class="col">
     <div class="card bg-danger mb-3">
       <div class="card-header">
         <h3 class="card-title">Sukses!</h3>
         <div class="card-tools">
           <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
           </button>
         </div>
         </div>
         <div class="card-body">
       Data sukses dihapus!</div>
     </div>
   </div>');
     redirect('admin/tsiswa'); 
  }
  // Detail Siswa
  public function detail($id)
  {
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['title'] = 'Detail Siswa';
    $data['userr'] = $this->Role_Model->getroleG(); 
    $data['tmenu'] = $this->db->get('menu_admin')->result_array();
    $data['tmenu2'] = $this->db->get('menu_admin_2')->result_array();
    $data['tmenu3'] = $this->db->get('menu_admin_3')->result_array();
    $data['kelasw'] = $this->Role_Model->kelasG();
    // $data['uri'] = $this->uri->segment(2);

    $data['tabelsiswa'] = $this->TambahSiswa_Model->detailSiswa($id);
    $this->load->view('template/header', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('admin/sideadmin', $data);
    $this->load->view('guru/detail', $data);
    $this->load->view('template/footer');
  }
  
  // Edit Siswa
  public function edit($id)
  {
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['title'] = 'Edit Siswa';
    $data['tmenu'] = $this->db->get('menu_admin')->result_array();
    $data['tmenu2'] = $this->db->get('menu_admin_2')->result_array();
    $data['tmenu3'] = $this->db->get('menu_admin_3')->result_array();
    $data['kelasw'] = $this->Role_Model->kelasG();
    // $data['uri'] = $this->uri->segment(2);
    
    $data['tabelsiswa'] = $this->TambahSiswa_Model->detailSiswa($id);
    $data['kelas'] = ['7A','7B','7C','8A','8B','8C','9A','9B','9C',];
    $data['tsiswa'] = $this->db->get('tabel_siswa')->result_array();
    $data['userr'] = $this->Role_Model->getroleG(); 
    
    
    $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
    $this->form_validation->set_rules('nisn', 'NISN', 'required');       
    $this->form_validation->set_rules('induk', 'Induk', 'required');       
    $this->form_validation->set_rules('kelas', 'Kelas', 'required');
  

    if($this->form_validation->run() == false) {
      $this->load->view('template/header', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('admin/sideadmin', $data);
      $this->load->view('guru/edit', $data);
      $this->load->view('template/footer');
    
    } else {
      $this->TambahSiswa_Model->editSiswa(); 
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
        Data berahasil diubah!</div>
      </div>
      </div>');
      redirect('admin/tsiswa');
    }
  }

  public function importsis(){
    $data = array();
    $memData = array();
    
    // If import request is submitted
    if($this->input->post('importSubmit')){
        // Form field validation rules
        $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
       
        // Validate submitted form data
        if($this->form_validation->run() == true){
            $insertCount = $updateCount = $rowCount = $notAddCount = 0;
            
            // If file uploaded
            if(is_uploaded_file($_FILES['file']['tmp_name'])){
                // Load CSV reader library
                $this->load->library('CSVReader');
                
                // Parse data from CSV file
                $csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);
                
                // Insert/update CSV data into database
                if(!empty($csvData)){
                    foreach($csvData as $row){ $rowCount++;
                   
                        // Prepare data for DB insertion
                        $memData = array(
                            'nomer_id' => $row['Nomer'],
                            'induk' => $row['Induk'],
                            'nama_siswa' => $row['Nama'],
                            'nisn' => $row['Nisn'],
                            'kelas' => $row['Kelas'],
                            'image' => $row['Image'],
                            'active' => $row['Active'],
                        );
                        
                        // Check whether email already exists in the database
                        $con = array(
                            'where' => array(
                                'nama_siswa' => $row['Nama']
                            ),
                            'returnType' => 'count'
                        );
                        $prevCount = $this->MemberS->getRows($con);
                        
                        if($prevCount > 0){
                            // Update Member data
                            $condition = array('nama_siswa' => $row['Nama']);
                            $update = $this->MemberS->update($memData, $condition);
                            
                            if($update){
                                $updateCount++;
                            }
                        }else{
                            // Insert Member data
                            $insert = $this->MemberS->insert($memData);
                            
                            if($insert){
                                $insertCount++;
                            }
                        }
                    }
                    
                    // Status message with imported data count
                    $notAddCount = ($rowCount - ($insertCount + $updateCount));
                    $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                    $this->session->set_userdata('success_msg', $successMsg);
                }
            }else{
                $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
            }
        }else{
            $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
        }
    }
    redirect('admin/tsiswa');
}

// User detail dan edit Password
  public function user($id)
  {
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['title'] = 'Detail User';
    $data['quser'] = $this->Role_Model->getroleU($id); 
    $data['userr'] = $this->Role_Model->getroleG(); 
    $data['tmenu'] = $this->db->get('menu_admin')->result_array();
    $data['tmenu2'] = $this->db->get('menu_admin_2')->result_array();
    $data['tmenu3'] = $this->db->get('menu_admin_3')->result_array();
    $data['kelasw'] = $this->Role_Model->kelasdetailG($id);
    // $data['uri'] = $this->uri->segment(2);
    // $data['tabeluser'] = $this->TambahSiswa_Model->detailUser($id);
    $this->form_validation->set_rules('oldpassword', 'Password', 'required|trim');
    $this->form_validation->set_rules('newpassword', 'Password', 'required|trim|min_length[5]|matches[password]');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[newpassword]');

    if($this->form_validation->run() == false) {
      $this->load->view('template/header', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('admin/sideadmin', $data);
      $this->load->view('admin/detail', $data);
      $this->load->view('template/footer');
    } else {

      $this->Gantipass_Model->gantipU();
      
    }
  }

  // user Edit
  public function useredit($id)
  {
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['title'] = 'Edit User';
    $data['quser'] = $this->Role_Model->getroleU($id); 
    $data['userr'] = $this->Role_Model->getroleG(); 
    $data['tmenu'] = $this->db->get('menu_admin')->result_array();
    $data['tmenu2'] = $this->db->get('menu_admin_2')->result_array();
    $data['tmenu3'] = $this->db->get('menu_admin_3')->result_array();
    $data['urole'] = $this->db->get('user_role')->result_array();
    $data['tmapel'] = $this->db->get('tabel_mapel')->result_array();
    $data['tkelas'] = $this->db->get('tabel_kelas')->result_array();
    $data['kelasw'] = $this->Role_Model->kelasG();
    // $data['uri'] = $this->uri->segment(2);
    // $data['role'] = ['Admin','Guru','Walikelas'];
    $data['role'] = ['1','2','3','4'];
    $data['mapel'] = ['1','2','3','4','5','6','7'];
    $data['wali'] = ['1','2','3','4','5','6','7','8','9','10'];
   
    
    // $data['tabeluser'] = $this->TambahSiswa_Model->detailUser($id);
    // $data['kelas'] = ['7A','7B','7C','8A','8B','8C','9A','9B','9C',];
    // $data['tuser'] = $this->db->get('tabel_siswa')->result_array();
    
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    // $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
    $this->form_validation->set_rules('role_id', 'Role', 'required');
    

    if($this->form_validation->run() == false) {
      $this->load->view('template/header', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('admin/sideadmin', $data);
      $this->load->view('admin/edit', $data);
      $this->load->view('template/footer');
    
    } else {
      
      $this->TambahSiswa_Model->editUser(); 
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
        Data berahasil diubah!</div>
      </div>
      </div>');
      redirect('admin/tuser');
    }
  }

}