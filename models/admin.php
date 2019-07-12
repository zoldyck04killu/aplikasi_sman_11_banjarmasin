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

  function register($username, $password_hash,$hak_akses, $id_wali)
  {
    $db = $this->mysqli->conn;
    // $tanggal = date('Y/m/d');
    $register = $db->query("INSERT INTO admin (username, password,kewenangan, id_wali) VALUES ('$username', '$password_hash', '$hak_akses', '$id_wali')") or die ($db->error);
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
          $_SESSION['id_wali'] = $userData->id_wali;
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


  function show_siswa($kelas)
  {
  	$db    = $this->mysqli->conn;
  	$query = $db->query(" SELECT * FROM siswa
      -- INNER JOIN kegiatan ON siswa.kd_Kegiatan = kegiatan.kd_kegiatan
      INNER JOIN jadwal ON siswa.kd_jadwal = jadwal.kd_jadwal
      where status = '$kelas' ");
  	return $query;
  }

  function simpan_siswa($nis, $nama, $jk, $lahir, $tgl, $agama, $alamat, $asal_sekolah, $thn_lulus, $kd_jadwal, $status)
  {
  	$db    = $this->mysqli->conn;
  	$query = $db->query(" INSERT INTO siswa (nis_siswa, nama_siswa, jk_siswa, tempat_lahir, tgl_lahir, agama, alamat, asal_sekolah, thn_lulus, kd_jadwal, kd_kegiatan, status)
    VALUES ('$nis', '$nama', '$jk', '$lahir', '$tgl', '$agama', '$alamat', '$asal_sekolah', '$thn_lulus', '$kd_jadwal', '', '$status') ");
  	return true;
  }

  function update_siswa($nis, $nama, $jk, $lahir, $tgl, $agama, $alamat, $asal_sekolah, $thn_lulus, $kd_jadwal, $status)
  {
  	$db    = $this->mysqli->conn;
  	$query = $db->query(" UPDATE siswa SET nama_siswa = '$nama', jk_siswa = '$jk', tempat_lahir = '$lahir', tgl_lahir = '$tgl',
                      agama='$agama', alamat='$alamat', asal_sekolah='$asal_sekolah', thn_lulus='$thn_lulus',
                      kd_jadwal='$kd_jadwal', kd_kegiatan='', status='$status' WHERE nis_siswa = '$nis' ");
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

function show_nilai_anak($id_wali)
{
  $db    = $this->mysqli->conn;
  $query = $db->query(" SELECT * FROM nilai INNER JOIN wali on nilai.nis_siswa = wali.nis ");
  return $query;
}


function simpan_nilai($nis, $nama, $matpel, $semester, $kelas, $tugas, $uts, $uas, $nilai)
{

  $db    = $this->mysqli->conn;
  $query = $db->query(" INSERT INTO nilai (nis_siswa, nama_leng, matpel, semester, kelas, tugas, uts, uas, nilai)
    VALUES ('$nis', '$nama', '$matpel', '$semester', '$kelas', '$tugas', '$uts', '$uas', '$nilai') ");
  return true;
}

function update_nilai($kd_nilai, $nis, $nama, $matpel, $semester, $kelas, $tugas, $uts, $uas, $nilai)
{
  $db    = $this->mysqli->conn;
  $query = $db->query(" UPDATE nilai SET nis_siswa='$nis', nama_leng='$nama', matpel='$matpel', semester='$semester',
          kelas='$kelas', tugas='$tugas', uts='$uts', uas='$uas', nilai='$nilai' WHERE kd_nilai = '$kd_nilai' ");
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
    $query = $db->query(" SELECT * FROM kegiatan INNER JOIN guru WHERE kegiatan.nip = guru.nip");
    return $query;
  }

  function show_siswakegiatan($kd_keg)
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" SELECT * FROM daftar_mhs_kegiatan
      INNER JOIN siswa ON daftar_mhs_kegiatan.nis = siswa.nis_siswa
      INNER JOIN kegiatan ON daftar_mhs_kegiatan.kode_kegiatan = kegiatan.kd_kegiatan
      WHERE daftar_mhs_kegiatan.kode_kegiatan = '$kd_keg'");
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

  function update_kegiatan($kode, $kode_lama, $nama, $hari, $jam, $nip)
  {
    $db    = $this->mysqli->conn;
    // var_dump($kode_lama);
    // die();
    $query = $db->query(" UPDATE kegiatan SET kd_kegiatan = '$kode', nama_kegiatan = '$nama', hari_kegiatan = '$hari', jam_kegiatan = '$jam',  nip = '$nip' WHERE kd_kegiatan = '$kode_lama' ");
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

// Jadwal

function show_jadwal()
{
  $db    = $this->mysqli->conn;
  $query = $db->query(" SELECT * FROM jadwal  ");
  return $query;
}

function simpan_jadwal($kode, $hari, $jam, $waktu, $kelas, $matpel, $nama_guru)
{
  $db    = $this->mysqli->conn;
  $query = $db->query(" INSERT INTO jadwal VALUES ('$kode', '$hari', '$jam', '$waktu', '$kelas', '$matpel', '$nama_guru') ");
  return true;
}

function update_jadwal($kode, $hari, $jam, $waktu, $kelas, $matpel, $nama_guru)
{
  $db    = $this->mysqli->conn;
  $query = $db->query(" UPDATE jadwal SET kd_jadwal = '$kode', hari_j = '$hari', jam_j = '$jam', waktu = '$waktu', kelas = '$kelas', matpel = '$matpel', nama_guru = '$nama_guru' WHERE kd_jadwal = '$kode' ");
  return true;
}

function delete_jadwal($kode)
{
  $db    = $this->mysqli->conn;
  $query = $db->query(" DELETE FROM jadwal WHERE kd_jadwal = '$kode' ");
  return true;
}


public function showAbsensi()
{
  $db    = $this->mysqli->conn;
  $query = $db->query(" SELECT * FROM absensi_siswa ");
  return $query;
}

public function get_nis()
{
  $db    = $this->mysqli->conn;
  $query = $db->query("SELECT nis_siswa FROM siswa");
  return $query;
}

public function get_nis_nama($nis)
{
  $db    = $this->mysqli->conn;
  $query = $db->query("SELECT nama_siswa FROM siswa WHERE nis_siswa = '$nis' ");
  return $query;
}

public function simpan_absen($kode, $nis_opt, $nama_leng, $tgl, $jam, $hari, $ket)
{
  $db    = $this->mysqli->conn;
  $db->query("INSERT INTO absensi_siswa VALUES ('$kode', '$nis_opt', '$nama_leng', '$tgl', '$jam', '$hari', '$ket')");
  return true;
}

public function edit_absen($kode)
{
  $db    = $this->mysqli->conn;
  $query = $db->query("SELECT * FROM absensi_siswa WHERE kd_absen = '$kode' ");
  return $query;
}

public function update_absen($kode, $nis_opt, $nama_leng, $tgl, $jam, $hari, $ket)
{
  $db    = $this->mysqli->conn;
  $query = $db->query("UPDATE absensi_siswa SET nis_siswa = '$nis_opt', nama_leng = '$nama_leng', hari = '$hari', tgl = '$tgl', jam = '$jam', ket = '$ket' WHERE kd_absen = '$kode' ");
  return true;
}

public function delete_absen($kode)
{
  $db    = $this->mysqli->conn;
  $query = $db->query("DELETE FROM absensi_siswa WHERE kd_absen = '$kode' ");
  return true;
}


public function showWali()
{
  $db    = $this->mysqli->conn;
  $query = $db->query("SELECT * FROM wali ");
  return $query;
}

public function simpan_wali($nama, $alamat, $telp, $pekerjaan, $agama, $status, $nis)
{
  $db    = $this->mysqli->conn;
  $query = $db->query("INSERT INTO wali (nama, alamat, telp, pekerjaan, agama, status, nis) VALUES('$nama', '$alamat', '$telp', '$pekerjaan', '$agama', '$status', '$nis')");
  return true;
}

public function edit_wali($s)
{
  $db    = $this->mysqli->conn;
  $query = $db->query("SELECT * FROM wali WHERE id_wali = '$s' ");
  return $query;
}

public function update_wali($id_wali, $nama, $alamat, $telp, $pekerjaan, $agama, $status, $nis)
{
  $db    = $this->mysqli->conn;
  $db->query("UPDATE wali SET id_wali='$id_wali', nama='$nama', alamat='$alamat', telp='$telp', pekerjaan='$pekerjaan', agama='$agama', status='$status', nis='$nis' WHERE id_wali = '$id_wali' ");
  return true;
}

public function delete_wali($id)
{
  $db    = $this->mysqli->conn;
  $db->query("DELETE FROM wali WHERE id_wali = '$id' ");
  return true;
}
function simpan_mhs_kegiatan($kd_kegiatan_per,$nis)
{
  $db    = $this->mysqli->conn;
  $query = $db->query(" INSERT INTO daftar_mhs_kegiatan (kode_kegiatan, nis) VALUES ('$kd_kegiatan_per','$nis') ");
  return true;
}

}// end class

?>
