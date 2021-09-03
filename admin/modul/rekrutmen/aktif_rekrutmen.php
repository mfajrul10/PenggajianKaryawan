<?php

// menangkap data id yang di kirim dari url
$id = $_GET['id_rekrutmen'];

// menghapus data dari database
mysqli_query($koneksi, "UPDATE tb_rekrutmen SET aktif='Y' WHERE id_rekrutmen='$id'");

// mengalihkan halaman kembali ke index.php
echo " <script>
      alert('Rekrutmen Telah Aktif!');
      window.location='?page=rekrutmen';
      </script>";
