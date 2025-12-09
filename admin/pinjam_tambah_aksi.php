<?php
include '../koneksi.php';

$kendaraan = $_POST['kendaraan'];
$user = $_POST['user'];
$pinjam = $_POST['pinjam'];
$kembali = $_POST['kembali'];
$status = $_POST['pinjam_status'];

mysqli_query($koneksi,"
    INSERT INTO pinjam VALUES ('','$kendaraan','$user','$pinjam','$kembali','$status')
");

header("location: pinjam.php");