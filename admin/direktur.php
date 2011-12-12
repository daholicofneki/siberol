<?php
// Authority
require_once ('../library/config.php');
if ($_SESSION['AUTH'] !== 'Direktur') header('Location: ../index.php');

// Variable
$where = array();
$cbo[0] = isset($_GET['cboFilter']) ? $_GET['cboFilter'] : 'all';
$cbo[1] = isset($_GET['cboCategory']) ? $_GET['cboCategory'] : 'all';

if ($cbo[0] != 'all') $where[] = "status_tayang = '". $cbo[0] ."'";
if ($cbo[1] != 'all') $where[] = "kategori = '". $cbo[1] ."'";
$_where = implode(' AND ', $where);
if ($_where != '')
        $_where = " WHERE $_where";
else    $_where = "";

// Query
$data = $DB->get("SELECT * FROM berita $_where ORDER BY tanggal_tayang_dari", 'all');
$no = 1;
?>
<html>
	<head>
		<title>Direktur - Daftar Berita</title>
		<link href="../public/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="../public/css/custom.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="../public/js/jquery-1.7.min.js" type="text/javascript"></script>
	</head>
	<body>

<script type="text/javascript">
	$(document).ready(function() {

                $('#cboFilter').change(function() {
                        $('#frmSearch').submit();
                });
                $('#cboCategory').change(function() {
                        $('#frmSearch').submit();
                });

	});
</script>

<?php require_once('../library/admin_menu.php') ?>

<div class="container">

	<div class="content">
		<div class="page-header">
			<?php echo TITLE ?>
		</div>
		<div class="row">
			<div class="span16">
				<form name="frmSearch" id="frmSearch" method="GET">
				<table>
					<tr>
						<td rowspan="2" width="70%"><h2>Daftar  Berita</h2></td>
						<td>Filter</td>
						<td>Category</td>
					</tr>
					<tr>
						<td>
							<select name="cboFilter" id="cboFilter">
								<option value="all"<?php echo ($cbo[0] == 'all')?' selected': ''?>>=== ALL ===</option>
                                                                <option value="0"<?php echo ($cbo[0] == '0')?' selected': ''?>>Belum Tayang</option>
                                                                <option value="1"<?php echo ($cbo[0] == '1')?' selected': ''?>>Tayang</option>
                                                                <option value="2"<?php echo ($cbo[0] == '2')?' selected': ''?>>Ditolak</option>
							</select>
						</td>
						<td>
							<select name="cboCategory" id="cboCategory">
								<option value="all"<?php echo ($cbo[1] == 'all')?' selected': ''?>>=== ALL ===</option>
								<option value="Umum"<?php echo ($cbo[1] == 'Umum')?' selected': ''?>>Umum</option>
								<option value="Hidup Sehat"<?php echo ($cbo[1] == 'Hidup Sehat')?' selected': ''?>>Hidup Sehat</option>
								<option value="Diabetes"<?php echo ($cbo[1] == 'Diabetes')?' selected': ''?>>Diabetes</option>
								<option value="Hipertensi"<?php echo ($cbo[1] == 'Hipertensi')?' selected': ''?>>Hipertensi</option>
							</select>
						</td>
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
						<td><a class="i-edit" href="direktur_detail.php?idx=<?php echo $item->idx ?>">&nbsp; Edit</a></td>
					</tr>
					<?php endforeach?>
                                        <?php else: ?>
                                        <tr>
                                                <td colspan="4"><i>Tidak ada artikel</i></td>
                                        </tr>
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