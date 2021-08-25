<?php include 'head.php';?>

<body>
	<div class="main">
		<?php include 'header.php';?>
		
		<div class="shell">
			<div class="hero">
				<div class="hero__image">
					<img src="assets/images/home.jpg" alt="" width="960" height="460">
				</div><!-- /.hero__image -->

				<h1>Featured Products</h1>

				<div class="hero__body">
					<div class="products products--home">
						<ul>
						<?php
							include 'php/database_connect.php';

							$query = mysqli_query($databaseConnect, "SELECT * FROM products");

							$allProductsNumber = 0;

							while ($allProducts = mysqli_fetch_array($query)) { 
								$allProductsNumber++;
							}

							$numbers = range(1, $allProductsNumber);
							shuffle($numbers);

							$randomProducts = array_slice($numbers, 0, 4);

							for ($i=0; $i < 4; $i++) { 

								$query = mysqli_query($databaseConnect, "SELECT * FROM products WHERE id='$randomProducts[$i]'");

								$product = mysqli_fetch_array($query);

								if(strpos($product["Image"], ', ') !== false) {
									$images = explode(', ', $product["Image"]);

									$image = $images[mt_rand(0, 1)];
								} else {
									$image = $product["Image"];
								}

								echo '
									<li>
										<div class="product product--small">
											<div class="product__image">
												<img src="assets/images/' . $image . '" alt="">
											</div><!-- /.product__image -->
											
											<div class="product__body">
												<h2 class="product__title">' . $product["Name"] . '</h2><!-- /.product__title -->
												
												<span>$' . $product["Price"] . '</span>
											</div><!-- /.product__body -->

											<a href="product.php?product=' . $product["id"] . '"></a>
										</div><!-- /.product -->
									</li>
								';
							}
						?>
						</ul>
					</div>
				</div><!-- /.hero__body -->
			</div><!-- /.hero -->
		</div><!-- /.shell -->
	</div><!-- /.main -->

	<?php include 'footer.php';?>
</body>

</html>
