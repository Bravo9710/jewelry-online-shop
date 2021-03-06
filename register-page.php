<?php include 'head.php';?>

<body>
	<div class="main">
		<?php include 'header.php';?>
		
		<div class="shell">
			<div class="login">
				<div class="form">
					<form action="php/registration_submit.php" method="post">
						<?php
							$firstname      = "";
							$lastname       = "";
							$user_password  = "";
							$user_password2 = "";
							$email          = "";
							$user_address   = "";

							if(isset($_GET['error'])){
								if($_GET['error'] == "emailtaken"){
									echo '
										<div class="alert alert-danger" role="alert">
											Email is taken!
										</div>';
								}
								else if ($_GET['error'] == "pwdCheck"){
									echo '
										<div class="alert alert-danger" role="alert">
											Passwords do not match!
										</div>';
								}
								else if ($_GET['error'] == "sqlError"){
									echo '
										<div class="alert alert-danger" role="alert">
											No connection to database!
										</div>';
								}

							} else if (isset($_GET['register']) && $_GET['register'] == "complete"){
								echo '
									<div class="alert alert-danger" role="alert">
										Registration successful!
									</div>';
							}
						?>

						<div class="form__controls">
							<label for="name">Name*</label>
							<input type="text" name="name" class="form-control" id="name" required>
						</div><!-- /.form__controls -->

						<div class="form__controls">
							<label for="lastName">Last Name*</label>
							<input type="text" name="lastName" class="form-control" id="lastName" required>
						</div><!-- /.form__controls -->

						<div class="form__controls">
							<label for="password">Password*</label>
							<input type="password" name="password" class="form-control" id="password" required>
						</div><!-- /.form__controls -->

						<div class="form__controls">
							<label for="password2">Confirm Password*</label>
							<input type="password" name="password2" class="form-control" id="password2" required>
						</div><!-- /.form__controls -->

						<div class="form__controls">
							<label for="email">Email*</label>
							<input type="email" name="email" class="form-control" id="email" required>
						</div><!-- /.form__controls -->

						<div class="form__controls">
							<label for="address">Address*</label>
							<input type="text" name="address" class="form-control" id="address" required>
						</div><!-- /.form__controls -->

						<button type="submit" name="submit" class="btn">Register</button>

						<br>

						<a href= "signin-page.php">Sign In</a> 
					</form>
				</div><!-- /.form -->
			</div><!-- /.login -->
		</div><!-- /.shell -->
	</div><!-- /.main -->

	<?php include 'footer.php';?>
</body>

</html>
