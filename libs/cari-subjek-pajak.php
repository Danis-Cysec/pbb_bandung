<!DOCTYPE html>
<html>
<head>
	<!-- core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
</head>
<body>
	<?php
		if ($_GET['ktp_subjek'] == null) {
			$sql = "select * from datasubjek";
		} else {
			$ktp_subjek = $_GET['ktp_subjek'];
			$sql = "select * from datasubjek where ktp_subjek like '%$ktp_subjek%'";
		}
		include("koneksi.php");
	?>
	<table class="table">
    	<tbody>
        <?php
			$link = koneksi_db();
			$res = $link->query($sql);
			if(mysqli_num_rows($res)==0){
		?>
        	<tr class="table-row">
            	<td>
                	<p class="center">Data Tidak Ditemukan</p>
                </td>
            </tr>
        <?php
			} else {
				while($row = mysqli_fetch_array($res)){
		?>
        	<tr class="table-row">
            <td class="table-text">
            	<h4><?php echo $row['ktp_subjek'];?></h4>
                <p><?php echo $row['nama_subjek'];?></p>
            </td>
            <td>
               	<p></p>
            </td>
            <td>
              	<p></p>
            </td>
            <td style="width:10px;padding:20px;padding-right:50px;">
            	<a href="ubah-subjek-pajak.php?ktp_subjek=<?php echo $row['ktp_subjek'];?>"><i class="fa fa-check-square-o icon_9"></i></a>
            </td>
            <td style="width:10px;padding:20px;">
               	<a href="../libs/hapus-subjek-pajak.php?ktp_subjek=<?php echo $row['ktp_subjek'];?>"><i class="fa fa-times icon_9"></i></a>
            </td>
        </tr>
		<?php }
        } ?>
        </tbody>
    </table>
</body>
</html>