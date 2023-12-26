<?php
require "fungsi.php";

if(isset($_POST['id'])) {
$id = $_POST["id"];
$tahun = $_POST["tahun"];
$npp = "0686.11.".$tahun.".";
$dataNpp = $_POST["npp"];
$arrNpp = array($dataNpp);
$impNpp = implode("", $arrNpp);
$fixNpp = $npp.$impNpp;
$namadosen = $_POST["namadosen"];
$homebase = $_POST["homebase"];

$sqlDosen = mysqli_query($koneksi, "SELECT * FROM dosen WHERE npp = '$fixNpp'");
$numDosen = mysqli_num_rows($sqlDosen);
// if($numDosen == 0) {
    $sql = mysqli_query($koneksi, "UPDATE dosen SET npp = '$fixNpp', namadosen = '$namadosen', homebase = '$homebase' WHERE npp = '$id'");
    header("location:updateDosen.php");
// } else {
//     echo "<script>
//           alert('NPP sudah ada')
//           javascript:history.go(-1)
//           </script>";
          
// }


} else {
    die("System Error");
}
?>