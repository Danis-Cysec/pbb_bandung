<?php
	session_start();
	error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Disyanjak Kota Bandung</title>
	
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
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

<body>
     <header id="header">
        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Beranda</a></li>
                        <li class="active"><a href="#">Tentang SIPP</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Portal Informasi Publik <i class="fa fa-angle-down" style="padding-left:8px;"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="cari-data-pbb.php">Pencarian Data PBB</a></li>
                                <li><a href="cek-tagihan.php">Cek Tagihan PBB</a></li>
                                <li><a href="cek-njop.php">Cek NJOP PBB</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pelayanan PBB Online<i class="fa fa-angle-down" style="padding-left:8px;"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="daftar-op.php">Pendaftaran Objek Pajak</a></li>
                                <li><a href="bayar-tagihan.php">Pembayaran Tagihan PBB</a></li>
                            </ul>
                        </li>
                        <?php
							if(($_SESSION['sudahlogin']==true)&&($_SESSION['ktp_user']!="")){
						?>
                        <li class=" dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['nama_user'];?><i class="fa"><img src="images/user.png" alt="" style="width:20px;height:20px;margin-left:15px; margin-bottom:4px;"></i></a>
                            <ul class="dropdown-menu">
                            	<li><a href="ubah-profil.php">Ubah Profil</a></li>
                                <li><a href="libs/logout-user.php">Logout</a></li>
                            </ul>
                        </li>
                        <?php } else {?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="daftar-user.php">Daftar</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->

    <section id="about-us">
        <div class="container">
			<div class="center wow fadeInDown">
				<h2>Tentang SIPP</h2>
				
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
                        <div class="box-content">
                            <div class="post-content">
                           		<div class="post-text"><hr>
									<p style="text-align: justify;">Ada 2 permasalahan utama yang dihadapi oleh Disyanjak dalam pelayanan publik khususnya pelayanan publik Pajak Bumi dan Bangunan (PBB). Permasalahan tersebut adalah:</p>
                                    <ol>
                                        <li style="text-align: justify;">Kebutuhan masyarakat terhadap ketersediaan dan kemudahan akses informasi dengan data-data PBB yang cepat, tepat dan akurat khususnya yang menyangkut informasi PBB.&nbsp;Dengan kemudahan akses terhadap informasi-informasi PBB, dapat berkorelasi terhadap penerimaan di sektor PBB, karena WP dapat dengan mudah mengetahui data tagihan PBB sehingga mempercepat proses pembayarannya, tanpa harus menunggu SPPT terlebih dahulu.</li>
                                        <li style="text-align: justify;">Jumlah WP yang datang langsung ke tempat pelayanan PBB Disyanjak untuk mendapatkan pelayanan PBB berdasarkan data tahun 2013, 2014 dan tahun 2015 adalah sebanyak 80.484 WP.&nbsp;Pelayanan PBB online yang diperlukan terutama terkait dengan kegiatan pendaftaran permohonan PBB secara online dan monitoring terhadap proses pelayanan tersebut.</li>
									</ol>
									<p style="text-align: justify;">Untuk menjawab tantangan tersebut, maka Dinas Pelayanan Pajak Kota Bandung mencoba melakukan inovasi dalam rangka peningkatan pelayanan publik, khususnya pelayanan PBB dengan membangun Sistem Informasi Pelayanan PBB .</p>
									<p style="text-align: justify;"><br />Sistem Informasi Pelayanan PBB merupakan portal layanan online yang dapat diakses oleh masyarakat untuk memperoleh pelayanan-pelayanan yang disediakan oleh Dinas Pelayanan Pajak Kota Bandung khususnya pelayanan PBB.</p>
									<p style="text-align: justify;"><br />Sistem Informasi Pelayanan PBB menyediakan 2 menu utama yaitu:</p>
									<ol>
                                        <li style="text-align: justify;">Portal Layanan Informasi PBB
                                            <p>Portal layanan informasi PBB ini dapat memberikan kemudahan akses informasi bagi WP dengan menyediakan data-data PBB yang cepat, tepat dan akurat.<br />
                                            Portal ini memiliki fitur-fitur sebagai berikut:</p>
                                            <ul>
                                                <li>Pencarian Data PBB</li>
                                                <li>Pengecekan Tagihan PBB</li>
                                                <li>Pengecekan NJOP PBB<br />&nbsp;</li>
                                            </ul>
                                        </li>
                                        <li style="text-align: justify;">Pelayanan PBB Online<br />&nbsp;
                                            <ul>
                                                <li style="text-align: justify;">Penerimaan Pelayanan Online ini diperuntukan bagi WP yang akan mendaftarkan permohonan PBB secara online, tanpa perlu datang ke kantor Disyanjak.</li>
                                                <li style="text-align: justify;">Pada menu ini juga WP diberikan fasilitas untuk memonitor dan memantau terhadap proses permohonannya.</li>
                                                <li style="text-align: justify;">Proses pendaftaran permohonan PBB secara online ini bisa dilakukan oleh WP kapanpun dan di manapun.</li>
                                            </ul>
										</li>
									</ol>
									<p style="text-align: justify;">&nbsp;</p>
									<p style="text-align: justify;">Pelayanan PBB Online ini memiliki fitur-fitur sebagai berikut:</p>
                                    <ul>
                                        <li style="text-align: justify;">Form Pendaftaran Akun Baru</li>
                                        <li style="text-align: justify;">Form Permohonan Pelayanan Online</li>
                                        <li style="text-align: justify;">Upload Dokumen</li>
                                        <li style="text-align: justify;">Monitoring Proses Permohonan</li>
                                        <li style="text-align: justify;">Monitoring Approval Permohonan</li>
                                        <li style="text-align: justify;">Dashboard Statistik</li>
                                    </ul>
									<p style="text-align: justify;">Sistem Informasi Pelayanan PBB akan menjadi sarana yang memudahkan Wajib Pajak (WP) PBB untuk mendapatkan akses informasi yang berkaitan dengan data-data PBB.<br />
		Dalam kontribusinya terhadap penerimaan dari sektor pajak, khususnya mata pajak PBB, Sistem Informasi Pelayanan PBB dapat menjadi salah satu faktor pendorong keberhasilan dalam pencapaian target, karena dengan adanya Sistem Informasi Pelayanan PBB, khususnya pada fitur pengecekan tagihan PBB, WP dapat langsung mengetahui jumlah tagihan PBB-nya termasuk piutang PBB di tahun-tahun sebelumnya, tanpa perlu datang ke tempat pelayanan PBB dan tanpa perlu menunggu SPPT. Hal tersebut berkorelasi terhadap kepatuhan WP dalam membayar PBB, karena semakin cepat WP mengetahui tagihan PBB-nya, maka akan semakin cepat pula WP tersebut malaksanakan kewajiban pembayaran PBB-nya.<br />
		Dalam hal peningkatan pelayanan publik, Sistem Informasi Pelayanan PBB telah memudahkan WP dalam mendapatkan pelayan kuhususnya pelayanan PBB. Sistem Informasi Pelayanan PBB telah mengakomodir 10 jenis pelayanan PBB, yaitu:&nbsp;</p>
                                    <ul>
                                        <li style="text-align: justify;">Pendaftaran Objek Pajak Baru</li>
                                        <li style="text-align: justify;">Mutasi</li>
                                        <li style="text-align: justify;">Pembetulan</li>
                                        <li style="text-align: justify;">Pembatalan</li>
                                        <li style="text-align: justify;">Salinan</li>
                                        <li style="text-align: justify;">Keberatan Atas Pajak Terhutang</li>
                                        <li style="text-align: justify;">Pengurangan atas Besarnya Pajak Terhutang</li>
                                        <li style="text-align: justify;">Pengurangan Denda Administrasi</li>
                                        <li style="text-align: justify;">Penentuan Kembali Tanggal Jatuh Tempo</li>
                                        <li style="text-align: justify;">Permohonan SK NJOP</li>
                                    </ul>
									<p style="text-align: justify;">&nbsp;</p>
									<p style="text-align: justify;"><strong>Output Dari Implementasi Sistem Informasi Pelayanan PBB </strong></p>
                                    <ul>
                                        <li style="text-align: justify;">Berdasarkan hasil wawancara langsung dengan masyarakat&nbsp;di beberapa event yang diadakan oleh Disyanjak Kota Bandung, didapati fakta bahwa banyak masyarakat&nbsp;yang tidak mengetahui Nomor Objek Pajak PBB nya, dengan adanya Sistem Informasi Pelayanan PBB ini,&nbsp;masyarakat merasa dimudahkan dalam mencari Nomor Objek Pajak PBB nya karena Sistem Informasi Pelayanan PBB menyediakan&nbsp;fitur menu pencarian Nomor Objek Pajak PBB&nbsp;berdasarkan nama WP dan/atau letak objek PBB.</li>
                                        <li style="text-align: justify;">Dengan tersedianya fitur pengecekan tagihan PBB yang ada pada Sistem Informasi Pelayanan PBB, masyarakat akan banyak yang sudah melakukan pembayaran PBB di triwulan I. Biasanya pembayaran PBB baru terasa signifikan setelah pendistribusian SPPT kepada WP, yaitu di triwulan II&nbsp;dan triwulan III. Hal ini terjadi karena WP tidak perlu lagi menunggu SPPT untuk mengetahui jumlah tagihan PBB-nya, cukup dengan mengakses Sistem Informasi Pelayanan PBB di manapun dan kapanpun, WP sudah bisa mengetahui tagihan PBB-nya, sehingga mendorong WP untuk membayar lebih cepat dari biasanya.</li>
                                        <li style="text-align: justify;">Dengan adanya Sistem Informasi Pelayanan PBB, jumlah WP yang biasanya datang ke tempat pelayanan PBB yang bahkan mencapai 30.000 WP per-tahun akan dapat tereduksi hampir 1/3nya. Karena dengan Sistem Informasi Pelayanan PBB, WP dapat mengajukan permohonan pelayanan PBB secara online kapanpun dan di manapun, dengan user interface yang dibuat bersahabat dengan user. Dan Sistem Informasi Pelayanan PBB juga membuat Dinas Pelayanan Pajak Kota Bandung dapat lebih banyak melayani permohonan pelayanan dari WP karena tidak terbatas oleh jam kerja.</li>
                                        <li style="text-align: justify;">Sistem Informasi Pelayanan PBB merupakan&nbsp;satu bentuk dukungan dalam rangka menyukseskan era keterbukaan dan transparansi data pemerintah.</li>
                                        <li style="text-align: justify;">Dengan dibangunnya Sistem Informasi Pelayanan PBB, dapat mendukung Pemerintah Kota Bandung dalam menyukseskan Kota Bandung &nbsp;menuju Bandung Kota Cerdas atau yang lebih dikenal sebagai&nbsp;&quot;Bandung Smart City&quot;.</li>
                                        <li style="text-align: justify;">Dengan adanya Sistem Informasi Pelayanan PBB,&nbsp;telah memotong jalur birokrasi pelayanan publik yang pada umumnya panjang dan rumit, menjadi konsep pelayanan publik yang mudah dan sederhana pada prosesnya.</li>
                                        <li style="text-align: justify;">Implementasi Sistem Informasi Pelayanan PBB mengurangi tatap muka antara Petugas Pajak dengan&nbsp;Wajib Pajak, hal ini dapat meminimalisir terjadinya praktik KKN di lingkungan Pemerintah Kota Bandung.</li>
                                    </ul>			
						</div>
							</div>
						</div>
					</div>
				</div>
			</div> 				
		</div>	<!--/.row-->
    </section><!--/about-us-->

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
    <script type="text/javascript">
        $('.carousel').carousel()
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>