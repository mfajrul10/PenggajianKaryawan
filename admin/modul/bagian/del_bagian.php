<?php
// menangkap data id yang di kirim dari url
$id = $_GET['id_bagian'];

// menghapus data dari database
mysqli_query($koneksi, "DELETE FROM tb_bagian WHERE id_bagian='$id'");

// mengalihkan halaman kembali ke index.php
echo " <script>
      alert('Data Berhasil Dihapus !');
      window.location='?page=bagian';
      </script>";
