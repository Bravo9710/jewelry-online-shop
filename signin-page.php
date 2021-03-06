<?php include 'head.php';?>

<body>
	<div class="main">
		<?php include 'header.php';?>
		
		<div class="shell">
			<div class="login">
				<div class="form">
					<form action="php/login_submit.php" method="post">

						<?php
							if(isset($_GET['error'])){
								if($_GET['error'] == "wrngPwd" || $_GET['error'] == "noUser"){
									echo '
										<div class="alert alert-danger" role="alert">
											Грешен имейл или парола!
										</div>';
								} else if ($_GET['error'] == "sqlError"){
									echo '
										<div class="alert alert-danger" role="alert">
											Няма връзка с базата данни!
										</div>';
								}
							}
						?>

						<div class="form__controls">
							<label for="email">Email</label>
							<input type="email" name="email" class="form-control" id="email" required>
						</div><!-- /.form__controls -->

						<div class="form__controls">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control" id="password" required>
						</div><!-- /.form__controls -->

						<button type="submit" name="login-submit" class="btn">Sign In</button>

						<br>

						<div class="links">
							<a href= "register-page.php">Register</a> 

							<a href= "admin-login.php">Admin</a> 
						</div><!-- /.links -->
					</form>
				</div><!-- /.form -->
			</div><!-- /.login -->
		</div><!-- /.shell -->
	</div><!-- /.main -->

	<?php include 'footer.php';?>
</body>

</html>
