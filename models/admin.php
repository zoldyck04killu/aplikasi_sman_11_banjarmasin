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

  public function login($username, $password)
  {
    $db     = $this->mysqli->conn;
    $cekUser = $db->query("SELECT * FROM admin WHERE username = '$username' ")->num_rows;
    $userData = $db->query("SELECT * FROM admin WHERE username = '$username' ")->fetch_object();
    if ($cekUser == 1) {

      if (password_verify($password, $userData->password)) {

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





  function show_guru()
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" SELECT * FROM guru");
    return $query;
  }

  function simpan_guru($nip, $nama, $jk, $telp, $email, $alamat, $jabatan)
  {
     $db    = $this->mysqli->conn;
     $query = $db->query(" INSERT INTO guru VALUES ('$nip', '$nama', '$jk', '$telp', '$email', '$alamat', 'jabatan')");
     return true;
  }

  function update_guru($nip, $nama, $jk, $telp, $email, $alamat, $jabatan)
  {
     $db    = $this->mysqli->conn;
     $query = $db->query(" UPDATE guru SET nama_guru = '$nama', jk_guru = '$jk', no_telp = '$telp', email = '$email', alamat = '$alamat', jabatan = '$jabatan' WHERE nip = '$nip' ");
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

  function simpan_pelajaran($kode, $nama, $nip, $hari, $jam, $kd_kelas)
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" INSERT INTO mata_pelajaran VALUES ('$kode', '$nama', '$nip', '$hari', '$jam', '$kd_kelas') ");
    return true;
  }

  function update_pelajaran($kode, $nama, $nip, $hari, $jam, $kd_kelas)
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" UPDATE mata_pelajaran SET nama_matpel = '$nama', nip = '$nip', hari = '$hari', jam = '$jam', kd_kelas = '$kd_kelas' WHERE kd_matpel = '$kode' ");
    return true;
  }

  function hapus_pelajaran($kode)
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" DELETE FROM mata_pelajaran WHERE kd_matpel = '$kode' ");
    return true;
  }



}// end class

?>
