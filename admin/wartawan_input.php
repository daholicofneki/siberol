<html>
	<head>
		<title>Wartawan - Input Berita</title>
		<link href="../public/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="../public/css/custom.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="../public/js/jquery-1.7.min.js" type="text/javascript"></script>
	</head>
	<body>
<?php
require_once ('../library/config.php');
if ($_POST)
{
	$db = new database();
	$db::query ('INSERT INTO berita (judul,isi,id_wartawan) VALUES ("'.$_POST['_judul'].'","'.$_POST['_isi'].'",1)');
	
}
?>
<div class="topbar">
	<div class="fill">
		<div class="container">
			<a class="brand" href="#"><?php echo PROJECT ?></a>
			<ul class="nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#contact">Contact</a></li>
			</ul>
			<form action="" class="pull-right">
				<input class="input-small" type="text" placeholder="Username">
				<input class="input-small" type="password" placeholder="Password">
				<button class="btn" type="submit">Sign in</button>
			</form>
		</div>
	</div>
</div>


<div class="container">

	<div class="content">
		<div class="page-header">
			<?php echo TITLE ?>
		</div>
		<div class="row">
			<div class="span12">
				<h2>Input Berita</h2>
				<form name="berita" action="" method="post">
					<ul>
						<li>
							<label>Judul</label>
							<input type="text" name="_judul" placeholder="Judul berita">
						</li>
						<li>
							<label>Isi</label>
							<textarea name="_isi" rows="5" placeholder="Isi berita"></textarea>
						</li>
					</ul>
					<div align="center">
						<input type="submit" class="btn primary" value="Simpan Berita">
						<a href="wartawan.php" class="btn">Cancel</a>
					</div>
				</form>
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