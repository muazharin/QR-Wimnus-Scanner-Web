<?php
	include "header.php";
	if (isset($_POST['nama'])) {
		$nama = $_POST['nama'];
		$ins = $_POST['ins'];
		$tlp = $_POST['tlp'];
		$kelas = $_POST['kelas'];
		$lo = $_POST['lo'];

		mysqli_query($con, "INSERT INTO `data_peserta`(`nama`, `instansi`, `noHp`, `kelas`, `lo`, `kehadiran`) VALUES ('$nama','$ins','$tlp','$kelas','$lo','')");

		echo "<script> document.location='form_peserta.php?ss=1'; </script>";
	}
?>

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
				<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
									<h1 class="main-title float-left">Tambah Peserta</h1>
									<ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Form</li>
										<li class="breadcrumb-item active">Peserta</li>
									</ol>
									<div class="clearfix"></div>
							</div>
					</div>
				</div>
				<!-- end row -->
					
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-plus"></i> FORM TAMBAH PESERTA</h3>
								<!-- Berikut adalah daftar nama-nama peserta yang telah teregistrasi oleh sistem. -->
							</div>
								
							<div class="card-body">
								<form action="form_peserta.php" method="POST">
								<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Nama Peserta</label>
										<input type="text" name="nama" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Instansi</label>
										<input type="text" name="ins" class="form-control" required>
									</div>
									<div class="form-group">
										<label>No Telepon</label>
										<input type="text" name="tlp" class="form-control" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Kelas</label>
										<select name="kelas" class="form-control" required>
											<option value="REGULER">REGULER</option>
											<option value="VIP">VIP</option>
										</select>
									</div>
									<div class="form-group">
										<label>LO</label>
										<select name="lo" class="form-control" required>
											<option value="Hendra">Hendra</option>
											<option value="Roza">Roza</option>
											<option value="Afni">Afni</option>
											<option value="Ilham">Ilham</option>
											<option value="Aslan">Aslan</option>
											<option value="Ratri">Ratri</option>
											<option value="Fajrian">Fajrian</option>
											<option value="Agung">Agung</option>
											<option value="Desi">Desi</option>
											<option value="Yudi">Yudi</option>
											<option value="Arianto">Arianto</option>
										</select>
									</div>
									<button style="margin-top: 28px;" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
								</div>
								</div>
								</form>			
							</div>														
						</div><!-- end card-->	
					</div>
				</div>			
            </div>
			<!-- END container-fluid -->
		</div>
		<!-- END content -->
    </div>
	<!-- END content-page -->
    
	<footer class="footer">
		<span class="text-right">
		Copyright <a target="_blank" href="#">&copy 2018</a>
		</span>
		<span class="float-right">
		Powered by <a target="_blank" href="https://www.instagram.com/codexv.group/"><b>CodeXV</b></a>
		</span>
	</footer>

</div>
<!-- END main -->

<script src="assets/js/modernizr.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/moment.min.js"></script>
		
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/plugins/switchery/switchery.min.js"></script>
<script src="assets/js/popper.js"></script>
<!-- END Java Script for this page -->

<!-- App js -->
<script src="assets/js/pikeadmin.js"></script>
<script src="assets/js/jquery-1.10.2.min.js"></script>
<script>
   $(document).ready(function() {
	$("#box3").addClass("active");
	$("#box3-1").addClass("active");
   });
</script>
<!-- BEGIN Java Script for this page -->
<script src="assets/js/Chart.min.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>
<!-- Counter-Up-->
<script src="assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="assets/plugins/counterup/jquery.counterup.min.js"></script>
<script src="assets/js/sweetalert.min.js"></script>

	<?php
		if(isset($_GET['ss'])){
		echo '
		<script>
			swal("Data Tersimpan", {
				icon : "success"
			});
		</script>
		';
		}
	?>	
</body>
</html>