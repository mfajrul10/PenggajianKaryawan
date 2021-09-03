<?php 
// menangkap data id yang di kirim dari url
$id = $_GET['id_rekrutmen'];

// menghapus data dari database
mysqli_query($koneksi,"DELETE FROM tb_rekrutmen WHERE id_rekrutmen='$id'");

// mengalihkan halaman kembali ke index.php
echo " <script>
      alert('Data Berhasil Dihapus !');
      window.location='?page=rekrutmen';
      </script>";
