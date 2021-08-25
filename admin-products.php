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
			<h2>Products</h2>
			
			<div class="form">
				<form action="php/add_product.php" method="post">
					<div class="form__head">
						<h2>Add product</h2>
					</div><!-- /.form__head -->
					
					<div class="form__body">
						<div class="form__row">
							<div class="form__col">
								<label for="name" class="form__label hide">Name</label>
								
								<div class="form__controls">
									<input type="text" class="field" name="name" id="name" value="" placeholder="Name">
								</div><!-- /.form__controls -->
							</div><!-- /.form__col -->

							<div class="form__col">
								<label for="price" class="form__label hide">Price</label>
								
								<div class="form__controls">
									<input type="number" class="field" name="price" id="price" value="" placeholder="Price">
								</div><!-- /.form__controls -->
							</div><!-- /.form__col -->

							<div class="form__col">
								<div class="select">
									<select name="category" id="category">
										<option value="" disabled selected>Category</option>
										<?php
											include 'php/database_connect.php';

											$result = mysqli_query($databaseConnect, "SELECT * FROM category ORDER BY category_id");
											while ($row = mysqli_fetch_array($result)) {
												$categoryId = $row['category_id'];
												
												echo '
													<option value="' . $categoryId . '">' . $row["category_name"] . '</option>
												';
											}
										?>
									</select>
								</div><!-- /.select -->
							</div><!-- /.form__col -->

							<div class="form__col">
								<div class="checkboxes">
									<ul>
										<li>
											<div class="checkbox">
												<input type="checkbox" name="gold" id="gold">
												
												<label for="gold">Gold</label>
											</div><!-- /.checkbox -->
										</li>
										
										<li>
											<div class="checkbox">
												<input type="checkbox" name="silver" id="silver">
												
												<label for="silver">Silver</label>
											</div><!-- /.checkbox -->
										</li>
									</ul>
								</div><!-- /.checkboxes -->
							</div><!-- /.form__col -->
						</div><!-- /.form__row -->

						<div class="form__row">
							<div class="form__col form__controls--file">
								<label for="image-gold" class="form__label form__label--file">Image gold upload</label>
								
								<div class="form__controls">
									<input type="file" class="field field--file" name="image-gold" id="image-gold" value="" placeholder="Image gold upload">
								</div><!-- /.form__controls -->
							</div><!-- /.form__col -->

							<div class="form__col form__controls--file">
								<label for="image-silver" class="form__label form__label--file">Image silver upload</label>
								
								<div class="form__controls ">
									<input type="file" class="field field--file" name="image-silver" id="image-silver" value="" placeholder="Image silver upload">
								</div><!-- /.form__controls -->
							</div><!-- /.form__col -->
						</div><!-- /.form__row -->

						<div class="form__row description">
							<label for="description" class="form__label hide">Description</label>
							
							<div class="form__controls">
								<textarea class="field field--textarea" name="description" id="description" placeholder="Description"></textarea>
							</div><!-- /.form__controls -->
						</div><!-- /.form__row -->
					</div><!-- /.form__body -->
					
					<div class="form__actions">
						<input type="submit" name="submit" value="Add product" class="form__btn">
					</div><!-- /.form__actions -->
				</form>
			</div><!-- /.form -->

			<?php 
				if(isset($_GET['deleteP'])){
					if($_GET['deleteP'] == "complete"){
					echo '
						<div class="alert" role="alert">
							Product deleted
						</div>';
					}
				} else if(isset($_GET['upload'])){
					if($_GET['upload'] == "complete"){
					echo '
						<div class="alert alert--success" role="alert">
							Product added
						</div>';
					}
				}
			?>

			<div class="products-table">
				<form action="php/delete_product.php" method="POST"> 
					<table>
						<tr>
							<th>#</th>
							<th>Image</th>
							<th>Name</th>
							<th>Category</th>
							<th>Colors</th>
							<th>Description</th>
							<th>Delete Item</th>
						</tr>

						<?php
							include 'php/database_connect.php';

							$result = mysqli_query($databaseConnect, "SELECT * FROM `products` INNER JOIN category ON products.Category_id=category.category_id ORDER BY products.id");

							$num = 1;

							while ($row = mysqli_fetch_array($result)) {
								
								if(strpos($row["Image"], ', ') !== false) {
									$images = explode(', ', $row["Image"]);

									$image = $images[0];
								} else {
									$image = $row["Image"];
								}

								

								echo '
									<tr>
										<td>'.$num.'</td>
										<td><img src="assets/images/' . $image . '" alt=""></td>
										<td>' . $row["Name"] . '</td>
										<td>' . $row["category_name"] . '</td>
										<td>' . $row["Colors"] . '</td>
										<td>' . $row["Description"] . '</td>
										<td><button type="submit" value="'. intval($row["id"]) .'" name="delete" class="btn btn-red">X</button></td>
									</tr>
								';

								$num++;
							}
						?>
					</table>
				</form>
			</div><!-- /.products-table -->
		</div><!-- /.admin__body -->
	</div><!-- /.admin -->

	<?php include 'footer.php';?>
</body>

</html>
