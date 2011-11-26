<html>
	<head>
		<title>Wartawan - Input Berita</title>
		<link href="public/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="public/css/custom.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="public/js/jquery-1.7.min.js" type="text/javascript"></script>
	</head>
	<body>
<?php
require_once ('library/database.php');
if ($_POST)
{
	$db = new DB();
	$db::query ('INSERT INTO berita (judul,isi,id_wartawan) VALUES ("'.$_POST['_judul'].'","'.$_POST['_isi'].'",1)');
}
?>
<div class="container">
	<div class="row">
		<div class="span16">
<h2>Input  Berita</h2>
<form name="berita" action="" method="post">
	<ul>
		<li>
			Judul : <input type="text" name="_judul">
		</li>
		<li>
			Isi : <textarea name="_isi" rows="5"></textarea>
		</li>
	</ul>
	<input type="submit" class="btn primary" value="Simpan Berita">
	<input type="button" class="btn" value="Cancel">	
</form>

		</div>
	</div>

	<footer>
	<p>&copy; Neki, Nurvina - Server Side Scripting 2011</p>
	</footer>
</div>

	</body>
</html>