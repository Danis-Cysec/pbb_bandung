<?php
	session_start();
	if(($_SESSION['sudahlogin']==true)&&($_SESSION['ktp_user']!="")){
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
    <link href="css/font-awesome.min.css" rel="sstylesheet">
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
                                <li><a href="daftar-op.php">Pendaftaran Objek Pajak</a></li>
                                <li class="active"><a href="#">Pembayaran Tagihan PBB</a></li>
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
                <h2>Pembayaran Tagihan</h2>
                <p class="lead">Pajak Bumi dan Bangunan</p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form class="contact-form" name="contact-form" method="post" action="libs/bayar-tagihan.php" enctype="multipart/form-data">
                	<div class="col-sm-12">
                        <div class="col-sm-4 col-sm-offset-2">
                            <div class="form-group">
                                <label>Nomor Objek Pajak *</label>
                                <input type="text" name="nop" class="form-control left" required="required" maxlength="18" onKeyPress="return event.charCode >= 48 && event.charCode <= 57"> 
                            </div>
                            <div class="form-group">
                                <label>Tahun Tagihan Objek Pajak *</label>
                                <input type="text" name="tahun_pajak" class="form-control left" required="required" maxlength="4" onKeyPress="return event.charCode >= 48 && event.charCode <= 57"> 
                            </div>           
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Nama Bank *</label>
                                <select name="nama_bank" class="form-control left" required Placeholder="Pilih Bank">
                                <optgroup label="">
                                	<option value="" disabled selected>Pilih Bank</option>
                                </optgroup>
                                <optgroup label="">
                                	<option value="Bank CIMB Niaga">Bank CIMB Niaga</option>
                                    <option value="Bank Central Asia (BCA)">Bank Central Asia (BCA)</option>
                                    <option value="Bank Mandiri">Bank Mandiri</option>
                                    <option value="Bank Negara Indonesia (BNI)">Bank Negara Indonesia (BNI)</option>
                                    <option value="Bank Rakyat Indonesia (BRI)">Bank Rakyat Indonesia (BRI)</option>
                                </optgroup>
                                <optgroup label="">
                                	<option value="Anglomas International Bank">Anglomas International Bank</option>
                                    <option value="BCA Syariah">BCA Syariah</option>
                                    <option value="BII Syariah">BII Syariah</option>
                                    <option value="Bangkok Bank">Bangkok Bank</option>
                                    <option value="Bank ANZ Indonesia">Bank ANZ Indonesia</option>
                                    <option value="Bank Agris">Bank Agris</option>
                                    <option value="Bank Agroniaga">Bank Agroniaga</option>
                                    <option value="Bank Andara">Bank Andara</option>
                                    <option value="Bank Artha Graha International">Bank Artha Graha International</option>
                                    <option value="Bank Artos Indonesia">Bank Artos Indonesia</option>
                                    <option value="Bank BJB (Bandung)">Bank BJB (Bandung)</option>
                                    <option value="Bank BJB Syariah">Bank BJB Syariah</option>
                                    <option value="Bank BNI Syariah">Bank BNI Syariah</option>
                                    <option value="Bank BNP Paribas Indonesia">Bank BNP Paribas Indonesia</option>
                                    <option value="Bank BPD Aceh (Banda Aceh)">Bank BPD Aceh (Banda Aceh)</option>
                                    <option value="Bank BPD Aceh Syariah">Bank BPD Aceh Syariah</option>
                                    <option value="Bank BPD Bali (Denpasar)">Bank BPD Bali (Denpasar)</option>
                                    <option value="Bank BPD DIY (Yogyakarta)">Bank BPD DIY (Yogyakarta)</option>
                                    <option value="Bank BRI Syariah">Bank BRI Syariah</option>
                                    <option value="Bank BTN Syariah">Bank BTN Syariah</option>
                                    <option value="Bank Bengkulu (Bengkulu)">Bank Bengkulu (Bengkulu)</option>
                                    <option value="Bank Bisnis Internasional">Bank Bisnis Internasional</option>
                                    <option value="Bank Bukopin">Bank Bukopin</option>
                                    <option value="Bank Bumi Arta">Bank Bumi Arta</option>
                                    <option value="Bank Capital Indonesia">Bank Capital Indonesia</option>
                                    <option value="Bank Capital Indonesia">Bank Capital Indonesia</option>
                                    <option value="Bank Chinatrust Indonesia">Bank Chinatrust Indonesia</option>
                                    <option value="Bank Commonwealth">Bank Commonwealth</option>
                                    <option value="Bank DBS Indonesia">Bank DBS Indonesia</option>
                                    <option value="Bank DKI (Jakarta)">Bank DKI (Jakarta)</option>
                                    <option value="Bank DKI Syariah">Bank DKI Syariah</option>
                                    <option value="Bank Danamon Indonesia">Bank Danamon Indonesia</option>
                                    <option value="Bank Danamon Syariah">Bank Danamon Syariah</option>
                                    <option value="Bank Dipo International">Bank Dipo International</option>
                                    <option value="Bank Ekonomi Raharja">Bank Ekonomi Raharja</option>
                                    <option value="Bank Fama International">Bank Fama International</option>
                                    <option value="Bank Ganesha">Bank Ganesha</option>
                                    <option value="Bank Hana">Bank Hana</option>
                                    <option value="Bank Harda International">Bank Harda International</option>
                                    <option value="Bank ICB Bumiputra">Bank ICB Bumiputra</option>
                                    <option value="Bank ICBC Indonesia">Bank ICBC Indonesia</option>
                                    <option value="Bank Ina Perdana">Bank Ina Perdana</option>
                                    <option value="Bank Index Selindo">Bank Index Selindo</option>
                                    <option value="Bank International Indonesia (BII)">Bank International Indonesia (BII)</option>
                                    <option value="Bank J Trust Indonesia">Bank J Trust Indonesia</option>
                                    <option value="Bank Jambi (Jambi)">Bank Jambi (Jambi)</option>
                                    <option value="Bank Jasa Jakarta">Bank Jasa Jakarta</option>
                                    <option value="Bank Jateng (Semarang)">Bank Jateng (Semarang)</option>
                                    <option value="Bank Jatim (Surabaya)">Bank Jatim (Surabaya)</option>
                                    <option value="Bank KEB Indonesia">Bank KEB Indonesia</option>
                                    <option value="Bank Kalbar (Pontianak)">Bank Kalbar (Pontianak)</option>
                                    <option value="Bank Kalbar Syariah">Bank Kalbar Syariah</option>
                                    <option value="Bank Kalsel (Banjarmasin)">Bank Kalsel (Banjarmasin)</option>

									<option value="Bank Kalsel Syariah">Bank Kalsel Syariah</option>
                                    <option value="Bank Kalteng (Palangka Raya)">Bank Kalteng (Palangka Raya)</option>
                                    <option value="Bank Kaltim (Samarinda)">Bank Kaltim (Samarinda)</option>
                                    <option value="Bank Kesejahteraan Ekonomi">Bank Kesejahteraan Ekonomi</option>
                                    <option value="Bank Lampung (Bandar Lampung)">Bank Lampung (Bandar Lampung)</option>
                                    <option value="Bank Liman International">Bank Liman International</option>
                                    <option value="Bank Maluku (Ambon)">Bank Maluku (Ambon)</option>
                                    <option value="Bank Maspion">Bank Maspion</option>
                                    <option value="Bank Mayapada">Bank Mayapada</option>
                                    <option value="Bank Maybank Indonesia">Bank Maybank Indonesia</option>
                                    <option value="Bank Maybank Syariah Indonesia">Bank Maybank Syariah Indonesia</option>
                                    <option value="Bank Mayora">Bank Mayora</option>
                                    <option value="Bank Mega">Bank Mega</option>
                                    <option value="Bank Mega Syariah">Bank Mega Syariah</option>
                                    <option value="Bank Mestika Dharma">Bank Mestika Dharma</option>
                                    <option value="Bank Metro Express">Bank Metro Express</option>
                                    <option value="Bank Mitraniaga">Bank Mitraniaga</option>
                                    <option value="Bank Mizuho Indonesia">Bank Mizuho Indonesia</option>
                                    <option value="Bank Muamalat Indonesia">Bank Muamalat Indonesia</option>
                                    <option value="Bank Multi Arta Sentosa">Bank Multi Arta Sentosa</option>
                                    <option value="Bank NTB (Mataram)">Bank NTB (Mataram)</option>
                                    <option value="Bank NTB Syariah">Bank NTB Syariah</option>
                                    <option value="Bank NTT (Kupang)">Bank NTT (Kupang)</option>
                                    <option value="Bank Nagari (Padang)">Bank Nagari (Padang)</option>
                                    <option value="Bank Nationalnobu">Bank Nationalnobu</option>
                                    <option value="Bank Nusantara Parahayangan">Bank Nusantara Parahayangan</option>
                                    <option value="Bank OCBC NISP">Bank OCBC NISP</option>
                                    <option value="Bank Papua (Jayapura)">Bank Papua (Jayapura)</option>
                                    <option value="Bank Perkreditan Rakyat (BPR KS)">Bank Perkreditan Rakyat (BPR KS)</option>
                                    <option value="Bank Permata">Bank Permata</option>
                                    <option value="Bank Permata Syariah">Bank Permata Syariah</option>
                                    <option value="Bank Pundi Indonesia">Bank Pundi Indonesia</option>
                                    <option value="Bank QNB Kesawan">Bank QNB Kesawan</option>
                                    <option value="Bank Rabobank International Indonesia">Bank Rabobank International Indonesia</option>
                                    <option value="Bank Resona Perdania">Bank Resona Perdania</option>
                                    <option value="Bank Riau Kepri (Pekanbaru)">Bank Riau Kepri (Pekanbaru)</option>
                                    <option value="Bank Riau Kepri Syariah">Bank Riau Kepri Syariah</option>
                                    <option value="Bank Royal Indonesia">Bank Royal Indonesia</option>
                                    <option value="Bank SBI Indonesia">Bank SBI Indonesia</option>
                                    <option value="Bank Sahabat Purba Danarta">Bank Sahabat Purba Danarta</option>
                                    <option value="Bank Sinar Harapan Bali">Bank Sinar Harapan Bali</option>
                                    <option value="Bank Sinarmas">Bank Sinarmas</option>
                                    <option value="Bank Sulsel (Makassar)">Bank Sulsel (Makassar)</option>
                                    <option value="Bank Sulteng (Palu)">Bank Sulteng (Palu)</option>
                                    <option value="Bank Sultra (Kendari)">Bank Sultra (Kendari)</option>
                                    <option value="Bank Sulut (Manado)">Bank Sulut (Manado)</option>
                                    <option value="Bank Sumitomo Mitsui Indonesia">Bank Sumitomo Mitsui Indonesia</option>
                                    <option value="Bank Sumsel Babel (Palembang)">Bank Sumsel Babel (Palembang)</option>
                                    <option value="Bank Sumsel Babel Syariah">Bank Sumsel Babel Syariah</option>
                                    <option value="Bank Sumut (Medan)">Bank Sumut (Medan)</option>
                                    <option value="Bank Sumut Syariah">Bank Sumut Syariah</option>
                                    <option value="Bank Syariah Bukopin">Bank Syariah Bukopin</option>
                                    <option value="Bank Syariah Mandiri">Bank Syariah Mandiri</option>
                                    <option value="Bank Tabungan Negara (BTN)">Bank Tabungan Negara (BTN)</option>
                                    <option value="Bank Tabungan Pensiunan Nasional">Bank Tabungan Pensiunan Nasional</option>
                                    <option value="Bank UOB Indonesia">Bank UOB Indonesia</option>
                                    <option value="Bank Victoria International">Bank Victoria International</option>
                                    <option value="Bank Victoria Syariah">Bank Victoria Syariah</option>
                                    <option value="Bank Windu Kentjana International">Bank Windu Kentjana International</option>
                                    <option value="Bank Woori Indonesia">Bank Woori Indonesia</option>
                                    <option value="Bank Yudha Bhakti">Bank Yudha Bhakti</option>
                                    <option value="Bank of America">Bank of America</option>
                                    <option value="Bank of China">Bank of China</option>
                                    <option value="Bank of India Indonesia">Bank of India Indonesia</option>
                                    <option value="CIMB Niaga Syariah">CIMB Niaga Syariah</option>
                                    <option value="Centrama Nasional Bank">Centrama Nasional Bank</option>
                                    <option value="Citibank">Citibank</option>
                                    <option value="Deutsche Bank">Deutsche Bank</option>
                                    <option value="HSBC">HSBC</option>
                                    <option value="HSBC Amanah">HSBC Amanah</option>
                                    <option value="JPMorgan Chase">JPMorgan Chase</option>
                                    <option value="OCBC NISP Syariah">OCBC NISP Syariah</option>
                                    <option value="Panin Bank">Panin Bank</option>
                                    <option value="Panin Bank Syariah">Panin Bank Syariah</option>
                                    <option value="Prima Master Bank">Prima Master Bank</option>
                                    <option value="Royal Bank of Scotland">Royal Bank of Scotland</option>
                                    <option value="Standard Chartered">Standard Chartered</option>
                                    <option value="The Bank of Tokyo Mitsubishi UFJ">The Bank of Tokyo Mitsubishi UFJ</option>
                                </optgroup>
                            	</select>
                            </div>
                            <div class="form-group">
                                <label>Nomor Rekening *</label>
                                <input type="text" name="no_rekening" class="form-control left" required onKeyPress="return event.charCode >= 48 && event.charCode <= 57"> 
                            </div>
                            <div class="form-group">
                                <label>Nama Pemilik Rekening *</label>
                                <input type="text" name="pemilik_rekening" class="form-control left" required onKeyPress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32"> 
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pembayaran *</label>
                                <input type="date" name="tanggal_bayar" class="form-control" required> 
                            </div>
                            <div class="form-group">
                                <label>Bukti Pembayaran *</label>
                                <input type="file" id="bukti" name="bukti" class="form-control left" required> 
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="float:right;">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit</button>
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
