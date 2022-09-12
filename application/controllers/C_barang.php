<?php 
class C_barang extends CI_Controller{
    function index(){
        $this->load->model('M_crud');
        $this->load->view('header');
        if ($_GET) {
            $data['tbbarang'] = $this->M_crud->cari('tbbarang', $_GET['search'], 'id_barang', 'nama_barang')->result();
        }
        else {
            $data['tbbarang'] = $this->M_crud->tampil('tbbarang')->result();
        }
        $this->load->view('v_barang',$data);
        if($_POST){
            $field['id_barang'] = $this->input->post('id_barang');
            $field['nama_barang'] = $this->input->post('nama_barang');
            $field['harga_barang'] = $this->input->post('harga');
            $field['stok_barang'] = $this->input->post('stok');
            $this->M_crud->tambah('tbbarang',$field);
            redirect(base_url().'C_barang');
        }
        $this->load->view('footer');
        
    }
    //     function tambah(){
    //     $this->load->model('M_crud');
    //     $this->load->view('header');
    //     $data['tbbarang'] = $this->M_crud->tampil('tbbarang')->result();
    //     $this->load->view('v_tambah_barang',$data);
    //     if($_POST){
    //         $field['id_barang'] = $this->input->post('id_barang');
    //         $field['nama_barang'] = $this->input->post('nama_barang');
    //         $field['harga_barang'] = $this->input->post('harga');
    //         $field['stok_barang'] = $this->input->post('stok');
    //         $this->M_crud->tambah('tbbarang',$field);
    //         redirect(base_url().'C_barang');
    //     }
    //     $this->load->view('footer');
        
    // }
    

    function hapus($id){
        $this->load->model('M_crud');
        $kode['id_barang'] =$id;
        $this->M_crud->hapus('tbbarang',$kode);
        redirect(base_url().'C_barang');
    }
    function edit($id){
        $this->load->model('M_crud');
        $this->load->view('header');
        $data['tbbarang'] = $this->M_crud->tampil('tbbarang')->result();
        $kode['id_barang'] = $id;
        $data['edit'] = $this->M_crud->tampil_id('tbbarang',$kode)->row();
        $this->load->view('v_edit_barang',$data);
        if($_POST){
            $field['id_barang'] = $this->input->post('id_barang');
            $field['nama_barang'] = $this->input->post('nama_barang');
            $field['harga_barang'] = $this->input->post('harga');
            $field['stok_barang'] = $this->input->post('stok');
            $this->M_crud->edit('tbbarang',$field,$kode);
            redirect(base_url().'C_barang');
        }
        $this->load->view('footer');
    }
    
}

?>