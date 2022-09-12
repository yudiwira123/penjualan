<br>
<div class="container" style="width:600px;height:120px;">
    <h2>Edit Items Data</h2>
    <br>
    <form method="post">
        <div class="form-group row">
            <label for="id" class="col-sm 2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control mt-0 pt-0" name="id_barang" autocomplete="off" placeholder="ID Barang" value="<?php echo $edit->id_barang; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_barang" class="col-sm 2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control mt-0 pt-0" name="nama_barang" autocomplete="off" placeholder="Nama Barang"value="<?php echo $edit->nama_barang; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="harga_barang" class="col-sm 2 col-form-label">Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control mt-0 pt-0" name="harga" autocomplete="off" placeholder="Harga Barang"value="<?php echo $edit->harga_barang; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="stok_barang" class="col-sm 2 col-form-label">Stock</label>
            <div class="col-sm-10">
                <input type="text" class="form-control mt-0 pt-0" name="stok" autocomplete="off" placeholder="Stok Barang"value="<?php echo $edit->stok_barang; ?>">
            </div>
        </div>
        <br>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" class="btn btn-primary">Save</button> 
        </div>
    </form>
</div>