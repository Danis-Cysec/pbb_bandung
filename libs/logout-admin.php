<?php
	session_start();
	unset($_SESSION['nama_admin'], $_SESSION['sudahloginadmin']);
	header("Location: ../admin/index.php");
?>