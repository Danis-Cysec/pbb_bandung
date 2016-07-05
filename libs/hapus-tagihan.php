<?php
	include("koneksi.php");
	
	$nop = $_GET['nop'];
	$tahun_pajak = $_GET['tahun_pajak'];
	
	$link=koneksi_db();
	$sql="delete from tagihan where nop='$nop' and tahun_pajak='$tahun_pajak'";

	$res=$link->query($sql);
	
	if(!$res){
		?><script>alert('<?php echo mysqli_error($link);?>');</script><?php
	} else {
		?><script>alert('Data tagihan berhasil dihapus');</script><?php
	}
	
	header("Location: ../admin/data-tagihan.php?nop=$nop");
?>