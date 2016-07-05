<?php
	include("koneksi.php");
	
	$nip = $_POST['nip'];
	$password = encryptIt($_POST['password']);
	$nama_admin = $_POST['nama_admin'];
	
	$link=koneksi_db();
	$sql="insert into dataadmin values('$nip', '$password', '$nama_admin')";

	$res=$link->query($sql);
	
	if(!$res){
		?><script>alert('<?php echo mysqli_error($link);?>');</script><?php
	} else {
		?><script>alert('Berhasil menambah admin');</script><?php
	}
	
	header("Location: ../admin/daftar-admin.php");
?>