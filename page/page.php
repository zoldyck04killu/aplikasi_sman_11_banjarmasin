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


elseif (@$_GET['view'] == 'data-siswa') 
{
  include 'view/siswa/data-siswa.php';
}


elseif (@$_GET['view'] == 'data-guru') 
{
	include 'view/guru/data-guru.php';
}

elseif (@$_GET['view'] == 'data-kegiatan') 
{
	include 'view/kegiatan/data-kegiatan.php';
}

elseif (@$_GET['view'] == 'data-kelas') 
{
  include 'view/kelas/data-kelas.php';
}

elseif (@$_GET['view'] == 'mata-pelajaran') 
{
  include 'view/pelajaran/mata_pelaharan.php'; 
}

else
{
  include 'view/404.php';

}
