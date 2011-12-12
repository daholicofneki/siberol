<?php
// Authority
require_once ('../library/config.php');
if ($_SESSION['AUTH'] !== 'Wartawan') header('Location: ../index.php');

// Check validitity url
if ( empty($_GET['idx']) )
{
	header( 'Location:wartawan.php' );
}
else
{
	$data = $DB->get ('SELECT * FROM berita WHERE idx = '. $_GET['idx'] , 'one');
	// Jika status artikel belum tayang, maka boleh edit artikel
        if ( $data->status_tayang == 0 )
                header( 'Location:wartawan_edit.php?idx=' . $_GET['idx']);

	// If data == null
	if ( $data == null )
	{
		header( 'Location:wartawan.php' );
	}
}
?>
<html>
	<head>
		<title>Wartawan - Detail Berita</title>
		<link href="../public/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="../public/css/custom.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="../public/js/jquery-1.7.min.js" type="text/javascript"></script>

	</head>
	<body>

<?php require_once('../library/admin_menu.php') ?>

<div class="container">

	<div class="content">
		<div class="page-header">
			<?php echo TITLE ?>
		</div>
		<div class="row">
			<div class="span12">
				<h2>Detail Berita</h2>
                                <h3><?php echo $data->judul ?></h3>
                                <?php if( $data->gambar != '' ) echo "<p align=\"center\"><img src=\"". $data_berita->gambar ."\"></p>"; ?>
                                <?php echo $data->isi ?>
			</div>
			<div class="span4">
				<h3>Menu</h3>
				<ul>
					<li><a href="wartawan_input.php">Input Berita Baru</a></li>
					<li><a href="wartawan.php">Daftar Berita</a></li>
				</ul>
			</div>
		</div>

		<footer>
			<p><?php echo FOOTER ?></p>
		</footer>
	</div>

</div>

	</body>
</html>