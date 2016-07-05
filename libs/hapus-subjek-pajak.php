<?php
	include("koneksi.php");
	
	$ktp_subjek = $_GET['ktp_subjek'];
	
	$link=koneksi_db();
	$sql="delete from datasubjek where ktp_subjek='$ktp_subjek'";

	$res=$link->query($sql);
	
	if(!$res){
		?><script>alert('<?php echo mysqli_error($link);?>');</script><?php
	} else {
		?><script>alert('Data subjek pajak berhasil dihapus');</script><?php
	}
	
	header("Location: ../admin/daftar-subjek-pajak.php");
?>