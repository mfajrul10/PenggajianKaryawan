<?php
// menangkap data id yang di kirim dari url
$id = $_GET['id_gaji'];

// menghapus data dari database
mysqli_query($koneksi, "DELETE FROM tb_gaji WHERE id_gaji='$id'");

// mengalihkan halaman kembali ke index.php
echo " <script>
      alert('Data Berhasil Dihapus !');
      window.location='?page=gaji';
      </script>";
