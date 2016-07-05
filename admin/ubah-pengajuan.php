<?php
	session_start();
	error_reporting(0);
	if(($_SESSION['sudahloginadmin']==true)&&($_SESSION['nama_admin']!="")){
		$id_pengajuan = $_GET['id_pengajuan'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		include("../libs/koneksi.php");
	?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Disyanjak Kota Bandung</title>

	<!-- core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/ico/bdg.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/bdg.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/bdg.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/bdg.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/bdg.png">
    
</head><!--/head-->

<body class="homepage">

   <header id="header">

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Daftar Pengajuan</a></li>
                        <li><a href="daftar-pembayaran.php">Daftar Pembayaran</a></li>
                        <li><a href="daftar-objek-pajak.php">Objek Pajak</a></li>
                        <li><a href="daftar-subjek-pajak.php">Subjek Pajak</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tagihan<i class="fa fa-angle-down" style="padding-left:8px;"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="daftar-tagihan.php">Daftar Tagihan</a></li>
                                <li><a href="tambah-tagihan.php">Tambah Tagihan</a></li>
                            </ul>
                        </li>
                        <li class=" dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin<i class="fa fa-angle-down" style="padding-left:8px;"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="daftar-admin.php">Daftar Admin</a></li>
                                <li><a href="tambah-admin.php">Tambah Admin</a></li>
                            </ul>
                        </li>
                        <li class=" dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['nama_admin'];?><i class="fa"><img src="../images/user.png" alt="" style="width:20px;height:20px;margin-left:15px; margin-bottom:4px;"></i></a>
                            <ul class="dropdown-menu">
                            	<li><a href="ubah-admin.php?nip=<?php echo $_SESSION['nip'];?>">Ubah Profil</a></li>
                                <li><a href="../libs/logout-admin.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->

    <section id="contact-page">
        <div class="container" style="min-height:420px;">
            <div class="center">
            	<h2></h2> 
                <h2>Data Pengajuan Objek Pajak Baru</h2>
                <p class="lead">Pajak Bumi dan Bangunan</p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <?php
					$link = koneksi_db();
					$sql = "select * from daftarpengajuan where id_pengajuan = '$id_pengajuan'";
					$res = $link->query($sql);
					if(mysqli_num_rows($res)==1){
						$row=mysqli_fetch_array($res);
				?>
                <form class="contact-form" method="post" action="../libs/tambah-objek-subjek.php?id_pengajuan=<?php echo $id_pengajuan;?>">
                	<div class="col-sm-12"> 
                        <div class="col-sm-4">
                            <h2>Data Objek Pajak</h2><br>
                            <div class="form-group">
                                <label>N.O.P. *</label><br>
                                <input type="text" name="nop" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor KTP Pengaju *</label><br>
                                <input type="text" name="ktp_user" class="form-control" disabled onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $row['ktp_user'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Status Kepemilikan *</label><br>
                                <input type="name" name="status_kepemilikan" class="form-control" readonly required onKeyPress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32" value="<?php echo $row['status_kepemilikan'];?>">
                            </div>
                            <div class="form-group">
                                <label>Alamat Jalan *</label>
                                <input type="text" name="alamat_jalan_objek" class="form-control" readonly value="<?php echo $row['alamat_jalan_objek'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor / Blok / Kavling *</label>
                                <input type="text" name="alamat_nomor_objek" class="form-control" readonly value="<?php echo $row['alamat_nomor_objek'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Kelurahan *</label><br>
                                <input type="text" name="kelurahan_objek" class="form-control" readonly value="<?php echo $row['kelurahan_objek'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>RW *</label>
                                <input type="text" name="rw_objek" class="form-control" readonly value="<?php echo $row['rw_objek'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>RT *</label>
                                <input type="text" name="rt_objek" class="form-control" readonly value="<?php echo $row['rt_objek'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Luas Tanah (m<sup>2</sup>) *</label>
                                <input type="text" name="luas_tanah" class="form-control" readonly value="<?php echo $row['luas_tanah'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Tanah *</label><br>
                                <input type="text" name="jenis_tanah" class="form-control" readonly value="<?php echo $row['jenis_tanah'];?>" required> 
                            </div>
                            <div class="form-group">
                                <label>NJOP Bumi *</label>
                                <input type="text" name="njop_bumi" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                        	</div>
                        </div>
                        <div class="col-sm-4">
                        	<h2>Rincian Data Bangunan</h2><br>
                            <div class="form-group">
                                <label>Guna Bangunan *</label><br>
                                <input type="text" name="guna_bangunan" class="form-control" readonly value="<?php echo $row['guna_bangunan'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Luas Bangunan (m<sup>2</sup>) *</label>
                                <input type="text" name="luas_bangunan" class="form-control" readonly value="<?php echo $row['luas_bangunan'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Tingkat *</label>
                                <input type="text" name="jumlah_tingkat" class="form-control" readonly value="<?php echo $row['jumlah_tingkat'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Tahun Dibangun * (YYYY)</label>
                                <input type="text" name="tahun_dibangun" class="form-control" readonly value="<?php echo $row['tahun_dibangun'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Tahun Direnovasi * (YYYY)</label>
                                <input type="text" name="tahun_direnovasi" class="form-control" readonly value="<?php echo $row['tahun_direnovasi'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Daya Listrik (Watt)*</label>
                                <input type="text" name="daya_listrik" class="form-control" readonly value="<?php echo $row['daya_listrik'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Kondisi *</label><br>
                                <input type="text" name="kondisi" class="form-control" readonly value="<?php echo $row['kondisi'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Konstruksi *</label><br>
                                <input type="text" name="konstruksi" class="form-control" readonly value="<?php echo $row['konstruksi'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Atap *</label><br>
                                <input type="text" name="atap" class="form-control" readonly value="<?php echo $row['atap'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Dinding *</label><br>
                                <input type="text" name="dinding" class="form-control" readonly value="<?php echo $row['dinding'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Lantai *</label><br>
                                <input type="text" name="lantai" class="form-control" readonly value="<?php echo $row['lantai'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Langit-langit *</label><br>
                                <input type="text" name="langitlangit" class="form-control" readonly value="<?php echo $row['langitlangit'];?>" required> 
                            </div>
                            <div class="form-group">
                                <label>NJOP Bangunan *</label>
                                <input type="text" name="njop_bangunan" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                        	</div>    
                        </div>
                        <div class="col-sm-4">
                            <h2>Data Subjek Pajak</h2><br>
                            <div class="form-group">
                                <label>No KTP *</label>
                                <input type="text" name="ktp_subjek" class="form-control" readonly value="<?php echo $row['ktp_subjek'];?>" required> 	
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan *</label><br>
                                <input type="text" name="pekerjaan" class="form-control" readonly value="<?php echo $row['pekerjaan'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap *</label>
                                <input type="text" name="nama_subjek" class="form-control" readonly value="<?php echo $row['nama_subjek'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>NPWP *</label>
                                <input type="text" name="npwp" class="form-control" readonly value="<?php echo $row['npwp'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat Jalan *</label>
                                <input type="text" name="alamat_jalan_subjek" class="form-control" readonly value="<?php echo $row['alamat_jalan_subjek'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor / Blok / Kavling *</label>
                                <input type="text" name="alamat_nomor_subjek" class="form-control" readonly value="<?php echo $row['alamat_nomor_subjek'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Kelurahan *</label>
                                <input type="text" name="kelurahan_subjek" class="form-control" readonly value="<?php echo $row['kelurahan_subjek'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>RW *</label>
                                <input type="text" name="rw_subjek" class="form-control" readonly value="<?php echo $row['rw_subjek'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>RT *</label>
                                <input type="text" name="rt_subjek" class="form-control" readonly value="<?php echo $row['rt_subjek'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Kota *</label>
                                <input type="text" name="kota" class="form-control" readonly value="<?php echo $row['kota'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Kode Pos *</label>
                                <input type="text" name="kode_pos" class="form-control" readonly value="<?php echo $row['kode_pos'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Status Pesetujuan *</label>
                                <select name="status" class="form-control" required>
                                    <option value="Belum Disetujui" selected>Belum Disetujui</option>
                                    <option value="Disetujui">Disetujui</option>
                                    <option value="Tidak Disetujui">Tidak Disetujui</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="float:right;">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg">Simpan</button>
                    	<a href="javascript:history.back()"><button type="button" name="cancel" class="btn btn-primary btn-lg">Batal</button></a>
                    </div>
                    <?php } ?>
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div align="center">
                    &copy; 2016 <a target="_blank">Pajak Bumi Bangunan</a>.
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/jquery.isotope.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/wow.min.js"></script>
</body>
</html>
<?php
	}
	else{
		header("Location: login.php");
	}
?>
