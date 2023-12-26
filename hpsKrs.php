<?php
require("fungsi.php");

$nim = decryptid($_GET['nim']);
$idKrs = decryptid($_GET['idkrs']);

$query = mysqli_query($koneksi, "DELETE FROM krs WHERE nim = '$nim' AND id_jadwal = '$idKrs'");
if($query == TRUE) {
    header("Location: inputKRS.php?nim=".$nim);
} else {
    die("Gagal");
}

