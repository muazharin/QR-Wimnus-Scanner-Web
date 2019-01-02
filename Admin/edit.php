
<?php
    include '../koneksi.php';
    $id=$_GET['id'];
    $queryEdit = "UPDATE data_peserta SET kehadiran='' WHERE idPes='".$id."'";
    $sqlEdit = mysqli_query($con, $queryEdit);
    if($sqlEdit){
        echo "<script type='text/javascript' language='JavaScript'>    
                    window.location.href='back.php'
                </script>";
    }
?>