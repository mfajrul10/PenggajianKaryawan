<?php
// menangkap data id yang di kirim dari url
$id = $_GET['id_tunjangankaryawan'];

// menghapus data dari database
mysqli_query($koneksi, "DELETE FROM tb_tunjangankaryawan WHERE id_tunjangankaryawan='$id'");

// mengalihkan halaman kembali ke index.php
echo " <script>
      alert('Data Berhasil Dihapus !');
      window.location='?page=tunjangankaryawan';
      </script>";
