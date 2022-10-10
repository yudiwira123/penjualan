<div class="container">
    <br>
    <h2>DATA USER</h2>
    <hr>
    <div class="d-flex align-items-end flex-column">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-plus"></i>
            Tambah
        </button>
    </div>
    <br>
    <table class="table table-hover bg-white">
        <thead class="table-secondary">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>ID</th>
                <th>Username</th>
                <th>No.Telp</th>
                <th>Jenis Kelamin</th>
                <th>Level</td>
                <th>Action</th>
            </tr>
        </thead>
        <?php $no = 1;
        foreach ($tbuser as $dusers) : ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $dusers->nama_user; ?></td>
                <td><?php echo $dusers->id_user; ?></td>
                <td><?php echo $dusers->username; ?></td>
                <td><?php echo $dusers->no_telp; ?></td>
                <td><?php echo $dusers->jenis_kelamin; ?></td>
                <td><?php echo $dusers->level; ?></td>
                <td><a class="btn btn-success btn-sm" href="<?php echo base_url() . 'C_user/edit/' . $dusers->id_user; ?>"><i class="fa-solid fa-pen-to-square"></i> </a> <a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'C_user/hapus/' . $dusers->id_user; ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fa-solid fa-trash-can"></i> </a></td>
            </tr>
        <?php $no++;
        endforeach; ?>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group row">
                        <label for="Nama" class="col-sm 2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control mt-0 pt-0" name="name" placeholder="Nama User" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_telp" class="col-sm 2 col-form-label">Nomor Telp.</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control mt-0 pt-0" name="pnumber" placeholder="No.Telp" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm 2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control mt-0 pt-0" name="jk" placeholder="Jenis Kelamin" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm 2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control mt-0 pt-0" name="uname" placeholder="Username" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm 2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control mt-0 pt-0" name="password" placeholder="Password">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>