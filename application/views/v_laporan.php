<div class="kiri">
	<h2>Laporan</h2>
	<hr>
	<form action="<?php echo base_url() . 'C_laporan/get_laporan'; ?>" method="get">
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
	<?php if ($_GET) { ?>
		<?php if ($this->input->get('awal') > $this->input->get('akhir')) { ?>
			<h2>Tanggal akhir tidak boleh lebih besar dari tanggal awal</h2>
		<?php } else { ?>
			<h2>Hasil Laporan</h2>
			<p>Awal Tanggal : <?php echo $this->input->get('awal'); ?></p>
			<p>Akhir Tanggal : <?php echo $this->input->get('akhir'); ?></p>
			<table class="table light caption-top table-hover">
				<thead class="table-secondary">
					<tr>
						<td>#</td>
						<td>ID</td>
						<td>Tanggal Transaksi</td>
						<td>Pendapatan</td>
						<td>Aksi</td>
					</tr>
				</thead>
				<?php if ($laporan) { ?>
					<tbody>
						<?php $no = 1;
						foreach ($laporan as $value) : ?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $value->id_transaksi; ?></td>
								<td><?php echo $value->tanggal_transaksi; ?></td>
								<td>Rp.<?php echo number_format($value->sub_total); ?></td>
								<td><a href="<?php echo base_url() . 'C_laporan/get_laporan?awal=' . $_GET['awal'] . '&akhir=' . $_GET['akhir'] . '&dtransaksi=' . $value->id_transaksi; ?>" class="btn btn-success">Detail</a></td>
							</tr>
						<?php $no++;
						endforeach; ?>
						<tr>
							<td colspan="3">Total Pendapatan :</td>
							<td>Rp.<?php echo number_format($total->total); ?></td>
						</tr>
					</tbody>
				<?php } else { ?>
					<tbody>
						<tr>
							<td colspan="5">Laporan Tidak Ada</td>
						</tr>
					</tbody>
				<?php } ?>
			</table>
		<?php } ?>
	<?php } else { ?>
		<h2>Tidak Ada Laporan</h2>
	<?php } ?>
</div>

<?php
if ($_GET) {
	if ($detail_transaksi != 0) { ?>
		<div class="container">
			<h2>Detail Transaksi ID=<?php echo $_GET['dtransaksi'] ?></h2>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>ID</th>
						<th>Harga</th>
						<th>Beli</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$jumlah = 0;
					$subtotal = 0;
					foreach ($detail_transaksi as $key => $value) : ?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $value->id_barang; ?></td>
							<td>Rp.<?php echo number_format($value->harga_barang); ?></td>
							<td><?php echo $value->jumlah_barang; ?></td>
							<td>Rp.<?php echo number_format($value->total); ?></td>
						</tr>
					<?php
						$no++;
						$jumlah += $value->jumlah_barang;
						$subtotal += $value->total;
					endforeach ?>
					<tr>
						<th colspan="3">Sub Total</th>
						<th><?php echo $jumlah ?></th>
						<th>Rp. <?php echo number_format($subtotal) ?></th>
					</tr>
				</tbody>
			</table>
		</div>
<?php }
} ?>
