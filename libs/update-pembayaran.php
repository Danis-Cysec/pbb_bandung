<?php
	session_start();
	include("koneksi.php");
	$id_pembayaran = $_GET['id_pembayaran'];
	
	// update pembayaran
	$link=koneksi_db();
	$sqlupdate="update pembayaran set status='Diterima' where id_pembayaran='$id_pembayaran'";
	$res=$link->query($sqlupdate);
	
	if(!$res){
		?><script>alert('<?php echo mysqli_error($link);?>');</script><?php
	}
	
	//update tagihan
	$nop = $_POST['nop'];
	$tahun_pajak = $_POST['tahun_pajak'];
	$sqlupdate="update tagihan set status_kelunasan='Lunas', id_pembayaran='$id_pembayaran' where nop='$nop' and tahun_pajak='$tahun_pajak'";
	$res=$link->query($sqlupdate);
	
	if(!$res){
		?><script>alert('<?php echo mysqli_error($link);?>');</script><?php
	} else {
		?><script>alert('Pembayaran telah diterima');</script><?php
	}

	header("Location: ../admin/daftar-pembayaran.php");
?>