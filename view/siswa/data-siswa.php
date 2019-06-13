<div class="container" id="" style="">

<div class="row mt-4" id="" style="">

	<div class="col-md-12" id="" style="">

			<h4 class="text-center">Data Siswa</h4> <hr>

			<?php if (@$_SESSION['kewenangan'] == 'admin') { ?>
			<button type="button" id="tambah" class="btn btn-primary">
			  Tambah
			</button>
			<?php } ?>
			<div class="table-responsive" >
			<table class="table table-md table-hover table-striped mt-4" id="myTable">
				<thead class="thead-dark">
					<tr>
						<th colspan="" rowspan="" headers="" scope="">NIS</th>
						<th colspan="" rowspan="" headers="" scope="">Nama</th>
						<th colspan="" rowspan="" headers="" scope="">Jenis Kelamin</th>
						<th colspan="" rowspan="" headers="" scope="">Tempat Lahir</th>
						<th colspan="" rowspan="" headers="" scope="">Tgl Lahir</th>
						<th colspan="" rowspan="" headers="" scope="">Agama </th>
						<th colspan="" rowspan="" headers="" scope="">Alamat </th>
						<th colspan="" rowspan="" headers="" scope="">Telp Rumah </th>
						<th colspan="" rowspan="" headers="" scope="">Asal Sekolah </th>
						<th colspan="" rowspan="" headers="" scope="">Tahun Lulus </th>
						<th colspan="" rowspan="" headers="" scope="">Nama Bapak </th>
						<th colspan="" rowspan="" headers="" scope="">Kerja Bapak </th>
						<th colspan="" rowspan="" headers="" scope="">Nama Ibu </th>
						<th colspan="" rowspan="" headers="" scope="">Kerja Ibu </th>
						<th colspan="" rowspan="" headers="" scope="">Kelas </th>

						<?php if (@$_SESSION['kewenangan'] == 'admin') { ?>
						<th colspan="" rowspan="" headers="" scope="">Pilihan</th>
						<?php }  ?>
					</tr>
				</thead>
				<tbody>
					<?php
						$kelas = $_GET['kelas'];
						$data = $objAdmin->show_siswa($kelas);
						while ( $a = $data->fetch_object()) { ?>

					 <tr>
					 	<td colspan="" rowspan="" headers=""><?=$a->nis_siswa ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->nama_siswa ?></td>
					 	<td colspan="" rowspan="" headers=""><?php echo $a->jk_siswa == 'l' ? 'Laki-Laki' : 'Perempuan' ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->tempat_lahir ?></td>
					 	<td colspan="" rowspan="" headers=""><?=$a->tgl_lahir ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->agama ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->alamat ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->telp_rmh ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->asal_sekolah ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->thn_lulus ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->nama_bpk ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->kerja_bpk ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->nama_ibu ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->kerja_ibu ?></td>
						<td colspan="" rowspan="" headers=""><?=$a->status ?></td>

						<?php if (@$_SESSION['kewenangan'] == 'admin') { ?>
					 	<td colspan="" rowspan="" headers="">
					 		<div class="btn btn-group" id="" style="">
						 		<button class="btn btn-info" id="edit"
									data-nis="<?=$a->nis_siswa ?>"
									data-nama="<?=$a->nama_siswa ?>"
									data-jk="<?=$a->jk_siswa ?>"
									data-lahir="<?=$a->tempat_lahir ?>"
									data-tgl="<?=$a->tgl_lahir ?>"
									data-agama="<?=$a->agama ?>"
									data-alamat="<?=$a->alamat ?>"
									data-telp_rmh="<?=$a->telp_rmh ?>"
									data-asal_sekolah="<?=$a->asal_sekolah ?>"
									data-thn_lulus="<?=$a->thn_lulus ?>"
									data-nama_bpk="<?=$a->nama_bpk ?>"
									data-kerja_bpk="<?=$a->kerja_bpk ?>"
									data-nama_ibu="<?=$a->nama_ibu ?>"
									data-kerja_ibu="<?=$a->kerja_ibu ?>"
								>
									Edit
								</button>
						 		<button class="btn btn-danger" id="hapus" data-nis="<?=$a->nis_siswa ?>" >Hapus</button>
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
				<input type="date" id="tgl" class="form-control input-normal"  >
			</div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">Agama</label>
				<input type="text" id="agama" class="form-control input-normal" placeholder="Masukan Agama">
				</div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">Alamat</label>
				<input type="text" id="alamat" class="form-control input-normal" placeholder="Masukan Alamat">
				</div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">Telp Rumah</label>
				<input type="text" id="telp_rmh" class="form-control input-normal" placeholder="Masukan Telp Rumah">
				</div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">Asal Sekolah</label>
				<input type="text" id="asal_sekolah" class="form-control input-normal" placeholder="Masukan Asal Sekolah" >
				</div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">Tahun Lulus</label>
				<input type="text" id="thn_lulus" class="form-control input-normal" placeholder="Masukan Tahun Lulus">
				</div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">Nama Bapak</label>
				<input type="text" id="nama_bpk" class="form-control input-normal" placeholder="Masukan Nama Bapak">
				</div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">Pekerjaan Bapak</label>
				<input type="text" id="kerja_bpk" class="form-control input-normal" placeholder="Masukan Pekerjaan Bapak">
				</div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">Nama Ibu</label>
				<input type="text" id="nama_ibu" class="form-control input-normal" placeholder="Masukan Nama Ibu">
				</div>

				<div class="form-group col-xs-5 col-lg-6">
				<label for="code">Pekerjaan Ibu</label>
				<input type="text" id="kerja_ibu" class="form-control input-normal" placeholder="Masukan Pekerjaan Ibu">
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
		let agama   = $('#agama').val();
		let alamat   = $('#alamat').val();
		let telp_rmh   = $('#telp_rmh').val();
		let asal_sekolah   = $('#asal_sekolah').val();
		let thn_lulus   = $('#thn_lulus').val();
		let nama_bpk   = $('#nama_bpk').val();
		let kerja_bpk   = $('#kerja_bpk').val();
		let nama_ibu   = $('#nama_ibu').val();
		let kerja_ibu   = $('#kerja_ibu').val();


		if ($('#modal_body').find(':input').val() == '') {

			alert('isi field ');

		}else{

				$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'tambah_siswa', nis: nis, nama: nama, jk: jk, lahir: lahir, tgl: tgl, agama: agama, alamat: alamat, telp_rmh: telp_rmh, asal_sekolah: asal_sekolah, thn_lulus: thn_lulus, nama_bpk: nama_bpk, kerja_bpk: kerja_bpk, nama_ibu: nama_ibu, kerja_ibu: kerja_ibu },
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
		let agama   =  $(this).data('agama');
		let alamat   =  $(this).data('alamat');
		let telp_rmh   = $(this).data('telp_rmh');
		let asal_sekolah   =  $(this).data('asal_sekolah');
		let thn_lulus   =  $(this).data('thn_lulus');
		let nama_bpk   =  $(this).data('nama_bpk');
		let kerja_bpk   =  $(this).data('kerja_bpk');
		let nama_ibu   =  $(this).data('nama_ibu');
		let kerja_ibu   =  $(this).data('kerja_ibu');


		$('#myModal').modal('show');
		$('#modalTitle').text('Edit Data');

		$('#nis').val(nis);
		$('#nis').attr('readonly', true);
		$('#nama').val(nama);
		$('#jk').val(jk);
		$('#lahir').val(lahir);
		$('#tgl').val(tgl);
		$('#agama').val(agama);
		$('#alamat').val(alamat);
		$('#telp_rmh').val(telp_rmh);
	 	$('#asal_sekolah').val(asal_sekolah);
	 	$('#thn_lulus').val(thn_lulus);
		$('#nama_bpk').val(nama_bpk);
		$('#kerja_bpk').val(kerja_bpk);
		$('#nama_ibu').val(nama_ibu);
		$('#kerja_ibu').val(kerja_ibu);

		$('#simpan').hide();
		$('#update').show();

	}); // edit


	$('#update').click(function(){

		let nis   = $('#nis').val();
		let nama  = $('#nama').val();
		let jk    = $('#jk').val();
		let lahir = $('#lahir').val();
		let tgl   = $('#tgl').val();
		let agama   = $('#agama').val();
		let alamat   = $('#alamat').val();
		let telp_rmh   = $('#telp_rmh').val();
		let asal_sekolah   = $('#asal_sekolah').val();
		let thn_lulus   = $('#thn_lulus').val();
		let nama_bpk   = $('#nama_bpk').val();
		let kerja_bpk   = $('#kerja_bpk').val();
		let nama_ibu   = $('#nama_ibu').val();
		let kerja_ibu   = $('#kerja_ibu').val();

		$.ajax({
				url: 'http://localhost/aplikasi_sman_11_banjarmasin/models/ajax.php',
				dataType: 'JSON',
				type: 'POST',
				data: { type: 'update_siswa', nis: nis, nama: nama, jk: jk, lahir: lahir, tgl: tgl, agama: agama, alamat: alamat, telp_rmh: telp_rmh, asal_sekolah: asal_sekolah, thn_lulus: thn_lulus, nama_bpk: nama_bpk, kerja_bpk: kerja_bpk, nama_ibu: nama_ibu, kerja_ibu: kerja_ibu  },
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
