<?php include 'head.php';?>

<body>
	<div class="main">
		<?php include 'header.php';?>
		
		<div class="shell">
			<div class="products">
				<ul>
					<?php
						include 'php/database_connect.php';

						$result = mysqli_query($databaseConnect, "SELECT * FROM products WHERE Category_id=3");
							while ($row = mysqli_fetch_array($result)) {
								
								$images = explode(", ", $row["Image"]);

								echo '
									<li>
										<div class="product">
											<div class="product__image">
												<img src="assets/images/' . $images[0] . '" alt="">
											</div><!-- /.product__image -->
											
											<div class="product__body">
												<h2 class="product__title">' . $row["Name"] . '</h2><!-- /.product__title -->
												
												<p>' . $row["Description"] . '</p>
												
												<span>$' . $row["Price"] . '</span>
											</div><!-- /.product__body -->

											<a href="product.php?product=' . $row["id"] . '"></a>
										</div><!-- /.product -->
									</li>
								';
							}
					?>
				</ul>
			</div><!-- /.products -->
		</div><!-- /.shell -->
	</div><!-- /.main -->

	<?php include 'footer.php';?>
</body>

</html>
