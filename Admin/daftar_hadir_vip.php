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
									<h1 class="main-title float-left">Daftar Hadir</h1>
									<ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Daftar Hadir</li>
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
								<h3><i class="fa fa-users"></i> PESERTA KELAS VIP</h3>
								<!-- Berikut adalah daftar nama-nama peserta yang telah teregistrasi oleh sistem. -->
							</div>
								
							<div class="card-body">
								
								<table id="example1" class="table table-bordered table-responsive-xl table-hover display">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Instansi</th>
											<th>No HP</th>
											<th>Kelas</th>
											<th>Kehadiran</th>
											<th>Opsi</th>
										</tr>
									</thead>													
									<tbody>
										<?php
											$i = 1;
											$qwe="SELECT * FROM data_peserta WHERE kehadiran = 'hadir' AND kelas = 'VIP'";
											$sqlqwe=mysqli_query($con,$qwe);
											while($data=mysqli_fetch_array($sqlqwe)){
										?>
										<tr>
											<td><?= $i++; ?></td>
											<td><?= $data[nama];?></td>
											<td><?= $data[instansi];?></td>
											<td>(+62) <?= $data[noHp];?></td>
											<td><?= $data[kelas];?></td>
											<td><?= $data[kehadiran];?></td>
											<td>
												<form action="" method="post">
													<input type="hidden" name="idPesBaru" value="<?= $data[idPes];?>">
													<input type="submit" name="hapus" value="Hapus" class="btn btn-danger">
													<!-- <a class="btn btn-danger" name="hapus" type="submit" id="example4">Hapus</a> -->
												</form>
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
															Kelas : <?= $row[kelas];?><br><br>
															QR Code : <br><br>
															<img src="http://localhost/peserta/Admin/qr.php?id=<?= $id;?>" alt=""><br><br>
															zHx<?= $id;?>codeXV
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
      $("#box2").addClass("active");
	  $("#box2-2").addClass("active");
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
		if(isset($_POST[hapus])){
		$idPesBaru = $_POST[idPesBaru];
		echo '
		<script>
			setTimeout(function(){
				swal({
					title: "Yakin menghapus data ini?",
					text: "Jika data ini dihapus, peserta akan dianggap tidak hadir",
					icon: "warning",
					buttons: true,
					timer : 5000,
					dangerMode: true,
					})
					.then((willDelete) => {
					if (willDelete) {
						swal("Data berhasil dihapus!", {
							icon : "success"
						
						});
						window.setTimeout(function(){ 
							window.location = "edit_vip.php?id='.$idPesBaru.'";
						} ,2500); 
						
					} else {
						swal("Data tidak jadi dihapus!");
					}
					});
			}, 10);	
		</script>
		';
		}else{
			
		}
	?>

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
	
	<!-- <script>
	var ctx1 = document.getElementById("lineChart").getContext('2d');
	var lineChart = new Chart(ctx1, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
					label: 'Dataset 1',
					backgroundColor: '#3EB9DC',
					data: [10, 14, 6, 7, 13, 9, 13, 16, 11, 8, 12, 9] 
				}, {
					label: 'Dataset 2',
					backgroundColor: '#EBEFF3',
					data: [12, 14, 6, 7, 13, 6, 13, 16, 10, 8, 11, 12]
				}]
				
		},
		options: {
						tooltips: {
							mode: 'index',
							intersect: false
						},
						responsive: true,
						scales: {
							xAxes: [{
								stacked: true,
							}],
							yAxes: [{
								stacked: true
							}]
						}
					}
	});


	var ctx2 = document.getElementById("pieChart").getContext('2d');
	var pieChart = new Chart(ctx2, {
		type: 'pie',
		data: {
				datasets: [{
					data: [12, 19, 3, 5, 2, 3],
					backgroundColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					label: 'Dataset 1'
				}],
				labels: [
					"Red",
					"Orange",
					"Yellow",
					"Green",
					"Blue"
				]
			},
			options: {
				responsive: true
			}
	 
	});


	var ctx3 = document.getElementById("doughnutChart").getContext('2d');
	var doughnutChart = new Chart(ctx3, {
		type: 'doughnut',
		data: {
				datasets: [{
					data: [12, 19, 3, 5, 2, 3],
					backgroundColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					label: 'Dataset 1'
				}],
				labels: [
					"Red",
					"Orange",
					"Yellow",
					"Green",
					"Blue"
				]
			},
			options: {
				responsive: true
			}
	 
	});
    </script> -->

<!-- END Java Script for this page -->

</body>
</html>