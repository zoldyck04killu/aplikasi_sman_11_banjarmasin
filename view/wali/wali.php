
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

			<h4 class="text-center">Data Wali</h4> <hr>

			<?php if (@$_SESSION['kewenangan'] == 'admin') { ?>
			<button type="button" id="tambah" class="btn btn-primary">
			  Tambah
			</button>
			<?php } ?>
			<div class="table-responsive" >
			<table class="table table-md table-hover table-striped mt-4" id="myTable">
				<thead class="thead-dark">
					<tr>
						<th colspan="" rowspan="" headers="" scope="">ID Wali</th>
						<th colspan="" rowspan="" headers="" scope="">Nama Wali Siswa</th>
						<th colspan="" rowspan="" headers="" scope="">Alamat</th>
						<th colspan="" rowspan="" headers="" scope="">Telp</th>
						<th colspan="" rowspan="" headers="" scope="">Pekerjaan</th>
						<th colspan="" rowspan="" headers="" scope="">Agama</th>
						<th colspan="" rowspan="" headers="" scope="">Status</th>
						<th colspan="" rowspan="" headers="" scope="">No Induk Siswa</th>
						<?php if (@$_SESSION['kewenangan'] == 'admin') { ?>
						<th colspan="" rowspan="" headers="" scope="">Pilihan</th>
						<?php }  ?>
					</tr>
				</thead>
				<tbody>
					<?php
						$data = $objAdmin->showWali();
						while ( $a = $data->fetch_object()) { ?>

					 <tr>
					 	<td colspan="" rowspan="" headers=""><?=$a->id_wali ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->nama ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->alamat ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->telp ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->pekerjaan ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->agama ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->status ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->nis ?></td>
						<?php if (@$_SESSION['kewenangan'] == 'admin') { ?>
					 	<td colspan="" rowspan="" headers="">
					 		<div class="btn btn-group" id="" style="">
						 		<button class="btn btn-info" onclick="edit(<?=$a->id_wali ?>)"> Edit </button>
						 		<button class="btn btn-danger" id="hapus" data-nis="<?=$a->id_wali ?>" >Hapus</button>
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

				<!-- <div class="form-group col-xs-5 col-lg-4">
 				<label for="code">Nama Wali</label> -->
 				<input type="hidden" id="id_wali" class="form-control input-normal">
 		    <!-- </div> -->

		   <div class="form-group col-xs-5 col-lg-4">
				<label for="code">Nama Wali</label>
				<input type="text" id="nama" class="form-control input-normal">
		    </div>

 			<div class="form-group col-xs-5 col-lg-4">
				<label for="code">Alamat</label>
				<input type="text" id="alamat" class="form-control input-normal">
		    </div>

			<div class="form-group col-xs-5 col-lg-4">
				<label for="code">Telp</label>
				<input type="text" id="telp" class="form-control input-normal">
		    </div>

				<div class="form-group col-xs-5 col-lg-4">
					<label for="code">Pekerjaan</label>
					<input type="text" id="pekerjaan" class="form-control input-normal">
				</div>

				<div class="form-group col-xs-5 col-lg-4">
					<label for="code">Agama</label>
					<input type="text" id="agama" class="form-control input-normal">
				</div>

				<div class="form-group col-xs-5 col-lg-4">
					<label for="code">Status</label>
					<input type="text" id="status" class="form-control input-normal">
				</div>

				<div class="form-group col-xs-5 col-lg-4">
					<label for="code">Nis Siswa/Anak</label>
					<input type="text" id="nis" class="form-control input-normal">
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
				data: { type: 'edit_wali', kode: kode },
					success: function(response){
						$('#myModal').modal('show');
						$('#modalTitle').text('Edit Data');
						$('#id_wali').val(response.id_wali);
						$('#nama').val(response.nama);
						$('#alamat').val(response.alamat);
						$('#telp').val(response.telp);
						$('#pekerjaan').val(response.pekerjaan);
						$('#agama').val(response.agama);
						$('#status').val(response.status);
						$('#nis').val(response.nis);

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

		let nama = $('#nama').val();
		let alamat = $('#alamat').val();
		let telp = $('#telp').val();
		let pekerjaan = $('#pekerjaan').val();
		let  agama = $('#agama').val();
		let status = $('#status').val();
		let nis = $('#nis').val();

				$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'tambah_wali', nama: nama, alamat: alamat, telp: telp, pekerjaan: pekerjaan, agama: agama, status: status, nis: nis },
					success: function(response){
						alert('Berhasil menyimpan data');
						$('#modal_body').find(':input').val('');
						$('#myModal').modal('hide');
						location.reload();
					}
			});




	}); // simpan

	$('#update').click(function(){
		let id_wali = $('#id_wali').val();
		let nama = $('#nama').val();
		let alamat = $('#alamat').val();
		let telp = $('#telp').val();
		let pekerjaan = $('#pekerjaan').val();
		let  agama = $('#agama').val();
		let status = $('#status').val();
		let nis = $('#nis').val();

		$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'update_wali', id_wali: id_wali, nama: nama, alamat: alamat, telp: telp, pekerjaan: pekerjaan, agama: agama, status: status, nis: nis },
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
				data: { type: 'delete_wali', nis: nis },
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
