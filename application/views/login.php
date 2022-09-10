<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url().'fontawesome/css/all.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'css/bootstrap-reboot.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'css/bootstrap-grid.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'css/bootstrap.min.css';?>">
  </head>
<body style="background: #f5f5f5">
    <div class="container-fluid">
        <div class="login-form row justify-content-center align-content-center">
            <div class="col col-lg-4 col-xxl-3 col-md-5">
                <div class="card m-4 pt-3">
                    <div class="card-body">
                        <h4 class="card-title text-center"><img src="logo_astikom_web.png" style="width:150px;height:50px;"></h4>
                        <h4 class="card-title mb-4 text-center"></h4>
                            <form method="post">
                              <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" required autofocus> 
                                <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                                </div>
                              <button type="submit" class="btn btn-primary">Login</button>                              
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
    <script src="js/popper.min.js"></script>
</body>
</html>
