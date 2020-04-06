<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] !== 'POST'
		|| !isset($_POST['name_or_email']) || !isset($_POST['pass'])) {

		header('Location: /client/signin.php');
		exit;
	}

	require_once 'DB/User.php';
	require_once 'verify.php';

	$lang = (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ru') 
		? require_once '../client/lang/ru.php'
		: require_once '../client/lang/en.php';

	if (preg_match('/@/', $_POST['name_or_email']))
		$_POST['email'] = $_POST['name_or_email'];
	else
		$_POST['username'] = $_POST['name_or_email'];

	if (!verifyFields($_POST)) {
		$_SESSION['error'] = $lang['val_inf_err'];
		header('Location: /client/signin.php');
		exit;
	}

	$user_obj = new User;
	$user = (isset($_POST['email']))
		? $user_obj->getUserByEmail($_POST['email'])
		: $user_obj->getUserByUsername($_POST['username']);
	

	if (password_verify($_POST['pass'], $user['pass'])) {
		$_SESSION['auth'] = true;
		$_SESSION['username'] = $user['username'];
		header('Location: /client/profile.php');
	} else {
		$_SESSION['error'] = $lang['val_inf_err'];
		header('Location: /client/signin.php');
	}

