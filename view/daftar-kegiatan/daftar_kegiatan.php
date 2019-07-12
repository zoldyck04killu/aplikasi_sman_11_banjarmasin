<?php
$data = $objAdmin->show_kegiatan();
while ( $a = $data->fetch_object()) {
?>
<div class="header-hal">
    <a href="?view=kelas">
      <div class="menu-utama menu1">
        
      </div>
    </a>
</div>
<?php
}
?>
<style media="screen">
  .menu-utama
  {
    margin: 10px;
    display: inline-block;
    font-size: 1.5em;
    color: rgb(255, 255, 255);
    /* padding-top: 100px; */
    line-height: 100px;
    height: 100px;
    width: 150px;
    border-radius: 10px 10px;
    box-shadow: 10px 10px #696162;
  }

  .menu1{
    background-color: #e33d3d;
  }

  .menu2{
    background-color: #364eb4;
  }

  .menu3{
    background-color: #2cba2d;
  }

  .menu4{
    background-color: #1cc3a5;
  }

  .menu5{
    background-color: #c4cc27;
  }

  .menu6{
    background-color: #ff7f00;
  }

  .menu7{
    background-color: #a42698;
  }

  /* .menu-utama .menu1{
    background-color: #e3923d;
  } */

</style>
