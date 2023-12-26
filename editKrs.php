<!DOCTYPE html>
<html lang="en">
<head>
<title>Sistem Informasi Akademik::Edit Mata Kuliah</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
	<!-- Use fontawesome 5-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>

<?php
require "head.html";
require "fungsi.php";

$id = decryptid($_GET['idkrs']);

$sqlKrs = mysqli_query($koneksi, "SELECT * FROM krs WHERE idKrs = '$id'");
$dataKrs = mysqli_fetch_object($sqlKrs);

$sqlMhs = mysqli_query($koneksi, "SELECT * FROM mhs WHERE nim = '$dataKrs->nim'");
$dataMhs = mysqli_fetch_object($sqlMhs);

$sqlMatkul = mysqli_query($koneksi, "SELECT * FROM matkul WHERE idmatkul = '$dataKrs->idMatkul'");
$dataMatkul = mysqli_fetch_object($sqlMatkul);

$rs_kultawar = mysqli_query($koneksi, "SELECT * FROM matkul a JOIN kultawar b on (a.idmatkul = b.idmatkul)");
$dataKultawar = mysqli_fetch_object($rs_kultawar);

$sqlDosen = mysqli_query($koneksi, "SELECT * FROM dosen WHERE npp = '$dataKrs->nppDos'");
$dataDosen = mysqli_fetch_object($sqlDosen);

// $sqlKultawar = mysqli_query($koneksi, "SELECT * FROM kultawar WHERE idmatkul = '$dataKrs->idmatkul'");
// $dataMatkul = mysqli_fetch_object($sqlMatkul);

?>

<div class="utama">
    <br><br>
    <div class="card">
        <h5 class="card-header">Edit Data Krs</h5>
        <div class="card-body">
            <form method="post" action="sv_editKrs.php">
                <div class="form-group">  
                    <label for="idmatkul" class="mr-sm-2">Mahasiswa : </label>
                    <select class="custom-select mr-sm-1" name="kode" id="kode">
                        <option value="<?php echo $dataKrs->nim; ?>" selected><?php echo $dataMhs->nama; ?> (Selected)</option>
                        <?php
                        $sqlAllMhs = mysqli_query($koneksi, "SELECT * FROM mhs");
                        while($data_mhs = mysqli_fetch_object($sqlAllMhs)){
                        ?>
                            <option value="<?php echo $data_mhs->nim?>"><?php echo $data_mhs->nama?></option>
                        <?php
                        }
                        ?>
                    </select>
                    
                </div>
                <br>
                <div class="form-group">  
                    <label for="idmatkul" class="mr-sm-2">Mata Kuliah : </label>
                    <select class="custom-select mr-sm-1" name="kode" id="kode">
                        <option value="<?php echo $dataKrs->idmatkul; ?>" selected><?php echo $dataMatkul->namamatkul; ?> (Selected)</option>
                        <?php
                        while($data_kultawar = mysqli_fetch_object($rs_kultawar)){
                        ?>
                            <option value="<?php echo $data_kultawar->idkultawar?>"><?php echo $data_kultawar->idmatkul?> - <?php echo $data_kultawar->namamatkul?> | <?php echo $data_kultawar->hari?> - <?php echo $data_kultawar->jamkul?> - <?php echo $data_kultawar->ruang?> </option>
                        <?php
                        }
                        ?>
                    </select>
                    
                </div>
                <div class="form-group">
                    <label for="dosen">Dosen</label>
                    <input class="form-control" type="text" name="dosen" id="dosen" value="<?php echo $dataDosen->namadosen; ?>" readonly>
                </div>
                
                <div class="form-group">
                    <button class="btn btn-info" type="submit">Submit</button>
                </div>
                <input type="hidden" name="id" id="id" value="<?php echo $id?>">
            </form> 
        </div>
    </div>
</div>
    
</body>
</html>