<?php require_once ('library/config.php'); ?>
<html>
	<head>
		<title></title>
		<link href="public/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="public/css/custom.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="public/js/jquery-1.7.min.js" type="text/javascript"></script>
		<script src="public/js/jquery.innerfade.js" type="text/javascript"></script>
	</head>
	<body>

<script type="text/javascript">
	$(document).ready(
		function(){
			$('#news').innerfade({
				animationtype: 'slide',
				speed: 750,
				timeout: 2000,
				type: 'random',
				containerheight: '1em'
			});
		}
	);
</script>

<div class="container">

	<div class="hero-unit">
		<h1><a href="index.php">Health Info</a></h1>
	</div>

	<div class="row">
		<div class="span16">
			<ul class="news-ticker" id="news">
				<?php
				$data_news = $DB2->get("SELECT * FROM berita WHERE
						 status_tayang = '1' AND tanggal_tayang_dari <= now() AND tanggal_tayang_sampai >= now()
						 ORDER BY tanggal_tayang_dari LIMIT 10", 'all');
				?>
				<?php if ( count($data_news) > 0 ):?>
				<?php foreach ($data_news as $item):?>
				<li><a href="berita.php?idx=<?php echo $item->idx ?>"><?php echo substr($item->judul,0,150) ?></a></li>
				<?php endforeach ?>
				<?php else: ?>
				<li>Tidak ada berita yang ditampilkan</li>
				<?php endif ?>
			</ul>
		</div>
	</div><br />

	<div class="row">
		<div class="span16">
			<?php $data_berita = $DB->get ('SELECT * FROM berita WHERE idx=' . $_GET['idx'], 'one'); ?>
			<h2><?php echo $data_berita->judul ?></h2>
			<?php if( $data_berita->gambar != '' ) echo "<p align=\"center\"><img src=\"admin/". $data_berita->gambar ."\"></p>";  ?>
			<p><?php echo $data_berita->isi ?></p>

			<?php
			// Save komentar
			if ( isset($_POST) && count($_POST) > 0 )
			{
				$data = $DB->query ('INSERT INTO komentar (nama,email,website,komentar,id_berita)
					    VALUES ("'.$_POST['_nama'].'", "'.$_POST['_email'].'", "'.$_POST['_website'].'", "'.$_POST['_komentar'].'", '.$_GET['idx'].')');

				if ($data) echo '<div class="alert-message block-message success"><p>Komentar ditambahkan<p></div>';
			}
			?>
			<h4>Komentar</h4>
			<form method="POST">
				<ul>
					<li>
						<label>Nama</label>
						<input type="text" name="_nama" placeholder="Masukkan nama">
					</li>
					<li>
						<label>E-mail</label>
						<input type="text" name="_email" placeholder="Masukkan alamat email"> * <i>tidak akan di publish</i>
					</li>
					<li>
						<label>Website</label>
						<input type="text" name="_website" placeholder="Masukkan website">
					</li>
					<li>
						<label>Komentar</label>
						<textarea name="_komentar" style="width:50%" rows="5"></textarea>
					</li>
					<li>
						<label></label>
						<input type="submit" class="btn primary" value="Kirim">
					</li>
				</ul>
			</form><br />
			<?php $data_komentar = $DB3->get ('SELECT * FROM komentar WHERE id_berita='. $_GET['idx'] , 'all'); ?>
			<?php if ( count($data_komentar) > 0 ): ?>
			<table>
				<thead>
					<tr>
						<td width="20%">Nama</td>
						<td>Komentar</td>
					</tr>
				</thead>
				<tbody>
					
					<?php foreach ($data_komentar as $item): ?>
					<tr>
						<td><a href="<?php echo $item->website ?>"><?php echo $item->nama ?></a></td>
						<td><?php echo $item->komentar ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php endif ?>
		</div>
	</div>

	<footer>
		<p><?php echo FOOTER ?></p>
	</footer>

</div>

	</body>
</html>