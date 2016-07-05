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
		if ($_GET['nip'] == null) {
			$sql = "select * from dataadmin";
		} else {
			$nip = $_GET['nip'];
			$sql = "select * from dataadmin where nip like '%$nip%'";
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
                    <h4><?php echo $row['nama_admin'];?></h4>
                    <h6><?php echo $row['nip'];?></h6>
                </td>
                <td>
                    <p></p>
                </td>
                <td>
                    <p></p>
                </td>
                <td style="width:10px;padding:20px;padding-right:50px;">
                	<a href="ubah-admin.php?nip=<?php echo $row['nip'];?>"><i class="fa fa-pencil-square-o icon_9"></i></a>
                </td>
                <td style="width:10px;padding:20px;">
                   	<a href="../libs/hapus-admin.php?nip=<?php echo $row['nip'];?>"><i class="fa fa-times icon_9"></i></a>
                </td>
            </tr>
		<?php }
        } ?>
        </tbody>
    </table>
</body>
</html>