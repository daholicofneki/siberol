<?php
// Authority
require_once ('../library/config.php');
if ($_SESSION['AUTH'] !== 'Wartawan') header('Location: ../index.php');

// Query
$data = $DB->get('SELECT * FROM berita WHERE id_wartawan = "'. $_SESSION['ID'] .'"', 'all');
$no = 1;
?>
<html>
	<head>
		<title>Wartawan - Daftar Berita</title>
		<link href="../public/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="../public/css/custom.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="../public/js/jquery-1.7.min.js" type="text/javascript"></script>
		<script src="../public/js/jquery.tablesorter.min.js" type="text/javascript"></script>
	</head>
	<body>

<script type="text/javascript">
	$(document).ready(
		$("#list").tablesorter();
		$("#list").tablesorter( {sortList: [[0,0], [1,0]]} ); 
	);
</script>

<?php require_once('../library/admin_menu.php') ?>

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
						<td><a class="i-edit" href="wartawan_edit.php?idx=<?php echo $item->idx ?>">&nbsp; Edit</a></td>
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