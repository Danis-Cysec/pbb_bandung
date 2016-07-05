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
		if ($_GET['nop'] == null) {
			$sql = "select * from tagihan group by nop";
		} else {
			$nop = $_GET['nop'];
			$sql = "select * from tagihan where nop like '%$nop%' group by nop";
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
            		<h4>NOP <?php echo $row['nop'];?></h4>
            	</td>
                <td>
                    <p></p>
                </td>
                <td>
                    <p></p>
                </td>
                <td>
                	<p></p>
                </td>
                <td style="width:10px;padding:20px;">
                	<a href="../libs/update-tagihan.php?nop=<?php echo $row['nop'];?>"><i class="fa fa-check-square-o icon_9"></i></a>
                </td>
        	</tr>
		<?php }
        } ?>
        </tbody>
    </table>
</body>
</html>