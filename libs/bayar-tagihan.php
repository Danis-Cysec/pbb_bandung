<?php
	session_start();
	include("koneksi.php");
	
	if($_FILES['bukti']['error']==0){
		$link = koneksi_db();
		$nop = $_POST['nop'];
		$tahun_pajak = $_POST['tahun_pajak'];
		$nama_bank = $_POST['nama_bank'];
		$no_rekening = $_POST['no_rekening'];
		$pemilik_rekening = $_POST['pemilik_rekening'];
		$tanggal_bayar = $_POST['tanggal_bayar'];
		$ktp_user=$_SESSION['ktp_user'];
		$filebukti = $_FILES['bukti']['name'];
		$bukti = "../images/uploads/".$filebukti;
		
		if(move_uploaded_file($_FILES['bukti']['tmp_name'],$bukti)==true) {
			$link = koneksi_db();
			$sql="insert into pembayaran values (null, '$nop', '$tahun_pajak', '$nama_bank', '$no_rekening', '$pemilik_rekening', '$tanggal_bayar', '$ktp_user', '$bukti')";
			
			$res=$link->query($sql);
			if(!$res){
				?><script>alert('<?php echo mysqli_error($link);?>');</script><?php
				
			}
		}
		?><script>alert('Data pembayaran berhasil disimpan');</script><?php
	}
	else
		?><script>alert('Gagal mengunggah gambar');</script><?php
		
	header("Location: ../bayar-tagihan.php");
?> 