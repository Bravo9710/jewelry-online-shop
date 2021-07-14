<?php include 'head.php';?>

<body>
	<div class="main">
		<?php include 'header.php';?>
		
		<div class="shell">
			<div class="login">
				<div class="form">
					<form action="?" method="post">
						<div class="form__controls">
							<label for="email">Email</label>
							<input type="email" name="email" class="form-control" id="email" required>
						</div><!-- /.form__controls -->

						<div class="form__controls">
							<label for="password">Password</label>
							<input type="password" name="user_password" class="form-control" id="password" required>
						</div><!-- /.form__controls -->

						<button type="submit" name="login-submit" class="btn">Sign In</button>

						<br>

						<a href= "register-page.php">Register</a> 
					</form>
				</div><!-- /.form -->
			</div><!-- /.login -->
		</div><!-- /.shell -->
	</div><!-- /.main -->

	<?php include 'footer.php';?>
</body>

</html>
