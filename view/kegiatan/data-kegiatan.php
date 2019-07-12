<div class="container" id="" style="">

<div class="row mt-4" id="" style="">

	<div class="col-md-12" id="" style="">

			<h4 class="text-center">Data Kegiatan</h4> <hr>
			<?php if (@$_SESSION['kewenangan'] == 'admin') { ?>
			<button type="button" id="tambah" class="btn btn-primary">
			  Tambah
			</button>
			<?php } ?>
			<table class="table table-md table-hover table-striped mt-4" id="myTable">
				<thead class="thead-dark">
					<tr>
						<th colspan="" rowspan="" headers="" scope="">KODE</th>
						<th colspan="" rowspan="" headers="" scope="">Nama</th>
						<th colspan="" rowspan="" headers="" scope="">Hari</th>
						<th colspan="" rowspan="" headers="" scope="">Jam</th>
						<th colspan="" rowspan="" headers="" scope="">NIP</th>
						<?php if (@$_SESSION['kewenangan'] == 'admin') { ?>
						<th colspan="" rowspan="" headers="" scope="">Pilihan</th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php
						$data = $objAdmin->show_kegiatan();
						while ( $a = $data->fetch_object()) { ?>

					 <tr>
					 	<td colspan="" rowspan="" headers=""><?=$a->kd_kegiatan ?></td>
					 	<td colspan="" rowspan="" headers=""> <a href="?view=siswa-kegiatan&kd_keg=<?=$a->kd_kegiatan ?>"> <?=$a->nama_kegiatan ?> </a> </td>
					 	<td colspan="" rowspan="" headers=""><?=$a->hari_kegiatan ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->jam_kegiatan ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->nama_guru ?></td>
						<?php if (@$_SESSION['kewenangan'] == 'admin') { ?>
					 	<td colspan="" rowspan="" headers="">
					 		<div class="btn btn-group" id="" style="">
						 		<button class="btn btn-info" id="edit" data-kode="<?=$a->kd_kegiatan ?>" data-nama="<?=$a->nama_kegiatan ?>" data-hari="<?=$a->hari_kegiatan ?>" data-jam="<?=$a->jam_kegiatan ?>" data-tempat="<?=$a->tempat_kegiatan ?>" data-nip="<?=$a->nip ?>">Edit</button>
						 		<button class="btn btn-danger" id="hapus" data-kode="<?=$a->kd_kegiatan ?>" >Hapus</button>
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
			<label for="code">KODE KEGIATAN</label>
		    <input type="text" id="kode" class="form-control" placeholder="KODE" >
				<input type="hidden" id="kode_lama" class="form-control" placeholder="KODE" >

		</div>

		<div class="form-group col-xs-5 col-lg-6">
			<label for="code">NAMA KEGIATAN</label>
		    <input type="text" id="nama" class="form-control" placeholder="Masukan Nama kegiatan" >
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
		    <!-- <input type="time" id="jam" class="form-control" placeholder="Masukan Jam"  value="16:32:00" /> -->
				<input type="time" id="jam" value="16:32:00">
		</div>


		   <!-- <div class="form-group col-xs-5 col-lg-6">
				<label for="code">TEMPAT</label>
				<input type="text" id="tempat" class="form-control input-normal" placeholder="Masukan No Telpon" >
		    </div> -->

		     <div class="form-group col-xs-5 col-lg-6">
				<label for="code">NIP</label>
				<input type="text" id="nip" class="form-control" placeholder="Masukan Nip" >
				<!-- <select class="form-control" id="nip">

				</select> -->
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

	$('#tutup').click(function(){
		$('#modal_body').find(':input').val('');
		$('#myModal').modal('hide');
		$('#update').hide();
		$('#simpan').show();
	}); // tutup modal

	$('#tambah').click(function(){
		$('#myModal').modal('show');
		$('#modalTitle').text('Tambah Data');
		// $('#kode').attr('readonly', false);

	}); // tambah

	$('#simpan').click(function(){

		let kode   	= $('#kode').val();
		let nama  	= $('#nama').val();
		let hari    = $('#hari').val();
		let jam 	= $('#jam').val();
		// let tempat  = $('#tempat').val();
		let nip 	= $('#nip').val();
		// var x = document.getElementById("myTime").value;
		//   document.getElementById("demo").innerHTML = x;
		//
		// console.log(jam);
		// console.log(x);
		// console.log(nip);

		if ($('#modal_body').find(':input').val() == '') {

			alert('isi field ');

		}else{

				$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'tambah_kegiatan', kode: kode, nama: nama, hari: hari, jam: jam, nip: nip },
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

		let kode   	= $(this).data('kode');
		let kode_lama   	= $(this).data('kode');

		let nama  	= $(this).data('nama');
		let hari    = $(this).data('hari');
		let jam 	= $(this).data('jam');
		// let tempat  = $(this).data('tempat');
		let nip 	= $(this).data('nip');

		$('#myModal').modal('show');
		$('#modalTitle').text('Edit Data');

		$('#kode').val(kode);
		$('#kode_lama').val(kode_lama);

		// $('#kode').attr('readonly', true);
		$('#nama').val(nama);
		$('#hari').val(hari);
		$('#jam').val(jam);
		// $('#tempat').val(tempat);
		$('#nip').val(nip);

		$('#simpan').hide();
		$('#update').show();
		// console.log(kode_lama);

	}); // edit


	$('#update').click(function(){

		let kode   	= $('#kode').val();
		let kode_lama   	= $('#kode_lama').val();

		let nama  	= $('#nama').val();
		let hari    = $('#hari').val();
		let jam 	= $('#jam').val();
		// let tempat  = $('#tempat').val();
		let nip 	= $('#nip').val();

		$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'update_kegiatan', kode: kode, kode_lama:kode_lama, nama: nama, hari: hari, jam: jam, nip: nip },
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
				data: { type: 'delete_kegiatan', kode: kode },
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

}); // jquery


</script>
