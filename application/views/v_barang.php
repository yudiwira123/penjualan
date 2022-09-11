<div class="container">
<br>
        <h2>DATA BARANG</h2>
        <div class="d-flex align-items-end flex-column">
            <a href="<?php echo base_url().'C_barang/tambah'; ?>" class="btn btn-primary btn-sm float-right"><i class="fa-solid fa-plus"></i> Add</a>
        </div>
        <br>
            <div class="col-md-3">
                <form action="<?php echo base_url().'C_barang'; ?>" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Search">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-magnifying-glass"></i> </button>
                    </div>
                </div> 
            </form>
            <table class="table table-hover">
                <thead class="table-secondary">
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(!empty($tbbarang)){
            $no=1; foreach($tbbarang as $dbarang): ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $dbarang->id_barang; ?></td>
                    <td><?php echo $dbarang->nama_barang; ?></td>
                    <td>Rp.<?php echo number_format ($dbarang->harga_barang); ?></td>
                    <td><?php echo $dbarang->stok_barang; ?></td>
                    <td><a class="btn btn-success btn-sm" href="<?php echo base_url().'C_barang/edit/'.$dbarang->id_barang; ?>"><i class="fa-solid fa-pen-to-square"></i> </a> <a class="btn btn-danger btn-sm" href="<?php echo base_url().'C_barang/hapus/'.$dbarang->id_barang; ?>" onclick="return confirm('Apakah anda yakin menghapus data ini ?')"><i class="fa-solid fa-trash-can"></i> </a></td>
                </tr>
                <?php $no++; endforeach; }else{ ?>
                    <tr>
                        <td colspan="5">Data tidak ditemukan</td>
                    </tr>
                <?php } ?>
            </tbody>
    </table>
</div>
