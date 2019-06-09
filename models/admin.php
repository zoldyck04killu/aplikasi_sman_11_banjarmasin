<?php

/**
 *
 */
class Admin
{

  private $mysqli;

  function __construct($mysqli)
  {
    $this->mysqli = $mysqli;
  }

  function register($username, $password_hash,$hak_akses)
  {
    $db = $this->mysqli->conn;
    // $tanggal = date('Y/m/d');
    $register = $db->query("INSERT INTO admin (username, password,kewenangan) VALUES ('$username', '$password_hash', '$hak_akses')") or die ($db->error);
    if ($register) {
        return true;
    } else {
        return false; // password salah
    }
  }

  public function login($username, $password)
  {
    $db     = $this->mysqli->conn;
    $cekUser = $db->query("SELECT * FROM admin WHERE username = '$username' ")->num_rows;
    $userData = $db->query("SELECT * FROM admin WHERE username = '$username' ")->fetch_object();
    if ($cekUser == 1) {

      if (password_verify($password, $userData->password)) {

          $_SESSION['statusLogin'] = 'login';
          $_SESSION['username'] = $userData->username;
          $_SESSION['kewenangan'] = $userData->kewenangan;
          return true;

      }else{

          return false;
      }

    }else{

          return false;

    }
  }

  public function logout()
  {
    session_destroy();
    unset($_SESSION['statusLogin']);
    return true;
  }


  function show_siswa()
  {
  	$db    = $this->mysqli->conn;
  	$query = $db->query(" SELECT * FROM siswa ");
  	return $query;
  }

  function simpan_siswa($nis, $nama, $jk, $lahir, $tgl, $agama, $alamat, $telp_rmh, $asal_sekolah, $thn_lulus, $nama_bpk, $kerja_bpk, $nama_ibu, $kerja_ibu)
  {
  	$db    = $this->mysqli->conn;
  	$query = $db->query(" INSERT INTO siswa VALUES ('$nis', '$nama', '$jk', '$lahir', '$tgl', '$agama', '$alamat', '$telp_rmh', '$asal_sekolah', '$thn_lulus', '$nama_bpk', '$kerja_bpk', '$nama_ibu', '$kerja_ibu') ");
  	return true;
  }

