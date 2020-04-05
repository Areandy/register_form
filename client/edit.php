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
	<title><?php echo $lang['profile_edit'] ?></title>
</head>

<body>

	<?php require_once 'parts/navbar.php' ?>

	<div class="container">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8 bg-red">
				<div class="card">
					<div class="card-body">

						<form id="edit_form" action="/server/update.php" method="POST" class="mt-5"
							enctype="multipart/form-data">
							<div class="form-group group-h">
								<label for="first_name"><?php echo $lang['fname'] ?></label>
								<input type="text" class="form-control" id="first_name" name="fname"
									value="<?php echo $user['fname'] ?>">
								<div id="first_name_feedback" class="invalid-feedback"></div>
							</div>
							<div class="form-group group-h">
								<label for="last_name"><?php echo $lang['lname'] ?></label>
								<input type="text" class="form-control" id="last_name" name="lname"
									value="<?php echo $user['lname'] ?>">
								<div id="last_name_feedback" class="invalid-feedback"></div>
							</div>
							<div class="form-group group-h">
								<label for="password"><?php echo $lang['age'] ?></label>
								<input type="number" min="18" max="99" class="form-control" id="age" name="age"
									data-toggle="tooltip" value="<?php echo ($user['age'] != 0) ? $user['age']: '' ?>">
								<div class="invalid-feedback"></div>
							</div>
							<div class="form-group">
								<label for="picture"><?php echo $lang['pic'] ?></label>
								<input type="file" accept="image/gif, image/jpeg, image/png" class="form-control-file"
									id="picture" name="pic">
							</div>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><?php echo $lang['bio'] ?></span>
								</div>
								<textarea id="biography" form="edit_form" class="form-control"
									aria-label="With textarea" name="bio"><?php echo $user['bio'] ?></textarea>
							</div>
							<button type="submit" class="btn orange-bg mt-4"><?php echo $lang['submit'] ?></button>
						</form>

					</div>
				</div>
			</div>
			<div class="col-2"></div>
		</div>
	</div>

</body>
<script type="text/javascript" src="../assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../assets/js/edit.js"></script>
<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>

</html>