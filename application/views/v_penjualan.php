<div Class="kanan">
    <h2>ITEMS</h2>
    <hr>
    <div class="col-md-4">
    </div>
    <table class="table table-hover">
        <thead class="table-secondary">
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php $no = 1;
        foreach ($tbbarang as $dbarang) : ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $dbarang->id_barang; ?></td>
                <td><?php echo $dbarang->nama_barang; ?></td>
                <td>Rp.<?php echo number_format($dbarang->harga_barang); ?></td>
                <td><?php echo $dbarang->stok_barang; ?></td>
                <td><a class="btn btn-primary btn-sm" href="<?php echo base_url() . 'C_penjualan/beli/' . $dbarang->id_barang; ?>"><i class="fa-solid fa-cart-plus"></i> </td>
            </tr>
        <?php $no++;
        endforeach; ?>
    </table>
</div>
<div Class="kiri">
    <h2>TRANSACTION</h2>
    <hr>
    <br>
    <h5>ID Transaction : <?php echo $kode_jual; ?></h5>
    <table class="table">
        <thead class="table-secondary">
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Price</th>
                <th>Buy</th>
                <th>Total</th>
                <th>Action</th>
        </thead>
        </tr>
        <?php
        if (!empty($detail_beli)) {
            $no = 1;
            foreach ($detail_beli as $beli) : ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $beli->id_barang; ?></td>
                    <td>Rp.<?php echo number_format($beli->harga_barang); ?></td>
                    <td>
                        <form action="<?php echo base_url() . 'C_penjualan/edit_jmlbarang/' . $kode_jual . '-' . $beli->id_barang; ?>" method="post">
                            <input type="number" name="old_jml_barang" class="form-control" value="<?php echo $beli->jumlah_barang; ?>" hidden>
                            <input type="number" name="jml_barang" class="form-control" value="<?php echo $beli->jumlah_barang; ?>">
                            <input type="submit" hidden>
                        </form>
                    </td>
                    <td>Rp.<?php echo number_format($beli->total); ?></td>
                    <td><a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'C_penjualan/hapus/' . $kode_jual . '-' . $beli->id_barang; ?>"><i class="fa-solid fa-trash-can"></i> </a></td>
                </tr>
            <?php $no++;
            endforeach;
        } else { ?>
        <?php } ?>
        <?php if (!empty($detail_beli)) { ?>
            <tr>
                <th colspan="4">Sub Total</th>
                <td colspan="2"><strong>Rp.<?php echo number_format($sub_total->total); ?></strong></td>
            </tr>
        <?php } else {
        ?>
            <tr>
                <th colspan="4">Sub Total</th>
                <th colspan="2"><strong>Rp.0</strong></th>
            </tr>
        <?php } ?>
    </table>
    <a class="btn btn-primary" href="<?php echo base_url() . 'C_penjualan/checkout/' . $sub_total->total ?>">Checkout</a>
</div>