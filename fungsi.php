<?php
//membuat koneksi ke database mysql
$koneksi=mysqli_connect('localhost','root','','a122106712');

function encryptid($id) {
    $enc = base64_encode(rand() * strtotime(date("Y-m-d H:i:s"))."-".$id);
    return $enc;
}

function decryptid($id) {
    $kode = base64_decode($id);
    $id = explode("-", $kode);
    if(count($id) > 1) {
        return $id[1];
    } else {
        return 0;
    }
}

function search($tabel,$key = null) {
    $sql = "select * from ".$tabel;
    if(!is_null($key)) {
        $sql .= " where ".$key;
    }
    $hasil = mysqli_query($GLOBALS['koneksi'], $sql) or die(mysqli_error($GLOBALS['koneksi']));
    return $hasil;
}

function generatepdf($size="A4", $orientation="Portrait",$html=null,$filename="doc")
{
    require_once __DIR__ . '/vendor/autoload.php';

    $pdf = new \Dompdf\Dompdf();

    $pdf->loadHtml($html);
    $pdf->setPaper($size,$orientation);//ukuran dan orientation
    $pdf->render();
    $pdf->stream($filename.".pdf",array("Attachment"=>FALSE));
}
?>
?>
