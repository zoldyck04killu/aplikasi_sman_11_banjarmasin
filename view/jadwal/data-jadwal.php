<div class="container" id="" style="">

<div class="row mt-4" id="" style="">

	<div class="col-md-12" id="" style="">

			<h4 class="text-center">Data Jadwal</h4> <hr>
			<?php if (@$_SESSION['kewenangan'] == 'admin') { ?>
			<button type="button" id="tambah" class="btn btn-primary">
			  Tambah
			</button>
			<?php } ?>

			<table class="table table-md table-hover table-striped mt-4" id="myTable">
				<thead class="thead-dark">
					<tr>
						<th colspan="" rowspan="" headers="" scope="">KODE</th>
						<th colspan="" rowspan="" headers="" scope="">Hari</th>
						<th colspan="" rowspan="" headers="" scope="">Jam</th>
						<th colspan="" rowspan="" headers="" scope="">Waktu</th>
						<th colspan="" rowspan="" headers="" scope="">Kelas</th>
						<th colspan="" rowspan="" headers="" scope="">Matel</th>
						<th colspan="" rowspan="" headers="" scope="">Nama Guru</th>
						<?php if (@$_SESSION['kewenangan'] == 'admin') { ?>
						<th colspan="" rowspan="" headers="" scope="">Pilihan</th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php
						$data = $objAdmin->show_jadwal();
						while ( $a = $data->fetch_object()) { ?>

					 <tr>
					 	<td colspan="" rowspan="" headers=""><?=$a->kd_jadwal ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->hari_j ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->jam_j ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->waktu ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->kelas ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->matpel ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->nama_guru ?></td>
						<?php if (@$_SESSION['kewenangan'] == 'admin') { ?>
					 	<td colspan="" rowspan="" headers="">
					 		<div class="btn btn-group" id="" style="">
						 		<button class="btn btn-info" id="edit"
										data-kode="<?=$a->kd_jadwal ?>"
										data-hari="<?=$a->hari_j ?>"
										data-jam="<?=$a->jam_j ?>"
										data-waktu="<?=$a->waktu ?>"
										data-kelas="<?=$a->kelas ?>"
										data-matpel="<?=$a->matpel ?>"
										data-guru="<?=$a->nama_guru ?>"

								>
									Edit
								</button>
						 		<button class="btn btn-danger" id="hapus" data-kode="<?=$a->kd_jadwal ?>" >Hapus</button>
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
			<label for="code">KODE</label>
		    <input type="number" id="kode" class="form-control" placeholder="Kode Jadwal" >
		</div>

		<div class="form-group col-xs-5 col-lg-6">
			<label for="code">HARI</label>
		    <input type="text" id="hari" class="form-control" placeholder="Hari" >
		</div>

		   <div class="form-group col-xs-5 col-lg-4">
				<label for="code">JAM</label>
				<input type="text" id="jam" class="form-control input-normal" placeholder="Jam" >
		    </div>

		     <div class="form-group col-xs-5 col-lg-4">
				<label for="code">WAKTU</label>
				<input type="time" id="waktu" class="form-control input-normal" placeholder="Waktu"  value="00:00:00" >
		    </div>

				<div class="form-group col-xs-5 col-lg-4">
			 <label for="code">KELAS</label>
			 <input type="text" id="kelas" class="form-control input-normal" placeholder="Kelas" >
			 </div>

			 <div class="form-group col-xs-5 col-lg-4">
			<label for="code">MATA PELAJARAN</label>
			<input type="text" id="matpel" class="form-control input-normal" placeholder="Mata Pelajaran" >
			</div>

			<div class="form-group col-xs-5 col-lg-4">
		 <label for="code">GURU</label>
		 <input type="text" id="nama_guru" class="form-control input-normal" placeholder="Guru" >
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
		$('#kode').attr('readonly', false);
	}); // tambah

	$('#simpan').click(function(){

		let kode  = $('#kode').val();
		let hari  = $('#hari').val();
		let jam = $('#jam').val();
		let waktu = $('#waktu').val();
		let kelas = $('#kelas').val();
		let matpel = $('#matpel').val();
		let nama_guru = $('#nama_guru').val();

		if ($('#modal_body').find(':input').val() == '') {

			alert('isi field ');

		}else{

				$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'tambah_jadwal', kode: kode, hari: hari, jam: jam, waktu: waktu, kelas: kelas, matpel: matpel, nama_guru: nama_guru },
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

		let kode  = $(this).data('kode');
		let hari  = $(this).data('hari');
		let jam = $(this).data('jam');
		let waktu = $(this).data('waktu');
		let kelas = $(this).data('kelas');
		let matpel = $(this).data('matpel');
		let nama_guru = $(this).data('guru');

		$('#myModal').modal('show');
		$('#modalTitle').text('Edit Data');

		$('#kode').val(kode);
		$('#hari').val(hari);
		$('#jam').val(jam);
		$('#waktu').val(waktu);
		$('#kelas').val(kelas);
		$('#matpel').val(matpel);
		$('#nama_guru').val(nama_guru);

		$('#simpan').hide();
		$('#update').show();

	}); // edit


	$('#update').click(function(){

		let kode  = $('#kode').val();
		let hari  = $('#hari').val();
		let jam = $('#jam').val();
		let waktu = $('#waktu').val();
		let kelas = $('#kelas').val();
		let matpel = $('#matpel').val();
		let nama_guru = $('#nama_guru').val();

		$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'update_jadwal', kode: kode, hari: hari, jam: jam, waktu: waktu, kelas: kelas, matpel: matpel, nama_guru: nama_guru },
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
				data: { type: 'delete_jadwal', kode: kode },
					success: function(response){
						alert('Berhasil hapus data');
						$('#myModal').modal('hide');
						location.reload();
					}
			});

	}); // hapus

}); // jquery


</script>
