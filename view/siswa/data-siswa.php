<div class="container" id="" style="">

<div class="row mt-4" id="" style="">

	<div class="col-md-12" id="" style="">

			<h4 class="text-center">Data Siswa</h4> <hr>

			<?php if (@$_SESSION['kewenangan'] == 'admin') { ?>
			<button type="button" id="tambah" class="btn btn-primary">
			  Tambah
			</button>
			<?php } ?>
			<div class="table-responsive" >
			<table class="table table-md table-hover table-striped mt-4" id="myTable">
				<thead class="thead-dark">
					<tr>
						<th colspan="" rowspan="" headers="" scope="">NIS</th>
						<th colspan="" rowspan="" headers="" scope="">Nama</th>
						<th colspan="" rowspan="" headers="" scope="">Jenis Kelamin</th>
						<th colspan="" rowspan="" headers="" scope="">Tempat Lahir</th>
						<th colspan="" rowspan="" headers="" scope="">Tgl Lahir</th>
						<th colspan="" rowspan="" headers="" scope="">Agama </th>
						<th colspan="" rowspan="" headers="" scope="">Alamat </th>
						<th colspan="" rowspan="" headers="" scope="">Asal Sekolah </th>
						<th colspan="" rowspan="" headers="" scope="">Tahun Lulus </th>
						<th colspan="" rowspan="" headers="" scope="">Matpel </th>
						<th colspan="" rowspan="" headers="" scope="">Jadwal </th>
						<th colspan="" rowspan="" headers="" scope="">KOde Kegiatan </th>
						<th colspan="" rowspan="" headers="" scope="">Kelas </th>

						<?php if (@$_SESSION['kewenangan'] == 'admin') { ?>
						<th colspan="" rowspan="" headers="" scope="">Pilihan</th>
						<?php }  ?>
					</tr>
				</thead>
				<tbody>
					<?php
						$kelas = $_GET['kelas'];
						$data = $objAdmin->show_siswa($kelas);
						while ( $a = $data->fetch_object()) { ?>

					 <tr>
					 	<td colspan="" rowspan="" headers=""><?=$a->nis_siswa ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->nama_siswa ?></td>
					 	<td colspan="" rowspan="" headers=""><?php echo $a->jk_siswa == 'l' ? 'Laki-Laki' : 'Perempuan' ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->tempat_lahir ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->tgl_lahir ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->agama ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->alamat ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->asal_sekolah ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->thn_lulus ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->matpel ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->hari_j ?>/<?='Jam '.$a->jam_j ?>/<?=$a->waktu ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->kd_Kegiatan ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->status ?></td>

						<?php if (@$_SESSION['kewenangan'] == 'admin') { ?>
					 	<td colspan="" rowspan="" headers="">
					 		<div class="btn btn-group" id="" style="">
						 		<button class="btn btn-info" id="edit"
									data-nis="<?=$a->nis_siswa ?>"
									data-nama="<?=$a->nama_siswa ?>"
									data-nama_keg="<?=$a->nama_kegiatan ?>"
									data-nama_jad="<?=$a->matpel ?>"

									data-jk="<?=$a->jk_siswa ?>"
									data-lahir="<?=$a->tempat_lahir ?>"
									data-tgl="<?=$a->tgl_lahir ?>"
									data-agama="<?=$a->agama ?>"
									data-alamat="<?=$a->alamat ?>"
									data-asal_sekolah="<?=$a->asal_sekolah ?>"
									data-thn_lulus="<?=$a->thn_lulus ?>"
									data-kd_jadwal="<?=$a->kd_jadwal ?>"
									data-kd_kegiatan="<?=$a->kd_Kegiatan ?>"
									data-status="<?=$a->status ?>"
								>
									Edit
								</button>
						 		<button class="btn btn-danger" id="hapus" data-nis="<?=$a->nis_siswa ?>" >Hapus</button>
					 		</div>
					 	</td>
						<?php } ?>
					 </tr>

					<?php } ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<form method="post">
      <div class="modal-body" id="modal_body">

       <div class="form-group col-xs-5 col-lg-4">
			<label for="code">NIS</label>
		    <input type="number" id="nis" class="form-control" placeholder="Masukan NIS" name="nis" >
		</div>

		<div class="form-group col-xs-5 col-lg-6">
			<label for="code">NAMA</label>
		    <input type="text" id="nama" class="form-control" placeholder="Masukan Nama" name="nama">
		</div>

		  <div class="form-group col-xs-5 col-lg-6">
			<label for="code">JENIS KELAMIN</label>
			<select class="form-control" id="jk" name="jk">
				<option value="0">Pilih</option>
				<option value="l">Laki-Laki</option>
				<option value="p">Perempuan</option>
			</select>
		   </div>

		   <div class="form-group col-xs-5 col-lg-6">
				<label for="code">TEMPAT LAHIR</label>
				<input type="text" id="lahir" class="form-control input-normal" placeholder="Masukan Tempat Lahir" name="lahir">
		    </div>

		    <div class="form-group col-xs-5 col-lg-6">
				<label for="code">TANGGAL LAHIR</label>
				<input type="date" id="tgl" class="form-control input-normal"  name="tgl">
			</div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">Agama</label>
				<input type="text" id="agama" class="form-control input-normal" placeholder="Masukan Agama" name="agama">
				</div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">Alamat</label>
				<input type="text" id="alamat" class="form-control input-normal" placeholder="Masukan Alamat" name="alamat">
				</div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">Asal Sekolah</label>
				<input type="text" id="asal_sekolah" class="form-control input-normal" placeholder="Masukan Asal Sekolah" name="asal_sekolah">
				</div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">Tahun Lulus</label>
				<input type="text" id="thn_lulus" class="form-control input-normal" placeholder="Masukan Tahun Lulus" name="thn_lulus">
				</div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">Kode Jadwal</label>
				<!-- <input type="text" id="kd_jadwal" class="form-control input-normal" placeholder="Masukan Kode Jadwal"> -->
				<select class="form-control" id="kd_jadwal" name="kd_jadwal">
				<?php
					$data = $objAdmin->show_jadwal();
					while ( $jadwal = $data->fetch_object()) { ?>
							<option value="<?= $jadwal->kd_jadwal ?>"><?= $jadwal->matpel ?></option>
						<?php } ?>
					</select>
				</div>

				<div class="form-group col-xs-5 col-lg-6">
					<label for="code">Jumlah Kegiatan</label>
					<input type="text" id="jlm_keg" class="form-control input-normal" placeholder="Masukan Kelas">
				</div>
				<script type="text/javascript">
				$(document).ready(function(){
						$("#jlm_keg").focusout(function(){
							var jlm_keg = document.getElementById('jlm_keg').value;
							for (var i = 1; i <= jlm_keg; i++) {
								$("#input_keg").append('  <div class="form-group col-xs-5 col-lg-6">' +
								'<label for="code">Kode Kegiatan</label>' +
								'<select class="form-control" id="kd_kegiatan'+i+'" name="kd_kegiatan['+i+']" > <?php $data = $objAdmin->show_kegiatan(); while ( $kegiatan = $data->fetch_object()) { ?> ' +
								'<option value="<?= $kegiatan->kd_kegiatan ?>"><?= $kegiatan->nama_kegiatan ?></option>' +
								'<?php } ?></select></div>');
							}
						});
				});
				</script>
				<div id="input_keg"></div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">Kelas</label>
				<input type="text" id="status" class="form-control input-normal" placeholder="Masukan Kelas" name="status">
				</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="tutup">Tutup</button>
        <button type="submit" class="btn btn-primary" id="simpan" name="simpan">Simpan</button>
        <button type="button" class="btn btn-info" id="update">Update</button>
      </div>
    </div>
		</form>

  </div>
