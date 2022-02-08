<?php 

function chek_login()
{
  $a = get_instance();
  if(!$a->session->userdata('username')){
    redirect('auth');
  } else {
    $role_id = $a->session->userdata('role_id');
    $menu = $a->uri->segment(1);

    $queryUser = $a->db->get_where('user_role', ['role' => $menu])->row_array();
    $menu_id = $queryUser['id'];

    $roleAccess = $a->db->get_where('role_acces_menu', [
      'role_id' => $role_id,
      'menu_id' => $menu_id

    ]);
    
    if($roleAccess->num_rows() < 1){
      redirect('auth/blank');
    }
  }
}