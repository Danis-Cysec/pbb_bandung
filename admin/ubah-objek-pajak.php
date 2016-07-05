<?php
	session_start();
	error_reporting(0);
	if(($_SESSION['sudahloginadmin']==true)&&($_SESSION['nama_admin']!="")){
		$nop = $_GET['nop'];
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
                        <li><a href="index.php">Daftar Pengajuan</a></li>
                        <li><a href="daftar-pembayaran.php">Daftar Pembayaran</a></li>
                        <li class="active"><a href="daftar-objek-pajak.php">Objek Pajak</a></li>
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
                <h2>Ubah Data Objek Pajak</h2>
                <p class="lead">Pajak Bumi dan Bangunan</p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <?php
					$link = koneksi_db();
					$sql = "select * from dataobjek o join datasubjek s on o.ktp_subjek = s.ktp_subjek where o.nop = '$nop'";
					$res = $link->query($sql);
					if(mysqli_num_rows($res)==1){
						$data=mysqli_fetch_array($res);
				?>
                <form class="contact-form" method="post" action="../libs/edit-objek-pajak.php">
                	<div class="col-sm-12"> 
                        <div class="col-sm-4">
                            <h2>Data Objek Pajak</h2><br>
                            <div class="form-group">
                                <label>N.O.P. *</label><br>
                                <input type="text" name="nop" class="form-control" readonly onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $data['nop'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor KTP Pengaju *</label><br>
                                <input type="text" name="ktp_user" class="form-control" readonly onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $data['ktp_user'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Status Kepemilikan *</label><br>
                                <select name="status_kepemilikan" class="form-control" value="<?php echo $data['status_kepemilikan'];?>" required>
                                    <option value="Pemilik" <?php if($data['status_kepemilikan'] == "Pemilik"){ echo "selected"; }?>>Pemilik</option>
                                    <option value="Penyewa" <?php if($data['status_kepemilikan'] == "Penyewa"){ echo "selected"; }?>>Penyewa</option>
                                    <option value="Pengelola" <?php if($data['status_kepemilikan'] == "Pengelola"){ echo "selected"; }?>>Pengelola</option>
                                    <option value="Pemakai" <?php if($data['status_kepemilikan'] == "Pemakai"){ echo "selected"; }?>>Pemakai</option>
                                    <option value="Sengketa" <?php if($data['status_kepemilikan'] == "Sengketa"){ echo "selected"; }?>>Sengketa</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat Jalan *</label>
                                <input type="text" name="alamat_jalan_objek" class="form-control" value="<?php echo $data['alamat_jalan_objek'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor / Blok / Kavling *</label>
                                <input type="text" name="alamat_nomor_objek" class="form-control" value="<?php echo $data['alamat_nomor_objek'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Kelurahan *</label><br>
                                <select name="kelurahan_objek" class="form-control" value="<?php echo $data['kelurahan_objek'];?>" required>
                                	<?php
										$link = koneksi_db();
										$sql = "select * from kelurahanbdg order by nama_kelurahan";
										$res = $link->query($sql);
										while($row = mysqli_fetch_array($res)) {
											if ($data['kelurahan_objek'] == $row['nama_kelurahan']){
												$selected = "selected";
											} else {
												$selected = "";
											}
											echo "<option value=\"".$row['nama_kelurahan']."\" ".$selected.">".$row['nama_kelurahan']." </option>";
										}
									?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>RW *</label>
                                <input type="text" name="rw_objek" class="form-control" value="<?php echo $data['rw_objek'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>RT *</label>
                                <input type="text" name="rt_objek" class="form-control" value="<?php echo $data['rt_objek'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Luas Tanah (m<sup>2</sup>) *</label>
                                <input type="text" name="luas_tanah" class="form-control" value="<?php echo $data['luas_tanah'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Tanah *</label><br>
                                <select name="jenis_tanah" class="form-control" required>
                                    <option value="Tanah + Bangunan" <?php if($data['jenis_tanah'] == "Tanah + Bangunan"){ echo "selected"; }?>>Tanah + Bangunan</option>
                                    <option value="Kavling Siap Bangun" <?php if($data['jenis_tanah'] == "Kavling Siap Bangun"){ echo "selected"; }?>>Kavling Siap Bangun</option>
                                    <option value="Tanah Kosong" <?php if($data['jenis_tanah'] == "Tanah Kosong"){ echo "selected"; }?>>Tanah Kosong</option>
                                    <option value="Fasilitas Umum" <?php if($data['jenis_tanah'] == "Fasilitas Umum"){ echo "selected"; }?>>Fasilitas Umum</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>NJOP Bumi *</label>
                                <input type="text" name="njop_bumi" class="form-control" value="<?php echo $data['njop_bumi'];?>" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                        	<h2>Rincian Data Bangunan</h2><br>
                            <div class="form-group">
                                <label>Guna Bangunan *</label><br>
                                <select name="guna_bangunan" class="form-control" required>
                                    <option value="Hotel / Wisma" <?php if($data['guna_bangunan'] == "Hotel / Wisma"){ echo "selected"; }?>>Hotel / Wisma</option>
                                    <option value="Bengkel / Gudang / Pertanian" <?php if($data['guna_bangunan'] == "Bengkel / Gudang / Pertanian"){ echo "selected"; }?>>Bengkel / Gudang / Pertanian</option>
                                    <option value="Bangunan Parkir" <?php if($data['guna_bangunan'] == "Bangunan Parkir"){ echo "selected"; }?>>Bangunan Parkir</option>
                                    <option value="Perumahan" <?php if($data['guna_bangunan'] == "Perumahan"){ echo "selected"; }?>>Perumahan</option>
                                    <option value="Toko / Apotik / Pasar / Ruko" <?php if($data['guna_bangunan'] == "Toko / Apotik / Pasar / Ruko"){ echo "selected"; }?>>Toko / Apotik / Pasar / Ruko</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Luas Bangunan (m<sup>2</sup>) *</label>
                                <input type="text" name="luas_bangunan" class="form-control" value="<?php echo $data['luas_bangunan'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Tingkat *</label>
                                <input type="text" name="jumlah_tingkat" class="form-control" value="<?php echo $data['jumlah_tingkat'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Tahun Dibangun * (YYYY)</label>
                                <input type="text" name="tahun_dibangun" class="form-control" value="<?php echo $data['tahun_dibangun'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Tahun Direnovasi * (YYYY)</label>
                                <input type="text" name="tahun_direnovasi" class="form-control" value="<?php echo $data['tahun_direnovasi'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Daya Listrik (Watt)*</label>
                                <input type="text" name="daya_listrik" class="form-control" value="<?php echo $data['daya_listrik'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Kondisi *</label><br>
                                <select name="kondisi" class="form-control" required>
                                    <option value="Sangat Baik" <?php if($data['kondisi'] == "Sangat Baik"){ echo "selected"; }?>>Sangat Baik</option>
                                    <option value="Baik" <?php if($data['kondisi'] == "Baik"){ echo "selected"; }?>>Baik</option>
                                    <option value="Sedang" <?php if($data['kondisi'] == "Sedang"){ echo "selected"; }?>>Sedang</option>
                                    <option value="Jelek" <?php if($data['kondisi'] == "Jelek"){ echo "selected"; }?>>Jelek</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label>Konstruksi *</label><br>
                                <select name="konstruksi" class="form-control" required>
                                    <option value="Baja Decarbon" <?php if($data['konstruksi'] == "Baja Decarbon"){ echo "selected"; }?>>Baja Decarbon</option>
                                    <option value="Beton" <?php if($data['konstruksi'] == "Beton"){ echo "selected"; }?>>Beton</option>
                                    <option value="Batu Bata" <?php if($data['konstruksi'] == "Batu Bata"){ echo "selected"; }?>>Batu Bata</option>
                                    <option value="Kayu" <?php if($data['konstruksi'] == "Kayu"){ echo "selected"; }?>>Kayu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Atap *</label><br>
                                <select name="atap" class="form-control" required>
                                    <option value="Beton / Genteng Glazur" <?php if($data['atap'] == "Beton / Genteng Glazur"){ echo "selected"; }?>>Beton / Genteng Glazur</option>
                                    <option value="Genteng Beton / Alumunium" <?php if($data['atap'] == "Genteng Beton / Alumunium"){ echo "selected"; }?>>Genteng Beton / Alumunium</option>
                                    <option value="Genteng Biasa / Sirap" <?php if($data['atap'] == "Genteng Biasa / Sirap"){ echo "selected"; }?>>Genteng Biasa / Sirap</option>
                                    <option value="Asbes" <?php if($data['atap'] == "Asbes"){ echo "selected"; }?>>Asbes</option>
                                    <option value="Seng" <?php if($data['atap'] == "Seng"){ echo "selected"; }?>>Seng</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Dinding *</label><br>
                                <select name="dinding" class="form-control" required>
                                    <option value="Kaca / Alumunium" <?php if($data['dinding'] == "Kaca / Alumunium"){ echo "selected"; }?>>Kaca / Alumunium</option>
                                    <option value="Beton" <?php if($data['dinding'] == "Beton"){ echo "selected"; }?>>Beton</option>
                                    <option value="Batu Bata / Conblok" <?php if($data['dinding'] == "Batu Bata / Conblok"){ echo "selected"; }?>>Batu Bata / Conblok</option>
                                    <option value="Kayu" <?php if($data['dinding'] == "Kayu"){ echo "selected"; }?>>Kayu</option>
                                    <option value="Seng" <?php if($data['dinding'] == "Seng"){ echo "selected"; }?>>Seng</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Lantai *</label><br>
                                <select name="lantai" class="form-control" required>
                                    <option value="Marmer" <?php if($data['lantai'] == "Marmer"){ echo "selected"; }?>>Marmer</option>
                                    <option value="Keramik" <?php if($data['lantai'] == "Keramik"){ echo "selected"; }?>>Keramik</option>
                                    <option value="Teraso" <?php if($data['lantai'] == "Teraso"){ echo "selected"; }?>>Teraso</option>
                                    <option value="Ubin PC / Papan" <?php if($data['lantai'] == "Ubin PC / Papan"){ echo "selected"; }?>>Ubin PC / Papan</option>
                                    <option value="Semen" <?php if($data['lantai'] == "Semen"){ echo "selected"; }?>>Semen</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Langit-langit *</label><br>
                                <select name="langitlangit" class="form-control" required>
                                    <option value="Akustik / Jati" <?php if($data['langitlangit'] == "Akustik / Jati"){ echo "selected"; }?>>Akustik / Jati</option>
                                    <option value="Triplek / Asbes Bambu" <?php if($data['langitlangit'] == "Triplek / Asbes Bambu"){ echo "selected"; }?>>Triplek / Asbes Bambu</option>
                                    <option value="Tidak Ada" <?php if($data['langitlangit'] == "Tidak Ada"){ echo "selected"; }?>>Tidak Ada</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label>NJOP Bangunan *</label>
                                <input type="text" name="njop_bangunan" class="form-control" value="<?php echo $data['njop_bangunan'];?>" required>
                            </div>     
                        </div>
                        <div class="col-sm-4">
                            <h2>Data Subjek Pajak</h2><br>
                            <div class="form-group">
                                <label>No KTP *</label>
                                <input type="text" name="ktp_subjek" class="form-control" readonly required onKeyPress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $data['ktp_subjek'];?>"> 	
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan *</label><br>
                                <input type="name" name="pekerjaan" class="form-control" readonly required onKeyPress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32" value="<?php echo $data['pekerjaan'];?>">
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap *</label>
                                <input type="name" name="nama_subjek" class="form-control" readonly required onKeyPress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32" value="<?php echo $data['nama_subjek'];?>">
                            </div>
                            <div class="form-group">
                                <label>NPWP *</label>
                                <input type="text" name="npwp" class="form-control" maxlength="15" readonly required onKeyPress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $data['npwp'];?>">
                            </div>
                            <div class="form-group">
                                <label>Alamat Jalan *</label>
                                <input type="text" name="alamat_jalan_subjek" class="form-control" readonly required value="<?php echo $data['alamat_jalan_subjek'];?>">
                            </div>
                            <div class="form-group">
                                <label>Nomor / Blok / Kavling *</label>
                                <input type="text" name="alamat_nomor_subjek" class="form-control" readonly required value="<?php echo $data['alamat_nomor_subjek'];?>">
                            </div>
                            <div class="form-group">
                                <label>Kelurahan *</label>
                                <input type="text" name="kelurahan_subjek" class="form-control" readonly required onKeyPress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32" value="<?php echo $data['kelurahan_subjek'];?>">
                            </div>
                            <div class="form-group">
                                <label>RW *</label>
                                <input type="text" name="rw_subjek" class="form-control" maxlength="2" readonly required onKeyPress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $data['rw_subjek'];?>">
                            </div>
                            <div class="form-group">
                                <label>RT *</label>
                                <input type="text" name="rt_subjek" class="form-control" maxlength="2" readonly required onKeyPress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $data['rt_subjek'];?>">
                            </div>
                            <div class="form-group">
                                <label>Kota *</label>
                                <input type="text" name="kota" class="form-control" readonly required onKeyPress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32" value="<?php echo $data['kota'];?>">
                            </div>
                            <div class="form-group">
                                <label>Kode Pos *</label>
                                <input type="text" name="kode_pos" class="form-control" readonly required maxlength="5" onKeyPress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $data['kode_pos'];?>">
                            </div>  
                        </div>
                    </div>
                    <div class="form-group" style="float:right;">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Ubah</button>
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
