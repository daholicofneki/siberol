<?php
require_once ('library/config.php');

// Variable
$cat = array(1=>'Hidup Sehat', 'Umum', 'Diabetes', 'Hipertensi');
$where = array();
$where[] = "status_tayang = '1' AND tanggal_tayang_dari <= now() AND tanggal_tayang_sampai >= now()";
if( isset($_GET['kategori']) ) $where[] = "kategori = '". $cat[$_GET['kategori']] ."'";
$_where = implode(' AND ', $where);
$_show_all = ( isset($_GET['showall']) && $_GET['showall'] == 'true' ) ? "" : " LIMIT 6";

// Query
$data = $DB->get("SELECT * FROM berita WHERE $_where ORDER BY tanggal_tayang_dari $_show_all", 'all');
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

	<div class="container-fluid">
		<div class="row">
			<div class="span6">
			</div>
		</div>
		
		<div class="sidebar">
			<div class="well">
				<h5>Menu Category</h5>
				<ul>
					<li><a href="index.php?kategori=1">Hidup Sehat</a></li>
					<li><a href="index.php?kategori=2">Umum</a></li>
					<li><a href="index.php?kategori=3">Diabetes</a></li>
					<li><a href="index.php?kategori=4">Hipertensi</a></li>
					<li><a href="index.php?showall=true">Lihat semua berita</a></li>
				</ul>
				<h5>About</h5>
				<ul>
					<li><a href="about.php">About Us</a></li>
				</ul>
			</div>
		</div>
		<div class="content">
			<div class="row">
				<?php if ( count($data) > 0 ): ?>
				<?php foreach ($data as $item):?>
				<div class="span5">
					<p><strong><?php echo $item->judul ?></strong><?php echo substr($item->isi,0,150).'...' ?></p>
					<p><a class="btn small" href="berita.php?idx=<?php echo $item->idx ?>">Continue reading &raquo;</a></p>
				</div>
				<?php endforeach?>
				<?php else: ?>
				Tidak ada berita yang ditampilkan
				<?php endif; ?>
			</div>
		</div>
	</div>

	<footer>
		<p><?php echo FOOTER ?></p>
	</footer>

</div>

	</body>
</html>