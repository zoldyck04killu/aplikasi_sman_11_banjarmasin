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
            <label for="exampleFormControlSelect1">Hak Akses</label>
            <select class="form-control" id="exampleFormControlSelect1" name="hak_akses">
              <option value="admin_web">Admin Web</option>
              <option value="admin">Admin</option>
              <option value="wali">Wali Siswa</option>
            </select>
          </div>
           <div class="form-group">
              <input type="submit" name="register" value="Register" class="btn btn-md btn-primary">
          </div>
        </form>

      </div>
    </div>

  </div>
</div>


</div>

<?php

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $hak_akses = $_POST['hak_akses'];


    $login = $objAdmin->register($username, $password_hash,$hak_akses);

    if ($login) {

        echo '<script> alert("Register Berhasil"); window.location="?view=register" </script>';
    }else{

        echo '<script> alert("Register Gagal") </script>';

    }


}
