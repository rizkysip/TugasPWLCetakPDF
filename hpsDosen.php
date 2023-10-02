<?php
require("fungsi.php");

$npp = decryptid($_GET["npp"]);

mysqli_query($koneksi, "DELETE FROM dosen WHERE npp = '$npp'");
header("location: updateDosen.php");