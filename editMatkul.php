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

$id = decryptid($_GET['idmatkul']);

$sqlMatkul = mysqli_query($koneksi, "SELECT * FROM matkul WHERE idmatkul = '$id'");
$dataMatkul = mysqli_fetch_assoc($sqlMatkul);

$getKode = $dataMatkul['idmatkul'];
$expKode = explode(".", $getKode);

?>

<div class="utama">
    <br><br>
    <div class="card">
        <h5 class="card-header">Edit Data Matkul</h5>
        <div class="card-body">
            <form method="post" action="sv_editMatkul.php">
                <div class="form-inline">  
                    <label for="idmatkul" class="mr-sm-2">Kode : </label>
                    <select class="custom-select mr-sm-1" name="kode" id="koded">
                        <option value="<?php echo $expKode[0]; ?>" selected><?php echo $expKode[0]; ?> (Selected)</option>
                        <?php
                        $i = 11;
                        while ($i <= 20) {
                            if($i == trim($expKode[0], "A")) {
                                $i++;
                                continue;
                            }
                            $kodeMatkul = $i;
                            $i++;
                        ?>
                            <option value="A<?php echo $kodeMatkul; ?>">A<?php echo $kodeMatkul; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <input class="form-control" type="number" name="id_matkul" id="id_matkul" value="<?php echo $expKode[1]; ?>">
                </div>
                <br>
                <div class="form-group">
                    <label for="namamatkul">Nama Mata Kuliah</label>
                    <input class="form-control" type="text" name="namamatkul" id="namamatkul" value="<?php echo $dataMatkul['namamatkul']; ?>">
                </div>
                <div class="form-group">  
                    <label for="sks" class="mr-sm-2">SKS : </label>
                    <select class="custom-select mr-sm-1" name="sks" id="sks">
                        <option value="<?php echo $dataMatkul['sks']; ?>" selected><?php echo $dataMatkul['sks']; ?> (Selected)</option>
                        <?php
                        $i = 1;
                        while ($i <= 6) {
                            $sks = $i;
                            $i++;
                        ?>
                            <option value="<?php echo $sks; ?>"><?php echo $sks; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                <label for="jns" class="mr-sm-2">Jenis : </label>
                    <select class="custom-select mr-sm-1" name="jns" id="jns">
                        <option value="<?php echo $dataMatkul['jns']; ?>" selected><?php echo $dataMatkul['jns']; ?> (Selected)</option>
                        <option value="T">T</option>
                        <option value="T/P">T/P</option>
                        <option value="P">P</option>
                    </select>
                </div>
                <div class="form-group">
                <label for="smt" class="mr-sm-2">Semester : </label>
                    <select class="custom-select mr-sm-1" name="smt" id="smt">
                        <option value="<?php echo $dataMatkul['smt']; ?>" selected><?php echo $dataMatkul['smt']; ?> (Selected)</option>
                        <?php
                        $i = 1;
                        while ($i <= 8) {
                            $smt = $i;
                            $i++;
                        ?>
                            <option value="<?php echo $smt; ?>"><?php echo $smt; ?></option>
                        <?php
                        }
                        ?>
                    </select>
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