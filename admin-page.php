<?php include 'head.php';?>

<body>
	<div class="admin">
		<div class="admin__menu">
			<h2>Admin Menu</h2>

			<nav class="nav-admin">
				<ul>
					<li>
						<a href="#">Categories</a>
					</li>
					
					<li>
						<a href="#">Orders</a>
					</li>
					
					<li>
						<a href="#">Products</a>
					</li>

					<li>
						<a href="#">Log out</a>
					</li>
				</ul>
			</nav><!-- /.nav -->
		</div><!-- /.admin__menu -->

		<?php
			include 'php/database_connect.php';
		?>

		<div class="admin__body">
			<h2>Home</h2>

			<div class="components">
				<ul>
					<li>
						<div class="component">
							<div class="component__image">
								<img src="assets/images/product.svg" alt="">
							</div><!-- /.component__image -->
							
							<div class="component__body">
								<h5>Total products</h5>
								
								<h6><?php 
									$sqlQuery = 'SELECT * FROM products';
									$result = mysqli_query($databaseConnect, $sqlQuery);
									$products = mysqli_num_rows($result);
									echo $products ?>
								</h6>
							</div><!-- /.component__body -->
						</div><!-- /.component -->
					</li>
					
					<li>
						<div class="component">
							<div class="component__image">
								<img src="assets/images/order.svg" alt="">
							</div><!-- /.component__image -->
							
							<div class="component__body">
								<h5>Total orders</h5>
								
								<h6><?php 
										$sqlQuery = 'SELECT * FROM orders';
										$result = mysqli_query($databaseConnect, $sqlQuery);
										$orders = mysqli_num_rows($result);
										echo $orders;
									?>
								</h6>
							</div><!-- /.component__body -->
						</div><!-- /.component -->
					</li>
					
					<li>
						<div class="component">
							<div class="component__image">
								<img src="assets/images/category.svg" alt="">
							</div><!-- /.component__image -->
							
							<div class="component__body">
								<h5>Total categories</h5>
								
								<h6><?php 
									$sqlQuery = 'SELECT * FROM category';
									$result = mysqli_query($databaseConnect, $sqlQuery);
									$categories = mysqli_num_rows($result);
									echo $categories ?>
								</h6>
							</div><!-- /.component__body -->
						</div><!-- /.component -->
					</li>
				</ul>
			</div><!-- /.components -->
		</div><!-- /.admin__body -->
	</div><!-- /.admin -->

	<?php include 'footer.php';?>
</body>

</html>
