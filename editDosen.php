<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Edit Data Dosen</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
</head>
<body>
	<?php
	require "fungsi.php";
	require "head.html";
	$id=decryptid($_GET['npp']);
	$sql="select * from dosen where npp='$id'";
	$qry=mysqli_query($koneksi,$sql);
	$row=mysqli_fetch_assoc($qry);

    $npp = $row['npp'];
    $expNpp = explode(".", $npp);
	?>
	<div class="utama">
    <br><br><br>
    <div class="card">
            <h5 class="card-header">Edit Data Dosen</h5>
            <div class="card-body">
			<form enctype="multipart/form-data" method="post" action="sv_editDosen.php">
                <div class="form-inline">
					<label for="nim" class="mr-sm-2">NPP: </label>
					<input class="form-control" type="number" placeholder="0686.11" readonly>             
                    <select class="custom-select" name="tahun" id="tahun">
                        <option value="<?php echo $expNpp[2]; ?>" selected>(Selected) <?php echo $expNpp[2]; ?></option>
                    <?php
                    $i = 1990;
                    while ($i <= 2023) {
                        if($i == $expNpp[2]) {
                            $i++;
                            continue;
                        }
                        $tahun = $i;
                        $i++;
                    ?>
                        <option value="<?php echo $tahun; ?>"><?php echo $tahun; ?></option>
                    <?php
                    }
                    ?>
                    </select>             
				    <input class="form-control" type="text" name="npp" id="npp" value="<?php echo $expNpp[3]; ?>">
				</div>
                <br>
				<div class="form-group">
					<label for="nama">Nama Dosen:</label>
					<input class="form-control" type="text" name="namadosen" id="namadosen" value="<?php echo $row['namadosen']?>">
				</div>
				<div class="form-group">
					<label for="email">Homebase:</label>
                    <select class="custom-select" name="homebase" id="homebase">
                    <option value="<?php echo $row['homebase']; ?>" selected>(Selected) <?php echo $row['homebase']; ?></option>
                        <?php
                        $i = 11;
                        while ($i <= 20) {
                            if($i == trim($row['homebase'], "A")) {
                                $i++;
                                continue;
                            }
                            $homebase = $i;
                            $i++;
                        ?>
                            
                            <option value="A<?php echo $homebase; ?>">A<?php echo $homebase; ?></option>
                        <?php
                        }
                        ?>
                    </select>
					<!-- <input class="form-control" type="text" name="Homebase" id="homebase" value="<?php echo $row['homebase']?>"> -->
				</div>				
				<div>		
					<button class="btn btn-primary" type="submit" id="submit">Simpan</button>
				</div>
				<input type="hidden" name="id" id="id" value="<?php echo $id?>">
			</form>
		</div>
		</div>
	</div>
	<script>
		$('#submit').on('click',function(){
			var id 		= $('#id').val();
            var tahun   = $('#tahun').val();
            var npp     = $('#npp').val();
			var namadosen	= $('#namadosen').val();
			var homebase 	= $('#homebase').val();
			$.ajax({
				method	: "POST",
				url		: "sv_editDosen.php",
				data	: {id:id, tahun:tahun, npp:npp, namadosen:namadosen, homebase:homebase}
			});
		});
	</script>
</body>
</html>