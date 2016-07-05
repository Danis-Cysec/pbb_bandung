<?php
	include("koneksi.php");
	
	$email=$_POST['email'];
	$password = encryptIt($_POST['password']);
	
	$link=koneksi_db();
	$sql="select * from datauser where email = '$email' and password = '$password'";
	$res=$link->query($sql);
	
	if(mysqli_num_rows($res)==1){ // jika email dan pass benar
		$data=mysqli_fetch_array($res);
		session_start();
		$_SESSION['ktp_user']=$data['ktp_user'];
		$_SESSION['nama_user']=$data['nama_user'];
		$_SESSION['sudahlogin']=true;
		header("Location: ../index.php");
	}
	else{
		header("Location: ../login-gagal.php");
	}
?>