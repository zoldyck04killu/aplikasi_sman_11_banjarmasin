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




  function show_siswa()
  {
  	$db    = $this->mysqli->conn;
  	$query = $db->query(" SELECT * FROM siswa ");
  	return $query;
  }

  function simpan_siswa($nis, $nama, $jk, $lahir, $tgl)
  {
  	$db    = $this->mysqli->conn;
  	$query = $db->query(" INSERT INTO siswa VALUES ('$nis', '$nama', '$jk', '$lahir', '$tgl') ");
  	return true;
  }

  function update_siswa($nis, $nama, $jk, $lahir, $tgl)
  {
  	$db    = $this->mysqli->conn;
  	$query = $db->query(" UPDATE siswa SET nama_siswa = '$nama', jk_siswa = '$jk', tempat_lahir = '$lahir', tgl_lahir = '$tgl' WHERE nis_siswa = '$nis' ");
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

  function simpan_kegiatan($kode, $nama, $hari, $jam, $tempat, $nip)
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" INSERT INTO kegiatan VALUES ('$kode', '$nama', '$hari', '$jam', '$tempat', '$nip') ");
    return true;
  }

  function update_kegiatan($kode, $nama, $hari, $jam, $tempat, $nip)
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" UPDATE kegiatan SET nama_kegiatan = '$nama', hari_kegiatan = '$hari', jam_kegiatan = '$jam', tempat_kegiatan = '$tempat', nip = '$nip' WHERE kd_kegiatan = '$kode' ");
    return true;
  }

  function delete_kegiatan($kode)
  {
    $db    = $this->mysqli->conn;
    $query = $db->query(" DELETE FROM kegiatan WHERE kd_kegiatan = '$kode' ");
    return true;
  }

  

}// end class

?>
