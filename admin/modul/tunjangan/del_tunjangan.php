<?php
// menangkap data id yang di kirim dari url
$id = $_GET['id_tunjangan'];

// menghapus data dari database
mysqli_query($koneksi, "DELETE FROM tb_tunjangan WHERE id_tunjangan='$id'");

// mengalihkan halaman kembali ke index.php
echo " <script>
      alert('Data Berhasil Dihapus !');
      window.location='?page=tunjangan';
      </script>";
