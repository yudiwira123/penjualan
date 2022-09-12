<!-- Coding by CodingLab | www.codinglabweb.com -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="<?php echo base_url().'sidebar/style.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'asset/style.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'fontawesome/css/all.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'css/bootstrap-reboot.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'css/bootstrap-grid.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'css/bootstrap.min.css';?>">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>SKRIPSI</title> 
</head>
  <?php 
  if(!$_SESSION['id_user']){
    redirect('./');
  }
  ?>
<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="<?php echo base_url('logo_astikom_web.png');?>" style="width:125px;height:42px;">
                </span>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links ps-0">
                    <li class="nav-link p-0">
                        <a href="<?php echo base_url().'C_beranda'; ?>">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link p-0">
                        <a href="<?php echo base_url().'C_barang'; ?>">
                        <?php if($_SESSION['level']==1){ ?>
                            <i class='bx bx-box icon' ></i>
                            <span class="text nav-text">Inventory</span>
                        </a>
                    </li>

                    <li class="nav-link p-0">
                        <a href="<?php echo base_url().'C_user'; ?>">
                        <?php } ?>
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">User Data</span>
                        </a>
                    </li>

                    <li class="nav-link p-0">
                        <a href="<?php echo base_url().'C_penjualan'; ?>">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Transaction</span>
                        </a>
                    </li>

                    <li class="nav-link p-0">
                        <a href="<?php echo base_url().'C_laporan'; ?>">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Report</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a onclick="return confirm('Apakah Anda Yakin Ingin Keluar Applikasi?')" href="<?php echo base_url().'C_login/keluar'; ?>">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    <section class="home">
