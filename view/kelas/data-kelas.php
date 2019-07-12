<div class="container" id="" style="">

<div class="row mt-4" id="" style="">

	<div class="col-md-12" id="" style="">
	
			<h4 class="text-center">Data Kelas</h4> <hr>

			<button type="button" id="tambah" class="btn btn-primary">
			  Tambah
			</button>
			
			<table class="table table-md table-hover table-striped mt-4" id="myTable">
				<thead class="thead-dark">
					<tr>
						<th colspan="" rowspan="" headers="" scope="">KODE</th>
						<th colspan="" rowspan="" headers="" scope="">Nama</th>
						<th colspan="" rowspan="" headers="" scope="">Tahun Ajaran</th>
						<th colspan="" rowspan="" headers="" scope="">Jumlah Siswa</th>
						<th colspan="" rowspan="" headers="" scope="">Pilihan</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$data = $objAdmin->show_kelas();
						while ( $a = $data->fetch_object()) { ?>

					 <tr>
					 	<td colspan="" rowspan="" headers=""><?=$a->kd_kelas ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->nama_kelas ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->thn_ajaran ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->jml_siswa ?></td>
					 	<td colspan="" rowspan="" headers="">
					 		<div class="btn btn-group" id="" style="">
						 		<button class="btn btn-info" id="edit" data-kode="<?=$a->kd_kelas ?>" data-nama="<?=$a->nama_kelas ?>" data-tahun="<?=$a->thn_ajaran ?>" data-siswa="<?=$a->jml_siswa ?>">Edit</button>
						 		<button class="btn btn-danger" id="hapus" data-kode="<?=$a->kd_kelas ?>" >Hapus</button>
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
			<label for="code">NAMA KELAS</label>
		    <input type="text" id="nama" class="form-control" placeholder="Masukan Nama Kelas" >
		</div>

		   <div class="form-group col-xs-5 col-lg-4">
				<label for="code">TAHUN AJARAN</label>
				<input type="text" id="tahun" class="form-control input-normal" placeholder="Tahun ajaran" >
		    </div>

		     <div class="form-group col-xs-5 col-lg-4">
				<label for="code">JUMLAH SISWA</label>
				<input type="number" id="siswa" class="form-control input-normal" placeholder="Jumlah Siswa" >
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
		let nama  = $('#nama').val();
		let tahun = $('#tahun').val();
		let siswa = $('#siswa').val();
	
		if ($('#modal_body').find(':input').val() == '') {

			alert('isi field ');

		}else{

				$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'tambah_kelas', kode: kode, nama: nama, tahun: tahun, siswa: siswa },
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
		let kode   = $(this).data('kode');
		let nama   = $(this).data('nama');
		let tahun  = $(this).data('tahun');
		let siswa  = $(this).data('siswa');
		
		$('#myModal').modal('show');
		$('#modalTitle').text('Edit Data');

		$('#kode').val(kode);
		$('#kode').attr('readonly', true);
		$('#nama').val(nama);
		$('#tahun').val(tahun);
		$('#siswa').val(siswa);

		$('#simpan').hide();
		$('#update').show();

	}); // edit


	$('#update').click(function(){

		let kode  = $('#kode').val();
		let nama  = $('#nama').val();
		let tahun = $('#tahun').val();
		let siswa = $('#siswa').val();
	
		$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'update_kelas', kode: kode, nama: nama, tahun: tahun, siswa: siswa },
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
				data: { type: 'delete_kelas', kode: kode },
					success: function(response){
						alert('Berhasil hapus data');
						$('#myModal').modal('hide');
						location.reload();
					}
			});

	}); // hapus

}); // jquery


</script>