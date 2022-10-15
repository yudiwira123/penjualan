<?php
class C_laporan extends CI_Controller
{
    function index()
    {
        $title['judul'] = "Laporan";
        $this->load->view('header', $title);
        $this->load->view('v_laporan');
        $this->load->view('footer');
    }
    function post_laporan()
    {
        $this->load->model('M_crud');
        $where['tanggal_transaksi >='] = $this->input->post('awal');
        $where['tanggal_transaksi <='] = date('Y-m-d H:i:s', strtotime($this->input->post('akhir') . ' +1 day'));
        $data['total'] = $this->M_crud->total('tbtransaksi', 'sub_total', $where)->row();
        $data['laporan'] = $this->M_crud->tampil_id('tbtransaksi', $where)->result();
        $this->load->view('header');
        $this->load->view('v_laporan', $data);
        $this->load->view('footer');
    }
}
