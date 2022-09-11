<?php
class C_login extends CI_Controller{
    function index(){
        $this->load->model('M_login');
        $this->load->view('login');
      
        if($_POST){
            $username = $this->input->post('username');
            $pass = $this->input->post('password');

            $user = $this->M_login->ceklogin(['username' => $username]);

            if($user){
               if($user->password == md5($pass)){
                  $sessi = [
                      'nama' =>$user->nama_user,
                      'level' =>$user->level,
                      'id_user' =>$user->id_user
                  ];
                  $this->session->set_userdata($sessi);
                  redirect(base_url().'C_beranda');
               }else{
                   echo "<script>alert('password tidak sesuai');</script>";
               }
            }else{
                echo "<script>alert('user tidak terdaftar');</script>";
            }
        }
    }    
    function keluar(){
        session_destroy();
        redirect('./');
    }
}

?>