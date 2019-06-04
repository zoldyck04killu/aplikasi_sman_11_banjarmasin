<div class="container" id="" style="">

<div class="row mt-4" id="" style="">

	<div class="col-md-12" id="" style="">

			<h4 class="text-center">Data Nilai</h4> <hr>

			<button type="button" id="tambah" class="btn btn-primary">
			  Tambah
			</button>

			<div class="table-responsive" >
			<table class="table table-md table-hover table-striped mt-4" id="myTable">
				<thead class="thead-dark">
					<tr>
						<th colspan="" rowspan="" headers="" scope="">NIS</th>
						<th colspan="" rowspan="" headers="" scope="">Nama</th>
						<th colspan="" rowspan="" headers="" scope="">Mata Pelajaran</th>
						<th colspan="" rowspan="" headers="" scope="">Semester</th>
						<th colspan="" rowspan="" headers="" scope="">Kelas</th>
						<th colspan="" rowspan="" headers="" scope="">Tugas </th>
						<th colspan="" rowspan="" headers="" scope="">UTS </th>
						<th colspan="" rowspan="" headers="" scope="">UAS </th>
						<th colspan="" rowspan="" headers="" scope="">Rata-Rata </th>
						<th colspan="" rowspan="" headers="" scope="">Nilai </th>

						<th colspan="" rowspan="" headers="" scope="">Pilihan</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$data = $objAdmin->show_nilai();
						while ( $a = $data->fetch_object()) { ?>

					 <tr>
					 	<td colspan="" rowspan="" headers=""><?=$a->nis_siswa ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->nama_leng ?></td>
					 	<td colspan="" rowspan="" headers=""><?= $a->matpel ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->semester ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->kelas ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->tugas ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->uts ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->uas ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->rata ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->nilai ?></td>

					 	<td colspan="" rowspan="" headers="">
					 		<div class="btn btn-group" id="" style="">
						 		<button class="btn btn-info" id="edit"
									data-kd_nilai="<?=$a->kd_nilai ?>"
									data-nis="<?=$a->nis_siswa ?>"
									data-nama="<?=$a->nama_leng ?>"
									data-matpel="<?=$a->matpel ?>"
									data-semester="<?=$a->semester ?>"
									data-kelas="<?=$a->kelas ?>"
									data-tugas="<?=$a->tugas ?>"
									data-uts="<?=$a->uts ?>"
									data-uas="<?=$a->uas ?>"
									data-rata="<?=$a->rata ?>"
									data-nilai="<?=$a->nilai ?>"
								>
									Edit
								</button>
						 		<button class="btn btn-danger" id="hapus" data-kd_nilai="<?=$a->kd_nilai ?>" >Hapus</button>
					 		</div>
					 	</td>

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
			 <label for="code">Kode Nilai</label>
				 <input type="number" id="kd_nilai" class="form-control"  >
		 </div>

       <div class="form-group col-xs-5 col-lg-4">
			<label for="code">NIS</label>
		    <input type="number" id="nis" class="form-control" placeholder="Masukan NIS" >
		</div>

		<div class="form-group col-xs-5 col-lg-6">
			<label for="code">NAMA</label>
		    <input type="text" id="nama" class="form-control" placeholder="Masukan Nama" >
		</div>

		   <div class="form-group col-xs-5 col-lg-6">
				<label for="code">MATA PELAJARAN</label>
				<input type="text" id="matpel" class="form-control input-normal" placeholder="Masukan Mata Pelajaran" >
		    </div>

		    <div class="form-group col-xs-5 col-lg-6">
				<label for="code">SEMESTER</label>
				<input type="text" id="semester" class="form-control input-normal" placeholder="Masukan Semester" >
			</div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">KELAS</label>
				<input type="text" id="kelas" class="form-control input-normal" placeholder="Masukan Kelas">
				</div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">TUGAS</label>
				<input type="text" id="tugas" class="form-control input-normal" placeholder="Masukan Tugas">
				</div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">UTS</label>
				<input type="text" id="uts" class="form-control inpunist-normal" placeholder="Masukan uts">
				</div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">UAS</label>
				<input type="text" id="uas" class="form-control input-normal" placeholder="Masukan uas">
				</div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">RATA-RATA</label>
				<input type="text" id="rata" class="form-control input-normal" placeholder="Masukan rata-rata">
				</div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">NILAI</label>
				<input type="text" id="nilai" class="form-control input-normal" placeholder="Masukan nilai">
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
		let matpel    = $('#matpel').val();
		let semester = $('#semester').val();
		let kelas   = $('#kelas').val();
		let tugas   = $('#tugas').val();
		let uts   = $('#uts').val();
		let uas   = $('#uas').val();
		let rata   = $('#rata').val();
		let nilai   = $('#nilai').val();


		if ($('#modal_body').find(':input').val() == '') {

			alert('isi field ');

		}else{

				$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'tambah_nilai', nis: nis, nama: nama, matpel: matpel, semester: semester, kelas: kelas, tugas: tugas, uts: uts, uas: uas, rata: rata, nilai: nilai  },
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
		let kd_nilai   = $(this).data('kd_nilai');
		let nis   = $(this).data('nis');
		let nama  = $(this).data('nama');
		let matpel    = $(this).data('matpel')
		let semester = $(this).data('semester')
		let kelas   = $(this).data('kelas')
		let tugas   = $(this).data('tugas')
		let uts   = $(this).data('uts')
		let uas   = $(this).data('uas')
		let rata   = $(this).data('rata')
		let nilai   = $(this).data('nilai')


		$('#myModal').modal('show');
		$('#modalTitle').text('Edit Data');

		$('#kd_nilai').val(kd_nilai);
		$('#nis').val(nis);
		// $('#nis').attr('readonly', true);
		$('#nama').val(nama);
		$('#matpel').val(matpel);
		$('#semester').val(semester);
		$('#kelas').val(kelas);
		$('#tugas').val(tugas);
		$('#uts').val(uts);
		$('#uas').val(uas);
		$('#rata').val(rata);
		$('#nilai').val(nilai);

		$('#simpan').hide();
		$('#update').show();

	}); // edit


	$('#update').click(function(){
		// let kd_nilai   = $(this).data('kd_nilai');
		let kd_nilai   = $('#kd_nilai').val();
		let nis   = $('#nis').val();
		let nama  = $('#nama').val();
		let matpel  = $('#matpel').val();
		let semester  = $('#semester').val();
		let kelas  = $('#kelas').val();
		let tugas  = $('#tugas').val();
		let uts  = $('#uts').val();
		let uas  = $('#uas').val();
		let rata  = $('#rata').val();
		let nilai  = $('#nilai').val();

		$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'update_nilai', kd_nilai: kd_nilai, nis: nis, nama: nama, matpel: matpel, semester: semester, kelas: kelas, tugas: tugas, uts: uts, uas: uas, rata: rata, nilai: nilai},
					success: function(response){
						alert('Berhasil update data');
						$('#myModal').modal('hide');
						location.reload();
					}
			});

	}); // update

	$('#myTable #hapus').click(function(){

		if (!confirm('Hapus Data ? ')) return false;

		let kd_nilai = $(this).data('kd_nilai');

			$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'delete_nilai', kd_nilai: kd_nilai },
					success: function(response){
						alert('Berhasil hapus data');
						$('#myModal').modal('hide');
						location.reload();
					}
			});

	}); // hapus

}); // jquery


</script>
