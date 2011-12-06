<html>
	<head>
		<title>Wartawan - Daftar Berita</title>
		<link href="../public/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="../public/css/custom.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="../public/js/jquery-1.7.min.js" type="text/javascript"></script>
		<script src="../public/js/jquery.tablesorter.min.js" type="text/javascript"></script>
	</head>
	<body>
<?php
require_once ('../library/config.php');
$data = $DB->get('SELECT * FROM berita', 'all');
$no = 1;
?>

<script type="text/javascript">
	$(document).ready(
		$("#list").tablesorter();
		$("#list").tablesorter( {sortList: [[0,0], [1,0]]} ); 
	);
</script>

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
				<h2>Daftar  Berita</h2>
				<table class="bordered-table tablesorter" id="list">
					<thead>
					<tr>
						
						<th width="3%">No</th>
						<th width="30%">Judul</th>
						<th>Isi</th>
						<th width="5%">Action</th>
					</tr>
					</thead>
					<tbody>
					<?php if($data): ?>
					<?php foreach ($data as $item):?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $item->judul ?></td>
						<td><?php echo substr($item->isi,0,500).'...' ?></td>
						<td>
							<a class="i-edit" href="wartawan_edit.php">&nbsp; Edit</a>
							<a class="i-cross" href="#">&nbsp; Delete</a>
						</td>
					</tr>
					<?php endforeach?>
					<?php endif?>
					</tbody>
				</table>
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