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


$rs_mhs = search('mhs');
$rs_kultawar = mysqli_query($koneksi, "SELECT * FROM matkul a JOIN kultawar b on (a.idmatkul = b.idmatkul)");
$dataKultawar = mysqli_fetch_object($rs_kultawar);
$rs_matkul = search('matkul');
$dataMatkul = mysqli_fetch_object($rs_matkul);

$tahunAkad = date("Y");

?>
<div class="utama">
    <br>
    <div class="card">
    <h5 class="card-header">Input KRS</h5>
    <div class="card-body">
    <form action="sv_addKrs.php" method="post">
    <div class="form-group">
        <label for="tahunAkad" class="mr-sm-1">Tahun Akademik : </label>
        <input class="form-control" type="text" value="<?php echo $tahunAkad; ?>" name="tahunAkad" readonly>
    </div>
    
    <div class="form-group">
            <label for="mhs">Mahasiswa</label>
            <select class="form-control" name="mhs" id="mhs">
                <option disabled selected>- Pilih Mahasiswa -</option>
                <?php
                while($data_mhs = mysqli_fetch_object($rs_mhs)){
                ?>
                    <option value="<?php echo $data_mhs->nim?>"><?php echo $data_mhs->nama?></option>
                <?php
                }
                ?>
            </select> 
        </div>
        <div class="form-group">
            <label for="matkul">Mata Kuliah</label>
            <select class="form-control" name="matkul" id="matkul">
                <option disabled selected>- Pilih Mata Kuliah -</option>
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
            <div id="idkultawar" name="idkultawar">
        </div>
        <!-- <input type="hidden" name="idkultawar" id="idkultawar" value="<?php echo $dataKultawar->idkultawar; ?>"> -->
        <div class="form-group">
            <label for="dosen">Dosen</label>
            <div id="dosen" name="dosen">
        </div>
        <div class="form-group">
            <div id="hari" name="hari" hidden>
        </div>
        <div class="form-group">
            <div id="jamkul" name="jamkul" hidden>
        </div>
        <div class="form-group">
            <div id="ruang" name="ruang" hidden>
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
            $.post('ajaxKrs.php',{mk:mk},function(data){
                if(data!="") {
                    $("#dosen").html(data)
                    console.log(data)
                }
            })
        })
        $("#matkul").change(function(){
            var mk = $(this).val()
            $.post('ajaxIdKulTawar.php',{mk:mk},function(data){
                if(data!="") {
                    $("#idkultawar").html(data)
                    console.log(data)
                }
            })
        })
        $("#matkul").change(function(){
            var mk = $(this).val()
            $.post('ajaxKrsHari.php',{mk:mk},function(data){
                if(data!="") {
                    $("#hari").html(data)
                    console.log(data)
                }
            })
        })
        $("#matkul").change(function(){
            var mk = $(this).val()
            $.post('ajaxKrsJamKul.php',{mk:mk},function(data){
                if(data!="") {
                    $("#jamkul").html(data)
                    console.log(data)
                }
            })
        })
        $("#matkul").change(function(){
            var mk = $(this).val()
            $.post('ajaxKrsRuang.php',{mk:mk},function(data){
                if(data!="") {
                    $("#ruang").html(data)
                    console.log(data)
                }
            })
        })
    })
</script>
</body>
</html>