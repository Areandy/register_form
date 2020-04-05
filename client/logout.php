<?php
	session_start();

	$lang = (isset($_SESSION['lang']))
		? $_SESSION['lang']
		: 'en';
	session_destroy();
	session_start();
	$_SESSION['lang'] = $lang;

	header('Location: /client/signin.php');