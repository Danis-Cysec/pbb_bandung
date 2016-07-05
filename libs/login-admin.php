<?php
	include("koneksi.php");
	
	$nip=$_POST['nip'];
	$password=encryptIt($_POST['password']);
	
	$link=koneksi_db();
	$sql="select * from dataadmin where nip ='$nip' and password='$password'";
	$res=$link->query($sql);
	
	if(mysqli_num_rows($res)==1){ // jika nip dan pass benar
		$data=mysqli_fetch_array($res);
		session_start();
		$_SESSION['nip']=$data['nip'];
		$_SESSION['nama_admin']=$data['nama_admin'];
		$_SESSION['sudahloginadmin']=true;
		header("Location: ../admin/index.php");
	}
	else{
		header("Location: ../admin/login-gagal.php");
	}
?>