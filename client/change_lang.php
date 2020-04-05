<?php
	session_start();

	if (isset($_SESSION['lang']))
		if ($_SESSION['lang'] == 'en')
			$_SESSION['lang'] = 'ru';
		else
			$_SESSION['lang'] = 'en';
	else
		$_SESSION['lang'] = 'en';

	header('Location: ' . $_SERVER['HTTP_REFERER']);