</div>

<script type="text/javascript">


$(document).ready(function(){

	$('#update').hide();

	$('#tutup').click(function(){
		$('#modal_body').find(':input').val('');
		$('#myModal').modal('hide');
		$('#update').hide();
		$('#simpan').show();
	}); // tutup modal

	$('#tambah').click(function(){
		$('#myModal').modal('show');
		$('#modalTitle').text('Tambah Data');
		$('#nis').attr('readonly', false);
	}); // tambah

	$('#simpannnn').click(function(){

		let nis   = $('#nis').val();
		let nama  = $('#nama').val();
		let jk    = $('#jk').val();
		let lahir = $('#lahir').val();
		let tgl   = $('#tgl').val();
		let agama   = $('#agama').val();
		let alamat   = $('#alamat').val();
		let asal_sekolah   = $('#asal_sekolah').val();
		let thn_lulus   = $('#thn_lulus').val();
		let kd_jadwal   = $('#kd_jadwal').val();
		// let kd_kegiatan   = $('#kd_kegiatan').val();
		let status = $('#status').val();
		let jlm_keg   = $('#jlm_keg').val();

		// console.log(jlm_keg);

		if ($('#modal_body').find(':input').val() == '') {

			alert('isi field ');

		}else{
			for (var i = 1; i <= jlm_keg; i++) {
					let  a   = $('#kd_kegiatan'+i).val();
					console.log(a);
				$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'tambah_siswa', nis: nis, nama: nama, jk: jk, lahir: lahir, tgl: tgl, agama: agama, alamat: alamat, asal_sekolah: asal_sekolah, thn_lulus: thn_lulus, kd_jadwal: kd_jadwal, kd_kegiatan: a, status: status },
					success: function(response){
						$('#modal_body').find(':input').val('');
						$('#myModal').modal('hide');
					}
				});
			}
			alert('Berhasil menyimpan data');
			location.reload();

		}



	}); // simpan

	$('#myTable #edit').click(function(){
		let nis   = $(this).data('nis');
		let nama  = $(this).data('nama');
		let nama_keg  = $(this).data('nama_keg');
		let nama_jad  = $(this).data('nama_jad');

		let jk    = $(this).data('jk');
		let lahir = $(this).data('lahir');
		let tgl   = $(this).data('tgl');
		let agama   =  $(this).data('agama');
		let alamat   =  $(this).data('alamat');
		let asal_sekolah   =  $(this).data('asal_sekolah');
		let thn_lulus   =  $(this).data('thn_lulus');
		let kd_jadwal   =  $(this).data('kd_jadwal');
		let kd_kegiatan   =  $(this).data('kd_kegiatan');
		let status   =  $(this).data('status');
		// console.log(kd_kegiatan);

		$('#myModal').modal('show');
		$('#modalTitle').text('Edit Data');

		$('#nis').val(nis);
		$('#nis').attr('readonly', true);
		$('#nama').val(nama);
		$('#jk').val(jk);
		$('#lahir').val(lahir);
		$('#tgl').val(tgl);
		$('#agama').val(agama);
		$('#alamat').val(alamat);
	 	$('#asal_sekolah').val(asal_sekolah);
	 	$('#thn_lulus').val(thn_lulus);
		// $('#kd_jadwal').val(kd_jadwal);
		$('#kd_jadwal').prepend('<option value="'+kd_jadwal+' " selected>' + nama_jad + '</option>');

		// $('#kd_kegiatan').val(kd_kegiatan);
		// $('#kd_kegiatan').val(kd_kegiatan);
		$('#kd_kegiatan').prepend('<option value="'+kd_kegiatan+' " selected>' + nama_keg + '</option>');
		$('#status').val(status);


		$('#simpan').hide();
		$('#update').show();

	}); // edit


	$('#update').click(function(){

		let nis   = $('#nis').val();
		let nama  = $('#nama').val();
		let jk    = $('#jk').val();
		let lahir = $('#lahir').val();
		let tgl   = $('#tgl').val();
		let agama   = $('#agama').val();
		let alamat   = $('#alamat').val();
		let asal_sekolah   = $('#asal_sekolah').val();
		let thn_lulus   = $('#thn_lulus').val();
		let kd_jadwal   = $('#kd_jadwal').val();
		let kd_kegiatan   = $('#kd_kegiatan').val();
		let status   = $('#status').val();


		$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'update_siswa', nis: nis, nama: nama, jk: jk, lahir: lahir, tgl: tgl, agama: agama, alamat: alamat, asal_sekolah: asal_sekolah, thn_lulus: thn_lulus,  kd_jadwal: kd_jadwal, kd_kegiatan: kd_kegiatan, status: status  },
					success: function(response){
						alert('Berhasil update data');
						$('#myModal').modal('hide');
						location.reload();
					}
			});

	}); // update

	$('#myTable #hapus').click(function(){

		if (!confirm('Hapus Data ? ')) return false;

		let nis = $(this).data('nis');

			$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'delete_siswa', nis: nis },
					success: function(response){
						alert('Berhasil hapus data');
						$('#myModal').modal('hide');
						location.reload();
					}
			});

	}); // hapus

}); // jquery


</script>
<?php
if (isset($_POST['simpan']))
{
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

	// var_dump($kd_kegiatan);
	$banyak_data = count($kd_kegiatan);
	// echo "<script>
	// console.log(".$kd_kegiatan.");
	// </script>";
	// var_dump($kd_kegiatan);
	// die();
	$saveSiswa = $objAdmin->simpan_siswa($nis, $nama, $jk, $lahir, $tgl, $agama, $alamat, $asal_sekolah, $thn_lulus, $kd_jadwal, $status);

	for ($i=1; $i <= $banyak_data ; $i++) {
		$kd_kegiatan_per = $kd_kegiatan[$i];

		$saveKegiatanMhs = $objAdmin->simpan_mhs_kegiatan($kd_kegiatan_per,$nis);
	}

  if ($saveSiswa && $saveKegiatanMhs) {
      echo '<script>
			window.location="?view=kelas"
      </script>';
  }else{
    echo "<script>
		alert('Gagal menyimpan data');
    </script>";
  }
}


?>
