<?php
	include("koneksi.php");
	$link = koneksi_db();
	
	$nip = $_POST["nip"];
	$sql = "select email from dataadmin where nip = '$nip'";
	$res=$link->query($sql);
	
	if(mysqli_num_rows($res)==1){ // jika nip dan pass benar
		$data=mysqli_fetch_array($res);
		$email = $data['email'];
	}
	
	$password = encryptIt('pbb12345');
	
	if(!empty($email)){
		$sql="update dataadmin set password='$password' where nip='$nip'";
		$res=$link->query($sql);
		
		if($res){
			$subject='Reset Password Akun Pelayanan PBB';
			$message='Kepada saudara diberitahukan bahwa password anda telah berhasil kami reset. Berikut adalah adalah password anda: "pbb12345". Segera perbarui password anda untuk keamanan akun. Terima kasih.';
			$headers = 'From: webmaster@disyanjak.com' . "\r\n" .
    'Reply-To: webmaster@disyanjak.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
			mail($email,$subject,$message,$headers);
			?><script>alert('Reset password Berhasil. Cek email');</script><?php
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../admin/index.php">';
		}else{
			?><script>alert('Reset password gagal');history.back();</script><?php
		}
	}else{
		?><script>alert('Email kosong');history.back()</script><?php
	}
?>