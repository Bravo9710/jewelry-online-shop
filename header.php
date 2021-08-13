<?php
	session_start();
	include 'php/database_connect.php';
?>

<header class="header">
	<div class="shell">
		<div class="header__inner">
			<a href="index.php" class="logo">
				<img src="assets/images/logo.png" alt="Logo" width="100" height="100">
			</a>

			<nav class="nav">
				<ul>
					<li>
						<a href="index.php">Home</a>
					</li>

					<?php 
						if(isset($_SESSION['userid'])){
							$userid = $_SESSION['userid'];
							$sqlQuery ="SELECT firstname, lastname FROM users WHERE id='$userid'";
							$result = mysqli_query($databaseConnect, $sqlQuery);
							$row = mysqli_fetch_assoc($result);
							$firstname = $row["firstname"];
							$lastname = $row["lastname"];
							echo '<li><a href="profile.php">'. $firstname. ' ' .$lastname. '</a></li>';

						} else {
							echo '<li>
									<a href="signin-page.php">Sign In</a>
								</li>';
						}
					?>

					<?php 
						if(isset($_SESSION['userid'])){
							echo 
								'
								<li>
									<a href="cart.php">
										<i class="fas fa-cart-plus"></i>
										(0)
									</a>
								</li>

								<li>
									<form action="php/logout_code.php" method="POST">
										<button type="submit" name="logout-submit" class="nav-signout">Sign out</button>
									</form>
								</li>';
						}
					?>
				</ul>
			</nav><!-- /.nav -->
		</div><!-- /.header__inner -->
	</div><!-- /.shell -->
</header><!-- /.header -->
