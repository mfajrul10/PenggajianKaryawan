<?php
//membuat format rupiah dengan PHP 
function rupiah($angka)
{
	$hasil_rupiah = "Rp. " . number_format($angka, 2, ',', '.');
	return $hasil_rupiah;
}
