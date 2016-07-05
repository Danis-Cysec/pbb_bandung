<?php
	session_start();
	unset($_SESSION['ktp_user'],$_SESSION['nama_user'],$_SESSION['sudahlogin']);
	header("Location: ../index.php");
?>