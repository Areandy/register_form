<?php
	session_start();

	if (!isset($_SESSION['auth']) || $_SESSION['auth'] != true) {
		header('Location: /client/signin.php');
		exit;
	}

	require_once '../server/DB/User.php';	
	require_once 'parts/alert.php';

	$lang = (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ru') 
		? require_once 'lang/ru.php'
		: require_once 'lang/en.php';

	$user_obj = new User;
	$user = $user_obj->getUserByUsername($_SESSION['username']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/style.css">
	<title><?php echo $lang['profile'] ?></title>
</head>
<body>
	
	<?php require_once 'parts/navbar.php' ?>

	<div class="container">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8 bg-red">
				<div class="card profile-card">
					<img class="card-img-top bg-img">
					<div class="card-body">
						<img src="<?php echo $user['pic'] ?>" class="pic">
						<div class="blank text-right">

							<?php echo $user['fname'] . ' ' . $user['lname'] ?>

						</div>
						<h5 class="card-title">

							<?php echo $user['username'] ?>

						</h5>
						<p class="card-text">
							<?php echo $lang['age'] ?>: <?php echo ($user['age']) ? $user['age']: '...' ?>
						</p>
						<p class="card-text">
							<?php echo ($user['bio'] ? $user['bio']: '') ?>
						</p>
					</div>
					<div class="card-footer">
						<form action="/client/edit.php" method="GET">
							<button type="submit" class="btn btn-secondary"><?php echo $lang['edit'] ?></button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-2"></div>
		</div>
	</div>

</body>
<script type="text/javascript" src="../assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
</html>