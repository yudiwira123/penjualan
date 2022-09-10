<div class="kiri">
    <h1>Laporan</h1>
    <form action="<?php echo base_url().'C_laporan/post_laporan'; ?>" method="post">
        <div class="mb-3">
            <label class="form-label mb-1 pb-1">Tanggal Awal Membuat Laporan</label>
            <input type="date" class="form-control mt-0 pt-0" name="awal" required>
        </div>
        <div class="mb-3">
            <label class="form-label mb-1 pb-1">Tanggal Akhir Membuat Laporan</label>
            <input type="date" class="form-control mt-0 pt-0" name="akhir" required>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" class="btn btn-primary">Simpan</button> 
        </div>
    </form>
</div>

<div class="kanan">
    <?php if($_POST){ ?>
        <?php if($this->input->post('awal') > $this->input->post('akhir')) { ?>
            <h2>Tanggal akhir tidak boleh lebih besar dari tanggal awal</h2>
        <?php } else { ?>
            <h1>Hasil Laporan</h1>
            <p>Awal Tanggal : <?php echo $this->input->post('awal'); ?></p>
            <p>Akhir Tanggal : <?php echo $this->input->post('akhir'); ?></p>
            <table class="table light caption-top">
                <thead class="table-secondary">
                    <tr>
                        <td>No</td>
                        <td>ID</td>
                        <td>Tanggal Transaksi</td>
                        <td>Pendapatan</td>
                    </tr>
                </thead>
                <?php if ($laporan) { ?>
                <tbody>
                    <?php $no=1; foreach ($laporan as $value): ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $value->id_transaksi; ?></td>
                        <td><?php echo $value->tanggal_transaksi; ?></td>
                        <td>Rp.<?php echo number_format($value->sub_total); ?></td>
                    </tr>
                    <?php $no++; endforeach; ?>
                    <tr>
                        <td colspan="3">Total Pendapatan :</td>
                        <td>Rp.<?php echo number_format ($total->total); ?></td>
                    </tr>
                </tbody>
                <?php } else { ?>
                    <tbody>
                        <tr>
                            <td colspan="4">Laporan Tidak Ada</td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        <?php } ?>
    <?php } else{ ?>
        <h2>Tidak Ada Laporan</h2>
    <?php } ?>
</div>