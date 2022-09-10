<div class="container">
    <h2>WELCOME USER, <?php echo $_SESSION['nama']; ?></h2>
    <h3>User Level, <?php echo $_SESSION['level']; ?></h3>
    <br>
    <div class="d-flex justify-content-between">
        <div class="card text-bg-secondary bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header text-center inner">
                <h3>Jumlah User</h3>
            </div>
            <div class="card-body">
                <h3 class="card-title text-center"><?php echo count($user) ?></h3>
            </div>
        </div>
        <div class="card text-bg-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header text-center">
                <h3>Jumlah Barang</h3>
            </div>
            <div class="card-body">
                <h3 class="card-title text-center"><?php echo count($barang) ?></h3>
            </div>
        </div>
        <div class="card text-bg-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header text-center">
                <h3>Total Transaksi</h3>
            </div>
            <div class="card-body">
                <h3 class="card-title text-center"><?php echo count($transaksi) ?></h3>
            </div>
        </div>
        <div class="card text-bg-secondary mb-3">
            <div class="card-header text-center">
                <h3>Rp.<?php echo number_format($sum)?></h3>
            </div>
            <div class="icon">
                <i class="fa-solid fa-money-bill"></i>
                <p>Total Pendapatan</p>
            </div>
        </div>    
    </div>
</div>