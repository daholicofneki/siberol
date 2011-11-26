<?php
require_once ('library/database.php');
if ($_POST)
{
	$db = new DB();
	$db::query ('INSERT INTO berita (judul,isi,id_wartawan) VALUES ("'.$_POST['_judul'].'","'.$_POST['_isi'].'",1)');
}
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

			$('#portfolio').innerfade({
				speed: 'slow',
				timeout: 4000,
				type: 'sequence',
				containerheight: '220px'
			});
			
			$('.fade').innerfade({
				speed: 'slow',
				timeout: 1000,
				type: 'sequence',
				containerheight: '1.5em'
			});
		}
	);
</script>

<div class="container">

	<!-- Main hero unit for a primary marketing message or call to action -->
	<div class="hero-unit">
		<h1>Heath Info</h1>
		<p>Vestibulum id ligula porta felis euismod semper. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
		<p><a class="btn primary large">Learn more &raquo;</a></p>
	</div>

	<!-- Example row of columns -->
	<div class="row">
		<div class="span16">
			<ul class="news-ticker" id="news">
				<li><a href="#n1">1 Lorem ipsum dolor</a></li>
				<li><a href="#n2">2 Sit amet, consectetuer</a></li>
				<li><a href="#n3">3 Sdipiscing elit,</a></li>
				<li><a href="#n4">4 sed diam nonummy nibh euismod tincidunt ut</a></li>
				<li><a href="#n5">5 Nec Lorem.</a></li>
				<li><a href="#n6">6 Et eget.</a></li>
				<li><a href="#n7">7 Leo orci pede.</a></li>
				<li><a href="#n8">8 Ratio randorus wil.</a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="span6">
			<h2>Categories</h2>
			<p>Etiam porta sem malesuada magna mollis euismod. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
			<p><a class="btn" href="#">View details &raquo;</a></p>
		</div>
		<div class="span10">
			<h2>Recent articles</h2>
			<ul>
				<li class="news-front"><a href="#">This is the 1st latest news item.</a></li>
				<li class="news-front"><a href="#">This is the 2nd latest news item.</a></li>
				<li class="news-front"><a href="#">This is the 3th latest news item.</a></li>
				<li class="news-front"><a href="#">This is the 4th latest news item.</a></li>
				<li class="news-front"><a href="#">This is the 5th latest news item.</a></li>
				<li class="news-front"><a href="#">This is the 6th latest news item.</a></li>
				<li class="news-front"><a href="#">This is the 7th latest news item.</a></li>
				<li class="news-front"><a href="#">This is the 8th latest news item.</a></li>
			</ul>
		</div>
	</div>
	
	<footer>
	<p>&copy; Neki, Nurvina - Server Side Scripting 2011</p>
	</footer>

</div>

	</body>
</html>