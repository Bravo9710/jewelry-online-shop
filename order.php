<?php include 'head.php';?>

<body>
	<div class="main">
		<?php include 'header.php';?>
		
		<div class="shell">
			<div class="cart">
				<div class="cart__head">
					<h1 class="cart__title">Order #<?php 
								$order_id = $_GET['orderID'];

								echo $order_id;
							?>
					</h1><!-- /.cart__title -->
				</div><!-- /.cart__head -->

				<div class="cart__body">
					<div class="products-list">
						<ul>
							<?php
								include 'php/database_connect.php';
								$order_id = $_GET['orderID'];

								$totalPrice = 0;

								$result = mysqli_query($databaseConnect, 
											'SELECT 
												orders.order_id,
												orders.user_id,
												orders.purchase_item_id,
												orders.purchase_item_color,
												orders.count,
												orders.status, 
												products.id,
												products.Name,
												products.Price,
												products.Colors,
												products.Image,
												products.Description
											FROM orders JOIN products ON 
												orders.purchase_item_id = products.id 
											WHERE
												order_id='.$order_id);
								while($order = mysqli_fetch_array($result)) {
									$images = explode(", ", $order["Image"]);

									if(strpos($order["Image"], ', ') !== false) {
										$images = explode(', ', $order["Image"]);

										if($order['purchase_item_color'] === 'Gold') {
											$image = $images[0];
										} elseif ($order['purchase_item_color'] === 'Silver') {
											$image = $images[1];
										}
									} else {
										$image = $order["Image"];
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
															<h2 class="product__title">' . $order["Name"] . '</h2><!-- /.product__title -->
															
															<p>' . $order["Description"] . '</p>
															
															<span>$' . $order["Price"] . '</span>
														</div><!-- /.product__body -->

														<a href="product.php?product=' . $order["id"] . '"></a>
													</div><!-- /.product -->
												</div><!-- /.form__body -->
												
												<div class="form__actions">
													<div class="form__counter">
														<p>Number:</p>
														<p>'.$order['count'].'</p>
													</div><!-- /.form__counter -->
												</div><!-- /.form__actions -->
											</form>
										</li>
									';
								}
							?>
						</ul>
					</div><!-- /.products-list -->
				</div><!-- /.cart__body -->
			</div><!-- /.cart -->
		</div><!-- /.shell -->
	</div><!-- /.main -->

	<?php include 'footer.php';?>
</body>

</html>
