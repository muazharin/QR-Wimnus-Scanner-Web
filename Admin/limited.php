<?php
	if(!isset($_SESSION['username']))
	{
		?>
			<script type="text/javascript" language="javascript">
				window.location.href='login';
			</script>
		<?php
		
		exit;
	}
?>