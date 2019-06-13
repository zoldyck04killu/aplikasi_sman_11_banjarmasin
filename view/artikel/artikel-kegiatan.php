<center>
<div class="header-hal">
  <h2>
    KEGIATAN
  </h2>
  <?php if (@$_SESSION['kewenangan'] == 'admin') { ?>
  <a href="?view=data-kegiatan">
    <button type="button" id="tambah" class="btn btn-primary">
      Daftar Data Kegiatan
    </button>
  </a>
  <?php } ?>

    <?php
    $data = $objAdmin->show_kegiatan();
    while ( $a = $data->fetch_object()) { ?>

      <div class="menu-utama menu1">
        <h3><?=$a->nama_kegiatan ?></h3>
        <p>
          Hari kegiatan : <?=$a->hari_kegiatan ?> <br>
        </p>
        <p>
          Jam Kegiatan : <?=$a->jam_kegiatan ?><br>
        </p>
        <p>
          Nip Pembimbing : <?=$a->nip ?> <br>
        </p>
      </div>

    <?php } ?>
</div>
</center>

<style media="screen">
  .menu-utama
  {
    margin: 10px;
    font-size: 1.5em;
    width: 97%;
    text-align: justify;
    border-radius: 10px 10px;
    border-color: #575757;
    border-style: solid;
    padding: 10px;
  }


</style>
