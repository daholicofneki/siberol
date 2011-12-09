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

<?php
require_once ('library/config.php');

$data = $DB->get('SELECT * FROM berita WHERE tanggal_tayang_dari >= CURRENT_DATE AND tanggal_tayang_dari <= CURRENT_DATE', 'all');
?>

<div class="container">

	<!-- Main hero unit for a primary marketing message or call to action -->
	<div class="hero-unit">
		<h1><a href="index.php">Heath Info</a></h1>
	</div>

	<!-- Example row of columns -->
	<div class="row">
		<div class="span16">
			<ul class="news-ticker" id="news">
				<?php if ( count($data) > 0 ):?>
				<?php foreach ($data as $item):?>
				<li><a href="berita.php?idx=<?php echo $item->idx ?>"><?php echo substr($item->judul,0,150) ?></a></li>
				<?php endforeach ?>
				<?php else: ?>
				<li>Tidak ada berita yang ditampilkan</li>
				<?php endif ?>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="span6">
			<h2>About Us</h2>
			<p>Website ini merupakan tugas mata kuliah Server Side Scripting tahun ajaran 2011/2012.</p>
			<p><a class="btn" href="about.php">View details &raquo;</a></p>
		</div>
		<div class="span10">
			<h2>Recent articles</h2>
			<ul>
				<?php if ( count($data) > 0 ):?>
				<?php foreach ($data as $item):?>
				<li>
					<a href="berita.php?idx=<?php echo $item->idx ?>">
					<b><?php echo substr($item->judul,0,150) ?></b><br />
					<?php echo substr($item->isi,0,250).'...' ?>
					</a>
				</li>
				<?php endforeach?>
				<?php else: ?>
				<li>Tidak ada berita yang ditampilkan</li>
				<?php endif ?>
			</ul>
		</div>
	</div>
	
	<footer>
		<p><?php echo FOOTER ?></p>
	</footer>

</div>

	</body>
</html>