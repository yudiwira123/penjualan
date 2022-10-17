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
    function get_laporan()
    {
        $this->load->model('M_crud');
        $where['tanggal_transaksi >='] = $this->input->get('awal');
        $where['tanggal_transaksi <='] = date('Y-m-d H:i:s', strtotime($this->input->get('akhir') . ' +1 day'));
        $data['total'] = $this->M_crud->total('tbtransaksi', 'sub_total', $where)->row();
        $data['laporan'] = $this->M_crud->tampil_id('tbtransaksi', $where)->result();
		if($this->input->get('dtransaksi')){
			$data['detail_transaksi'] = $this->M_crud->tampil_join('tbbarang', 'tbdetail_transaksi', 'tbbarang.id_barang=tbdetail_transaksi.id_barang', ['id_transaksi' => $this->input->get('dtransaksi')])->result();
		} else {
			$data['detail_transaksi'] = 0;
		}
        $this->load->view('header');
        $this->load->view('v_laporan', $data);
        $this->load->view('footer');
    }
}
