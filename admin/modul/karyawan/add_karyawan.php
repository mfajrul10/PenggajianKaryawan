<?php
// https://www.malasngoding.com
// menghubungkan dengan koneksi database
include "../config/koneksi.php";

// mengambil data barang dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(kode_karyawan) as kodeTerbesar FROM tb_karyawan");
$data = mysqli_fetch_array($query);
$kodeKaryawan = $data['kodeTerbesar'];

// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodeKaryawan, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "FLC";
$kodeKaryawan = $huruf . sprintf("%03s", $urutan);
?>
<?php
$level = "karyawan";
?>
<div class="container">

    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Karyawan</h6>
        </div>
        <div class="card-body">

            <div class="container">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Kode Karyawan :</label>
                        <input type="text" class="form-control" name="kode_karyawan" required="required" value="<?php echo $kodeKaryawan ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama :</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama_karyawan" required="required">
                    </div>
                    <div class="form-group">
                        <label>Bagian</label>
                        <select class="form-control" name="id_bagian">
                            <?php $c = mysqli_query($koneksi, "SELECT * FROM tb_bagian");
                            while ($dc = mysqli_fetch_array($c)) { ?>
                                <option value="<?= $dc['id_bagian'] ?>"><?= $dc['nama_bagian'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status Karyawan</label>
                        <select name="status_karyawan" class="form-control" required>
                            <option value="">-- Pilih Status Karyawan --</option>
                            <option value="tetap"> Tetap </option>
                            <option value="harian">Harian </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Foto :</label>
                        <input type="file" name="foto" required="required">
                        <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
                    </div>
                    <button name="saveKaryawan" type="submit" class="btn btn-success mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php

// cek nis
if (isset($_POST['saveKaryawan'])) {
    $id         = $_POST['id_karyawan'];
    $kode         = $_POST['kode_karyawan'];
    $nama         = $_POST['nama_karyawan'];
    $username    = $_POST['kode_karyawan'];
    $pass        = $_POST['kode_karyawan'];
    $status         = $_POST['status_karyawan'];
    $bagian        = $_POST['id_bagian'];
    $sumber       = @$_FILES['foto']['tmp_name'];
    $target       = '../assets/img/karyawan/';
    $nama_gambar  = @$_FILES['foto']['name'];
    $pindah       = move_uploaded_file($sumber, $target . $nama_gambar);
    $date         = date('Y-m-d');


    //query INSERT disini
    $nama = addslashes($_POST['nama_karyawan']);
    $save = mysqli_query($koneksi, "INSERT INTO tb_karyawan VALUES(NULL,'$kode','$nama', 
	          	'$bagian','$username','$pass','$status','$nama_gambar')");

    if ($save) {
        echo " <script>
	          alert('Data Berhasil disimpan !');
	          window.location='?page=karyawan';
	          </script>";
    }
}

?>