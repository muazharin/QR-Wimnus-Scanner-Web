<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//Import File Koneksi database
		require_once('koneksi.php');
		
		//Mendapatkan Nilai Variable
		$id = $_POST['idPes'];
		$sql1 =  "SELECT * FROM data_peserta WHERE kehadiran = 'hadir' AND idPes = $id;";
		$hasil=mysqli_query($con, $sql1);
		$jml_data=mysqli_num_rows($hasil);
		if ($jml_data<=0) {
			//Pembuatan Syntax SQL
			$sql =  "UPDATE data_peserta SET kehadiran = 'hadir' WHERE idPes = $id;";
			//$sql = "INSERT INTO tb_pegawai (nama,posisi,gajih) VALUES ('$name','$desg','$sal')";
			
			//Eksekusi Query database
			if(mysqli_query($con,$sql)){
				echo 'Data added successfully';
			}else{
				echo 'QR Code is unknown! Please contact the admin~';
			}
		
		} else {
			echo 'Data has been registered before!';
		}
		
		
		mysqli_close($con);
	}
?>