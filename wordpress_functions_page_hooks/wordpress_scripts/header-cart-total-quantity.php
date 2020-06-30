<?php /* header cart icon WooCommerce Cart icon and total quantiy added on cart */
	global $woocommerce;
			echo '<a id="header_cart" href="'. $woocommerce->cart->get_cart_url() .'"><i class="fa fa-cart"></i><span>'. $woocommerce->cart->cart_contents_count .'</span></a>';
?>