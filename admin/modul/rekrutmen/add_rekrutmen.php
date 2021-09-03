<div class="container">
	<div class="card shadow mb-4">
		<div class="card-header">
			<h6 class="m-0 font-weight-bold text-primary">Tambah Data Rekrutmen</h6>
		</div>
		<div class="card body">
			<div class="container">
				<form method="POST" action="">
					<div class="form-group">
						<label>Tanggal</label><br />
						<input type="date" name="tanggal" class="form-control" required="required">
					</div>
					<label for="id_bagian">Bagian</label>
					<select class="form-control" name="id_bagian">
						<?php $c = mysqli_query($koneksi, "SELECT * FROM tb_bagian");
						while ($dc = mysqli_fetch_array($c)) { ?>
							<option value="<?= $dc['id_bagian'] ?>"><?= $dc['nama_bagian'] ?></option>
						<?php } ?>
					</select>
					<div class="form-group">
						<label>Persyaratan</label><br />
						<textarea class="form-control" placeholder="Masukkan Persyaratan Rekrutmen" name="syarat" rows="3" required="required"></textarea>
					</div>
					<div class="form-group">
						<label>Waktu </label>
						<p>Lama pembukaan rekrutmen ?</p>
						<input type="number" name="waktu" class="form-control" placeholder='(1) Hari' maxlength="2" required style="width: 300px;">
					</div>
					<button name="saveRekrutmen" type="submit" class="btn btn-success mr-2">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>



<?php
if (isset($_POST['saveRekrutmen'])) {
	// menangkap data dari form
	$id 			= $_POST['id_rekrutmen'];
	$id_bagian 		= $_POST['id_bagian'];
	$tanggal 		= date("Y-m-d");
	$syarat 		= $_POST['syarat'];
	$posisi 		= $_POST['posisi'];
	$waktu 			= $_POST['waktu'];
	$aktif 			= 'N';
	$save = mysqli_query($koneksi, "INSERT INTO tb_rekrutmen VALUES (NULL, '$id_bagian', '$tanggal','$syarat', '$waktu', '$aktif')");

	if ($save) {
		echo " <script>
	          alert('Data Berhasil disimpan !');
	          window.location='?page=rekrutmen';
	          </script>";
	}
}

?>