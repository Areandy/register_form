<nav class="navbar navbar-expand-lg navbar-light orange-bg">
	<div class="d-flex flex-grow-1">
		<span class="w-100 d-lg-none d-block"></span>
		<a class="navbar-brand d-none d-lg-inline-block" href="#">
			<strong><?php echo $lang['forum'] ?></strong>
		</a>
		<a class="navbar-brand-two mx-auto d-lg-none d-inline-block" href="#">
			<img src="//placehold.it/40?text=LOGO" alt="logo">
		</a>
		<div class="w-100">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<ul class="navbar-nav mr-auto">
            <li class="nav-item">

				<?php if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ru') { ?>

					<a class="nav-link" href="/client/change_lang.php" >Ru</a>
					<input type="hidden" id="hidden_lang" value='<?php echo json_encode($lang) ?>'>

				<?php } else { ?>

					<a class="nav-link" href="/client/change_lang.php">En</a>
					<input type="hidden" id="hidden_lang" value='<?php echo json_encode($lang) ?>'>
					<!-- <div id="hidden_lang"></div> -->

				<?php } ?>
            </li>
        </ul>
		</div>
	</div>
	<div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
		<ul class="navbar-nav ml-auto flex-nowrap">

			<?php if (isset($_SESSION['auth']) && $_SESSION == true) { ?>

				<li class="nav-item active">
					<a href="/client/profile.php" class="nav-link m-2 menu-item nav-active"><?php echo $lang['profile'] ?></a>
				</li>
				<li class="nav-item">
					<a href="/client/logout.php" class="nav-link m-2 menu-item"><?php echo $lang['logout'] ?></a>
				</li>
				
			<?php } else { ?>
 
				<li class="nav-item <?php if (preg_match('/signin/', $_SERVER['REQUEST_URI'])) echo 'active' ?>">
					<a href="/client/signin.php" class="nav-link m-2 menu-item nav-active"><?php echo $lang['signin'] ?></a>
				</li>
				<li class="nav-item <?php if (preg_match('/signup/', $_SERVER['REQUEST_URI'])) echo 'active' ?>">
					<a href="/client/signup.php" class="nav-link m-2 menu-item"><?php echo $lang['signup'] ?></a>
				</li>

			<?php } ?>

		</ul>
	</div>
	</div>
</nav>
