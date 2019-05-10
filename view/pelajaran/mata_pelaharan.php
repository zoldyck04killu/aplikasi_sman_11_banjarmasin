<div class="container" id="" style="">

<div class="row mt-4" id="" style="">

	<div class="col-md-12" id="" style="">
	
			<h4 class="text-center">Mata Pelajaran</h4> <hr>

			<button type="button" id="tambah" class="btn btn-primary">
			  Tambah
			</button>
			
			<table class="table table-md table-hover table-striped mt-4" id="myTable">
				<thead class="thead-dark">
					<tr>
						<th colspan="" rowspan="" headers="" scope="">KODE</th>
						<th colspan="" rowspan="" headers="" scope="">Nama</th>
						<th colspan="" rowspan="" headers="" scope="">NIP</th>
						<th colspan="" rowspan="" headers="" scope="">Hari</th>
						<th colspan="" rowspan="" headers="" scope="">Jam</th>
						<th colspan="" rowspan="" headers="" scope="">Kode Kelas</th>
						<th colspan="" rowspan="" headers="" scope="">PIlihan</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$data = $objAdmin->show_pelajaran();
						while ( $a = $data->fetch_object()) { ?>

					 <tr>
					 	<td colspan="" rowspan="" headers=""><?=$a->kd_matpel ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->nama_matpel ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->nip ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->hari ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->jam ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->kd_kelas ?></td>
					 	<td colspan="" rowspan="" headers="">
					 		<div class="btn btn-group" id="" style="">
						 		<button class="btn btn-info" id="edit" data-kode="<?=$a->kd_matpel ?>" data-nama="<?=$a->nama_matpel ?>" data-nip="<?=$a->nip ?>" data-hari="<?=$a->hari ?>" data-jam="<?=$a->jam ?>" data-kd_kelas="<?=$a->kd_kelas ?>">Edit</button>
						 		<button class="btn btn-danger" id="hapus" data-kode="<?=$a->kd_matpel ?>" >Hapus</button>
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
			<label for="code">KODE</label>
		    <input type="number" id="kode" class="form-control" placeholder="Kode Kelas" >
		</div>

		<div class="form-group col-xs-5 col-lg-6">
			<label for="code">NAMA</label>
		    <input type="text" id="nama" class="form-control" placeholder="Masukan Nama Pelajaran" >
		</div>

		    <div class="form-group col-xs-5 col-lg-6">
				<label for="code">NIP</label>
				<select class="form-control" id="nip">
					
				</select>
		    </div>

		    <div class="form-group col-xs-5 col-lg-4">
			<label for="code">HARI</label>
		    <select id="hari" class="form-control">
		    	<option value="senin">senin</option>
		    	<option value="selasa">selasa</option>
		    	<option value="rabu">rabu</option>
		    	<option value="kamis">kamis</option>
		    	<option value="jumat">jumat</option>
		    	<option value="sabtu">sabtu</option>
		    </select>
		</div>

		<div class="form-group col-xs-5 col-lg-4">
			<label for="code">JAM</label>
		    <input type="time" id="jam" class="form-control" placeholder="Masukan Jam" >
		</div>


		     <div class="form-group col-xs-5 col-lg-4">
				<label for="code">Kode Kelas</label>
				<select class="form-control" id="kode_kelas"> 
					
				</select>
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
	get_nip();
	get_kd_kelas();

	$('#tutup').click(function(){
		$('#modal_body').find(':input').val('');
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

		let kode  	 = $('#kode').val();
		let nama  	 = $('#nama').val();
		let nip 	 = $('#nip').val();
		let hari 	 = $('#hari').val();
		let jam  	 = $('#jam').val();
		let kd_kelas = $('#kode_kelas').val();
	
		if ($('#modal_body').find(':input').val() == '') {

			alert('isi field ');

		}else{

				$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'tambah_pelajaran', kode: kode, nama: nama, nip: nip, hari: hari, jam: jam, kd_kelas: kd_kelas },
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
		let kode   		= $(this).data('kode');
		let nama   		= $(this).data('nama');
		let nip  		= $(this).data('nip');
		let hari  		= $(this).data('hari');
		let jam  		= $(this).data('jam');
		let kd_kelas  	= $(this).data('kd_kelas');
	
		$('#myModal').modal('show');
		$('#modalTitle').text('Edit Data');

		$('#kode').val(kode);
		$('#kode').attr('readonly', true);
		$('#nama').val(nama);
		$('#nip').val(nip);
		$('#hari').val(hari);
		$('#jam').val(jam);
		$('#kode_kelas').val(kd_kelas);
	
		$('#simpan').hide();
		$('#update').show();

	}); // edit


	$('#update').click(function(){

		let kode  	 = $('#kode').val();
		let nama  	 = $('#nama').val();
		let nip 	 = $('#nip').val();
		let hari 	 = $('#hari').val();
		let jam  	 = $('#jam').val();
		let kd_kelas = $('#kode_kelas').val();
	
	
		$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'update_pelajaran', kode: kode, nama: nama, nip: nip, hari: hari, jam: jam, kd_kelas: kd_kelas },
					success: function(response){
						alert('Berhasil update data');
						$('#myModal').modal('hide');
						location.reload();
					}
			});

	}); // update

	$('#myTable #hapus').click(function(){

		if (!confirm('Hapus Data ? ')) return false;

		let kode = $(this).data('kode');

			$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'delete_pelajaran', kode: kode },
					success: function(response){
						alert('Berhasil hapus data');
						$('#myModal').modal('hide');
						location.reload();
					}
			});

	}); // hapus


	function get_nip()
	{
			$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'select_nip_kegiatan' },
					success: function(response){
						let option = '<option> Pilih NIP </option>';
						let i;

						for (i = 0; i < response.length; i++) {
							
							option += '<option value="'+ response[i] +'" >' + response[i] + '</option>';

						}

						$('#nip').html(option);
					}
			});
	}


	function get_kd_kelas()
	{
			$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'get_kd_kelas' },
					success: function(response){
						let option = '<option> KODE KELAS </option>';
						let i;

						for (i = 0; i < response.length; i++) {
							
							option += '<option value="'+ response[i] +'" >' + response[i] + '</option>';

						}

						$('#kode_kelas').html(option);
					}
			});
	}

}); // jquery


</script>