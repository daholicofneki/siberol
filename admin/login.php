<?php
require_once ('../library/config.php');

if ( isset($_POST['username']) && $_POST['username'] ) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	$data = $DB->get('select * from account where username="' . $username . '" AND password = "'. $password .'"', 'one');

	if( count ($data) > 0 ) {

		$_SESSION['ID'] = $username;
		$_SESSION['PASS'] = $password;
		$_SESSION['NAME'] = $data->name;
		$_SESSION['AUTH'] = $data->level;

		if ( $data->level == 'Direktur' )
			header( 'Location:direktur.php' );
		else if ( $data->level == 'Wartawan' )
			header( 'Location:wartawan.php' );
	}
}
?>
<html>
	<head>
		<title>SIBEROL - Login</title>
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
		<footer>
			<p><?php echo FOOTER ?></p>
		</footer>
	</div>
</div>

	</body>
</html>