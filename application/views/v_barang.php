<div class="container">
    <br>
    <h2>INVENTORY</h2>
    <hr>
    <div class="d-flex align-items-end flex-column">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-plus"></i>
            Add
        </button>
    </div>
    <br>
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
        <tbody>
            <?php
            if (!empty($tbbarang)) {
                $no = 1;
                foreach ($tbbarang as $dbarang) : ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $dbarang->id_barang; ?></td>
                        <td><?php echo $dbarang->nama_barang; ?></td>
                        <td>Rp.<?php echo number_format($dbarang->harga_barang); ?></td>
                        <td><?php echo $dbarang->stok_barang; ?></td>
                        <td><a class="btn btn-success btn-sm" href="<?php echo base_url() . 'C_barang/edit/' . $dbarang->id_barang; ?>"><i class="fa-solid fa-pen-to-square"></i> </a> <a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'C_barang/hapus/' . $dbarang->id_barang; ?>" onclick="return confirm('Apakah anda yakin menghapus data ini ?')"><i class="fa-solid fa-trash-can"></i> </a></td>
                    </tr>
                <?php $no++;
                endforeach;
            } else { ?>
                <tr>
                    <td colspan="5">Data Not Found</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group row">
                        <label for="id" class="col-sm 2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control mt-0 pt-0" name="id_barang" autocomplete="off" placeholder="ID Barang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm 2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control mt-0 pt-0" name="nama_barang" autocomplete="off" placeholder="Nama Barang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-sm 2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control mt-0 pt-0" name="harga" autocomplete="off" placeholder="Harga Barang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id" class="col-sm 2 col-form-label">Stock</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control mt-0 pt-0" name="stok" autocomplete="off" placeholder="Stok Barang">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>