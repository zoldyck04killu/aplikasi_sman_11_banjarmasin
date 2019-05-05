<?php

if (@$_GET['view'] == '' || @$_GET['view'] == 'home')
{
    include 'view/home.php';
}

else if (@$_GET['view'] == 'login')
{
	include 'view/login.php';
}

elseif (@$_GET['view'] == 'logout')
{
    $objAdmin->logout();
    echo '<script>
    window.location="?view=login";
     </script>';
}

// KTP
elseif (@$_GET['view'] == 'data-ktp')
{
 include 'view/ktp/data-ktp.php';
}
else if (@$_GET['view'] == 'daftar-ktp')
{
	include 'view/ktp/daftar-ktp.php';
}
elseif (@$_GET['view'] == 'edit-ktp')
{
  include 'view/ktp/edit-ktp.php';
}
elseif (@$_GET['view'] == 'hapus-ktp')
{
  $nik = @$_GET['nik'];
  $objAdmin->hapusKTP($nik);
  echo '
    <script>
    alert("Hapus berhasil")
    window.location = "?view=data-ktp"
    </script>

  ';
}
//

// KK
else if (@$_GET['view'] == 'daftar-kk')
{
	include 'view/kartu-keluarga/daftar-kk.php';
}
elseif (@$_GET['view'] == 'data-kk')
{
  include 'view/kartu-keluarga/data-kk.php';
}
elseif (@$_GET['view'] == 'edit-kk')
{
  include 'view/kartu-keluarga/edit-kk.php';
}
elseif (@$_GET['view'] == 'hapus-kk')
{
  $nik = @$_GET['nik'];
  $objAdmin->hapusKK($nik);
  echo '
    <script>
    alert("Hapus berhasil")
    window.location = "?view=data-kk"
    </script>

  ';
}
//

// AKTE
else if (@$_GET['view'] == 'daftar-akte')
{
	include 'view/akte/daftar-akte.php';
}
elseif (@$_GET['view'] == 'data-akte')
{
  include 'view/akte/data-akte.php';
}
elseif (@$_GET['view'] == 'edit-akte')
{
  include 'view/akte/edit-akte.php';
}
elseif (@$_GET['view'] == 'hapus-akte')
{
  $id = @$_GET['id'];
  $objAdmin->hapusAKTE($id);
  echo '
    <script>
    alert("Hapus berhasil")
    window.location = "?view=data-akte"
    </script>

  ';
}
//

else if (@$_GET['view'] == 'daftar-users')
{
  include 'view/masyarakat/daftar-users.php';
}

elseif (@$_GET['view'] == 'saran')
{
  include 'view/saran/saran.php';
}
elseif (@$_GET['view'] == 'data-saran')
{
  include 'view/saran/data-saran.php';
}




else
{
  include 'view/404.php';

}
