<?php

	/*
	**	PS:
	**	 I dont take this whole code to separate file bacause its 
	**	 logic differs from file to file
	*/
	session_start();
	
	if (isset($_SESSION['auth'])) {
		header('Location: /client/profile.php');
		exit;
	}

	require_once 'parts/alert.php';

	$lang = (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ru') 
		? require_once 'lang/ru.php'
		: require_once 'lang/en.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/style.css">
	<title><?php echo $lang['signin'] ?></title>
</head>

<body>

	<?php require_once 'parts/navbar.php' ?>

	<div class="container">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">

				<form id="signin_form" action="/server/login.php" method="POST" class="mt-5">
					<div class="form-group group-h">
						<label for="name_or_email"><?php echo $lang['name_or_email'] ?></label>
						<input type="text" class="form-control" id="name_or_email" aria-describedby="emailHelp" data-toggle="tooltip"  name="name_or_email" required>
						<div class="invalid-feedback">
						<?php echo $lang['inv_n_or_e'] ?>
						</div>
					</div>
					<div class="form-group group-h">
						<label for="password"><?php echo $lang['pass'] ?></label>
						<input type="password" class="form-control" id="password" name="pass" data-toggle="tooltip" required>
						<div id="password_feedback" class="invalid-feedback"></div>
						<a class="mt-3 d-flex justify-content-center" href="/client/signup.php"><?php echo $lang['signup'] ?></a>
					</div>
					<button type="submit" class="btn orange-bg mt-3"><?php echo $lang['submit'] ?></button>

				</form>

			</div>
			<div class="col-3"></div>
		</div>
	</div>

</body>
<script type="text/javascript" src="../assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../assets/js/signin.js"></script>
<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
</html>