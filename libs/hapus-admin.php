<?php
	include("koneksi.php");
	
	$nip = $_GET['nip'];
	
	$link=koneksi_db();
	$sql="delete from dataadmin where nip='$nip'";

	$res=$link->query($sql);
	
	if(!$res){
		?><script>alert('<?php echo mysqli_error($link);?>');</script><?php
	} else {
		?><script>alert('Data admin berhasil dihapus');</script><?php
	}
	
	header("Location: ../admin/daftar-admin.php");
?>