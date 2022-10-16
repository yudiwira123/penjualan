<br>
<div class="container" style="width:600px;height:150px;">
    <h2>Edit Data User</h2>
    <br>
    <form method="post">
        <div class="form-group row">
            <label for="nama" class="col-sm 2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control mt-0 pt-0" name="name" autocomplete="off" placeholder="Nama User" value="<?php echo $edit->nama_user; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="id" class="col-sm 2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control mt-0 pt-0" name="idname" autocomplete="off" placeholder="ID User" value="<?php echo $edit->id_user; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="username" class="col-sm 2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control mt-0 pt-0" name="uname" autocomplete="off" placeholder="Username" value="<?php echo $edit->username; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm 2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control mt-0 pt-0" name="password" placeholder="Password">
                <input type="hidden" class="form-control mt-0 pt-0" name="password_lama" value="<?php echo $edit->password; ?>">
                <input type="hidden" class="form-control mt-0 pt-0" name="level" value="<?php echo $edit->level; ?>">
            </div>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">

            <br>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>