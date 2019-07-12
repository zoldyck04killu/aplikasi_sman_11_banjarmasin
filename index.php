<?php
// require_once 'config/autoload.php';

require_once 'config/config.php';
require_once 'config/connection.php';
include('models/admin.php');
$obj = new Connection($host, $user, $pass, $db);
$objAdmin = new Admin($obj);
?>

<html lang="en" dir="ltr">
  <head>

    <title></title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/home.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables/datatables.min.css"/>

    <script src="<?php echo base_url(); ?>assets/jquery-3.1.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->

    <script src="<?=base_url();?>assets/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables/datatables.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

  </head>
  <body>
    <!-- Start Sidebar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <img src="assets/image/logo smk.jpg" width="60" height="60" class="d-inline-block align-top" alt="">
      <span class="menu-collapsed ml-5">SMA 11 Banjarmasin</span>
      <div class="collapse navbar-collapse  " id="navbarText">
        <div class="navbar-nav mr-auto">
        </div>
        <span class="navbar-text">
          <ul class="navbar-nav mr-auto">
            <?php if (@$_SESSION['statusLogin'] == 'login') { ?>
              <?php if (@$_SESSION['kewenangan'] == 'admin' || @$_SESSION['kewenangan'] == 'wali' ) { ?>

            <li class="nav-item active">
              <a class="nav-link" href="?view=beranda">Beranda <span class="sr-only">(current)</span></a>
            </li>
              <?php } ?>

            <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href="?view=sejarah">Tentang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?view=kontak">Kontak</a>
            </li>
            <?php if (@$_SESSION['kewenangan'] == 'admin_web') { ?>
            <li class="nav-item">
              <a class="nav-link" href="?view=register">register</a>
            </li>
            <?php } ?>
            <?php if (@$_SESSION['statusLogin'] == 'login') { ?>
            <li class="nav-item">
              <a href= <b><?= $_SESSION['username'] ?></b>
            </li>
            <?php } ?>
            <li class="nav-item">
              <?php if (@$_SESSION['statusLogin'] == 'login') { ?>
                <a class="nav-link" href="?view=logout">Logout</a>
                <?php }else{ ?>
                <a class="nav-link" href="?view=login">Login</a>
              <?php } ?>

            </li>
          </ul>
        </span>
      </div>
    </nav>

    <div class="row" id="body-row ">
        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
            <ul class="list-group">
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <span style="color:white;">MAIN MENU</span>
                </li>
                    <a href="?view=home" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                      <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-dashboard fa-fw mr-3"></span>
                        <span class="menu-collapsed">Home</span>
                      </div>
                    </a>
                    <a href="?view=sejarah" aria-expanded="false"  class="bg-dark list-group-item list-group-item-action flex-column align-items-start " >
                      <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-dashboard fa-fw mr-3"></span>
                        <span class="menu-collapsed">Sejarah</span>
                      </div>
                    </a>

                    <a href="?view=artikel-view" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                      <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-dashboard fa-fw mr-3"></span>
                        <span class="menu-collapsed">Artikel</span>
                      </div>
                    </a>
                    <a href="?view=kontak" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                      <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-dashboard fa-fw mr-3"></span>
                        <span class="menu-collapsed">Kontak</span>
                      </div>
                    </a>
                    <!-- <a href="" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                      <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-dashboard fa-fw mr-3"></span>
                        <span class="menu-collapsed">Info</span>
                      </div>
                    </a> -->
                    <!-- <a href="?view=data-siswa" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                      <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-dashboard fa-fw mr-3"></span>
                        <span class="menu-collapsed">Data Siswa</span>
                      </div>
                    </a>
                    <a href="?view=data-guru"  aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                      <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-dashboard fa-fw mr-3"></span>
                        <span class="menu-collapsed">Data Guru</span>
                      </div>
                    </a>
                <a href="?view=mata-pelajaran" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-dashboard fa-fw mr-3"></span>
                        <span class="menu-collapsed">Mata Pelajaran</span>
                    </div>
                </a>
                <a href="?view=data-kegiatan"  aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-dashboard fa-fw mr-3"></span>
                        <span class="menu-collapsed">Kegiatan</span>
                    </div>
                </a>
                <a href="?view=data-nilai"  aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-dashboard fa-fw mr-3"></span>
                        <span class="menu-collapsed">Nilai</span>
                    </div>
                </a> -->


            </ul>
        </div> <!-- End Sidebar -->

        <!-- MAIN -->
        <div class="col">

            <h1>
                <?php include('page/page.php'); ?>
            </h1>

        </div>
    </div>

</body>
<script type="text/javascript">
    $(document).ready( function () {
      $('#myTable').DataTable({
        "bLengthChange": false,
      });
    } );
</script>
</html>

<style media="screen">
*{
    font-size: 14px;
}
#body-row {
    margin-left:0;
    margin-right:0;
}
#sidebar-container {
    min-height: 100vh;
      background-color: #e38039;
    padding: 0;
}


.sidebar-expanded {
    width: 180px;
}
.sidebar-collapsed {
    width: 60px;
}


#sidebar-container .list-group a {
    height: 50px;
    color: white;
}


#sidebar-container .list-group .sidebar-submenu a {
    height: 45px;
    padding-left: 30px;
}
.sidebar-submenu {
    font-size: 0.9rem;
}


.sidebar-separator-title {
    background-color: #e38039;
    height: 35px;
}
.sidebar-separator {
    background-color: #333;
    height: 25px;
}
.logo-separator {
    background-color: #333;
    height: 60px;
}


#sidebar-container .list-group .list-group-item[aria-expanded="false"] .submenu-icon::after {
  content: " \f0d7";
  font-family: FontAwesome;
  display: inline;
  text-align: right;
  padding-left: 10px;
}

#sidebar-container .list-group .list-group-item[aria-expanded="true"] .submenu-icon::after {
  content: " \f0da";
  font-family: FontAwesome;
  display: inline;
  text-align: right;
  padding-left: 10px;
}

</style>
