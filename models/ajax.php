<?php

  require_once '../config/config.php';
  require_once '../config/connection.php';
  $obj = new Connection($host, $user, $pass, $db);

  if ($_GET['proses'] == 'namaAnggota') {
          $mysqli = $obj->conn;
          $id = $_GET['id'];
          $sql = "SELECT nama_anggota FROM anggota WHERE id_anggota=$id";
          $query = $mysqli->query($sql);
          $namaAnggota = $query->fetch_object();
          // var_dump($stok_sarang);
          // echo $stok_sarang['stok'];
          $data = array(
                        'namaAnggota' => $namaAnggota->nama_anggota
                        );
          echo json_encode($data);
  }

?>
