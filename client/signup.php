<?php
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
	<title><?php echo $lang['signup'] ?></title>
</head>

<body>

	<?php require_once 'parts/navbar.php' ?>

	<div class="container">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">

				<form id="signup_form" action="/server/register.php" method="POST" class="mt-5">
					<div class="form-group group-h">
						<label for="username"><?php echo $lang['username'] ?></label>
						<input type="text" class="form-control" id="username" name="username" required>
						<div id="username_feedback" class="invalid-feedback"></div>
					</div>
					<div class="form-group group-h">
						<label for="exampleInputEmail1"><?php echo $lang['email'] ?></label>
						<input type="email" class="form-control" id="email" aria-describedby="emailHelp"  name="email" required>
						<div id="email_feedback" class="invalid-feedback"></div>
					</div>
					<div class="form-group group">
						<label for="password1"><?php echo $lang['pass'] ?></label>
						<small id="passwordHelpBlock" class="form-text text-muted">
							<?php echo $lang['pass_text'] ?>
						</small>
						<input type="password" class="form-control mt-2" id="password1" placeholder="<?php echo $lang['pass1'] ?>" name="pass1" required>
					</div>
					<div class="form-group group-h">
						<input type="password" class="form-control" id="password2" placeholder="<?php echo $lang['pass2'] ?>" name="pass2" required>
						<div id="password_feedback" class="invalid-feedback"></div>
					</div>

					<button type="submit" class="btn orange-bg"><?php echo $lang['submit'] ?></button>
				</form>

			</div>
			<div class="col-3"></div>
		</div>
	</div>

</body>
<script type="text/javascript" src="../assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../assets/js/signup.js"></script>
<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
</html>