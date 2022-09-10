<?php
class C_user extends CI_Controller{
    function index(){
        $this->load->model('M_crud');
        $this->load->view('header');
        $data['tbuser'] = $this->M_crud->tampil('tbuser')->result();
        $this->load->view('v_user',$data);
        if($_POST){
            $field['nama_user'] = $this->input->post('name');
            $field['id_user'] = $this->input->post('idname');
            $field['no_telp'] = $this->input->post('pnumber');
            $field['jenis_kelamin'] = $this->input->post('jk');
            $field['username'] = $this->input->post('uname');
            $field['password'] = md5($this->input->post('password'));
            $field['level'] = 2;
            $this->M_crud->tambah('tbuser',$field);
            redirect(base_url().'C_user');
        }
        $this->load->view('footer');
        
    }

    function tambah(){
        $this->load->model('M_crud');
        $this->load->view('header');
        $data['tbuser'] = $this->M_crud->tampil('tbuser')->result();
        $this->load->view('v_tambah_user',$data);
        if($_POST){
            $field['nama_user'] = $this->input->post('name');
            $field['id_user'] = $this->input->post('idname');
            $field['no_telp'] = $this->input->post('pnumber');
            $field['jenis_kelamin'] = $this->input->post('jk');
            $field['username'] = $this->input->post('uname');
            $field['password'] = md5($this->input->post('password'));
            $field['level'] = 2;
            $this->M_crud->tambah('tbuser',$field);
            redirect(base_url().'C_user');
        }
        $this->load->view('footer');
    }
    
    function edit($id){
        $this->load->model('M_crud');
        $this->load->view('header');
        $data['tbuser'] = $this->M_crud->tampil('tbuser')->result();
        $kode['id_user'] = $id;
        $data['edit'] = $this->M_crud->tampil_id('tbuser',$kode)->row();
        $this->load->view('v_edit_user',$data);
        if($_POST){
            $field['nama_user'] = $this->input->post('name');
            $field['id_user'] = $this->input->post('idname');
            $field['no_telp'] = $this->input->post('pnumber');
            $field['jenis_kelamin'] = $this->input->post('jk');
            $field['username'] = $this->input->post('uname');
            if(empty($this->input->post('password'))){
                $field['password'] = md5($this->input->post('password_lama'));
            }else{
            $field['password'] = md5($this->input->post('password'));
            }
            $field['level'] = 2;
            $this->M_crud->edit('tbuser',$field,$kode);
            redirect(base_url().'C_user');
        }
        $this->load->view('footer');
    }

    function hapus($id){
        $this->load->model('M_crud');
        $kode['id_user'] = $id;
        $this->M_crud->hapus('tbuser',$kode);
        redirect(base_url().'C_user');
    }
}

?>