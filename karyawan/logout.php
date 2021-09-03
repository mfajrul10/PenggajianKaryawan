<?php
session_start();
unset($_SESSION['Karyawan']);
echo "<script>window.location='../index.php';</script>";
