<?php include 'head.php';?>

<body>
	<div class="main">
		<?php include 'header.php';?>
		
		<div class="shell">
			<div class="login">
				<div class="form">
					<form action="php/admin_code.php" method="post">

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
							<label for="admin">Admin</label>
							<input type="name" name="admin" class="form-control" id="admin" required>
						</div><!-- /.form__controls -->

						<div class="form__controls">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control" id="password" required>
						</div><!-- /.form__controls -->

						<button type="submit" name="admin-submit" class="btn">Sign In</button>

						<div class="links">
							<a href= "signin-page.php">Sing In</a> 
						</div><!-- /.links -->
					</form>
				</div><!-- /.form -->
			</div><!-- /.login -->
		</div><!-- /.shell -->
	</div><!-- /.main -->

	<?php include 'footer.php';?>
</body>

</html>
