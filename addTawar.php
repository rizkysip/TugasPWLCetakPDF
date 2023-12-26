<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Daftar Dosen</title>
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

require "fungsi.php";
require "head.html";

$rs_matkul = search('matkul');

?>
<div class="utama">
    <br>
    <div class="card">
    <h5 class="card-header">Jadwal Mengajar</h5>
    <div class="card-body">
    <form action="saveJadwal.php" method="post">
        <div class="form-group">
            <label for="matkul">Mata Kuliah</label>
            <select class="form-control" name="matkul" id="matkul">
                <option disabled selected>- Pilih Mata Kuliah -</option>
                <?php
                while($data_matkul = mysqli_fetch_object($rs_matkul)){
                ?>
                    <option value="<?php echo $data_matkul->id?>"><?php echo $data_matkul->idmatkul?> - <?php echo $data_matkul->namamatkul?></option>
                <?php
                }
                ?>
            </select> 
        </div>
        <div class="form-group">
            <label for="dosen">Dosen</label>
            <select class="form-control" name="dosen" id="dosen">
                <option disabled selected>- Pilih Dosen -</option>
            </select> 
        </div>
        <div class="form-group">
            <label for="hari">Jadwal Hari</label>
            <select class="form-control" name="hari" id="hari">
                <option disabled selected>- Pilih Hari -</option>
                <?php
                $arrHari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                $i = 0;
                foreach($arrHari as $hari) {      
                ?>
                    <option value="<?php echo $hari; ?>"><?php echo $hari; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="ruang" class="mr-sm-1">Ruang : </label>
            <input class="form-control" type="text" name="ruang" id="ruang">
        </div>
        <div class="form-inline">
            <label for="darijam" class="mr-sm-2">Dari Jam : </label>
                <input class="form-control mr-sm-2" type="text" name="darijam" id="darijam">
            <label for="idmatkul" class="mr-sm-2">Sampai Jam : </label>
                <input class="form-control mr-sm-2" type="text" name="sampaijam" id="sampaijam">
        </div>
        
        <br>
        <div class="form-group">
            <button class="btn btn-info" type="submit">Submit</button>
        </div>
        </div>
    </div>
    </form>
</div>
<script>
    $(document).ready(function(){
        $("#matkul").change(function(){
            var mk = $(this).val()
            $.post('ajaxTawar.php',{mk:mk},function(data){
                if(data!="") {
                    $("#dosen").html(data)
                    console.log(data)
                }
            })
        })
    })
</script>
</body>
</html>