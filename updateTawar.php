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

// if(isset($_POST['cari'])) {
// 	$cari = $_POST['cari'];
// 	$rs = search('kultawar', "npp like '%$cari%' or
// 								namadosen like '%$cari%' or
// 								homebase like '%$cari%'");
// } else {
    $sql = "select * from matkul a JOIN kultawar b on (a.idmatkul = b.idmatkul) JOIN dosen c ON (c.npp = b.npp)";
    $hasil = mysqli_query($koneksi, $sql) or die (mysqli_error($koneksi));
    $kosong = false;
    if(!mysqli_num_rows($hasil)) {
        $kosong = true;
    }
	// $rs = search('kultawar');
// } 
?>
<div class="utama">
	<h2 class="text-center">Daftar Penawaran Mata Kuliah</h2>
	<div class="text-center"><a href="prnDosenPdf.php"><span class="fas fa-print">&nbsp;Print</span></a></div>
	<span class="float-left">
		<a class="btn btn-success" href="addTawar.php">Tambah Data</a>
	</span>
	<!-- <span class="float-right">
		<form action="" method="post" class="form-inline">
			<button class="btn btn-success" type="submit">Cari</button>
			<input class="form-control mr-2 ml-2" type="text" name="cari" placeholder="cari data dosen..." autofocus autocomplete="off">
		</form>
	</span> -->
	<br><br>
	<!-- Cetak data dengan tampilan tabel -->
	<table class="table table-hover">
	<thead class="thead-light">
	<tr>
		<th>No.</th>
		<th>Mata Kuliah</th>
		<th>Dosen</th>
		<th>Jadwal Hari</th>
        <th>Jadwal Jam</th>
		<th>Ruang</th>
		<th>Aksi</th>
	</tr>
	</thead>
	<tbody>
	<?php
	//jika data tidak ada
	if (mysqli_num_rows($hasil) == 0){
		?>
		<tr><th colspan="6">
			<div class="alert alert-info alert-dismissible fade show text-center">
			<!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
			Data tidak ada
			</div>
		</th></tr>
		<?php
	}else{	
		$no = 1;
		while($row=mysqli_fetch_assoc($hasil)){
			?>	
			<tr>
				<td><?php echo $no?></td>
				<td><?php echo $row["namamatkul"]?></td>
				<td><?php echo $row["namadosen"]?></td>
				<td><?php echo $row["hari"]?></td>
                <td><?php echo $row["jamkul"]?></td>
				<td><?php echo $row["ruang"]?></td>
				<td>
				<a class="btn btn-outline-primary btn-sm" href="editKultawar.php?npp=<?php echo encryptid($row["idkultawar"])?>">Edit</a>
				<a class="btn btn-outline-danger btn-sm" href="hpsKultawar.php?npp=<?php echo encryptid($row["idkultawar"])?>" id="linkHps" onclick="return confirm('Yakin dihapus nih?')">Hapus</a>
				</td>
			</tr>
			<?php 
			$no++;
		}
	}
	?>
	</tbody>
	</table>
</div>
</body>
</html>	
