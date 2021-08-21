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

					<li class="has-dropdown">
						<a href="index.php">
							Products

							<i class="ico-arrow"></i>
						</a>

						<div class="dropdown">
							<div class="tabs tabs--colors js-tabs">
								<div class="tabs__head">
									<nav class="tabs__nav">
										<ul>
											<li>
												<a href="#">Gold</a>
											</li>
											
											<li>
												<a href="#">Silver</a>
											</li>
										</ul>
									</nav><!-- /.tabs__nav -->
								</div><!-- /.tabs__head -->
								
								<div class="tabs__body">
									<div class="tab is-current">
										<div class="inner-menu">
											<div class="tabs js-tabs">
												<div class="tabs__head">
													<nav class="tabs__nav">
														<ul>

															<?php
																include 'php/database_connect.php';

																$result = mysqli_query($databaseConnect, "SELECT * FROM category");
																	while ($row = mysqli_fetch_array($result)) {
																		echo '
																			<li>
																				<a href="#">' . $row["Name"] . '</a>
																			</li>
																		';
																	}
															?>
														</ul>
													</nav><!-- /.tabs__nav -->
												</div><!-- /.tabs__head -->
												
												<div class="tabs__body">
													<?php
														include 'php/database_connect.php';


														$result = mysqli_query($databaseConnect, "SELECT * FROM category");

														$row = mysqli_fetch_array($result);

														$index = sizeof($row);

														for ($i=1; $i <= $index; $i++) { 

															echo '<div class="tab '. $row['Name'] .'">
																	<div class="products">
																		<ul>';

															$categoryProducts = mysqli_query($databaseConnect, "SELECT * FROM products WHERE Category_id=$i AND Colors LIKE '%Gold%' LIMIT 0, 4");

															while ($categoryProduct = mysqli_fetch_array($categoryProducts)) { 
																
																if(strpos($categoryProduct["Image"], ', ') !== false) {
																	$images = explode(', ', $categoryProduct["Image"]);

																	$image = $images[0];
																} else {
																	$image = $categoryProduct["Image"];
																}

																echo '
																	<li>
																		<div class="product">
																			<div class="product__image">
																				<img src="assets/images/' . $image . '" alt="">
																			</div><!-- /.product__image -->
																			
																			<div class="product__body">
																				<h2 class="product__title">' . $categoryProduct["Name"] . '</h2><!-- /.product__title -->
																				
																				<p>' . $categoryProduct["Description"] . '</p>
																				
																				<span>$' . $categoryProduct["Price"] . '</span>
																			</div><!-- /.product__body -->

																			<a href="product.php?product=' . $categoryProduct["id"] . '"></a>
																		</div><!-- /.product -->
																	</li>
																';
															}
														
														echo '		</ul>
																</div><!-- /.products -->
															</div><!-- /.tab -->';

														}
													?>
												</div><!-- /.tabs__body -->
											</div><!-- /.tabs js-tabs -->
										</div><!-- /.inner-menu -->
									</div><!-- /.tab -->
									
									<div class="tab">
										<div class="inner-menu">
											<div class="tabs js-tabs">
												<div class="tabs__head">
													<nav class="tabs__nav">
														<ul>

															<?php
																include 'php/database_connect.php';

																$result = mysqli_query($databaseConnect, "SELECT * FROM category");
																	while ($row = mysqli_fetch_array($result)) {
																		echo '
																			<li>
																				<a href="#">' . $row["Name"] . '</a>
																			</li>
																		';
																	}
															?>
														</ul>
													</nav><!-- /.tabs__nav -->
												</div><!-- /.tabs__head -->
												
												<div class="tabs__body">
													<?php
														include 'php/database_connect.php';


														$result = mysqli_query($databaseConnect, "SELECT * FROM category");

														$row = mysqli_fetch_array($result);

														$index = sizeof($row);

														for ($i=1; $i <= $index; $i++) { 

															echo '<div class="tab '. $row['Name'] .'">
																	<div class="products">
																		<ul>';

															$categoryProducts = mysqli_query($databaseConnect, "SELECT * FROM products WHERE Category_id=$i AND Colors LIKE '%Silver%' LIMIT 0, 4");

															while ($categoryProduct = mysqli_fetch_array($categoryProducts)) { 
																
																if(strpos($categoryProduct["Image"], ', ') !== false) {
																	$images = explode(', ', $categoryProduct["Image"]);

																	$image = $images[1];
																} else {
																	$image = $categoryProduct["Image"];
																}

																echo '
																	<li>
																		<div class="product">
																			<div class="product__image">
																				<img src="assets/images/' . $image . '" alt="">
																			</div><!-- /.product__image -->
																			
																			<div class="product__body">
																				<h2 class="product__title">' . $categoryProduct["Name"] . '</h2><!-- /.product__title -->
																				
																				<p>' . $categoryProduct["Description"] . '</p>
																				
																				<span>$' . $categoryProduct["Price"] . '</span>
																			</div><!-- /.product__body -->

																			<a href="product.php?product=' . $categoryProduct["id"] . '"></a>
																		</div><!-- /.product -->
																	</li>
																';
															}
														}

														echo '		</ul>
																</div><!-- /.products -->
															</div><!-- /.tab -->';
													?>
												</div><!-- /.tabs__body -->
											</div><!-- /.tabs js-tabs -->
										</div><!-- /.inner-menu -->
									</div><!-- /.tab -->
								</div><!-- /.tabs__body -->
							</div><!-- /.tabs js-tabs -->
						</div><!-- /.dropdown -->
					</li>

					<li>
						<a href="contact.php">Contact us</a>
					</li>

					<li>
						<a href="about.php">About us</a>
					</li>

					<li>
						<a href="services.php">Services</a>
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
