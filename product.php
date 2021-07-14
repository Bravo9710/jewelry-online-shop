<?php include 'head.php';?>

<body>
	<div class="main">
		<?php include 'header.php';?>
		
		<div class="shell">
			<div class="product-full">
				<div class="product__head">
					<div class="product__image">
						<img src="assets/images/ring.jpg" alt="">
					</div><!-- /.product__image -->

					<div class="product__content">
						<h1 class="product__title">Dancho gei</h1><!-- /.product__title -->

						<div class="form-product">
							<form action="?" method="post">
								<div class="form__head"></div><!-- /.form__head -->
								
								<div class="form__body">
									<label for="color">Color</label>

									<select name="" id="color">
										<option value="">Silver</option>
										<option value="">Gold</option>
									</select>

									<div class="product__price">
										<p>20$</p>
									</div><!-- /.product__price -->

									<div class="product__body">
										<div class="product__tab">Description</div><!-- /.product__tab -->

										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur ut tempore et laboriosam cupiditate ducimus, eveniet quae dicta dolorum porro, minus id blanditiis repellat inventore dolor tempora quasi omnis, laborum.</p>
									</div><!-- /.product__body -->
								</div><!-- /.form__body -->

								<div class="counter">
									<a href="#" class="btn-remove"></a>

									<p class="counter__container">1</p>

									<a href="#" class="btn-add"></a>
								</div><!-- /.counter -->
								
								<div class="form__actions">
									<button type="submit" value="Submit" class="form__btn">
										Add to cart <i class="fas fa-cart-plus"></i>
									</button>
								</div><!-- /.form__actions -->
							</form>
						</div><!-- /.form -->
					</div><!-- /.product__content -->
				</div><!-- /.product__head -->
			</div><!-- /.product-full -->
		</div><!-- /.shell -->
	</div><!-- /.main -->

	<?php include 'footer.php';?>
</body>

</html>
