<?php
	session_start();
	include("koneksi.php");
	$link = koneksi_db();

	$ktp_subjek=$_POST['ktp_subjek'];
	$pekerjaan=$_POST['pekerjaan'];
	$nama_subjek=$_POST['nama_subjek'];
	$npwp=$_POST['npwp'];
	$alamat_jalan_subjek=$_POST['alamat_jalan_subjek'];
	$alamat_nomor_subjek=$_POST['alamat_nomor_subjek'];
	$kelurahan_subjek=$_POST['kelurahan_subjek'];
	$rw_subjek=$_POST['rw_subjek'];
	$rt_subjek=$_POST['rt_subjek'];
	$kota=$_POST['kota'];
	$kode_pos=$_POST['kode_pos'];
			
			
	// update data objek
	$sql="update datasubjek set pekerjaan='$pekerjaan', nama_subjek='$nama_subjek', npwp='$npwp', alamat_jalan_subjek='$alamat_jalan_subjek', alamat_nomor_subjek='$alamat_nomor_subjek', kelurahan_subjek='$kelurahan_subjek', rw_subjek='$rw_subjek', rt_subjek='$rt_subjek', kota='$kota', kode_pos='$kode_pos' where ktp_subjek='$ktp_subjek'";
		
	$res=$link->query($sql);
	
	if(!$res){
		?><script>alert('<?php echo mysqli_error($link);?>');</script><?php
	} else {
		?><script>alert('Data subjek pajak berhasil diubah');</script><?php
	}	

	header("Location: ../admin/daftar-subjek-pajak.php");
?>