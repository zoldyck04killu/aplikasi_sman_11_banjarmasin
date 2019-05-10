<?php

  require_once '../config/config.php';
  require_once '../config/connection.php';
  include('../models/admin.php');
  $obj = new Connection($host, $user, $pass, $db);
  $objAdmin = new Admin($obj);

// AJAX REQUEST SISWA

 if (@$_REQUEST['type'] == 'tambah_siswa') {
      
      $nis   = $_POST['nis'];
      $nama  = $_POST['nama'];
      $jk    = $_POST['jk'];
      $lahir = $_POST['lahir'];
      $tgl   = $_POST['tgl'];

      $objAdmin->simpan_siswa($nis, $nama, $jk, $lahir, $tgl);

      echo json_encode($res['status'] = true);

 }elseif (@$_REQUEST['type'] == 'update_siswa') {

      $nis   = $_POST['nis'];
      $nama  = $_POST['nama'];
      $jk    = $_POST['jk'];
      $lahir = $_POST['lahir'];
      $tgl   = $_POST['tgl'];

      $objAdmin->update_siswa($nis, $nama, $jk, $lahir, $tgl);
      echo json_encode($res['status'] = true);

 }elseif (@$_REQUEST['type'] == 'delete_siswa') {

     $nis   = $_POST['nis'];

     $objAdmin->delete_siswa($nis);
    echo json_encode($res['status'] = true);

 }

 // AJAX REQUEST SISWA


 // AJAX REQUEST GURU

 elseif (@$_REQUEST['type'] == 'tambah_guru') {
   
    $nip     = @$_POST['nip'];
    $nama    = @$_POST['nama'];
    $jk      = @$_POST['jk'];
    $telp    = @$_POST['telp'];
    $email   = @$_POST['email'];
    $alamat  = @$_POST['alamat'];
    $jabatan = @$_POST['jabatan'];

    $objAdmin->simpan_guru($nip, $nama, $jk, $telp, $email, $alamat, $jabatan);
    echo json_encode($res['status'] = true);

 }

 elseif (@$_REQUEST['type'] == 'update_guru') {
   
    $nip     = @$_POST['nip'];
    $nama    = @$_POST['nama'];
    $jk      = @$_POST['jk'];
    $telp    = @$_POST['telp'];
    $email   = @$_POST['email'];
    $alamat  = @$_POST['alamat'];
    $jabatan = @$_POST['jabatan'];

    $objAdmin->update_guru($nip, $nama, $jk, $telp, $email, $alamat, $jabatan);
    echo json_encode($res['status'] = true);

 }

 elseif (@$_REQUEST['type'] == 'delete_guru') {
   
    $nip   = @$_POST['nip'];

    $objAdmin->delete_guru($nip);
    echo json_encode($res['status'] = true);

 }

  // AJAX REQUEST GURU


 // AJAX REQUEST KEGIATAN

 elseif (@$_REQUEST['type'] == 'select_nip_kegiatan') {
   
  $instance = $objAdmin->get_nip();

  $data = array();

   while (  $nip = $instance->fetch_object() ) {
     
      $data[] = $nip->nip;

   }

   echo json_encode($data);

 }

 elseif (@$_REQUEST['type'] == 'tambah_kegiatan') {
   
   $kode    = @$_POST['kode'];
   $nama    = @$_POST['nama'];
   $hari    = @$_POST['hari'];
   $jam     = @$_POST['jam'];
   $tempat  = @$_POST['tempat'];
   $nip     = @$_POST['nip'];

    $objAdmin->simpan_kegiatan($kode, $nama, $hari, $jam, $tempat, $nip);
    echo json_encode($res['status'] = true);

 }

 elseif (@$_REQUEST['type'] == 'update_kegiatan') {
   
   $kode    = @$_POST['kode'];
   $nama    = @$_POST['nama'];
   $hari    = @$_POST['hari'];
   $jam     = @$_POST['jam'];
   $tempat  = @$_POST['tempat'];
   $nip     = @$_POST['nip'];

    $objAdmin->update_kegiatan($kode, $nama, $hari, $jam, $tempat, $nip);
    echo json_encode($res['status'] = true);

 }

 elseif (@$_REQUEST['type'] == 'delete_kegiatan') {
   
    $kode    = @$_POST['kode'];

    $objAdmin->delete_kegiatan($kode);
    echo json_encode($res['status'] = true);

 }

 // AJAX REQUEST KEGIATAN

 // AJAX REQUEST KELAS

 elseif (@$_REQUEST['type'] == 'tambah_kelas') {
   
   $kode  = @$_POST['kode'];
   $nama  = @$_POST['nama'];
   $tahun = @$_POST['tahun'];
   $siswa = @$_POST['siswa'];

   $objAdmin->simpan_kelas($kode, $nama, $tahun, $siswa);
   echo json_encode($res['status'] = true);

 }

 elseif (@$_REQUEST['type'] == 'update_kelas') {
   
   $kode  = @$_POST['kode'];
   $nama  = @$_POST['nama'];
   $tahun = @$_POST['tahun'];
   $siswa = @$_POST['siswa'];

   $objAdmin->update_kelas($kode, $nama, $tahun, $siswa);
   echo json_encode($res['status'] = true);

 }

 elseif (@$_REQUEST['type'] == 'delete_kelas') {
   
   $kode  = @$_POST['kode'];

   $objAdmin->hapus_kelas($kode);
   echo json_encode($res['status'] = true);

 }

 // AJAX REQUEST KELAS


  // AJAX REQUEST PELAJARAN

 elseif (@$_REQUEST['type'] == 'get_kd_kelas') {
   
  $instance = $objAdmin->get_kd_kelas();

  $data = array();

   while (  $kode = $instance->fetch_object() ) {
     
      $data[] = $kode->kd_kelas;

   }

   echo json_encode($data);

 }

 elseif (@$_REQUEST['type'] == 'tambah_pelajaran') {
   
   $kode      = @$_POST['kode'];
   $nama      = @$_POST['nama'];
   $nip       = @$_POST['nip'];
   $hari      = @$_POST['hari'];
   $jam       = @$_POST['jam'];
   $kd_kelas  = @$_POST['kd_kelas'];

   $objAdmin->simpan_pelajaran($kode, $nama, $nip, $hari, $jam, $kd_kelas);

   echo json_encode($res['status'] = true);

 }

 elseif (@$_REQUEST['type'] == 'update_pelajaran') {
   
  $kode      = @$_POST['kode'];
  $nama      = @$_POST['nama'];
  $nip       = @$_POST['nip'];
  $hari      = @$_POST['hari'];
  $jam       = @$_POST['jam'];
  $kd_kelas  = @$_POST['kd_kelas'];

  $objAdmin->update_pelajaran($kode, $nama, $nip, $hari, $jam, $kd_kelas);

  echo json_encode($res['status'] = true);

 }

 elseif (@$_REQUEST['type'] == 'delete_pelajaran') {
   
  $kode  = @$_POST['kode'];

  $objAdmin->hapus_pelajaran($kode);
  echo json_encode($res['status'] = true);

 }

 // AJAX REQUEST PELAJARAN

?>
