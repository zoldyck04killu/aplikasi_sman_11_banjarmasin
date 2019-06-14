<?php

if (@$_GET['view'] == '' || @$_GET['view'] == 'home')
{
    include 'view/home.php';
}
else if (@$_GET['view'] == 'beranda')
{
	include 'view/beranda.php';
}

else if (@$_GET['view'] == 'jadwal')
{
	include 'view/jadwal/data-jadwal.php';
}
else if (@$_GET['view'] == 'artikel-view')
{
	include 'view/artikel/artikel-view.php';
}
else if (@$_GET['view'] == 'artikel-pengumuman')
{
	include 'view/artikel/artikel-pengumuman.php';
}
else if (@$_GET['view'] == 'artikel-kegiatan')
{
	include 'view/artikel/artikel-kegiatan.php';
}
else if (@$_GET['view'] == 'register')
{
	include 'view/register.php';
}
else if (@$_GET['view'] == 'kontak')
{
	include 'view/kontak.php';
}
else if (@$_GET['view'] == 'sejarah')
{
	include 'view/sejarah.php';
}
else if (@$_GET['view'] == 'kelas')
{
	include 'view/siswa/kelas.php';
}
else if (@$_GET['view'] == 'login')
{
	include 'view/login.php';
}

elseif (@$_GET['view'] == 'logout')
{
  $objAdmin->logout();
  echo '<script> window.location="?view=home" </script>';
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
elseif (@$_GET['view'] == 'data-nilai')
{
  include 'view/nilai/data-nilai.php';
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

elseif (@$_GET['view'] == 'data-artikel')
{
  include 'view/artikel/data-artikel.php';
}

elseif (@$_GET['view'] == 'absen-siswa') 
{
  include 'view/absen/absen-siswa.php';
}

else
{
  include 'view/404.php';

}
