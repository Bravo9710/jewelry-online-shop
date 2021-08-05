<?php include 'head.php';?>

<body>
	<div class="main">
		<?php include 'header.php';?>
		
		<div class="shell">
			<div class="product-full">
				<div class="product__head">
					<?php
						include 'php/database_connect.php';

							$product_id = $_GET['product'];
							$sqlQuery = 'SELECT * FROM products WHERE id='.$product_id;

							$result = mysqli_query($databaseConnect, $sqlQuery);
								while ($row = mysqli_fetch_array($result)) {
									echo '
										<div class="product__image">
											<img src="' . $row["Image"] . '" alt="">
										</div>

										<div class="product__content">
											<h1 class="product__title">' . $row["Name"] . '</h1>

											<div class="form-product">
												<form action="?" method="post">
													<div class="form__head"></div>
													
													<div class="form__body">
														<label for="color">Color</label>

														<select name="" id="color">
															<option value="">' . $row["Color_id"] . '</option>
															<option value="">Gold</option>
														</select>

														<div class="product__price">
															<p>$' . $row["Price"] . '</p>
														</div>

														<div class="product__body">
															<div class="product__tab">Description</div>

															<p>' . $row["Description"] . '</p>
														</div>
													</div>

													<div class="counter">
														<a href="#" class="btn-remove"></a>

														<p class="counter__container">1</p>

														<a href="#" class="btn-add"></a>
													</div>
													
													<div class="form__actions">
														<button type="submit" value="Submit" class="form__btn">
															Add to cart <i class="fas fa-cart-plus"></i>
														</button>
													</div>
												</form>
											</div>
										</div>
									';
								}
					?>
				</div><!-- /.product__head -->
			</div><!-- /.product-full -->
		</div><!-- /.shell -->
	</div><!-- /.main -->

	<?php include 'footer.php';?>
</body>

</html>
