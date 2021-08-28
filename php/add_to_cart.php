<?php
	include 'database_connect.php';

	if(isset($_POST['add-to-cart'])) {

		$productId = $_POST['product'];
		$productColor = $_POST['color']; 
		$count = $_POST['counter']; 

		$newProduct = array('product_id' => $productId, 'count' => $count, 'product_color' => $productColor);
		// var_dump($newProduct);

		session_start();
		
		if( empty( $_SESSION['cart'] ) ) {
			$_SESSION['cart'] = array();
		}

		// array_push($_SESSION['cart'], $newProduct);

	
			echo 'before for: '.count($_SESSION['cart']);
			echo '<br>';

			$product_ids = array();
			if ( ! empty( $_SESSION['cart'] ) ) {
				foreach ( $_SESSION['cart'] as $product_item ) {
					$product_ids[] = $product_item["product_id"];
				}

			}
			var_dump($newProduct);

			if( array_search($newProduct['product_id'], $product_ids ) === false ) {
				array_push($_SESSION['cart'], $newProduct);
			} else {
				$is_new = true;
				for ($i=0; $i < count($_SESSION['cart']); $i++) { 
					if( $newProduct['product_id'] === $_SESSION['cart'][$i]['product_id'] ) {
						if ( $newProduct['product_color'] === $_SESSION['cart'][$i]['product_color'] ) {
							echo '<br>count: '.$_SESSION['cart'][$i]['count'];
							$_SESSION['cart'][$i]['count'] += $newProduct['count'];
							$is_new = false;
							break;
						} 
						echo '<br>'.array_search($newProduct['product_id'], $_SESSION['cart'][$i]);
					} 
				}

				if ( $is_new ) {
					array_push($_SESSION['cart'], $newProduct);
				}

				echo '<br>new id: '.$newProduct['product_id'];
				echo '<br>old id: '.$_SESSION['cart'][$i]['product_id'];
			}
				echo '<br>new id: '.$newProduct['product_id'];
				print_r($_SESSION['cart']);
			
		}
//	}
	// header("location: ../product.php?product=$productId");
?>
<!-- 

if($newProduct['product_id'] == $_SESSION['cart'][$i]['product_id']) {
					// echo '<br>new color: '.$newProduct['product_color'];
					// echo '<br>old color: '.$_SESSION['cart'][$i]['product_color'];

					if($newProduct['product_color'] == $_SESSION['cart'][$i]['product_color']) {
						// echo '<br>new count: '.$newProduct['count'];
						// echo '<br>old count: '.$_SESSION['cart'][$i]['count']; -->
