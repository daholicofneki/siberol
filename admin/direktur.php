<?php
// Authority
require_once ('../library/config.php');
if ($_SESSION['AUTH'] !== 'Direktur') header('Location: ../index.php');

// Query
$data = $DB->get('SELECT * FROM berita', 'all');
$no =1;
?>
<html>
	<head>
		<title>Direktur - Daftar Berita</title>
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
			<div class="span16">
				<form name="frmSearch">
				<table>
					<tr>
						<td rowspan="2" width="50%"><h2>Daftar  Berita</h2></td>
						<td>Filter</td>
						<td>Category</td>
						<td>Date</td>
					</tr>
					<tr>
						<td>
							<select name="cboFilter">
								<option value="all">== ALL ==</option>
								<option value="approved">Approved</option>
								<option value="pending">Pending</option>
								
							</select>
						</td>
						<td>
							<select name="cboCategory">
								<option value="all">== ALL ==</option>
								<option value="Hidup Sehat">Hidup Sehat</option>
								<option value="Diabetes">Diabetes</option>
								<option value="Hipertensi">Hipertensi</option>
								<option value="Ibu & Anak">Ibu & Anak</option>
								<option value="Umum">Umum</option>
							</select>
						</td>
						<td><input type="txtDate" size="10"></td>
					</tr>
				</table>
				</form>
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
							<a class="i-edit" href="direktur_detail.php?idx=<?php echo $item->idx ?>">&nbsp; Edit</a>
							<a class="i-cross" href="#">&nbsp; Delete</a>
						</td>
					</tr>
					<?php endforeach?>
					<?php endif?>
					</tbody>
				</table>
			</div>
		</div>

		<footer>
			<p><?php echo FOOTER ?></p>
		</footer>
	</div>

</div>

	</body>
</html>