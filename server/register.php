<?php
	session_start();

	if ($_SERVER['REQUEST_METHOD'] !== 'POST'
		|| !isset($_POST['username']) || !isset($_POST['email'])
		|| !isset($_POST['pass1']) || !isset($_POST['pass2'])) {

		header('Location: /client/signin.php');
		exit ('This is not POST');
	}

	require_once 'DB/User.php';
	require_once 'verify.php';

	$lang = (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ru') 
		? require_once '../client/lang/ru.php'
		: require_once '../client/lang/en.php';

	if ($_POST['pass1'] === $_POST['pass2'])
		$_POST['pass'] = $_POST['pass1'];

	if (!verifyFields($_POST)) {
		$_SESSION['error'] = $lang['val_inf_err'];
		header('Location: /client/signin.php');
		exit;
	}

	$user_obj = new User;

	if ($user_obj->getUserByUsername($_POST['username'])) {
		$_SESSION['error'] = $lang['un_taken_err'];
		header('Location: /client/signup.php');
		exit;
	} else if ($user_obj->getUserByEmail($_POST['email'])) {
		$_SESSION['error'] = $lang['em_taken_err'];
		header('Location: /client/signup.php');
		exit;
	}

	$pass_hash = password_hash($_POST['pass'], PASSWORD_BCRYPT);
	if ($user_obj->createUser($_POST['username'], $_POST['email'], $pass_hash)) {
		$_SESSION['auth'] = true;
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['success'] = $lang['signup_succ'];
		header('Location: /client/edit.php');
	} else
		header('Location: /client/signup.php');