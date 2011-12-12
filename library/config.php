<?php

@session_start();

require_once ('database.php');

define('PROJECT','Server Side Scripting');
define('TITLE','<h1>SIBEROL <small>Sistem Berita Online</small></h1>');
define('FOOTER','
	<span>© Neki, Nurvina - SIBEROL (Sistem Berita Online) 2011</span>
	<span class="pull-right">
		<a href="http://neki-nurvina.umbit.info">Home</a> |
		<a href="http://neki-nurvina.umbit.info/about.php">About</a> |
		<a href="http://neki-nurvina.umbit.info/admin">Login</a>
	</span>
	<br /><small>For best view use Chrome</small>');