<?php
	session_start();

	if ($_SERVER['REQUEST_METHOD'] !== 'POST'
		|| !isset($_POST['fname']) || !isset($_POST['lname'])
		|| !isset($_POST['age']) || !isset($_POST['bio'])) {

		header('Location: /client/signin.php');
		exit;
	}

	require_once 'DB/User.php';
	require_once 'verify.php';

	$lang = (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ru') 
		? require_once '../client/lang/ru.php'
		: require_once '../client/lang/en.php';

	$data = [];
	if ($_POST['fname'])	$data['fname'] = $_POST['fname'];
	if ($_POST['lname'])	$data['lname'] = $_POST['lname'];
	if ($_POST['age'])
		$data['age'] = $_POST['age'];
	else
		$_POST['age'] = 0;
	$data['bio'] = $_POST['bio'];
	// Bio can be 0 length in regex validation

	if (!verifyFields($data)) {
		$_SESSION['error'] = $lang['val_inf_err'];
		header('Location: /client/edit.php');
		exit;
	}

	$_POST['bio'] = strip_tags($_POST['bio']);
	$_POST['fname'] = ucfirst(strtolower($_POST['fname']));
	$_POST['lname'] = ucfirst(strtolower($_POST['lname']));

	/*
	**	Save user profile picture
	*/
	if (isset($_FILES['pic']) && $_FILES['pic']['tmp_name']) {

		if ($_FILES['pic']['type'] == 'image/gif')
			$type = '.gif';
		else if ($_FILES['pic']['type'] == 'image/jpeg')
			$type = '.jpg';
		else if ($_FILES['pic']['type'] == 'image/png')
			$type = '.png';
		else {
			$_SESSION['error'] = $lang['photo_load_err'];
			header('Location: /client/profile.php');
			exit;
		}

		$new_file = 'photo_' . rand(10000, 99999) . $type;

		if (move_uploaded_file($_FILES['pic']['tmp_name'], '../assets/uploads/' . $new_file)) {
			$_POST['pic'] = '/assets/uploads/' . $new_file;
		} else {
			// echo '<br>End';
			// exit;
			$_SESSION['error'] = $lang['photo_load_err'];
			header('Location: /client/edit.php');
			exit;
		}
	}


	$user_obj = new User;
	if (!empty($data))
		if ($user_obj->updateAdditionalInfo($_SESSION['username'], $_POST)){
			$_SESSION['success'] = $lang['prof_upd_succ'];
		} else
			$_SESSION['error'] = $lang['prof_upd_err'];


	header('Location: /client/profile.php');
