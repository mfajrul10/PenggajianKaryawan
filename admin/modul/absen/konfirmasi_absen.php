<?php
// menangkap data id yang di kirim dari url
$id = $_GET['id'];

// menghapus data dari database
mysqli_query($koneksi, "UPDATE tb_absenkaryawan SET 
valid_absensi='Y' WHERE id_absensikaryawan='$id'");

// mengalihkan halaman kembali ke index.php
echo " <script>
      alert('Absensi Berhasil Divalidasi !');
      window.location='?page=absen';
      </script>";
