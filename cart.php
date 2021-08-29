<?php include 'head.php';?>

<body>
	<div class="main">
		<?php include 'header.php';?>
		
		<div class="shell">
			<div class="cart">
				<div class="cart__head">
					<h1 class="cart__title">Shopping cart</h1><!-- /.cart__title -->
				</div><!-- /.cart__head -->

				<div class="cart__body">
					<div class="products-list">
						<ul>
							<li class="empty-cart">
								<h1>No items in cart</h1>
							</li>

							<?php
								include 'php/database_connect.php';

								$totalPrice = 0;

								for ($i=0; $i < count($_SESSION['cart']); $i++) { 
									$product_id = $_SESSION['cart'][$i]['product_id'];

									$result = mysqli_query($databaseConnect, "SELECT * FROM products WHERE id=$product_id");
									$product = mysqli_fetch_array($result);

									$totalPrice += $product['Price'] * $_SESSION['cart'][$i]['count'];

									$images = explode(", ", $product["Image"]);

									if(strpos($product["Image"], ', ') !== false) {
										$images = explode(', ', $product["Image"]);

										if($_SESSION['cart'][$i]['product_color'] === 'Gold') {
											$image = $images[0];
										} elseif ($_SESSION['cart'][$i]['product_color'] === 'Silver') {
											$image = $images[1];
										}
									} else {
										$image = $product["Image"];
									}


									echo '
										<li>
											<form action="php/remove_form_cart.php" method="post" class="form-product form-product--2">
												<div class="form__body">
													<div class="product product--cart">
														<div class="product__image">
															<img src="assets/images/' . $image . '" alt="">
														</div><!-- /.product__image -->
														
														<div class="product__body">
															<h2 class="product__title">' . $product["Name"] . '</h2><!-- /.product__title -->
															
															<p>' . $product["Description"] . '</p>
															
															<span>$' . $product["Price"] . '</span>
														</div><!-- /.product__body -->

														<a href="product.php?product=' . $product["id"] . '"></a>
													</div><!-- /.product -->
												</div><!-- /.form__body -->
												
												<div class="form__actions">
													<div class="form__counter">
														<p>Number:</p>
														<p>'.$_SESSION['cart'][$i]['count'].'</p>
													</div><!-- /.form__counter -->

													<button type="submit" value="'. $i .'" name="remove" class="form__btn">Remove</button>
												</div><!-- /.form__actions -->
											</form>
										</li>
									';
								}
							?>
						</ul>

						<?php echo '<div class="total-price">
										<p>Total Price:</p>

										<p>$'.$totalPrice.'</p>
									</div>'
						?>
					</div><!-- /.products-list -->

					<form action="php/send_order.php" method="post" class="form-order">
						<div class="form__actions">
							<input type="submit" value="Send order" name="send-order" class="form__btn">
						</div><!-- /.form__actions -->
					</form>
				</div><!-- /.cart__body -->
			</div><!-- /.cart -->
		</div><!-- /.shell -->
	</div><!-- /.main -->

	<?php include 'footer.php';?>
</body>

</html>
