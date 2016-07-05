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
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pelayanan PBB Online<i class="fa fa-angle-down" style="padding-left:8px;"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="daftar-op.php">Pendaftaran Objek Pajak</a></li>
                                <li><a href="bayar-tagihan.php">Pembayaran Tagihan PBB</a></li>
                            </ul>
                        </li>
                        <li><a href="login.php">Login</a></li>
                        <li class="active"><a href="#">Daftar</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->

    <section id="contact-page">
        <div class="container" style="min-height:420px;">
            <div class="center">
            	<h2></h2> 
                <h2>Form Pendaftaran Akun</h2>
                <p class="lead">Pajak Bumi dan Bangunan</p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form class="contact-form" method="post" action="libs/tambah-user.php">
                    <div class="col-sm-6 col-sm-offset-3">
                    	<a href="login.php" style="float:right;">Sudah punya akun? Login</a><br>
                        <div class="form-group">
                            <label>No KTP *</label>
                            <input type="text" name="ktp_user" class="form-control" required maxlength="16" onkeypress="return event.charCode >= 48 && event.charCode <= 57"> 	
                        </div>
                        <div class="form-group">
                            <label>Password *</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap *</label>
                            <input type="name" name="nama_user" class="form-control" required onKeyPress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32">
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir *</label>
                            <input type="text" name="tempat_lahir" class="form-control" required onKeyPress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir *</label>
                            <input type="date" name="tanggal_lahir" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin *</label><br>
                            <select class="form-control" name="jk" id="sex" data-rule-required="true" required>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select> 
                        </div>
                        <div class="form-group">
                            <label>Alamat Lengkap *</label>
                            <input type="text" name="alamat" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>RW *</label>
                            <input type="text" name="rw_user" class="form-control" maxlength="2" required required maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        </div>
                        <div class="form-group">
                            <label>RT *</label>
                            <input type="text" name="rt_user" class="form-control" maxlength="2" required required maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg">Daftar</button>
                            <button type="Reset" name="Reset" class="btn btn-primary btn-lg">Reset</button>
                        </div>             
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
