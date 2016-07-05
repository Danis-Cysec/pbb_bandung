<?php
	session_start();
	error_reporting(0);
	if(($_SESSION['sudahloginadmin']==true)&&($_SESSION['nama_admin']!="")){
		$ktp_subjek = $_GET['ktp_subjek'];
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
                        <li><a href="daftar-objek-pajak.php">Objek Pajak</a></li>
                        <li class="active"><a href="daftar-subjek-pajak.php">Subjek Pajak</a></li>
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
                <h2>Ubah Data Subjek Pajak</h2>
                <p class="lead">Pajak Bumi dan Bangunan</p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <?php
					$link = koneksi_db();
					$sql = "select * from datasubjek where ktp_subjek = '$ktp_subjek'";
					$res = $link->query($sql);
					if(mysqli_num_rows($res)==1){
						$data=mysqli_fetch_array($res);
				?>
                <form class="contact-form" method="post" action="../libs/edit-subjek-pajak.php">
                	<div class="col-sm-12">
                        <div class="col-sm-6 col-md-offset-3">
                            <h2>Data Subjek Pajak</h2><br>
                            <div class="form-group">
                                <label>No KTP *</label>
                                <input type="text" name="ktp_subjek" class="form-control" readonly required onKeyPress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $data['ktp_subjek'];?>"> 	
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan *</label><br>
                                <select name="pekerjaan" class="form-control" required>
                                    <option value="PNS" <?php if($data['pekerjaan'] == "PNS"){ echo "selected"; }?>>PNS</option>
                                    <option value="ABRI" <?php if($data['pekerjaan'] == "ABRI"){ echo "selected"; }?>>ABRI</option>
                                    <option value="Pensiunan" <?php if($data['pekerjaan'] == "Pensiunan"){ echo "selected"; }?>>Pensiunan</option>
                                    <option value="Badan" <?php if($data['pekerjaan'] == "Badan"){ echo "selected"; }?>>Badan</option>
                                    <option value="Lainnya" <?php if($data['pekerjaan'] == "Lainnya"){ echo "selected"; }?>>Lainnya</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap *</label>
                                <input type="name" name="nama_subjek" class="form-control" required onKeyPress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32" value="<?php echo $data['nama_subjek'];?>">
                            </div>
                            <div class="form-group">
                                <label>NPWP *</label>
                                <input type="text" name="npwp" class="form-control" maxlength="15" required onKeyPress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $data['npwp'];?>">
                            </div>
                            <div class="form-group">
                                <label>Alamat Jalan *</label>
                                <input type="text" name="alamat_jalan_subjek" class="form-control" required value="<?php echo $data['alamat_jalan_subjek'];?>">
                            </div>
                            <div class="form-group">
                                <label>Nomor / Blok / Kavling *</label>
                                <input type="text" name="alamat_nomor_subjek" class="form-control" required value="<?php echo $data['alamat_nomor_subjek'];?>">
                            </div>
                            <div class="form-group">
                                <label>Kelurahan *</label>
                                <input type="text" name="kelurahan_subjek" class="form-control" required onKeyPress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32" value="<?php echo $data['kelurahan_subjek'];?>">
                            </div>
                            <div class="form-group">
                                <label>RW *</label>
                                <input type="text" name="rw_subjek" class="form-control" maxlength="2" required onKeyPress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $data['rw_subjek'];?>">
                            </div>
                            <div class="form-group">
                                <label>RT *</label>
                                <input type="text" name="rt_subjek" class="form-control" maxlength="2" required onKeyPress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $data['rt_subjek'];?>">
                            </div>
                            <div class="form-group">
                                <label>Kota *</label>
                                <input type="text" name="kota" class="form-control" required onKeyPress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32" value="<?php echo $data['kota'];?>">
                            </div>
                            <div class="form-group">
                                <label>Kode Pos *</label>
                                <input type="text" name="kode_pos" class="form-control" required maxlength="5" onKeyPress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $data['kode_pos'];?>">
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
