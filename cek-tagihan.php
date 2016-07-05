<?php
	session_start();
	error_reporting(0);
	$nop = $_POST['nop'];
	if ($nop == "") {
		$nop = $_GET['nop'];		
	}
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
                        <li class="active dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Portal Informasi Publik <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="cari-data-pbb.php">Pencarian Data PBB</a></li>
                                <li class="active"><a href="#">Cek Tagihan PBB</a></li>
                                <li><a href="cek-njop.php">Cek NJOP PBB</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pelayanan PBB Online<i class="fa fa-angle-down"></i></a>
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
                        <li><a href="daftar.php">Daftar</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->

    </header><!--/header-->

    <section id="contact-page">
        <div class="container" style="min-height:420px;">
            <div class="center">
            	<h2></h2> 
                <h2>Periksa Tagihan</h2>
                <p class="lead">Pajak Bumi dan Bangunan</p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form class="contact-form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div class="col-sm-4 col-sm-offset-4">
                        <div class="form-group">
                            <label>Nomor Objek Pajak *</label>
                            <input type="text" name="nop" class="form-control left" required="required" maxlength="18" value="<?php echo $nop;?>"> 	
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Cari</button>
                        </div>                
                    </div>                 
                        
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
        
        <div class="container table-responsive" style="margin-top:19px;">
        	<table class="table">
            	<thead>
                	<tr>
                    	<th>Tahun Pajak</th>
                        <th>Nama WP</th>
                        <th>Pokok</th>
                        <th>Denda (2% per bulan)
                        <th>Jumlah</th>
                        <th>Jatuh Tempo</th>
                        <th>Jumlah Bulan</th>
                    </tr>
                </thead>
                <tbody>
                <?php
					$link = koneksi_db();
					$sql = "select * from tagihan where nop='$nop' and status_kelunasan='Belum Lunas' order by tahun_pajak desc";
					$res = $link->query($sql);
					$total = 0;
					if(mysqli_num_rows($res)==0){
				?>
					<tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><p class="center">Data Tidak Ditemukan</p></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php
					} else {
						while($row = mysqli_fetch_array($res)){
							$total += $row['jumlah_tagihan'];
				?>
                    <tr>
                        <td><?php echo $row['tahun_pajak'];?></td>
                        <td><?php echo $row['nama_subjek'];?></td>
                        <td>Rp <?php echo number_format($row['pokok'],0,'','.');?></td>
                        <td>Rp <?php echo number_format($row['denda'],0,'','.');?></td>
                        <td>Rp <?php echo number_format($row['jumlah_tagihan'],0,'','.');?></td>
                        <td><?php echo date('d-M-Y', strtotime($row['tgl_jatuh_tempo']));?></td>
                        <td><?php echo $row['jumlah_bulan'];?></td>
                    </tr>
                <?php }?>
                	<tr>
                    	<td><b>Total yang harus dibayar</b></td>
                        <td></td>
                        <td></td>
                    	<td></td>
                        <td>Rp <?php echo number_format($total,0,'','.');?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php } ?>
           		</tbody>
        	</table>
        </div>
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
