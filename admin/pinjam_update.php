<?php
include '../koneksi.php';

$id=$_POST['id'];
$user=$_POST['user'];
$kendaraan=$_POST['kendaraan'];
$pinjam=$_POST['pinjam'];
$kembali=$_POST['kembali'];
$status=$_POST['pinjam_status'];

mysqli_query($koneksi,"
    UPDATE pinjam SET 
    kendaraan_nomor='$kendaraan',
    user_id='$user',
    tgl_pinjam='$pinjam',
    tgl_kembali='$kembali',
    pinjam_status='$status'
    WHERE pinjam_id='$id'
");

header("location: pinjam.php");