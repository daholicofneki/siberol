<html>
	<head>
		<title>SIBEROL - Login</title>
		<link href="../public/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="../public/css/custom.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="../public/js/jquery-1.7.min.js" type="text/javascript"></script>
	</head>
	<body>
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

<div class="topbar">
	<div class="fill">
		<div class="container">
			<a class="brand" href="#"><?php echo PROJECT ?></a>
			<form action="" method="POST" class="pull-right">
			<?php if( empty($_SESSION['ID']) ) { ?>
				<input class="input-small" type="text" name="username" placeholder="Username">
				<input class="input-small" type="password" name="password" placeholder="Password">
				<button class="btn" type="submit">Sign in</button>
			<?php } else { ?>
				<a href="#">Welcome <b><?php echo $_SESSION['ID'] ?></b></a> | <a href="logout.php">Logout</a>
			<?php } ?>
			</form>
		</div>
	</div>
</div>

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