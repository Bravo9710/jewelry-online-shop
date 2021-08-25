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
				<div class="form">
					<form action="php/add_category.php" method="post">
						<div class="form__head">
							<h2>Add category</h2>
						</div><!-- /.form__head -->
						
						<div class="form__body">
							<div class="form__row">
								<div class="form__col">
									<label for="category" class="form__label hide">Category</label>
									
									<div class="form__controls">
										<input type="text" class="field" name="category" id="category" value="" placeholder="Category">
									</div><!-- /.form__controls -->
								</div><!-- /.form__col -->
							</div><!-- /.form__row -->
						</div><!-- /.form__body -->
						
						<div class="form__actions form__actions--category">
							<input type="submit" name="submit" value="Add category" class="form__btn">
						</div><!-- /.form__actions -->
					</form>
				</div><!-- /.form -->

				<div class="products-table table--category">
					<form action="php/delete_category.php" method="POST"> 
						<table>
							<colgroup>
								<col style="min-width: 50px">
								<col style="min-width: 200px">
								<col style="max-width: 30px">
							</colgroup>

							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Delete</th>
							</tr>

							<?php
								include 'php/database_connect.php';

								$result = mysqli_query($databaseConnect, "SELECT * FROM category ORDER BY category_id");

								$num = 1;

								while ($row = mysqli_fetch_array($result)) {
									$categoryId = $row['category_id'];
									
									echo '
										<tr>
											<td>'.$num.'</td>
											<td>' . $row["category_name"] . '</td>
											<td><button type="submit" value="'. intval($categoryId) .'" name="delete" class="btn btn-red">X</button></td>
										</tr>
									';

									$num++;
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
