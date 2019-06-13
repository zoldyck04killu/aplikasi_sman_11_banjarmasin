<center>

<div class="header-hal">
  <h2>
    PENGUMUMAN
  </h2>
  <?php if (@$_SESSION['kewenangan'] == 'admin') { ?>
  <a href="?view=data-artikel">
    <button type="button" id="tambah" class="btn btn-primary">
      Daftar Data Pengumuman
    </button>
  </a>
  <?php } ?>
  <?php
    $data = $objAdmin->show_artikel();
    while ( $a = $data->fetch_object()) { ?>
      <div class="menu-utama menu1">
        <h3><?=$a->judul ?></h3>
        <p>
          Perihal : <?=$a->perihal ?> <br>
          No : <?=$a->no_art ?>
        </p>
        <p>
          Tanggal : <?=$a->tgl ?>
        </p>
        <p>
          Jam : <?=$a->jam_art ?>
        </p>
        <p>
          <?=$a->isi ?>
        </p>
        <p>
          Penulis : <?=$a->penulis ?> <br>
        </p>
        <p>
          Tujuan : <?=$a->tujuan ?> <br>
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
