<?php
require_once ('library/config.php');
$data = $DB->get_all('SELECT * FROM berita ORDER BY tanggal_publikasi LIMIT 5');
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

	<!-- Main hero unit for a primary marketing message or call to action -->
	<div class="hero-unit">
		<h1>Heath Info</h1>
	</div>

	<!-- Example row of columns -->
	<div class="row">
		<div class="span16">
			<ul class="news-ticker" id="news">
				<?php foreach ($data as $item):?>
				<li><a href="berita.php?idx=<?php echo $item->idx ?>"><?php echo substr($item->judul,0,150) ?></a></li>
				<?php endforeach?>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="span6">
			<h2>Categories</h2>
			<p>Etiam porta sem malesuada magna mollis euismod. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
			<p><a class="btn" href="#">View details &raquo;</a></p>
		</div>
		<div class="span10">
			<h2>Recent articles</h2>
			<ul>
				<?php foreach ($data as $item):?>
				<li>
					<a href="berita.php?idx=<?php echo $item->idx ?>">
					<b><?php echo substr($item->judul,0,150) ?></b><br />
					<?php echo substr($item->isi,0,250).'...' ?>
					</a>
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