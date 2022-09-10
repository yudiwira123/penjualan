<?php
class C_penjualan extends CI_Controller{
    function index(){
        $this->load->model('M_crud');
        $this->load->view('header');
        $id_transaksi = $id_transaksi = $this->M_crud->tampil_order('id_transaksi','tbtransaksi','DESC')->row();
        if(empty($id_transaksi)){
            $data['kode_jual'] = 1;
            $kode['id_transaksi'] = 1;
        }else{
            $data ['kode_jual'] = $id_transaksi->id_transaksi+1;
            $kode ['id_transaksi'] = $id_transaksi->id_transaksi+1;
        }
        $data['sub_total'] = $this->M_crud->total('tbdetail_transaksi','total',$kode)->row();  
        $data['detail_beli'] = $this->M_crud->tampil_join('tbbarang','tbdetail_transaksi','tbbarang.id_barang=tbdetail_transaksi.id_barang',$kode)->result();
        if ($_GET) {
            $data['tbbarang'] = $this->M_crud->cari('tbbarang', $_GET['search'], 'id_barang', 'nama_barang')->result();
        }
        else {
            $data['tbbarang'] = $this->M_crud->tampil('tbbarang')->result();
        }
        $this->load->view('v_penjualan',$data);
        $this->load->view('footer');
    }

    function beli($id){
        $this->load->model('M_crud');
        $where['id_barang'] = $id;
        $tbbarang = $this->M_crud->tampil_id('tbbarang',$where)->row();
        $id_transaksi = $id_transaksi = $this->M_crud->tampil_order('id_transaksi','tbtransaksi','DESC')->row();
        if(empty($id_transaksi)){
            $kode_jual = 1;
        }else{
            $kode_jual = $id_transaksi->id_transaksi+1;
        }
        $wherecek['id_barang'] = $id;
        $wherecek['id_transaksi'] = $kode_jual;
        $cekpenjualan = $this->M_crud->tampil_id('tbdetail_transaksi',$wherecek)->row();
        if(empty($cekpenjualan)){
        $field['id_barang'] = $id;
        $field ['id_transaksi'] = $kode_jual;
        $field['jumlah_barang'] = 1;
        $field['total'] = $tbbarang->harga_barang;
        $this->M_crud->tambah('tbdetail_transaksi',$field);
        }else{
            $field['jumlah_barang'] = $cekpenjualan->jumlah_barang+1;
            $field['total'] =  $field['jumlah_barang'] * $tbbarang->harga_barang;
            $this->M_crud->edit('tbdetail_transaksi',$field,$wherecek);
        }
        redirect(base_url().'C_penjualan');
    }
    function hapus($id){
        $this->load->model('M_crud');
        $pecah = explode('-',$id);
        $where['id_transaksi'] = $pecah[0];
        $where['id_barang'] = $pecah[1];
        $this->M_crud->hapus('tbdetail_transaksi',$where);
        redirect(base_url().'C_penjualan');
    }
    function checkout($id){
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_crud');
        $field['tanggal_transaksi'] = date('Y-m-d H:i:s');
        $field['sub_total'] = $id;
        $field['id_user'] = $_SESSION['id_user'];
        $this->M_crud->tambah('tbtransaksi',$field);
        redirect(base_url().'C_penjualan');
    }
        function edit_jmlbarang($id){
        $this->load->model('M_crud');
        $pecah = explode('-', $id);
        $where['id_transaksi'] = $pecah[0];
        $where['id_barang'] = $pecah[1];
        $id_brg['id_barang'] = $pecah[1];
        $brg = $this->M_crud->tampil_id('tbbarang', $id_brg)->row();
        $barang['stok_barang'] = $brg->stok_barang - $_POST['jml_barang'] + $_POST['old_jml_barang'] + 1;
        $this->M_crud->edit('tbbarang',$barang,$id_brg);
        $field['jumlah_barang'] = $_POST['jml_barang'];
        $this->M_crud->edit('tbdetail_transaksi',$field,$where);
        redirect(base_url().'C_penjualan');
    }
}

?>