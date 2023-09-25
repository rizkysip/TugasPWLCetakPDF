
<?php
require "fungsi.php";

$tahun = $_POST["tahun"];
$npp = "0686.11.".$tahun.".";
$dataNpp = $_POST["npp"];
$insertNpp = $npp.$dataNpp;
$namadosen = $_POST["namadosen"];
$homebase = $_POST["homebase"];

mysqli_query($koneksi, "INSERT INTO dosen VALUES ('$insertNpp', '$namadosen', '$homebase')");
header("location:addDosen.php");
?>