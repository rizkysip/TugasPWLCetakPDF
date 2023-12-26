<?php
require("fungsi.php");

$npp = decryptid($_GET["npp"]);

$q = "SELECT * FROM dosen WHERE npp = '".$npp."'";

$rs = mysqli_query($koneksi, $q);
if(mysqli_num_rows($rs) == 1) {
    mysqli_query($koneksi, "DELETE FROM dosen WHERE npp = '$npp'");
    header("location: updateDosen.php");
} else {
    echo "<script>
          alert('NPP tidak ditemukan')
          javascript:history.go(-1)
          </script>";
}


