<?php
$tgl = date('d-m-Y');
?>
<?php
$jam = date("h:i:sa");
?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <h6 class="m-0 font-weight-bold text-primary">Silahkan Masukkan Keterangan Anda</h6>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Kode Karyawan</label>
                        <input type="hidden" class="form-control" name="id_karyawan" value="<?= $data['id_karyawan']; ?>" readonly>
                        <input type="text" class="form-control" name="kode_karyawan" value="<?= $data['kode_karyawan']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input type="text" class="form-control" name="nama_karyawan" value="<?= $data['nama_karyawan']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <select name="status_absensi" class="form-control" required>
                            <option value="">-- Pilih Keterangan --</option>
                            <option value="sakit"> Sakit </option>
                            <option value="izin"> Izin </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alasan</label>
                        <textarea name="keterangan" class="form-control" rows="5" cols="40">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Bukti Izin/Sakit</label>
                        <input type="file" name="foto" required="required">
                        <p style="color: red">Silahkan masukkan bukti izin/sakit dengan ekstensi .png | .jpg | .jpeg</p>
                    </div>
                    <button name="saveIzin" type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php

// cek nis
if (isset($_POST['saveIzin'])) {
    $id             = $_POST['id_karyawan'];
    $date           = date('Y-m-d');
    $jam            = $jam;
    $ket            = $_POST['keterangan'];
    $status         = $_POST['status_absensi'];
    $valid         = 'N';
    $sumber         = @$_FILES['foto']['tmp_name'];
    $target         = '../assets/img/bukti/';
    $nama_gambar    = @$_FILES['foto']['name'];
    $pindah         = move_uploaded_file($sumber, $target . $nama_gambar);



    $save = mysqli_query($koneksi, "INSERT INTO tb_absenkaryawan VALUES(NULL,'$id','$date', '$jam','$jam','$ket','$status','$valid','$nama_gambar')");

    if ($save) {
        echo " <script>
	          alert('Data Berhasil disimpan !');
	          window.location='?page=absen';
	          </script>";
    }
}

?>