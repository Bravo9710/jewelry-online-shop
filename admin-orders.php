<?php include 'head.php';?>

<body>
	<div class="admin">
		<div class="admin__menu">
			<h2><a href="admin-page.php">Admin Menu</a></h2>

			<nav class="nav-admin">
				<ul>
					<li>
						<a href="admin-products.php">Products</a>
					</li>
					
					<li>
						<a href="admin-orders.php">Orders</a>
					</li>
					
					<li>
						<a href="admin-categories.php">Categories</a>
					</li>

					<li>
						<a href="php/logout_code.php">Log out</a>
					</li>
				</ul>
			</nav><!-- /.nav -->
		</div><!-- /.admin__menu -->

		<div class="admin__body">
			<h2>Orders</h2>

			<?php 
				if(isset($_GET['deleteCategory'])){
					if($_GET['deleteCategory'] == "complete"){
					echo '
						<div class="alert" role="alert">
							Category deleted
						</div>';
					}
				} else if(isset($_GET['addCategory'])){
					if($_GET['addCategory'] == "complete"){
					echo '
						<div class="alert alert--success" role="alert">
							Category added
						</div>';
					}
				}
			?>
			
			<div class="container">
				<div class="products-table table--category">
					<form action="php/delete_category.php" method="POST"> 
						<table>
							<colgroup>
								<col style="min-width: 50px">
								<col style="min-width: 200px">
								<col style="max-width: 30px">
							</colgroup>

							<tr>
								<th>Order ID#</th>
								<th>Status</th>
								<th>Total Products</th>
								<th>Total Price</th>
								<th>User</th>
							</tr>

							<?php
								include 'php/database_connect.php';

								$sqlQuery = 'SELECT * FROM orders';
								
								$orders = [];

								$ordersStatus = ['pending', 'ordered', 'canceled'];
								
								$result = mysqli_query($databaseConnect, $sqlQuery);
								while ($row = mysqli_fetch_array($result)) {
									array_push($orders, $row["order_id"]);
								}

								$ordersFiltered = array_values(array_unique($orders));

								$totalProducts = 0;
								$totalPrice = 0;

								for ($i=0; $i < count($ordersFiltered); $i++) { 
									$sqlQuery = 
										'SELECT 
											orders.order_id,
											orders.user_id,
											orders.count,
											orders.status,
											users.firstname,
											users.lastname,
											products.price
										FROM orders 
										INNER JOIN products ON 
											orders.purchase_item_id = products.id 
										INNER JOIN users ON 
											orders.user_id = users.id 
										WHERE
											order_id='.$ordersFiltered[$i];

									$result = mysqli_query($databaseConnect, $sqlQuery);

									while($row = mysqli_fetch_array($result)) {
										$totalPrice += $row["count"]*$row["price"];
										$totalProducts += $row["count"];
										$orderId = $row['order_id'];
										$orderStatus = $row['status'];
										$user = $row['firstname'] .' '. $row['lastname'];
									}
									
									echo '
										<tr>
											<td><a href="order.php?orderID='.$orderId.'" class="">'.$orderId.'</a></td>
											<td>
												<div class="form form--status">
													<form action="php/update_order_status.php" method="post">
														<div class="form__body">
															<div class="form__row">
																<label for="'.$orderId.'" class="hide form__label">'.$orderId.'</label>
																
																<div class="form__controls">
																	<div class="select">
																		<select name="status" id="'.$orderId.'">
																		';

																		for ($y=0; $y < count($ordersStatus); $y++) { 
																			// echo $ordersStatus[$y];

																			if($ordersStatus[$y] === $orderStatus) {
																				echo '<option value="' . $orderStatus . '" selected>' . $orderStatus . '</option>';
																			} else {
																				echo '<option value="' . $ordersStatus[$y] . '">' . $ordersStatus[$y] . '</option>';
																			}
																		};

																	echo '
																		</select>
																	</div><!-- /.select -->
																</div><!-- /.form__controls -->
															</div><!-- /.form__row -->
														</div><!-- /.form__body -->
														
														<div class="form__actions">
															<button type="submit" value="'. $orderId .'" name="update" class="btn form__btn">Update</button>
														</div><!-- /.form__actions -->
													</form>
												</div><!-- /.form -->
											</td>
											<td>' . $totalProducts . '</td>
											<td>' . $totalPrice . '</td>
											<td>' . $user . '</td>
										</tr>
									';

									$totalProducts = 0;
									$totalPrice = 0;
								}
							?>
						</table>
						
					</form>
				</div><!-- /.products-table -->
			</div><!-- /.container -->
		</div><!-- /.admin__body -->
	</div><!-- /.admin -->

	<?php include 'footer.php';?>
</body>

</html>
