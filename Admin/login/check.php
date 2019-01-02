<?php
//fungsi check.php ini adalah untuk mengecek data user yang ada dalam database agar bisa login ke halaman website.
	session_start();
	require_once "../../koneksi.php";
	if(ISSET($_POST['username']) && ISSET($_POST['pass']))
  	{
      	$user=$_POST['username'];
      	$password=md5($_POST['pass']);
      	$perintah="SELECT * FROM admin WHERE username='$user' AND password='$password'";
     	$hasil=mysqli_query($con, $perintah);
      	$jml_data=mysqli_num_rows($hasil);
	  	if ($jml_data>0){
	    	$_SESSION['username']=$user;
			?>
			<script type='text/javascript' language='JavaScript'>
				window.location.href="../";
			</script>
			<?php
	  	}else{
	    ?>
			<script type="text/javascript" language="JavaScript">
				document.location='index.php';
			</script>
		<?php
		}
	}
?>