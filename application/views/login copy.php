<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url().'asset/style.css';?>">
  </head>
  <body>
    <div class="page">
    <h1>Login Form</h1>
    <form method="post">
      <div class="row">
      <input type="text" autocomplete="off" name="username" placeholder="Username" required autofocus>
       <input type="password" autocomplete="off" name="password" placeholder="Password" required>
     <input type="submit" name="login" value="Login">
    </form>
  </div>
</div>
  </body>
</html>
