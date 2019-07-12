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
      $tgl = $_POST['tgl'];
      $agama   = $_POST['agama'];
      $alamat   = $_POST['alamat'];
      $asal_sekolah   = $_POST['asal_sekolah'];
      $thn_lulus   = $_POST['thn_lulus'];
      $kd_jadwal   = $_POST['kd_jadwal'];
      $kd_kegiatan   = $_POST['kd_kegiatan'];
      $status   = $_POST['status'];


      // var_dump($nis);


      $objAdmin->simpan_siswa($nis, $nama, $jk, $lahir, $tgl, $agama, $alamat, $asal_sekolah, $thn_lulus, $kd_jadwal, $kd_kegiatan, $status);

      echo json_encode($res['status'] = true);

 }elseif (@$_REQUEST['type'] == 'update_siswa') {

      $nis   = $_POST['nis'];
      $nama  = $_POST['nama'];
      $jk    = $_POST['jk'];
      $lahir = $_POST['lahir'];
      $tgl   = $_POST['tgl'];
      $agama   = $_POST['agama'];
      $alamat   = $_POST['alamat'];
      $asal_sekolah   = $_POST['asal_sekolah'];
      $thn_lulus   = $_POST['thn_lulus'];
      $kd_jadwal   = $_POST['kd_jadwal'];
      $kd_kegiatan   = $_POST['kd_kegiatan'];
      $status   = $_POST['status'];


      $objAdmin->update_siswa($nis, $nama, $jk, $lahir, $tgl, $agama, $alamat, $asal_sekolah, $thn_lulus, $kd_jadwal, $kd_kegiatan, $status);
      echo json_encode($res['status'] = true);

 }elseif (@$_REQUEST['type'] == 'delete_siswa') {

     $nis   = $_POST['nis'];

     $objAdmin->delete_siswa($nis);
    echo json_encode($res['status'] = true);

 }

 // AJAX REQUEST SISWA


 // AJAX REQUEST GURU

 elseif (@$_REQUEST['type'] == 'tambah_guru') {

    $nip            = @$_POST['nip'];
    $nama           = @$_POST['nama'];
    $jk             = @$_POST['jk'];
    $gol            = @$_POST['gol'];
    $bidang_studi   = @$_POST['bidang_studi'];
    $status         = @$_POST['status'];

    $objAdmin->simpan_guru($nip, $nama, $jk, $gol, $bidang_studi, $status);
    echo json_encode($res['status'] = true);

 }

 elseif (@$_REQUEST['type'] == 'update_guru') {

    $nip            = @$_POST['nip'];
    $nama           = @$_POST['nama'];
    $jk             = @$_POST['jk'];
    $gol            = @$_POST['gol'];
    $bidang_studi   = @$_POST['bidang_studi'];
    $status         = @$_POST['status'];

    $objAdmin->update_guru($nip, $nama, $jk, $gol, $bidang_studi, $status);
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
   // $tempat  = @$_POST['tempat'];
   $nip     = @$_POST['nip'];
   //
   // var_dump($jam);
   // die();
    $objAdmin->simpan_kegiatan($kode, $nama, $hari, $jam, $nip);
    echo json_encode($res['status'] = true);

 }

 elseif (@$_REQUEST['type'] == 'update_kegiatan') {

   $kode    = @$_POST['kode'];
   $kode_lama    = @$_POST['kode_lama'];

   $nama    = @$_POST['nama'];
   $hari    = @$_POST['hari'];
   $jam     = @$_POST['jam'];
   // $tempat  = @$_POST['tempat'];
   $nip     = @$_POST['nip'];
   // var_dump($jam);
   // die();

    $objAdmin->update_kegiatan($kode, $kode_lama, $nama, $hari, $jam, $nip);
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

   $objAdmin->simpan_pelajaran($kode, $nama, $nip);

   echo json_encode($res['status'] = true);

 }

 elseif (@$_REQUEST['type'] == 'update_pelajaran') {

  $kode      = @$_POST['kode'];
  $nama      = @$_POST['nama'];
  $nip       = @$_POST['nip'];

  $objAdmin->update_pelajaran($kode, $nama, $nip);

  echo json_encode($res['status'] = true);

 }

 elseif (@$_REQUEST['type'] == 'delete_pelajaran') {

  $kode  = @$_POST['kode'];

  $objAdmin->hapus_pelajaran($kode);
  echo json_encode($res['status'] = true);

 }

 // AJAX REQUEST PELAJARAN

 // AJAX REQUEST ARTIKEL

 elseif (@$_REQUEST['type'] == 'tambah_artikel')
 {
   $no      = @$_POST['no'];
   $perihal = @$_POST['perihal'];
   $tgl     = @$_POST['tgl'];
   $jam     = @$_POST['jam'];
   $judul   = @$_POST['judul'];
   $isi     = @$_POST['isi'];
   $penulis = @$_POST['penulis'];
   $tujuan  = @$_POST['tujuan'];

   $objAdmin->simpan_artikel($no, $perihal, $tgl, $jam, $judul, $isi, $penulis, $tujuan);
    echo json_encode($res['status'] = true);
 }

 elseif (@$_REQUEST['type'] == 'edit_artikel')
 {
   $no = @$_POST['no'];
   $artikel = $objAdmin->edit_artikel($no)->fetch_object();
   echo json_encode($artikel);
 }

 elseif (@$_REQUEST['type'] == 'update_artikel')
 {
   $no      = @$_POST['no'];
   $perihal = @$_POST['perihal'];
   $tgl     = @$_POST['tgl'];
   $jam     = @$_POST['jam'];
   $judul   = @$_POST['judul'];
   $isi     = @$_POST['isi'];
   $penulis = @$_POST['penulis'];
   $tujuan  = @$_POST['tujuan'];

    $objAdmin->update_artikel($no, $perihal, $tgl, $jam, $judul, $isi, $penulis, $tujuan);
    echo json_encode($res['status'] = true);
 }

 elseif (@$_REQUEST['type'] == 'delete_artikel')
 {
   $no = @$_POST['no'];
   $objAdmin->delete_artikel($no);
    echo json_encode($res['status'] = true);

 }

 // AJAX REQUEST ARTIKEL

 elseif (@$_REQUEST['type'] == 'tambah_nilai') {

      $nis   = $_POST['nis'];
      $nama  = $_POST['nama'];
      $matpel    = $_POST['matpel'];
      $semester = $_POST['semester'];
      $kelas = $_POST['kelas'];
      $tugas   = $_POST['tugas'];
      $uts   = $_POST['uts'];
      $uas   = $_POST['uas'];
      $nilai   = $_POST['nilai'];

      $objAdmin->simpan_nilai($nis, $nama, $matpel, $semester, $kelas, $tugas, $uts, $uas, $nilai);

      echo json_encode($res['status'] = true);

 }elseif (@$_REQUEST['type'] == 'update_nilai') {

   $kd_nilai   = $_POST['kd_nilai'];
   $nis   = $_POST['nis'];
   $nama  = $_POST['nama'];
   $matpel    = $_POST['matpel'];
   $semester = $_POST['semester'];
   $kelas = $_POST['kelas'];
   $tugas   = $_POST['tugas'];
   $uts   = $_POST['uts'];
   $uas   = $_POST['uas'];
   $nilai   = $_POST['nilai'];

      $objAdmin->update_nilai($kd_nilai, $nis, $nama, $matpel, $semester, $kelas, $tugas, $uts, $uas, $nilai);
      echo json_encode($res['status'] = true);

 }elseif (@$_REQUEST['type'] == 'delete_nilai') {

     $kd_nilai   = $_POST['kd_nilai'];

     $objAdmin->delete_nilai($kd_nilai);
    echo json_encode($res['status'] = true);

 }

 // AJAX REQUEST NILAI

 // AJAX REQUEST jadwal

  if (@$_REQUEST['type'] == 'tambah_jadwal') {

       $kode   = $_POST['kode'];
       $hari  = $_POST['hari'];
       $jam    = $_POST['jam'];
       $waktu = $_POST['waktu'];
       $kelas = $_POST['kelas'];
       $matpel   = $_POST['matpel'];
       $nama_guru   = $_POST['nama_guru'];

       $objAdmin->simpan_jadwal($kode, $hari, $jam, $waktu, $kelas, $matpel, $nama_guru);

       echo json_encode($res['status'] = true);

  }elseif (@$_REQUEST['type'] == 'update_jadwal') {

    $kode   = $_POST['kode'];
    $hari  = $_POST['hari'];
    $jam    = $_POST['jam'];
    $waktu = $_POST['waktu'];
    $kelas = $_POST['kelas'];
    $matpel   = $_POST['matpel'];
    $nama_guru   = $_POST['nama_guru'];

       $objAdmin->update_jadwal($kode, $hari, $jam, $waktu, $kelas, $matpel, $nama_guru);
       echo json_encode($res['status'] = true);

  }elseif (@$_REQUEST['type'] == 'delete_jadwal') {

      $kode   = $_POST['kode'];

      $objAdmin->delete_jadwal($kode);
     echo json_encode($res['status'] = true);

  }

  elseif (@$_REQUEST['type'] == 'get_nis_nama') {
    $nis = @$_POST['nis'];
    $nama = $objAdmin->get_nis_nama($nis)->fetch_object();
    echo json_encode($nama);
  }

  elseif (@$_REQUEST['type'] == 'tambah_absen') {

    $kode = $_POST['kode'];
    $nis_opt = $_POST['nis_opt'];
    $nama_leng = $_POST['nama_leng'];
    $tgl = $_POST['tgl'];
    $jam = $_POST['jam'];
    $hari = $_POST['hari'];
    $ket = $_POST['ket'];

    $objAdmin->simpan_absen($kode, $nis_opt, $nama_leng, $tgl, $jam, $hari, $ket);
    echo json_encode($res['status'] = true);

  }

  elseif (@$_REQUEST['type'] == 'edit_absen') {
    $kode = @$_POST['kode'];
    $data = $objAdmin->edit_absen($kode)->fetch_object();
    echo json_encode($data);
  }

  elseif (@$_REQUEST['type'] == 'update_absen') {

    $kode = $_POST['kode'];
    $nis_opt = $_POST['nis_opt'];
    $nama_leng = $_POST['nama_leng'];
    $tgl = $_POST['tgl'];
    $jam = $_POST['jam'];
    $hari = $_POST['hari'];
    $ket = $_POST['ket'];

    $objAdmin->update_absen($kode, $nis_opt, $nama_leng, $tgl, $jam, $hari, $ket);
    echo json_encode($res['status'] = true);
  }

  elseif (@$_REQUEST['type'] == 'delete_absen') {
    $kode = $_POST['nis'];
    $objAdmin->delete_absen($kode);
    echo json_encode($res['status'] = true);
  }


  elseif (@$_REQUEST['type'] == 'tambah_wali') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $pekerjaan = $_POST['pekerjaan'];
    $agama = $_POST['agama'];
    $status = $_POST['status'];
    $nis = $_POST['nis'];

    $objAdmin->simpan_wali($nama, $alamat, $telp, $pekerjaan, $agama, $status, $nis);
    echo json_encode($res['status'] = true);
  }

  elseif (@$_REQUEST['type'] == 'edit_wali') {

    $s  = $_POST['kode'];
    $data = $objAdmin->edit_wali($s)->fetch_object();
    echo json_encode($data);
  }

  elseif (@$_REQUEST['type'] == 'update_wali') {
    $id_wali = $_POST['id_wali'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $pekerjaan = $_POST['pekerjaan'];
    $agama = $_POST['agama'];
    $status = $_POST['status'];
    $nis = $_POST['nis'];
    $objAdmin->update_wali($id_wali, $nama, $alamat, $telp, $pekerjaan, $agama, $status, $nis);
    echo json_encode($res['status'] = true);
  }

  elseif (@$_REQUEST['type'] == 'delete_wali') {
    $id = $_POST['nis'];
    $objAdmin->delete_wali($id);
    echo json_encode($res['status'] = true);
  }

?>
