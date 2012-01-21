<?php
require_once ('../library/config.php');
$referenceid = mktime()* rand();

if ( isset($_POST['username']) && $_POST['username'] ) {

	$username	= $_POST['username'];
	$password 	= $_POST['password'];
	$captcha 	= $_POST['captcha'];
	$reference_id	= $_POST['reference_id'];

	$data_captcha	= $DB->get('select * from captcha where referenceid="' . $reference_id . '" AND hiddentext = "'. $captcha .'"', 'one');
	$data_user	= $DB2->get('select * from account where username="' . $username . '" AND password = "'. $password .'"', 'one');

	if( count ($data_captcha) <= 0 ) {
		$invalid = true;
		$invalid_desc = "Captcha didn't match.";
	} else if( count ($data_user) <= 0 ) {
		$invalid = true;
		$invalid_desc = "User or password is invalid.";
	} else if( count ($data_user) > 0 ) {

		$_SESSION['ID'] = $username;
		$_SESSION['PASS'] = $password;
		$_SESSION['NAME'] = $data_user->name;
		$_SESSION['AUTH'] = $data_user->level;

		if ( $data_user->level == 'Direktur' )
			header( 'Location:direktur.php' );
		else if ( $data_user->level == 'Wartawan' )
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
		<div class="row">
			<div class="span8 offset4">
<?php if (isset($invalid) && $invalid): ?>
<div class="alert error-alert">
  <strong>Warning!</strong> <?php echo $invalid_desc ?> Please try again!
</div>
<?php endif; ?>
<form class="horizontal-form" method="POST">
<legend>LOGIN FORM</legend>
<fieldset class="control-group">
  <label class="control-label" for="input01">USERNAME</label>
  <div class="controls">
    <input type="text" class="xlarge" name="username">
  </div>
</fieldset>
<fieldset class="control-group">
  <label class="control-label" for="input01">PASSWORD</label>
  <div class="controls">
    <input type="text" class="xlarge" name="password">
  </div>
</fieldset>
<fieldset class="control-group">
  <label class="control-label" for="input01">CAPTCHA</label>
  <div class="controls">
    <img src="../library/captcha_code_file.php?refid=<?php echo $referenceid ?>" id='captchaimg' >
    <input id="6_letters_code" name="captcha" type="text"><br />
    <input name="reference_id" type="hidden" value="<?php echo $referenceid ?>"><br />
    <br />
    <small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
  </div>
</fieldset>	
<fieldset class="form-actions">
  <button class="btn primary" type="submit">Sign in</button>
</fieldset>
</form>

			</div>
		</div>
		<footer>
			<p><?php echo FOOTER ?></p>
		</footer>
	</div>
</div>


<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>

	</body>
</html>