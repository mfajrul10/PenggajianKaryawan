<?php
session_start();
unset($_SESSION['Admin']);
echo "<script>window.location='../index.php';</script>";
