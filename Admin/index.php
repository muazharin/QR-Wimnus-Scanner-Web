<?php
	include "header.php";
	?>

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left">Dashboard</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item active">Dashboard</li>
							</ol>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<!-- end row -->
			
				<div class="row">
					<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
						<div class="card-box noradius noborder bg-default">
							<i class="fa fa-file-text-o float-right text-white"></i>
							<h6 class="text-white text-uppercase m-b-20">Total Peserta</h6>
							<h1 class="m-b-20 text-white counter"><?= $sql[0];?></h1>
							<span class="text-white">peserta</span>
						</div>
					</div>

					<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
						<div class="card-box noradius noborder bg-warning">
							<i class="fa fa-bar-chart float-right text-white"></i>
							<h6 class="text-white text-uppercase m-b-20">Kehadiran</h6>
							<h1 class="m-b-20 text-white counter"><?= $sql1[0];?></h1>
							<?php
								$a = $sql[0];
								$b = $sql1[0];
								$c = ($b / $a)*100;
							?>
							<span class="text-white">rata-rata: <?= number_format($c,2);?>%</span>
						</div>
					</div>

					<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
						<div class="card-box noradius noborder bg-info">
							<i class="fa fa-user-o float-right text-white"></i>
							<h6 class="text-white text-uppercase m-b-20">User Admin</h6>
							<h1 class="m-b-20 text-white counter"><?= $sql2[0];?></h1>
							<span class="text-white">user</span>
						</div>
					</div>

					<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
						<div class="card-box noradius noborder bg-danger">
							<i class="fa fa-code float-right text-white"></i>
							<h6 class="text-white text-uppercase m-b-20">LO</h6>
							<h1 class="m-b-20 text-white counter"><?= $sql3[0];?></h1>
							<span class="text-white">orang</span>
						</div>
					</div>
				</div>
				<!-- end row -->							
				
				
				
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-users"></i> Peserta</h3>
								Berikut adalah daftar nama-nama peserta yang telah teregistrasi oleh sistem.
							</div>
								
							<div class="card-body">
								
								<table id="example1" class="table table-bordered table-responsive-xl table-hover display">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Instansi</th>
											<th>Kelas</th>
											<th>LO</th>
											<th>Opsi</th>
										</tr>
									</thead>													
									<tbody>
										<?php
											$i = 1;
											$qwe="SELECT * FROM data_peserta ";
											$sqlqwe=mysqli_query($con,$qwe);
											while($data=mysqli_fetch_array($sqlqwe)){
										?>
										<tr>
											<td><?= $i++; ?></td>
											<td><?= $data[nama];?></td>
											<td><?= $data[instansi];?></td>
											<td><?= $data[kelas];?></td>
											<td><?= $data[lo];?></td>
											<td>
												<a href="qr.php?id=<?= $data[idPes];?>" type="button" class="btn btn-info" data-target="#customModal<?= $data[idPes];?>" data-toggle="modal" ><i class="fa fa-info"></i></a>
												<a href="#" type="button" class="btn btn-info" data-target="#customModalB<?= $data[idPes];?>" data-toggle="modal" ><i class="fa fa-edit"></i></a>
												<a href="download.php?id=<?= $data[idPes];?>" type="button" class="btn btn-info"><i class="fa fa-download"></i></a>
											</td>
											
										</tr>
										<!-- Modal -->
										<div class="modal fade custom-modal" id="customModal<?= $data[idPes];?>" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel2">Detail Peserta</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p><?php
														$id = $data[idPes];
														$queryModal = "SELECT * FROM data_peserta WHERE idPes = $id";
														$sqlModal = mysqli_query($con, $queryModal);
														while($row=mysqli_fetch_array($sqlModal)){
														?>
															Nama : <?= $row[nama];?><br><br>
															Instansi : 	<?= $row[instansi];?><br><br>
															No Hp : (+62)<?= $row[noHp];?><br><br>
															LO : <?= $row[lo];?><br><br>
															Kelas : <?= $row[kelas];?><br><br>
															QR Code : <br><br>
															<center><img src="http://localhost/peserta/Admin/qr.php?id=<?= $id;?>" alt=""><br><br></center>
														<?php
														}
													?></p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												</div>
												</div>
											</div>
										</div>
										<?php
									}?>
									</tbody>
								</table>
								
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
<script src="assets/js/jquery-1.10.2.min.js"></script>
<script>
   $(document).ready(function() {
      $("#box1").addClass("active");
   });
</script>
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
<!-- BEGIN Java Script for this page -->
<script src="assets/js/popper.js"></script>
<!-- END Java Script for this page -->

<!-- App js -->
<script src="assets/js/pikeadmin.js"></script>

<!-- BEGIN Java Script for this page -->
<script src="assets/js/Chart.min.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

	<!-- Counter-Up-->
<script src="assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="assets/plugins/counterup/jquery.counterup.min.js"></script>			

<script>
	$(document).ready(function() {
		// data-tables
		$('#example1').DataTable();
				
		// counter-up
		$('.counter').counterUp({
			delay: 10,
			time: 600
		});
	} );		
</script>


<!-- END Java Script for this page -->

</body>
</html>