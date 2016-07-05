<?php
	include("koneksi.php");
	
	$link=koneksi_db();
	
	$nop = $_GET['nop'];
	
	$sql = "select * from tagihan where nop = '$nop' order by tahun_pajak desc";
	$res=$link->query($sql);
	if(!$res){
		?><script>alert('<?php echo mysqli_error($link);?>');</script><?php
	}
	
	while($row = mysqli_fetch_array($res)){
		if ($row['status_kelunasan'] == "Belum Lunas") {;
			// get data dari database
			$tahun_pajak = $row['tahun_pajak'];
			$pokok = $row['pokok'];
			$tgl_jatuh_tempo = new DateTime($row['tgl_jatuh_tempo']);
			
			// kalkulasi tanggal untuk hitung denda dan jumlah bulan
			$tgl_sekarang = new DateTime();
			$diff = $tgl_jatuh_tempo->diff($tgl_sekarang);
			$jumlah_bulan = $diff->format("%m");
			$jumlah_tahun = $diff->format("%y");
			$jumlah_bulan += ($jumlah_tahun * 24);
			$denda = 0.02 * $pokok * $jumlah_bulan;
			$jumlah_tagihan = $pokok + $denda;
			
			$sqlupdate = "update tagihan set denda='$denda', jumlah_tagihan='$jumlah_tagihan', jumlah_bulan='$jumlah_bulan' where nop='$nop' and tahun_pajak='$tahun_pajak'";
			$res=$link->query($sqlupdate);
			if(!$res){
				?><script>alert('<?php echo mysqli_error($link);?>');</script><?php
			}
		}
	}
	
	header("Location: ../admin/data-tagihan.php?nop=".$nop."");
?>