<?php
	session_start();
	if(($_SESSION['sudahlogin']==true)&&($_SESSION['ktp_user']!="")){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		include("libs/koneksi.php");
	?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Disyanjak Kota Bandung</title>

	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/bdg.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/bdg.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/bdg.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/bdg.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/bdg.png">
    
</head><!--/head-->

<body class="homepage">

   <header id="header">

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Beranda</a></li>
                        <li><a href="tentang.php">Tentang SIPP</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Portal Informasi Publik <i class="fa fa-angle-down" style="padding-left:8px;"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="cari-data-pbb.php">Pencarian Data PBB</a></li>
                                <li><a href="cek-tagihan.php">Cek Tagihan PBB</a></li>
                                <li><a href="cek-njop.php">Cek NJOP PBB</a></li>
                            </ul>
                        </li>
                        <li class="active dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pelayanan PBB Online<i class="fa fa-angle-down" style="padding-left:8px;"></i></a>
                            <ul class="dropdown-menu">
                                <li class="active"><a href="#">Pendaftaran Objek Pajak</a></li>
                                <li><a href="bayar-tagihan.php">Pembayaran Tagihan PBB</a></li>
                            </ul>
                        </li>
                        <li class=" dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['nama_user'];?><i class="fa"><img src="images/user.png" alt="" style="width:20px;height:20px;margin-left:15px; margin-bottom:4px;"></i></a>
                            <ul class="dropdown-menu">
                            	<li><a href="ubah-profil.php">Ubah Profil</a></li>
                                <li><a href="libs/logout-user.php">Logout</a></li>
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
                <h2>Form Pendaftaran Objek Pajak Baru</h2>
                <p class="lead">Pajak Bumi dan Bangunan</p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form class="contact-form" method="post" action="libs/tambah-daftar-pengajuan.php">
                	<div class="col-sm-12"> 
                        <div class="col-sm-4">
                            <h2>Data Objek Pajak</h2><br>
                            <div class="form-group">
                                <label>Status Kepemilikan *</label><br>
                                <select name="status_kepemilikan" class="form-control" required>
                                    <option value="Pemilik">Pemilik</option>
                                    <option value="Penyewa">Penyewa</option>
                                    <option value="Pengelola">Pengelola</option>
                                    <option value="Pemakai">Pemakai</option>
                                    <option value="Sengketa">Sengketa</option>
                                </select> 	
                            </div>
                            <div class="form-group">
                                <label>Alamat Jalan *</label>
                                <input type="text" name="alamat_jalan_objek" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor / Blok / Kavling *</label>
                                <input type="text" name="alamat_nomor_objek" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Kelurahan *</label><br>
                                <select name="kelurahan_objek" class="form-control" required>
                                	<?php
										$link = koneksi_db();
										$sql = "select * from kelurahanbdg order by nama_kelurahan";
										$res = $link->query($sql);
										while($row = mysqli_fetch_array($res)) {
											echo "<option value=\"".$row['nama_kelurahan']."\">".$row['nama_kelurahan']." </option>";
										}
									?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>RW *</label>
                                <input type="text" name="rw_objek" class="form-control" required maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                            <div class="form-group">
                                <label>RT *</label>
                                <input type="text" name="rt_objek" class="form-control" required maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                            <div class="form-group">
                                <label>Luas Tanah (m<sup>2</sup>) *</label>
                                <input type="text" name="luas_tanah" class="form-control" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                            <div class="form-group">
                                <label>Jenis Tanah *</label><br>
                                <select name="jenis_tanah" class="form-control" required>
                                    <option value="Tanah + Bangunan">Tanah + Bangunan</option>
                                    <option value="Kavling Siap Bangun">Kavling Siap Bangun</option>
                                    <option value="Tanah Kosong">Tanah Kosong</option>
                                    <option value="Fasilitas Umum">Fasilitas Umum</option>
                                </select> 
                            </div>
                        </div>
                        <div class="col-sm-4">
                        	<h2>Rincian Data Bangunan</h2><br>
                            <div class="form-group">
                                <label>Guna Bangunan *</label><br>
                                <select name="guna_bangunan" class="form-control" required>
                                    <option value="Hotel / Wisma">Hotel / Wisma</option>
                                    <option value="Bengkel / Gudang / Pertanian">Bengkel / Gudang / Pertanian</option>
                                    <option value="Bangunan Parkir">Bangunan Parkir</option>
                                    <option value="Perumahan">Perumahan</option>
                                    <option value="Toko / Apotik / Pasar / Ruko">Toko / Apotik / Pasar / Ruko</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label>Luas Bangunan (m<sup>2</sup>) *</label>
                                <input type="text" name="luas_bangunan" class="form-control" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                            <div class="form-group">
                                <label>Jumlah Tingkat *</label>
                                <input type="text" name="jumlah_tingkat" class="form-control" maxlength="3" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                            <div class="form-group">
                                <label>Tahun Dibangun * (YYYY)</label>
                                <input type="text" name="tahun_dibangun" class="form-control" required maxlength="4" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                            <div class="form-group">
                                <label>Tahun Direnovasi * (YYYY)</label>
                                <input type="text" name="tahun_direnovasi" class="form-control" maxlength="4" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                            <div class="form-group">
                                <label>Daya Listrik (Watt)*</label>
                                <input type="text" name="daya_listrik" class="form-control" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                            <div class="form-group">
                                <label>Kondisi *</label><br>
                                <select name="kondisi" class="form-control" required>
                                    <option value="Sangat Baik">Sangat Baik</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Jelek">Jelek</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label>Konstruksi *</label><br>
                                <select name="konstruksi" class="form-control" required>
                                    <option value="Baja Decarbon">Baja Decarbon</option>
                                    <option value="Beton">Beton</option>
                                    <option value="Batu Bata">Batu Bata</option>
                                    <option value="Kayu">Kayu</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label>Atap *</label><br>
                                <select name="atap" class="form-control" required>
                                    <option value="Beton / Genteng Glazur">Beton / Genteng Glazur</option>
                                    <option value="Genteng Beton / Alumunium">Genteng Beton / Alumunium</option>
                                    <option value="Genteng Biasa / Sirap">Genteng Biasa / Sirap</option>
                                    <option value="Asbes">Asbes</option>
                                    <option value="Seng">Seng</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label>Dinding *</label><br>
                                <select name="dinding" class="form-control" required>
                                    <option value="Kaca / Alumunium">Kaca / Alumunium</option>
                                    <option value="Beton">Beton</option>
                                    <option value="Batu Bata / Conblok">Batu Bata / Conblok</option>
                                    <option value="Kayu">Kayu</option>
                                    <option value="Seng">Seng</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label>Lantai *</label><br>
                                <select name="lantai" class="form-control" required>
                                    <option value="Marmer">Marmer</option>
                                    <option value="Keramik">Keramik</option>
                                    <option value="Teraso">Teraso</option>
                                    <option value="Ubin PC / Papan">Ubin PC / Papan</option>
                                    <option value="Semen">Semen</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label>Langit-langit *</label><br>
                                <select name="langitlangit" class="form-control" required>
                                    <option value="Akustik / Jati">Akustik / Jati</option>
                                    <option value="Triplek / Asbes Bambu">Triplek / Asbes Bambu</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select> 
                            </div>       
                        </div>
                        <div class="col-sm-4">
                            <h2>Data Subjek Pajak</h2><br>
                            <div class="form-group">
                                <label>No KTP *</label>
                                <input type="text" name="ktp_subjek" class="form-control" required onKeyPress="return event.charCode >= 48 && event.charCode <= 57" maxlength="20"> 	
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan *</label><br>
                                <select name="pekerjaan" class="form-control" required>
                                    <option value="PNS">PNS</option>
                                    <option value="ABRI">ABRI</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Badan">Badan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap *</label>
                                <input type="name" name="nama_subjek" class="form-control" required onKeyPress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32">
                            </div>
                            <div class="form-group">
                                <label>NPWP *</label>
                                <input type="text" name="npwp" class="form-control" maxlength="15" required onKeyPress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                            <div class="form-group">
                                <label>Alamat Jalan *</label>
                                <input type="text" name="alamat_jalan_subjek" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor / Blok / Kavling *</label>
                                <input type="text" name="alamat_nomor_subjek" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Kelurahan *</label>
                                <input type="text" name="kelurahan_subjek" class="form-control" required onKeyPress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32">
                            </div>
                            <div class="form-group">
                                <label>RW *</label>
                                <input type="text" name="rw_subjek" class="form-control" maxlength="2" required onKeyPress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                            <div class="form-group">
                                <label>RT *</label>
                                <input type="text" name="rt_subjek" class="form-control" maxlength="2" required onKeyPress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                            <div class="form-group">
                                <label>Kota *</label>
                                <input type="text" name="kota" class="form-control" required onKeyPress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32">
                            </div>
                            <div class="form-group">
                                <label>Kode Pos *</label>
                                <input type="text" name="kode_pos" class="form-control" required maxlength="5" onKeyPress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>  
                        </div>
                    </div>
                    <div class="form-group" style="float:right;">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Daftar</button>
                    	<button type="Reset" name="Reset" class="btn btn-primary btn-lg" required="required">Reset</button>
                    </div> 
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

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>
<?php
	}
	else{
		header("Location: login.php");
	}
?>
