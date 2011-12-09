<div class="topbar">
	<div class="fill">
		<div class="container">
			<a class="brand" href="#"><?php echo PROJECT ?></a>
			<form action="" method="POST" class="pull-right">
			<?php if( empty($_SESSION['ID']) && $_SESSION['ID'] == '' ) { ?>
				<input class="input-small" type="text" name="username" placeholder="Username">
				<input class="input-small" type="password" name="password" placeholder="Password">
				<button class="btn" type="submit">Sign in</button>
			<?php } else { ?>
				<a href="<?php echo strtolower($_SESSION['auth']).'.php' ?>">Welcome <b><?php echo $_SESSION['ID'] ?> ( <?php echo $_SESSION['NAME'] ?> )</b></a> | <a href="logout.php">Logout</a>
			<?php } ?>
			</form>
		</div>
	</div>
</div>