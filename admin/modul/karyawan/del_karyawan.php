<?php

// menangkap data id yang di kirim dari url
$id = $_GET['id_karyawan'];

// menghapus data dari database
mysqli_query($koneksi, "DELETE FROM tb_karyawan WHERE id_karyawan='$id'");

// mengalihkan halaman kembali ke index.php
echo " <script>
      alert('Data Berhasil Dihapus !');
      window.location='?page=karyawan';
      </script>";
