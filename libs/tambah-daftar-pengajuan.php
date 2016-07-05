<?php
	session_start();
	include("koneksi.php");
	$ktp_user=$_SESSION['ktp_user'];
	
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
	
	$ktp_subjek=$_POST['ktp_subjek'];
	$pekerjaan=$_POST['pekerjaan'];
	$nama_subjek=$_POST['nama_subjek'];
	$npwp=$_POST['npwp'];
	$alamat_jalan_subjek=$_POST['alamat_jalan_subjek'];
	$alamat_nomor_subjek=$_POST['alamat_nomor_subjek'];
	$kelurahan_subjek=$_POST['kelurahan_subjek'];
	$rw_subjek=$_POST['rw_objek'];
	$rt_subjek=$_POST['rt_subjek'];
	$kota=$_POST['kota'];
	$kode_pos=$_POST['kode_pos'];
	
	$status="Belum Disetujui";
	
	$link=koneksi_db();
	$sql="insert into daftarpengajuan values(null, '$ktp_user', '$status_kepemilikan', '$alamat_jalan_objek', '$alamat_nomor_objek', '$kelurahan_objek', '$rw_objek', '$rt_objek', '$luas_tanah', '$jenis_tanah', '$guna_bangunan', '$luas_bangunan', '$jumlah_tingkat', '$tahun_dibangun', '$tahun_direnovasi', '$daya_listrik', '$kondisi', '$konstruksi', '$atap', '$dinding', '$lantai', '$langitlangit', '$ktp_subjek', '$pekerjaan', '$nama_subjek', '$npwp', '$alamat_jalan_subjek', '$alamat_nomor_subjek', '$kelurahan_subjek', '$rw_subjek', '$rt_subjek', '$kota', '$kode_pos', '$status')";

	$res=$link->query($sql);
	
	if(!$res){
		?><script>alert('<?php echo mysqli_error($link);?>');</script><?php
	} else {
		?><script>alert('Berhasil menambah pengajuan');</script><?php
	}
	
	header("Location: ../index.php");
?>