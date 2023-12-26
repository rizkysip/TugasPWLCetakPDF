<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Daftar Mahasiswa</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
	<!-- Use fontawesome 5-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script>
		/*function cetak(hal) {
		  var xhttp;
		  var dtcetak;	
		  xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			  dtcetak= this.responseText;
			}
		  };
		  xhttp.open("GET", "ajaxUpdateMhs.php?hal="+hal, true);
		  xhttp.send();
		}*/
	</script>		
</head>
<body>

<?php

//memanggil file berisi fungsi2 yang sering dipakai
require "fungsi.php";
require "head.html";
$progdi = substr($_GET['nim'], 0, 3);
$rs = search('matkul',"substr(idmatkul,1,3)='".$progdi."'");

?>

<div class="utama">
    <h3>Input KRS <?php echo $_GET['nim']; ?></h3>
    <form action="sv_krs.php" method="post">
        <input type="hidden" name="nim" value="<?php echo $_GET['nim']?>">
        <div class="form-group">
            <label for="matakuliah">Mata Kuliah</label>
            <select name="matakuliah" id="matkul" class="form-control">
                <option selected disabled>- Pilih Mata Kuliah - </option>
                <?php
                while($data = mysqli_fetch_object($rs)) 
                {
                ?>
                <option value="<?php echo $data->idmatkul; ?>"><?php echo $data->namamatkul; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <div id="tabelmatkul"></div>
        </div>
        <div class="form-group">
        <table class=" table table-hover table-bordered">
            <tr>
                <th>No</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>Dosen</th>
                <th>Jam Kuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        <?php
            $rs = search('krs', "nim='".$_GET['nim']."'");
            $i = 1;
            $totalsks = 0;
            while($datakrs = mysqli_fetch_object($rs))
            {
                $kultawar = search('kultawar', "idkultawar = '".$datakrs->id_jadwal."'");
                $datakultawar = mysqli_fetch_object($kultawar);
                $matkul = search('matkul',"idmatkul='".$datakultawar->idmatkul."'");
                $datamatkul = mysqli_fetch_object($matkul);
                $dosen = search('dosen',"npp='".$datakultawar->npp."'");
                $datadosen = mysqli_fetch_object($dosen);
                
        ?>
            <tr>
                <td><?php echo $i?></td>
                <td><?php echo $datakultawar->idmatkul?></td>
                <td><?php echo $datamatkul->namamatkul?></td>
                <td><?php echo $datadosen->namadosen?></td>
                <td><?php echo $datakultawar->hari," ",$datakultawar->jamkul?></td>
                <td><?php echo $datamatkul->sks?></td>
                <td align="center"><a class="btn btn-danger btn-sm" href="hpsKrs.php?nim=<?php echo encryptid($datakrs->nim)?>&idkrs=<?php echo encryptid($datakrs->id_jadwal)?>">Hapus</a></td>       
            </tr>
        <?php
                $i++;
                $totalsks += $datamatkul->sks;
            }
        ?>
        
        </table>
        Total SKS : <?php echo $totalsks; ?>
        <br>
        <hr>
        <a class="btn btn-info" href="updateMhs.php">Kembali</a>
        
        
        
</div>
<script>
    $(document).ready(function() {
        $("#matkul").change(function() {
            var mk = $(this).val()
            $.post('ajaxKrs.php',{mk:mk}, 
            function(data){
                $("#tabelmatkul").html(data)
                console.log(mk)
            })
        })
        
    })
</script>
</body>
</html>