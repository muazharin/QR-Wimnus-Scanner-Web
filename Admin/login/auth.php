<?php
@ob_start();
session_start();
//error_reporting(E_ALL ^ E_DEPRECATED);
//ini_set("display_errors", 0);

	include '../inc/koneksi.php';

	$email = mysqli_real_escape_string($con, $_POST['email']);
	$pass  = md5(mysqli_real_escape_string($con, $_POST['pass']));

	$login = mysqli_query($con, "SELECT * FROM admin WHERE email='$email' AND password='$pass'");
	$ketemu = mysqli_num_rows($login);
	$r = mysqli_fetch_array($login);

	// Apabila email dan password ditemukan
	if ($ketemu > 0){

		$_SESSION['admin_idxx'] = $r['id'];
		$_SESSION['admin_email'] = $r['email'];
		$_SESSION['admin_password'] = $r['password'];
		$_SESSION['admin_name'] = $r['nama'];
		$_SESSION['admin_foto'] = $r['foto'];

		 $_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
         $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
		
		echo "<script language=Javascript>
				javascript:document.location='../admin/index.php';
			</script>";
	}
	else{
		$r=1;
	  echo "<script language=Javascript>
				javascript:document.location='index.php?er=1';
			</script>";
	}
?>
