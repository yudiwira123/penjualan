<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SKRIPSI</title>
    <link rel="stylesheet" href="<?php echo base_url().'style.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'asset/style.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'fontawesome/css/all.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'css/bootstrap-reboot.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'css/bootstrap-grid.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'css/bootstrap.min.css';?>">
  </head>
  <?php 
  if(!$_SESSION['id_user']){
    redirect('./');
  }
  ?>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <div class="container d-flex justify-content-start">
        <a class="navbar-brand" href="<?php echo base_url().'C_beranda'; ?>"><img src="<?php echo base_url('logo_astikom_web.png');?>" style="width:125px;height:42px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse flex-column" id="navbarNavAltMarkup">
            <div class="navbar-nav float-right">
              <?php if($_SESSION['level']==1){ ?>
              <a class="nav-link" aria-current="page" href="<?php echo base_url().'C_barang'; ?>">DATA BARANG</a>
              <a class="nav-link" aria-current="page" href="<?php echo base_url().'C_user'; ?>">DATA USER</a>
              <?php } ?>
              <a class="nav-link" aria-current="page" href="<?php echo base_url().'C_penjualan'; ?>">TRANSAKSI</a>
              <a class="nav-link" aria-current="page" href="<?php echo base_url().'C_laporan'; ?>">LAPORAN</a>
              <a class="nav-link" aria-current="page" onclick="return confirm('Apakah Anda Yakin Ingin Keluar Applikasi?')" href="<?php echo base_url().'C_login/keluar'; ?>">LOGOUT</a>
            </div>
          </div>
      </div>
    </nav>