<?php include 'head.php';?>

<body>
	<div class="main">
		<?php include 'header.php';?>
		
		<div class="shell">
			<div class="tabs tabs--profile js-tabs">
				<div class="tabs__head">
					<nav class="tabs__nav">
						<ul>
							<li class="is-current">
								<a href="#orders">My orders</a>
							</li>
							
							<li>
								<a href="#form">My profile</a>
							</li>
						</ul>
					</nav><!-- /.tabs__nav -->
				</div><!-- /.tabs__head -->
				
				<div class="tabs__body">
					<div class="tab is-current" id="orders">
						<div class="orders">
							<ul>
								<li>
									<div class="order"></div><!-- /.order -->
								</li>
							</ul>
						</div><!-- /.orders -->
					</div><!-- /.tab -->
					
					<div class="tab" id="form">
						<div class="login">
							<h1 style="margin-bottom: 10px; font-weight:700; font-size: 23px;">Update profile</h1>

							<div class="form">
								<form action="php/profile_update.php" method="post">
									<?php
										$userid = $_SESSION['userid'];

										$sqlQuery ="SELECT * FROM users WHERE id='$userid'";
										$result = mysqli_query($databaseConnect, $sqlQuery);
										$user = mysqli_fetch_assoc($result);

										$firstname      = $user['firstname'];
										$lastname       = $user['lastname'];
										$email          = $user["email"]; 
										$address        = $user["address"]; 

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

										} else if (isset($_GET['update']) && $_GET['update'] == "complete"){
											echo '
												<div class="alert alert-danger" role="alert">
													Updated successfully!
												</div>';
										}
									?>

									<div class="form__controls">
										<label for="name">Name*</label>
										<input type="text" name="name" value="<?php echo "$firstname" ?>" class="form-control" id="name" required>
									</div><!-- /.form__controls -->

									<div class="form__controls">
										<label for="lastName">Last Name*</label>
										<input type="text" name="lastName" value="<?php echo "$lastname" ?>" class="form-control" id="lastName" required>
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
										<label for="newPassword">New Password</label>
										<input type="password" name="newPassword" class="form-control" id="newPassword">
									</div><!-- /.form__controls -->

									<div class="form__controls">
										<label for="email">Email*</label>
										<input type="email" name="email" value="<?php echo "$email" ?>" class="form-control" value="<?php echo "$email" ?>" id="email" required>
									</div><!-- /.form__controls -->

									<div class="form__controls">
										<label for="address">Address*</label>
										<input type="text" name="address" value="<?php echo "$address" ?>" class="form-control" id="address" required>
									</div><!-- /.form__controls -->

									<button type="submit" name="submit" class="btn">Update</button>
								</form>
							</div><!-- /.form -->
						</div><!-- /.login -->
					</div><!-- /.tab -->
				</div><!-- /.tabs__body -->
			</div><!-- /.tabs js-tabs -->
		</div><!-- /.shell -->
	</div><!-- /.main -->

	<?php include 'footer.php';?>
</body>

</html>
