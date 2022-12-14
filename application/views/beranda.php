<div class="container">
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <br>
        <h2>DASHBOARD</h2>
        <div class="d-flex align-items-end flex-column">
            <li class="nav-item dropdown float right">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <h class="dropdown-item">User Info</h>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <h class="dropdown-item">Nama :<?php echo $_SESSION['nama']; ?></h>
                    </li>
                    <li>
                        <h class="dropdown-item">Level :<?php echo $_SESSION['level']; ?></h>
                    </li>
                </ul>
            </li>
        </div>
    </ul>
    <hr>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h2><?php echo count($user) ?></h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h3 class="small text-white">Data User</h3>
                    <div class="small text-white"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h2><?php echo count($barang) ?></h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h3 class="small text-white">Data Barang</h3>
                    <div class="small text-white"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h2><?php echo count($transaksi) ?></h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h3 class="small text-white">Transaksi</h3>
                    <div class="small text-white"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <h2>Rp.<?php echo number_format($sum) ?></h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h3 class="small text-white">Penghasilan</h3>
                    <div class="small text-white"></div>
                </div>
            </div>
        </div>
    </div>
</div>