<?php
	session_start();
	include("koneksi.php");
	$link = koneksi_db();

	$nop = $_POST['nop'];
	$ktp_user=$_POST['ktp_user'];
		
	$status_kepemilikan=$_POST['status_kepemilikan'];
	$alamat_jalan_objek=$_POST['alamat_jalan_objek'];
	$alamat_nomor_objek=$_POST['alamat_nomor_objek'];
	$kelurahan_objek=$_POST['kelurahan_objek'];
	$rw_objek=$_POST['rw_objek'];
	$rt_objek=$_POST['rt_objek'];
	$luas_tanah=$_POST['luas_tanah'];
	$jenis_tanah=$_POST['jenis_tanah'];
		
	$guna_bangunan=$_POST['guna_bangunan'];
	$luas_bangunan=$_POST['luas_bangunan'];
	$jumlah_tingkat=$_POST['jumlah_tingkat'];
	$tahun_dibangun=$_POST['tahun_dibangun'];
	$tahun_direnovasi=$_POST['tahun_direnovasi'];
	$daya_listrik=$_POST['daya_listrik'];
	$kondisi=$_POST['kondisi'];
	$konstruksi=$_POST['konstruksi'];
	$atap=$_POST['atap'];
	$dinding=$_POST['dinding'];
	$lantai=$_POST['lantai'];
	$langitlangit=$_POST['langitlangit'];
		
	$njop_bumi=$_POST['njop_bumi'];
	$njop_bangunan=$_POST['njop_bangunan'];
		
	$njop_dasar=($njop_bumi * $luas_tanah)+($njop_bangunan * $luas_bangunan);
		
			
	// update data objek
	$sql="update dataobjek set ktp_user='$ktp_user', status_kepemilikan='$status_kepemilikan', alamat_jalan_objek='$alamat_jalan_objek', alamat_nomor_objek='$alamat_nomor_objek', kelurahan_objek='$kelurahan_objek', rw_objek='$rw_objek', rt_objek='$rt_objek', luas_tanah='$luas_tanah', jenis_tanah='$jenis_tanah', njop_bumi='$njop_bumi', guna_bangunan='$guna_bangunan', luas_bangunan='$luas_bangunan', jumlah_tingkat='$jumlah_tingkat', tahun_dibangun='$tahun_dibangun', tahun_direnovasi='$tahun_direnovasi', daya_listrik='$daya_listrik', kondisi='$kondisi', konstruksi='$konstruksi', atap='$atap', dinding='$dinding', lantai ='$lantai', langitlangit='$langitlangit', njop_bangunan='$njop_bangunan', njop_dasar='$njop_dasar' where nop='$nop'";
		
	$res=$link->query($sql);
	
	if(!$res){
		?><script>alert('<?php echo mysqli_error($link);?>');</script><?php
	} else {
		?><script>alert('Data objek pajak berhasil diubah');</script><?php
	}	

	header("Location: ../admin/daftar-objek-pajak.php");
?>