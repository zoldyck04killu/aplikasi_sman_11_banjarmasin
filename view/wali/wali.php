
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
						<th colspan="" rowspan="" headers="" scope="">Wali Siswa</th>
						<th colspan="" rowspan="" headers="" scope="">No Induk</th>
						<th colspan="" rowspan="" headers="" scope="">Nama Lengkap</th>
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
					 	<td colspan="" rowspan="" headers=""><?=$a->wali_siswa ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->no_induk ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->nama_lengkap ?></td>
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

		   <div class="form-group col-xs-5 col-lg-4">
				<label for="code">wali siswa</label>
				<input type="text" id="wali" class="form-control input-normal">
				<input type="hidden" id="id" name="">
		    </div>

 			<div class="form-group col-xs-5 col-lg-4">
				<label for="code">No Induk</label>
				<input type="text" id="induk" class="form-control input-normal">
		    </div>

			<div class="form-group col-xs-5 col-lg-4">
				<label for="code">Nama Lengkap</label>
				<input type="text" id="nama_leng" class="form-control input-normal">
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
						$('#id').val(response.id_wali);
						$('#wali').val(response.wali_siswa);
						$('#induk').val(response.no_induk);
						$('#nama_leng').val(response.nama_lengkap);
			
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

		let wali = $('#wali').val();
		let induk = $('#induk').val();
		let nama_leng = $('#nama_leng').val();
		
		

				$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'tambah_wali', wali: wali, induk: induk, nama_leng: nama_leng },
					success: function(response){
						alert('Berhasil menyimpan data');
						$('#modal_body').find(':input').val('');
						$('#myModal').modal('hide');
						location.reload();
					}
			});

			


	}); // simpan

	$('#update').click(function(){

		let id = $('#id').val();
		let wali = $('#wali').val();
		let induk = $('#induk').val();
		let nama_leng = $('#nama_leng').val();

		$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'update_wali', id: id, wali: wali, induk: induk, nama_leng: nama_leng },
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
