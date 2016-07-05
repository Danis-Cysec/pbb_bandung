<?php
	include("koneksi.php");
	
	$ktp_user = $_POST['ktp_user'];
	$password = encryptIt($_POST['password']);
	$nama_user = $_POST['nama_user'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$jk = $_POST['jk'];
	$alamat = $_POST['alamat'];
	$rt_user = $_POST['rt_user'];
	$rw_user = $_POST['rw_user'];
	$email = $_POST['email'];
	
	$link=koneksi_db();
	$sql="insert into datauser values('$ktp_user', '$password', '$nama_user', '$tempat_lahir', '$tanggal_lahir', '$jk', '$alamat', '$rt_user', '$rw_user', '$email')";

	$res=$link->query($sql);
	
	if(!$res){
		?><script>alert('<?php echo mysqli_error($link);?>');</script><?php
	} else {
		?><script>alert('Berhasil mendaftar. Silakan login');</script><?php
	}
	
	header("Location: ../login.php");
?>