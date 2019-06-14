
<?php 

function hari_ini(){

	$hari = date ("D");
 
	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;
 
		case 'Mon':			
			$hari_ini = "Senin";
		break;
 
		case 'Tue':
			$hari_ini = "Selasa";
		break;
 
		case 'Wed':
			$hari_ini = "Rabu";
		break;
 
		case 'Thu':
			$hari_ini = "Kamis";
		break;
 
		case 'Fri':
			$hari_ini = "Jumat";
		break;
 
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		
		default:
					
		break;
	}
 
	return $hari_ini;
 
}

 ?>


<div class="container" id="" style="">

<div class="row mt-4" id="" style="">

	<div class="col-md-12" id="" style="">

			<h4 class="text-center">Absen Siswa</h4> <hr>

			<?php if (@$_SESSION['kewenangan'] == 'admin') { ?>
			<button type="button" id="tambah" class="btn btn-primary">
			  Tambah
			</button>
			<?php } ?>
			<div class="table-responsive" >
			<table class="table table-md table-hover table-striped mt-4" id="myTable">
				<thead class="thead-dark">
					<tr>
						<th colspan="" rowspan="" headers="" scope="">Kode</th>
						<th colspan="" rowspan="" headers="" scope="">NIS</th>
						<th colspan="" rowspan="" headers="" scope="">Nama Siswa</th>
						<th colspan="" rowspan="" headers="" scope="">Hari</th>
						<th colspan="" rowspan="" headers="" scope="">Tanggal</th>
						<th colspan="" rowspan="" headers="" scope="">Jam</th>
						<th colspan="" rowspan="" headers="" scope="">Keterangan</th>
						<?php if (@$_SESSION['kewenangan'] == 'admin') { ?>
						<th colspan="" rowspan="" headers="" scope="">Pilihan</th>
						<?php }  ?>
					</tr>
				</thead>
				<tbody>
					<?php
						$data = $objAdmin->showAbsensi();
						while ( $a = $data->fetch_object()) { ?>

					 <tr>
					 	<td colspan="" rowspan="" headers=""><?=$a->kd_absen ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->nis_siswa ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->nama_leng ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->hari ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->tgl ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->jam ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->ket ?></td>
						
						<?php if (@$_SESSION['kewenangan'] == 'admin') { ?>
					 	<td colspan="" rowspan="" headers="">
					 		<div class="btn btn-group" id="" style="">
						 		<button class="btn btn-info" onclick="edit(<?=$a->kd_absen ?>)"> Edit </button>
						 		<button class="btn btn-danger" id="hapus" data-nis="<?=$a->kd_absen ?>" >Hapus</button>
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
      <div class="modal-body" id="modal_body">

       <div class="form-group col-xs-5 col-lg-6">
			<label for="code">KODE ABSEN</label>
		    <input type="number" id="kode" class="form-control" placeholder="Masukan Kode" >
		</div>

		<div class="form-group col-xs-5 col-lg-6">
			<label for="code">NIS</label>
		    <select id="nis_opt" class="form-control">
		    	<option value="0">Pilih NIS</option>
		    	<?php 
		    	$nis = $objAdmin->get_nis();
		    	while ($n = $nis->fetch_object()) { ?>
		    		<option value="<?=$n->nis_siswa?>"><?=$n->nis_siswa?></option>
		    	<?php } ?>
		    </select>
		</div>

		  <div class="form-group col-xs-5 col-lg-12">
			<label for="code">NAMA SISWA</label>
			<input type="" name="" id="nama_leng" class="form-control" readonly>
		   </div>

		   <div class="form-group col-xs-5 col-lg-4">
				<label for="code">HARI</label>
				<input type="text" id="hari" class="form-control input-normal" readonly value="<?=hari_ini() ?>">
		    </div>

 			<div class="form-group col-xs-5 col-lg-4">
				<label for="code">TANGGAL</label>
				<input type="text" id="tgl" class="form-control input-normal" readonly value="<?=date("Y-m-d")?>">
		    </div>

			<div class="form-group col-xs-5 col-lg-4">
				<label for="code">JAM</label>
				<input type="text" id="jam" class="form-control input-normal" readonly value="<?=date("H:i:s")?>">
		    </div>

			<div class="form-group col-xs-5 col-lg-12">
				<label for="code">KETERANGAN</label>
				<input type="text" id="ket" class="form-control input-normal">
			</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="tutup">Tutup</button>
        <button type="button" class="btn btn-primary" id="simpan">Simpan</button>
        <button type="button" class="btn btn-info" id="update">Update</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">


	function edit(kode)
	{
			$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'edit_absen', kode: kode },
					success: function(response){
						$('#myModal').modal('show');
						$('#modalTitle').text('Edit Data');
						$('#nis').attr('readonly', true);
						$('#kode').val(response.kd_absen);
						$('#nis_opt').val(response.nis_siswa);
						$('#nama_leng').val(response.nama_leng);
						$('#tgl').val(response.tgl);
						$('#hari').val(response.hari);
						$('#jam').val(response.jam);
						$('#ket').val(response.ket);

						$('#simpan').hide();
						$('#update').show();

					}
			});
	}


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

	$('#simpan').click(function(){

		let kode   = $('#kode').val();
		let nis_opt  = $('#nis_opt').val();
		let nama_leng   = $('#nama_leng').val();
		let tgl = $('#tgl').val();
		let jam   = $('#jam').val();
		let hari   = $('#hari').val();
		let ket   = $('#ket').val();
		
		if ($('#modal_body').find(':input').val() == '') {

			alert('isi field ');

		}else{

				$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'tambah_absen', kode: kode, nis_opt: nis_opt, nama_leng: nama_leng, hari: hari, tgl: tgl, jam: jam, ket: ket },
					success: function(response){
						alert('Berhasil menyimpan data');
						$('#modal_body').find(':input').val('');
						$('#myModal').modal('hide');
						location.reload();
					}
			});

		}


	}); // simpan

	$('#update').click(function(){

		
		let kode   = $('#kode').val();
		let nis_opt  = $('#nis_opt').val();
		let nama_leng   = $('#nama_leng').val();
		let tgl = $('#tgl').val();
		let jam   = $('#jam').val();
		let hari   = $('#hari').val();
		let ket   = $('#ket').val();

		$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'update_absen', kode: kode, nis_opt: nis_opt, nama_leng: nama_leng, hari: hari, tgl: tgl, jam: jam, ket: ket },
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
				data: { type: 'delete_absen', nis: nis },
					success: function(response){
						alert('Berhasil hapus data');
						$('#myModal').modal('hide');
						location.reload();
					}
			});

	}); // hapus


	$('#nis_opt').on('change', function(){
		let nis = $('#nis_opt').val();

		if (nis != 0) {
			$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'get_nis_nama', nis: nis },
					success: function(response){
						$('#nama_leng').val(response.nama_siswa);
					}
			});
		}else{
			$('#nama_leng').val('');
			alert('Pilih NIS!!!');
		}

	}); // get nama siswa by nis

}); // jquery


</script>
