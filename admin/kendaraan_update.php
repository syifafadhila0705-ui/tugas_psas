<?php
include '../koneksi.php';

$nomor=$_POST['nomor'];
$nama=$_POST['nama'];
$tipe=$_POST['tipe'];
$harga=$_POST['harga'];

mysqli_query($koneksi,"UPDATE kendaraan SET 
    kendaraan_nama='$nama',
    kendaraan_tipe='$tipe',
    kendaraan_harga_perhari='$harga'
    WHERE kendaraan_nomor='$nomor'
");

header("location: kendaraan.php");