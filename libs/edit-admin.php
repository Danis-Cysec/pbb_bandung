<?php
	include("koneksi.php");
	
	$nip = $_POST['nip'];
	$password = encryptIt($_POST['password']);
	$nama_admin = $_POST['nama_admin'];
	
	$link=koneksi_db();
	$sql="update dataadmin set password='$password', nama_admin='$nama_admin' where nip='$nip'";

	$res=$link->query($sql);
	
	if(!$res){
		?><script>alert('<?php echo mysqli_error($link);?>');</script><?php
	} else {
		?><script>alert('Data admin berhasil diubah');</script><?php
	}
	
	header("Location: ../admin/daftar-admin.php");
?>