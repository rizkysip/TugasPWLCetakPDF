<?php
require "fungsi.php";

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    $kode = $_POST['kode'];
    $idMatkul = $_POST['id_matkul'];
    $fixIdMatkul = $kode.".".$idMatkul;
    $namaMatkul = $_POST['namamatkul'];
    $sks = $_POST['sks'];
    $jns = $_POST['jns'];
    $smt = $_POST['smt'];

    $sqlMatkul = mysqli_query($koneksi, "SELECT * FROM matkul WHERE idmatkul = '$id'");
    $dataMatkul = mysqli_num_rows($sqlMatkul);

    $sql = mysqli_query($koneksi, "UPDATE matkul SET idmatkul = '$fixIdMatkul', namamatkul = '$namaMatkul', sks = '$sks', jns = '$jns', smt = '$smt' WHERE idmatkul = '$id'");
    header("location:updateMatkul.php");
} else {
    die('System Error');
}

?>