  function update_siswa($nis, $nama, $jk, $lahir, $tgl, $agama, $alamat, $telp_rmh, $asal_sekolah, $thn_lulus, $nama_bpk, $kerja_bpk, $nama_ibu, $kerja_ibu)
  {
  	$db    = $this->mysqli->conn;
  	$query = $db->query(" UPDATE siswa SET nama_siswa = '$nama', jk_siswa = '$jk', tempat_lahir = '$lahir', tgl_lahir = '$tgl',
                      agama='$agama', alamat='$alamat', telp_rmh='$telp_rmh', asal_sekolah='$asal_sekolah', thn_lulus='$thn_lulus',
                      nama_bpk='$nama_bpk', kerja_bpk='$kerja_bpk', nama_ibu='$nama_ibu', kerja_ibu='$kerja_ibu' WHERE nis_siswa = '$nis' ");
  	return true;
  }

  function delete_siswa($nis)
  {
  	$db    = $this->mysqli->conn;
  	$query = $db->query(" DELETE FROM siswa WHERE nis_siswa = '$nis' ");
  	return true;
  }

// Nilai
function show_nilai()
{
  $db    = $this->mysqli->conn;
  $query = $db->query(" SELECT * FROM nilai ");
  return $query;
}

function simpan_nilai($nis, $nama, $matpel, $semester, $kelas, $tugas, $uts, $uas, $rata, $nilai)
{
  $db    = $this->mysqli->conn;
  $query = $db->query(" INSERT INTO nilai (nis_siswa, nama_leng, matpel, semester, kelas, tugas, uts, uas, rata, nilai)
    VALUES ('$nis', '$nama', '$matpel', '$semester', '$kelas', '$tugas', '$uts', '$uas', '$rata', '$nilai') ");
  return true;
}

function update_nilai($kd_nilai, $nis, $nama, $matpel, $semester, $kelas, $tugas, $uts, $uas, $rata, $nilai)
{
  $db    = $this->mysqli->conn;
  $query = $db->query(" UPDATE nilai SET nis_siswa='$nis', nama_leng='$nama', matpel='$matpel', semester='$semester',
          kelas='$kelas', tugas='$tugas', uts='$uts', uas='$uas', rata='$rata', nilai='$nilai' WHERE kd_nilai = '$kd_nilai' ");
  return true;
}

function delete_nilai($kd_nilai)
{
  $db    = $this->mysqli->conn;
  $query = $db->query(" DELETE FROM nilai WHERE kd_nilai = '$kd_nilai' ");
  return true;
}



  function show_guru()
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" SELECT * FROM guru");
    return $query;
  }

  function simpan_guru($nip, $nama, $jk, $gol, $bidang_studi, $status)
  {
     $db    = $this->mysqli->conn;
     $query = $db->query(" INSERT INTO guru VALUES ('$nip', '$nama', '$jk', '$gol', '$bidang_studi', '$status')");
     return true;
  }

  function update_guru($nip, $nama, $jk, $gol, $bidang_studi, $status)
  {
     $db    = $this->mysqli->conn;
     $query = $db->query(" UPDATE guru SET nama_guru = '$nama', jk_guru = '$jk', gol = '$gol', bidang_studi = '$bidang_studi', status = '$status' WHERE nip = '$nip' ");
     return true;
  }

  function delete_guru($nip)
  {
     $db    = $this->mysqli->conn;
     $query = $db->query(" DELETE FROM guru WHERE nip = '$nip' ");
     return true;
  }





  function show_kegiatan()
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" SELECT * FROM kegiatan");
    return $query;
  }

  function get_nip()
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" SELECT nip FROM guru ");
    return $query;
  }

  function simpan_kegiatan($kode, $nama, $hari, $jam, $nip)
  {
    $db    = $this->mysqli->conn;
    // var_dump($jam);
    // die();
    $query = $db->query(" INSERT INTO kegiatan VALUES ('$kode', '$nama', '$hari', '$jam', '$nip') ");
    return true;
  }

  function update_kegiatan($kode, $nama, $hari, $jam, $nip)
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" UPDATE kegiatan SET nama_kegiatan = '$nama', hari_kegiatan = '$hari', jam_kegiatan = '$jam',  nip = '$nip' WHERE kd_kegiatan = '$kode' ");
    return true;
  }

  function delete_kegiatan($kode)
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" DELETE FROM kegiatan WHERE kd_kegiatan = '$kode' ");
    return true;
  }



  function show_kelas()
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" SELECT * FROM kelas ");
    return $query;
  }

  function simpan_kelas($kode, $nama, $tahun, $siswa)
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" INSERT INTO kelas VALUES ('$kode', '$nama', '$tahun', '$siswa') ");
    return true;
  }

  function update_kelas($kode, $nama, $tahun, $siswa)
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" UPDATE kelas SET nama_kelas = '$nama', thn_ajaran = '$tahun', jml_siswa = '$siswa' WHERE kd_kelas = '$kode' ");
    return true;
  }

  function hapus_kelas($kode)
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" DELETE FROM kelas WHERE kd_kelas = '$kode' ");
    return true;
  }



  function show_pelajaran()
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" SELECT * FROM mata_pelajaran ");
    return $query;
  }

  function get_kd_kelas()
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" SELECT kd_kelas FROM kelas ");
    return $query;
  }

  function simpan_pelajaran($kode, $nama, $nip)
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" INSERT INTO mata_pelajaran VALUES ('$kode', '$nama', '$nip') ");
    return true;
  }

  function update_pelajaran($kode, $nama, $nip)
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" UPDATE mata_pelajaran SET nama_matpel = '$nama', nip = '$nip' WHERE kd_matpel = '$kode' ");
    return true;
  }

  function hapus_pelajaran($kode)
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" DELETE FROM mata_pelajaran WHERE kd_matpel = '$kode' ");
    return true;
  }


  public function show_artikel()
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" SELECT * FROM artikel ");
    return $query;
  }

  public function simpan_artikel($no, $perihal, $tgl, $jam, $judul, $isi, $penulis, $tujuan)
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" INSERT INTO artikel VALUES('$no', '$perihal', '$tgl', '$jam', '$judul', '$isi', '$penulis', '$tujuan')");
    return true;
  }

  public function edit_artikel($no)
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" SELECT * FROM artikel WHERE no_art = '$no' ");
    return $query;
  }

  public function update_artikel($no, $perihal, $tgl, $jam, $judul, $isi, $penulis, $tujuan)
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" UPDATE artikel SET perihal = '$perihal', tgl = '$tgl', jam_art = '$jam', judul = '$judul', isi = '$isi', penulis = '$penulis', tujuan = '$tujuan' WHERE no_art = '$no' ");
    return true;
  }

  public function delete_artikel($no)
  {
    $db    = $this->mysqli->conn;
    $db->query("DELETE FROM artikel WHERE no_art = '$no' ");
    return true;
  }



}// end class

?>
