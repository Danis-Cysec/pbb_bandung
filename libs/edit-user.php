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
	$sql="update datauser set password='$password', nama_user='$nama_user', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jk='$jk', alamat='$alamat', rt_user='$rt_user', rw_user='$rw_user', email='$email' where ktp_user='$ktp_user'";

	$res=$link->query($sql);
	
	if(!$res){
		?><script>alert('<?php echo mysqli_error($link);?>');</script><?php
	} else {
		?><script>alert('Data berhasil diubah');</script><?php
	}
	
	header("Location: ../ubah-profil.php");
?>