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

//memanggil file berisi fungsi2 yang sering dipakai
require "fungsi.php";
require "head.html";

?>
<div class="utama">
	<h2 class="text-center">Daftar Mata Kuliah</h2>
	<!-- <div class="text-center"><a href="prnDosenPdf.php"><span class="fas fa-print">&nbsp;Print</span></a></div> -->
	<span class="float-left">
		<a class="btn btn-danger" href="addMatkul.php">Tambah Data</a>
	</span>
	<span class="float-right">
		<form action="" method="post" class="form-inline">
			<button class="btn btn-danger" type="submit">Cari</button>
			<input class="form-control mr-2 ml-2" type="text" name="cari" placeholder="cari data matkul..." autofocus autocomplete="off">
		</form>
	</span>
    <br>
	<!-- <span class="float-right">
		<form action="" method="post" class="form-inline">
			<button class="btn btn-success" type="submit">Cari</button>
			<input class="form-control mr-2 ml-2" type="text" name="cari" placeholder="cari data dosen..." autofocus autocomplete="off">
		</form>
	</span> -->
	<br><br>
	<table class="table table-hover">
	<thead class="thead-light">
	<tr>
		<th>No.</th>
		<th>ID Matkul</th>
		<th>Nama Matkul</th>
		<th>SKS</th>
        <th>JNS</th>
        <th>Semester</th>
		<th>Aksi</th>
	</tr>
	</thead>
	<tbody>
	<?php
    $hasil = mysqli_query($koneksi, "SELECT * FROM matkul");
    $no = 1;
		while($row=mysqli_fetch_assoc($hasil)){
	?>	
			<tr>
				<td><?php echo $no?></td>
				<td><?php echo $row["idmatkul"]?></td>
				<td><?php echo $row["namamatkul"]?></td>
				<td><?php echo $row["sks"]?></td>
                <td><?php echo $row["jns"]?></td>
                <td><?php echo $row["smt"]?></td>
				<td>
				<a class="btn btn-outline-primary btn-sm" href="editMatkul.php?idmatkul=<?php echo encryptid($row["idmatkul"])?>">Edit</a>
				<a class="btn btn-outline-danger btn-sm" href="hpsMatkul.php?idmatkul=<?php echo encryptid($row["idmatkul"])?>" id="linkHps" onclick="return confirm('Yakin dihapus nih?')">Hapus</a>
				</td>
			</tr>
			<?php 
			$no++;
		}
	?>
	</tbody>
	</table>
</div>
</body>
</html>	
