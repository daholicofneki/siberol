<?php
require_once ('library/config.php');
$idx = $_GET['idx'];
?>
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
		<h1>Heath Info</h1>
	</div>

	<div class="row">
		<div class="span16">
			<ul class="news-ticker" id="news">
				<?php $data=null;$item=null; $data = $DB->get_all('SELECT * FROM berita ORDER BY tanggal_publikasi LIMIT 10'); ?>
				<?php foreach ($data as $item):?>
				<li><a href="berita.php?idx=<?php echo $item->idx ?>"><?php echo substr($item->judul,0,150) ?></a></li>
				<?php endforeach?>
			</ul>
		</div>
	</div>
	<div class="row">
		<?php $data=null;$item=null; $data = $DB->get_all('SELECT * FROM berita WHERE idx='.$idx); ?>
		<div class="span10">
			<h2><?php echo $item->judul ?></h2>
			<p><?php echo $item->isi ?></p>
			<p>
			<h4>Komentar</h4>
			<form>
				<ul>
					<li>
						<label>Nama</label>
						<input type="text" name="_nama">
					</li>
					<li>
						<label>E-mail</label>
						<input type="text" name="_email">
					</li>
					<li>
						<label>Website</label>
						<input type="text" name="_website">
					</li>
					<li>
						<label>Komentar</label>
						<textarea name="_komentar"></textarea>
					</li>
					<li>
						<label></label>
						<input type="submit" class="btn primary" value="Kirim">
					</li>
				</ul>
			</form>
			<?php $data=null;$item=null; $data = $DB->get_all('SELECT * FROM komentar WHERE id_berita='. $idx); ?>
			<table>
				<thead>
					<tr>
						<td width="15%">Nama</td>
						<td>Komentar</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $item):?>
					<tr>
						<td><a href="<?php echo $item->website ?>"><?php echo $item->nama ?></a></td>
						<td><?php echo $item->komentar ?></td>
					</tr>
					<?php endforeach?>
				</tbody>
			</table>
			</p>
		</div>
		<div class="span6">
			<?php $data=null;$item=null; $data = $DB->get_all('SELECT idx,judul FROM berita ORDER BY tanggal_publikasi LIMIT 10');
			#var_dump($data);
			?>
			<h2>Recent articles</h2>
			<ul>
				<?php foreach ($data as $item):?>
				<li>
					<a href="berita.php?idx=<?php echo $item->idx ?>"><?php echo substr($item->judul,0,100) ?></a>
				</li>
				<?php endforeach?>
			</ul>
		</div>
	</div>
	
	<footer>
	<p>&copy; Neki, Nurvina - Server Side Scripting 2011</p>
	</footer>

</div>

	</body>
</html>