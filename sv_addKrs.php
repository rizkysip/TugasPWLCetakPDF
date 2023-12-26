<?php
require "fungsi.php";

$matkul = $_POST['matkul'];

$sqlKultawar = mysqli_query($koneksi, "SELECT * FROM kultawar WHERE idkultawar = '$matkul'");
$dataKultawar = mysqli_fetch_object($sqlKultawar);

$sqlDosen = mysqli_query($koneksi, "SELECT * FROM dosen WHERE npp = '$matkul'");
$dataDosen = mysqli_fetch_object($sqlDosen);

$idmatkul = $dataKultawar->idmatkul;

$tahunAkad = $_POST['tahunAkad'];
$mhs = $_POST['mhs'];
$dosen = $dataKultawar->npp;
$hari = $dataKultawar->hari;
$jadwal = $dataKultawar->jamkul;
$nilai = 0;

$insertKrs = mysqli_query($koneksi, "INSERT INTO krs VALUES ('', '$tahunAkad', '$mhs', '$idmatkul', '$nilai', '$dosen', '$hari', '$jadwal')");
if($insertKrs == TRUE) {
    header("location:updateKrs.php");
} else {
    echo "<script>alert('Data Gagal Disimpan')</script>";
}