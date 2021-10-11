<?php
	if(session_status() == PHP_SESSION_NONE) {
		session_start();
	}
?>

<header class="header">
	<ul class="header__ul">
		<li class="header__li">
			<a href="/" class="header__a">
				Home
			</a>
		</li>
		<?php 
			if(isset($_SESSION['username'])) {
				echo '
					<li class="header__li">
						<a href="/movies.php" class="header__a">
							Movies
						</a>
					</li>
					<li class="header__li">
						<a href="/logout.php" class="header__a">
							Logout
						</a>
					</li>
					';
			} else {
				echo '
					<li class="header__li">
						<a href="/login.php" class="header__a">
							Login
						</a>
					</li>
					<li class="header__li">
						<a href="/register.php" class="header__a">
							Register
						</a>
					</li>
					';
			}
		?>
	</ul>
</header>