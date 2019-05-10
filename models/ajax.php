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

?>
