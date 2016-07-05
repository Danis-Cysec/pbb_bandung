<?php
	include("koneksi.php");
	
	$link=koneksi_db();
	
	$nop = $_POST['nop'];
	
	$sql = "select * from dataobjek o join datasubjek s on o.ktp_subjek = s.ktp_subjek where o.nop = '$nop'";
	$res=$link->query($sql);
	
	if(!$res){
		?><script>alert('<?php echo mysqli_error($link);?>');</script><?php
	}
	
	// get data objek dan subjek pajak
	if(mysqli_num_rows($res)==1){
		$data=mysqli_fetch_array($res);
		$nama_subjek = $data['nama_subjek'];
		$pokok = $data['njop_dasar'] * 0.001;
	}
	
	// kalkulasi jumlah bulan dan denda
	$tgl_jatuh_tempo = new DateTime($_POST['tgl_jatuh_tempo']);
	
	$tahun_pajak = $tgl_jatuh_tempo;
	
	$tgl_sekarang = new DateTime();
	$diff = $tgl_jatuh_tempo->diff($tgl_sekarang);
	$jumlah_bulan = $diff->format("%m");
	$jumlah_tahun = $diff->format("%y");
	$jumlah_bulan += ($jumlah_tahun * 24);
		
	$denda = 0.02 * $pokok * $jumlah_bulan;
	
	$jumlah_tagihan = $pokok + $denda;
	$status_kelunasan = "Belum Lunas";
	
	// tambah tagihan
	$sql="insert into tagihan values('$nop', '".$tahun_pajak->format('Y')."', 'null', '$nama_subjek', '$pokok', '$denda', '$jumlah_tagihan', '".$tgl_jatuh_tempo->format('Y-m-d')."', '$jumlah_bulan', '$status_kelunasan')";

	$res=$link->query($sql);
	
	if(!$res){
		?><script>alert('<?php echo mysqli_error($link);?>');</script><?php
	} else {
		?><script>alert('Berhasil menambah data tagihan');</script><?php
	}
	
	header("Location: ../admin/daftar-tagihan.php");
?>