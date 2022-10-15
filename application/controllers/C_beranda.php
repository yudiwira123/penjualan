<?php
class C_beranda extends CI_Controller{
    function index(){
        $this->load->model('M_crud');
        $title['judul'] = "Dashboard";
        $this->load->view('header', $title);
        $data['user'] = $this->M_crud->tampil('tbuser')->result();
        $data['barang'] = $this->M_crud->tampil('tbbarang')->result();
        $data['transaksi'] = $this->M_crud->tampil('tbtransaksi')->result();
        $data['sum'] = $this->M_crud->get_sum();
        $this->load->view('beranda',$data);
        $this->load->view('footer');
    }
    
}
