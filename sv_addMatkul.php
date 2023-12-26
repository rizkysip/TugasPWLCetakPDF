<?php
require "fungsi.php";

$kode = $_POST['kode'];
$idmatkul = $_POST['idmatkul'];
$fixMatkul = $kode.".".$idmatkul;
$namamatkul = $_POST['namamatkul'];
$sks = $_POST['sks'];
$jns = $_POST['jns'];
$smt = $_POST['smt'];

$sqlMatkul = mysqli_query($koneksi, "SELECT * FROM matkul WHERE idmatkul = '$fixMatkul'");
$dataMatkul = mysqli_num_rows($sqlMatkul);

$insertMatkul = mysqli_query($koneksi, "INSERT INTO matkul VALUES ('$fixMatkul', '$namamatkul', '$sks', '$jns', '$smt')");
if($insertMatkul == TRUE) {
    header("location:updateMatkul.php");
} else {
    echo "<script>alert('Data Gagal Disimpan')</script>";
}