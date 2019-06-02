<div class="container" id="" style="">

<div class="row mt-4" id="" style="">

	<div class="col-md-12" id="" style="">
	
			<h4 class="text-center">Data Artikel</h4> <hr>

			<button type="button" id="tambah" class="btn btn-primary">
			  Tambah
			</button>
			
			<table class="table table-md table-hover table-striped mt-4" id="myTable">
				<thead class="thead-dark">
					<tr>
						<th colspan="" rowspan="" headers="" scope="">NO ARTIKEL</th>
						<th colspan="" rowspan="" headers="" scope="">PERIHAL</th>
						<th colspan="" rowspan="" headers="" scope="">TANGGAL</th>
						<th colspan="" rowspan="" headers="" scope="">JAM</th>
						<th colspan="" rowspan="" headers="" scope="">JUDUL</th>
						<th colspan="" rowspan="" headers="" scope="">ISI</th>
						<th colspan="" rowspan="" headers="" scope="">PENULIS</th>
						<th colspan="" rowspan="" headers="" scope="">TUJUAN</th>
						<th colspan="" rowspan="" headers="" scope="">PILIHAN</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$data = $objAdmin->show_artikel();
						while ( $a = $data->fetch_object()) { ?>

					 <tr>
					 	<td colspan="" rowspan="" headers=""><?=$a->no_art ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->perihal ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->tgl ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->jam_art ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->judul ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->isi ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->penulis ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->tujuan ?></td>
					 	<td colspan="" rowspan="" headers="">
					 		<div class="btn btn-group" id="" style="">
						 		<button class="btn btn-info" onclick="edit(<?=$a->no_art ?>)">Edit</button>
						 		<button class="btn btn-danger" onclick="return hapus(<?=$a->no_art?>)">Hapus</button>
					 		</div>
					 	</td>

					 </tr>
					
					<?php } ?>
				</tbody>
			</table>

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
			<label for="code">NO</label>
		    <input type="number" id="no" class="form-control" >
		</div>

		<div class="form-group col-xs-5 col-lg-6">
			<label for="code">PERIHAL</label>
		    <input type="text" id="perihal" class="form-control">
		</div>

		    <div class="form-group col-xs-5 col-lg-6">
				<label for="code">WAKTU</label>
				<input type="date" name="tgl" id="tgl" class="form-control">
				<input type="time" name="jam" id="jam" class="form-control">
				</select>
		    </div>

		<div class="form-group col-xs-5 col-lg-6">
			<label for="code">JUDUL</label>
		    <input type="text" id="judul" class="form-control">
		</div>

		<div class="form-group col-xs-5 col-lg-6">
			<label for="code">ISI</label>
		    <textarea class="form-control" id="isi"></textarea>
		</div>

		<div class="form-group col-xs-5 col-lg-6">
			<label for="code">TUJUAN</label>
		    <input type="text" id="tujuan" class="form-control">
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


	function edit(no)
	{
		$('#myModal').modal('show');
		$('#modalTitle').text('Edit Data');
		$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'edit_artikel', no: no },
					success: function(res){
						$('#no').val(res['no_art']).attr('readonly', true);
						$('#perihal').val(res['perihal']);
						$('#tgl').val(res['tgl']);
						$('#jam').val(res['jam_art']);
						$('#judul').val(res['judul'])
						$('#isi').val(res['isi']);
						$('#penulis').val(res['penulis']);
						$('#tujuan').val(res['tujuan']);

						$('#simpan').hide();
						$('#update').show();

					}
			});

	}

	function hapus(no)
	{
		if (!confirm('Hapus Data ? ')) return false;
		$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'delete_artikel', no: no },
					success: function(response){
						alert('Berhasil hapus data');
						$('#myModal').modal('hide');
						location.reload();
					}
			});

	}
	

$(document).ready(function(){

	$('#update').hide();
	
	$('#tutup').click(function(){
		$('#modal_body').find(':input').val('');
		$('#no').attr('readonly', false);
		$('#myModal').modal('hide');
		$('#update').hide();
		$('#simpan').show();
	}); // tutup modal

	$('#tambah').click(function(){
		$('#myModal').modal('show');
		$('#modalTitle').text('Tambah Data');
		$('#kode').attr('readonly', false);
	}); // tambah

	$('#simpan').click(function(){

		let no 		= $('#no').val();
		let perihal = $('#perihal').val();
		let tgl 	= $('#tgl').val();
		let jam 	= $('#jam').val();
		let judul 	= $('#judul').val();
		let isi 	= $('#isi').val();
		let penulis = $('#penulis').val();
		let tujuan 	= $('#tujuan').val();
		
		if ($('#modal_body').find(':input').val() == '') {

			alert('isi field ');

		}else{

				$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'tambah_artikel', no: no, perihal: perihal, tgl: tgl, jam: jam, judul: judul, isi: isi, penulis: penulis, tujuan: tujuan },
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

		let no 		= $('#no').val();
		let perihal = $('#perihal').val();
		let tgl 	= $('#tgl').val();
		let jam 	= $('#jam').val();
		let judul 	= $('#judul').val();
		let isi 	= $('#isi').val();
		let penulis = $('#penulis').val();
		let tujuan 	= $('#tujuan').val();
			
		$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'update_artikel', no: no, perihal: perihal, tgl: tgl, jam: jam, judul: judul, isi: isi, penulis: penulis, tujuan: tujuan },
					success: function(response){
						alert('Berhasil update data');
						$('#myModal').modal('hide');
						location.reload();
					}
			});

	}); // update


}); // jquery


</script>