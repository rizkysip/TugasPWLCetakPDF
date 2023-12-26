<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Tambah Data Dosen</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>

</head>
<body>
	<?php
	require "head.html";
	?>
	<div class="utama">		
		<br><br><br>
        <div class="card">
            <h5 class="card-header">Tambah Data Dosen</h5>
            <div class="card-body">
       	
		
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>	
		<form method="post" action="sv_addDosen.php">
			<div class="form-inline">
				<label for="npp" class="mr-sm-2">NPP:</label>
                <input class="form-control" type="number" placeholder="0686.11" readonly>             
                <select class="custom-select" name="tahun" id="tahun">
                <?php
                $i = 1990;
                while ($i <= 2023) {
                    $tahun = $i;
                    $i++;
                ?>
                    <option value="<?php echo $tahun; ?>"><?php echo $tahun; ?></option>
                <?php
                }
                ?>
                </select>
                
				<input class="form-control" type="text" name="npp" id="npp" required>
			</div>
            <br>
            
            <div class="form-group">
				<label for="homebase">Homebase:</label>
				<select class="custom-select" name="homebase" id="homebase">
                <?php
                $i = 11;
                while ($i <= 20) {
                    $homebase = $i;
                    $i++;
                ?>
                    <option value="A<?php echo $homebase; ?>">A<?php echo $homebase; ?></option>
                <?php
                }
                ?>
                </select>
			</div>
            
			<div class="form-group">
				<label for="namadosen">Nama Dosen :</label>
				<input class="form-control" type="text" name="namadosen" id="namadosen">
			</div>	
			<div>		
				<button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
			</div>
		</form>
	</div>
    </div>
</div>
	<!--
	<script>
		$(document).ready(function(){
			$('#butsave').on('click',function(){			
				$('#butsave').attr('disabled', 'disabled');
				var nim 	= $('#nim').val();
				var nama	= $('#nama').val();
				var email 	= $('#email').val();
				
				$.ajax({
					type	: "POST",
					url		: "sv_addMhs.php",
					data	: {
								nim:nim,
								nama:nama,
								email:email
							  },
					contentType	:"undefined",					
					success : function(dataResult){						
						alert('success');
						$("#butsave").removeAttr("disabled");
						$('#fupForm').find('input:text').val('');
						$("#success").show();
						$('#success').html(dataResult);	
					}	   
				});
			});
		});
	</script>
	-->	
</body>
</html>