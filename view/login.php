<div class="container"> <br><br><br>
  <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Login
      </div>
      <div class="card-body">

        <form action="" method="POST" accept-charset="utf-8">
          <div class="form-group">
            <label>User</label>
            <input type="text" name="username" class="form-control">
          </div>
           <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
          </div>
           <div class="form-group">
              <input type="submit" name="login" value="Login" class="btn btn-md btn-primary">
          </div>
        </form>

      </div>
    </div>

  </div>
</div>


</div>

<?php

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = $objAdmin->login($username, $password);

    if ($login) {

        echo '<script> alert("Login Berhasil"); window.location="?view=beranda" </script>';
    }else{

        echo '<script> alert("Login Gagal") </script>';

    }


}
