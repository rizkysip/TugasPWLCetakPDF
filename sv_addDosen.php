
<?php
require "fungsi.php";

$tahun = $_POST["tahun"];
$npp = "0686.11.".$tahun.".";
$dataNpp = $_POST["npp"];
$insertNpp = $npp.$dataNpp;
$namadosen = $_POST["namadosen"];
$homebase = $_POST["homebase"];

$sql = mysqli_query($koneksi, "SELECT * FROM dosen WHERE npp = '$insertNpp'");
$data = mysqli_num_rows($sql);
if($data == 0) {
    mysqli_query($koneksi, "INSERT INTO dosen VALUES ('$insertNpp', '$namadosen', '$homebase')");
    header("location:addDosen.php");
} else {
    echo "<script>
          alert('NPP sudah ada')
          javascript:history.go(-1)
          </script>";
    
}



?>