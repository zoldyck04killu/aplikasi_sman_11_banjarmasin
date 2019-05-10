<div class="container" id="" style="">

<div class="row mt-4" id="" style="">

	<div class="col-md-12" id="" style="">
	
			<h4 class="text-center">Data Siswa</h4> <hr>

			<button type="button" id="tambah" class="btn btn-primary">
			  Tambah
			</button>
			
			<table class="table table-md table-hover table-striped mt-4" id="myTable">
				<thead class="thead-dark">
					<tr>
						<th colspan="" rowspan="" headers="" scope="">NIS</th>
						<th colspan="" rowspan="" headers="" scope="">Nama</th>
						<th colspan="" rowspan="" headers="" scope="">Jenis Kelamin</th>
						<th colspan="" rowspan="" headers="" scope="">Tempat Lahir</th>
						<th colspan="" rowspan="" headers="" scope="">Tgl Lahir</th>
						<th colspan="" rowspan="" headers="" scope="">Pilihan</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$data = $objAdmin->show_siswa();
						while ( $a = $data->fetch_object()) { ?>

					 <tr>
					 	<td colspan="" rowspan="" headers=""><?=$a->nis_siswa ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->nama_siswa ?></td>
					 	<td colspan="" rowspan="" headers=""><?php echo $a->jk_siswa == 'l' ? 'Laki-Laki' : 'Perempuan' ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->tempat_lahir ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->tgl_lahir ?></td>
					 	<td colspan="" rowspan="" headers="">
					 		<div class="btn btn-group" id="" style="">
						 		<button class="btn btn-info" id="edit" data-nis="<?=$a->nis_siswa ?>" data-nama="<?=$a->nama_siswa ?>" data-jk="<?=$a->jk_siswa ?>" data-lahir="<?=$a->tempat_lahir ?>" data-tgl="<?=$a->tgl_lahir ?>">Edit</button>
						 		<button class="btn btn-danger" id="hapus" data-nis="<?=$a->nis_siswa ?>" >Hapus</button>
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
			<label for="code">NIS</label>
		    <input type="number" id="nis" class="form-control" placeholder="Masukan NIS" >
		</div>

		<div class="form-group col-xs-5 col-lg-6">
			<label for="code">NAMA</label>
		    <input type="text" id="nama" class="form-control" placeholder="Masukan Nama" >
		</div>

		  <div class="form-group col-xs-5 col-lg-6">
			<label for="code">JENIS KELAMIN</label>
			<select class="form-control" id="jk">
				<option value="0">Pilih</option>
				<option value="l">Laki-Laki</option>
				<option value="p">Perempuan</option>
			</select>
		   </div>

		   <div class="form-group col-xs-5 col-lg-6">
				<label for="code">TEMPAT LAHIR</label>
				<input type="text" id="lahir" class="form-control input-normal" placeholder="Masukan Tempat Lahir" >
		    </div>

		    <div class="form-group col-xs-5 col-lg-6">
				<label for="code">TANGGAL LAHIR</label>
				<input type="date" id="tgl" class="form-control input-normal" >
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

		let nis   = $('#nis').val();
		let nama  = $('#nama').val();
		let jk    = $('#jk').val();
		let lahir = $('#lahir').val();
		let tgl   = $('#tgl').val();

		if ($('#modal_body').find(':input').val() == '') {

			alert('isi field ');

		}else{

				$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'tambah_siswa', nis: nis, nama: nama, jk: jk, lahir: lahir, tgl: tgl },
					success: function(response){
						alert('Berhasil menyimpan data');
						$('#modal_body').find(':input').val('');
						$('#myModal').modal('hide');
						location.reload();
					}
			});

		}

	

	}); // simpan

	$('#myTable #edit').click(function(){
		let nis   = $(this).data('nis');
		let nama  = $(this).data('nama');
		let jk    = $(this).data('jk');
		let lahir = $(this).data('lahir');
		let tgl   = $(this).data('tgl');

		$('#myModal').modal('show');
		$('#modalTitle').text('Edit Data');

		$('#nis').val(nis);
		$('#nis').attr('readonly', true);
		$('#nama').val(nama);
		$('#jk').val(jk);
		$('#lahir').val(lahir);
		$('#tgl').val(tgl);

		$('#simpan').hide();
		$('#update').show();

	}); // edit


	$('#update').click(function(){

		let nis   = $('#nis').val();
		let nama  = $('#nama').val();
		let jk    = $('#jk').val();
		let lahir = $('#lahir').val();
		let tgl   = $('#tgl').val();

		$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'update_siswa', nis: nis, nama: nama, jk: jk, lahir: lahir, tgl: tgl },
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