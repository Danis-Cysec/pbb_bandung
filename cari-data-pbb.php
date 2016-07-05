<?php
	session_start();
	error_reporting(0);
	$nama_subjek = $_POST['nama_subjek'];
	$alamat_jalan_objek = $_POST['alamat_jalan_objek'];
	$alamat_nomor_objek = $_POST['alamat_nomor_objek'];
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
                        <li class="active dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Portal Informasi Publik <i class="fa fa-angle-down" style="padding-left:8px;"></i></a>
                            <ul class="dropdown-menu">
                                <li class="active"><a href="#">Pencarian Data PBB</a></li>
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
                <h2>Pencarian Data</h2>
                <p class="lead">Pajak Bumi dan Bangunan</p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form class="contact-form" method="post" onsubmit="return validateForm();" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div class="col-sm-4 col-sm-offset-4">
                        <div class="form-group">
                            <label>Nama Wajib Pajak</label>
                            <input type="text" id="nama_subjek" name="nama_subjek" class="form-control" onKeyPress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32" value="<?php echo $nama_subjek;?>"> 	
                        </div>
                        <div class="form-group">
                            <label>Letak Objek Pajak</label>
                            <input type="text" id="alamat_jalan_objek" name="alamat_jalan_objek" class="form-control" value="<?php echo $alamat_jalan_objek;?>">
                        </div>
                        <div class="form-group">
                            <label>Blok / Kavling / Nomor</label>
                            <input type="text" id="alamat_nomor_objek" name="alamat_nomor_objek" class="form-control" value="<?php echo $alamat_nomor_objek;?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg">Cari</button>
                        </div>                
                    </div>
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
        
        <div class="container table-responsive" style="margin-top:100px;">
        	<table class="table">
            	<thead>
                	<tr>
                    	<th>NOP</th>
                        <th>Nama Wajib Pajak</th>
                        <th>Jalan</th>
                        <th>Nomor / Blok / Kavling</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
					$link = koneksi_db();
					if (isset($nama_subjek)) {
						$sql = "select * from dataobjek o join datasubjek s on o.ktp_subjek=s.ktp_subjek where nama_subjek like '%$nama_subjek%' and alamat_jalan_objek like '%$alamat_jalan_objek%' and alamat_nomor_objek like '%$alamat_nomor_objek%'";
					}
					$res = $link->query($sql);
					if(mysqli_num_rows($res)==0){ ?>
					<tr>
	                    <td></td>
                        <td></td>
                        <td><p class="center">Data Tidak Ditemukan</p></td>
                    </tr>
                <?php
					} else {
						while($row = mysqli_fetch_array($res)){
				?>
                    <tr>
                        <td><?php echo $row['nop'];?></td>
                        <td><?php echo $row['nama_subjek'];?></td>
                        <td><?php echo $row['alamat_jalan_objek'];?></td>
                        <td><?php echo $row['alamat_nomor_objek'];?></td>
                        <td><?php echo $row['rt_objek'];?></td>
                        <td><?php echo $row['rw_objek'];?></td>
                        <td><a href="cek-tagihan.php?nop=<?php echo $row['nop'];?>"><button class="btn btn-primary btn-lg">CEK TAGIHAN</button></a></td>
                    </tr>
                <?php } } ?>
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
    <script language="javascript">
		function validateForm(){
			var value1 = document.getElementById('nama_subjek').value;
			var value2 = document.getElementById('alamat_jalan_objek').value;
			var value3 = document.getElementById('alamat_nomor_objek').value;
			if( value1 != "" || value2 != "" || value3 != "" ) 
			{
				return true;    
			}
			alert("Anda harus memasukkan sebuah nilai!");
			return false;
		}
    </script>
</body>
</html>
