<div class="container" id="" style="">

<div class="row mt-4" id="" style="">

	<div class="col-md-12" id="" style="">
	
			<h4 class="text-center">Data Guru</h4> <hr>

			<button type="button" id="tambah" class="btn btn-primary">
			  Tambah
			</button>
			
			<table class="table table-md table-hover table-striped mt-4" id="myTable">
				<thead class="thead-dark">
					<tr>
						<th colspan="" rowspan="" headers="" scope="">NIP</th>
						<th colspan="" rowspan="" headers="" scope="">Nama</th>
						<th colspan="" rowspan="" headers="" scope="">Jenis Kelamin</th>
						<th colspan="" rowspan="" headers="" scope="">No Tlp</th>
						<th colspan="" rowspan="" headers="" scope="">Email</th>
						<th colspan="" rowspan="" headers="" scope="">Alamat</th>
						<th colspan="" rowspan="" headers="" scope="">Jabatan</th>
						<th colspan="" rowspan="" headers="" scope="">Pilihan</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$data = $objAdmin->show_guru();
						while ( $a = $data->fetch_object()) { ?>

					 <tr>
					 	<td colspan="" rowspan="" headers=""><?=$a->nip ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->nama_guru ?></td>
					 	<td colspan="" rowspan="" headers=""><?php echo $a->jk_guru == 'l' ? 'Laki-Laki' : 'Perempuan' ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->no_telp ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->email ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->alamat ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->jabatan ?></td>
					 	<td colspan="" rowspan="" headers="">
					 		<div class="btn btn-group" id="" style="">
						 		<button class="btn btn-info" id="edit" data-nip="<?=$a->nip ?>" data-nama="<?=$a->nama_guru ?>" data-jk="<?=$a->jk_guru ?>" data-telp="<?=$a->no_telp ?>" data-email="<?=$a->email ?>" data-alamat="<?=$a->alamat ?>" data-jabatan="<?=$a->jabatan ?>">Edit</button>
						 		<button class="btn btn-danger" id="hapus" data-nip="<?=$a->nip ?>" >Hapus</button>
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
			<label for="code">NIP</label>
		    <input type="number" id="nip" class="form-control" placeholder="Masukan NIP" >
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
				<label for="code">NO TELPON</label>
				<input type="number" id="telp" class="form-control input-normal" placeholder="Masukan No Telpon" >
		    </div>

		     <div class="form-group col-xs-5 col-lg-6">
				<label for="code">EMAIL</label>
				<input type="email" id="email" class="form-control input-normal" placeholder="Masukan Email" >
		    </div>

		     <div class="form-group col-xs-5 col-lg-6">
				<label for="code">ALAMAT</label>
				<input type="text" id="alamat" class="form-control input-normal" placeholder="Masukan Alamat" >
		    </div>

		     <div class="form-group col-xs-5 col-lg-6">
				<label for="code">JABATAN</label>
				<input type="text" id="jabatan" class="form-control input-normal" placeholder="Masukan Jabatan" >
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
		$('#nip').attr('readonly', false);
	}); // tambah

	$('#simpan').click(function(){

		let nip   	= $('#nip').val();
		let nama  	= $('#nama').val();
		let jk    	= $('#jk').val();
		let telp 	= $('#telp').val();
		let email   = $('#email').val();
		let alamat 	= $('#alamat').val();
		let jabatan = $('#jabatan').val();

		if ($('#modal_body').find(':input').val() == '') {

			alert('isi field ');

		}else{

				$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'tambah_guru', nip: nip, nama: nama, jk: jk, telp: telp, email: email, alamat: alamat, jabatan: jabatan },
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
		let nip   	= $(this).data('nip');
		let nama  	= $(this).data('nama');
		let jk    	= $(this).data('jk');
		let telp 	= $(this).data('telp');
		let email   = $(this).data('email');
		let alamat 	= $(this).data('alamat');
		let jabatan = $(this).data('jabatan');

		$('#myModal').modal('show');
		$('#modalTitle').text('Edit Data');

		$('#nip').val(nip);
		$('#nip').attr('readonly', true);
		$('#nama').val(nama);
		$('#jk').val(jk);
		$('#telp').val(telp);
		$('#email').val(email);
		$('#alamat').val(alamat);
		$('#jabatan').val(jabatan);

		$('#simpan').hide();
		$('#update').show();

	}); // edit


	$('#update').click(function(){

		let nip   	= $('#nip').val();
		let nama  	= $('#nama').val();
		let jk    	= $('#jk').val();
		let telp 	= $('#telp').val();
		let email   = $('#email').val();
		let alamat 	= $('#alamat').val();
		let jabatan = $('#jabatan').val();

		$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'update_guru', nip: nip, nama: nama, jk: jk, telp: telp, email: email, alamat: alamat, jabatan: jabatan },
					success: function(response){
						alert('Berhasil update data');
						$('#myModal').modal('hide');
						location.reload();
					}
			});

	}); // update

	$('#myTable #hapus').click(function(){

		if (!confirm('Hapus Data ? ')) return false;

		let nip = $(this).data('nip');

			$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'delete_guru', nip: nip },
					success: function(response){
						alert('Berhasil hapus data');
						$('#myModal').modal('hide');
						location.reload();
					}
			});

	}); // hapus

}); // jquery


</script>