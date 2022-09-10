<div class="container">
<br>
    <h2>DATA USER</h2>
    <div class="d-flex align-items-end flex-column">
        <a href="<?php echo base_url().'C_user/tambah'; ?>" class="btn btn-primary btn-sm float-right"><i class="fa-solid fa-plus"></i> Add</a>
    </div>
    <br>
    <table class="table">
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
<?php $no=1; foreach($tbuser as $dusers):?>
 <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $dusers->nama_user; ?></td>
            <td><?php echo $dusers->id_user; ?></td>
            <td><?php echo $dusers->username; ?></td>
            <td><?php echo $dusers->no_telp; ?></td>
            <td><?php echo $dusers->jenis_kelamin; ?></td>
            <td><?php echo $dusers->level; ?></td>
            <td><a class="btn btn-success btn-sm" href="<?php echo base_url().'C_user/edit/'.$dusers->id_user; ?>"><i class="fa-solid fa-pen-to-square"></i> </a> <a class="btn btn-danger btn-sm"href="<?php echo base_url().'C_user/hapus/'.$dusers->id_user; ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fa-solid fa-trash-can"></i> </a></td>
</tr>
<?php $no++; endforeach; ?>
</table>
</div>