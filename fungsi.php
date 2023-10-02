<?php
//membuat koneksi ke database mysql
$koneksi=mysqli_connect('localhost','root','','a122106712');

function encryptid($id) {
    $enc = base64_encode(md5(rand().strtotime(date("H:i:s")))."-".$id);
    return $enc;
}

function decryptid($id) {
    $dec = explode("-", base64_decode($id));
    return $dec[1];
}
?>
