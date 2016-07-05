<?php
	include("koneksi.php");
	
	$nop = $_GET['nop'];
	
	$link=koneksi_db();
	$sql="delete from dataobjek where nop='$nop'";

	$res=$link->query($sql);
	
	if(!$res){
		?><script>alert('<?php echo mysqli_error($link);?>');</script><?php
	} else {
		?><script>alert('Data objek pajak berhasil dihapus');</script><?php
	}
	
	header("Location: ../admin/daftar-objek-pajak.php");
?>