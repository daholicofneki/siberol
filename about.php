<html>
	<head>
		<title></title>
		<link href="public/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="public/css/custom.css" media="screen" rel="stylesheet" type="text/css" />
	</head>
	<body>

<?php require_once ('library/config.php'); ?>

<div class="container">

	<div class="hero-unit">
		<h1>Heath Info</h1>
	</div>

	<div class="row">
		<div class="span16">
			<h2>About Us</h2>
			<p>
				Website ini merupakan tugas mata kuliah Server Side Scripting tahun ajaran 2011/2012.
				<a href="http://ngajar.rakayusuf.com/2011/11/sss-materi-dan-tugas-sistem-berita.html" target="_blank"><b>Siberol</b></a> sendiri merupakan situs berita online yang memuat artikel-artikel yang diinput oleh wartawan ( user ).
				Lalu dari artikel tersebut di verifikasi oleh direktur ( admin ) dari website tersebut.
			</p>
			<p>
				Kelompok untuk website ini adalah :
				<ol>
					<li>Neki Arismi</li>
					<li>Nurvina Ahdiani</li>
				</ol>
			</p>
			<p>
				Untuk mengakses backend dari website ini, bisa login melalui <a href="admin/login.php" target="_blank">Login Page</a>
			</p>
			<table style="width:80%">
				<tr>
					<th width="15%">Username</th>
					<th width="15%">Password</th>
					<th>Akses</th>
				</tr>
				<tr>
					<td>admin</td>
					<td>admin</td>
					<td>
						<ol>
							<li>Mempunyai Hak untuk menulis artikel dan menghapus artikel yang ditulisnya</li>
							<li>Tidak mempunyai hak untuk menayangkan artikel</li>
						</ol>
					</td>
				</tr>
				<tr>
					<td>user1 / user2</td>
					<td>user</td>
					<td>
						<ol>
							<li>Mempunyai Hak untuk menulis artikel dan menghapus artikel yang ditulisnya</li>
							<li>Mempunyai Hak untuk mereview artikel yang di tulis oleh Wartawan sebelum di tayangkan</li>
							<li>Mempunyai Hak untuk mengedit artikel yang di tulis oleh Wartawan sebelum di tayangkan</li>
						</ol>
					</td>
				</tr>
			</table>
		</div>
	</div>
	
	<footer>
		<p><?php echo FOOTER ?></p>
	</footer>

</div>

	</body>
</html>