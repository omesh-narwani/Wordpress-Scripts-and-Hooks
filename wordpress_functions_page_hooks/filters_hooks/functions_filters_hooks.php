/**
 * Change the gallery thumbnail image size.
 * @link https://github.com/woocommerce/woocommerce/wiki/Customizing-image-sizes-in-3.3-
 */
 if ( ! function_exists( 'ultra_woocommerce_single_gallery_thumbnail_size' ) ) :
function ultra_woocommerce_single_gallery_thumbnail_size( $size ) {
    return array(
        'width'  => 150,
        'height' => 100,
        'crop'   => 1,
    );	
}
endif;
add_filter( 'woocommerce_get_image_size_gallery_thumbnail', 'ultra_woocommerce_single_gallery_thumbnail_size' );




/* 1. ###Add role class to body Filter####  */

add_filter('body_class','add_role_to_body');
function add_role_to_body($classes) {
	global $current_user;
	$user_role = array_shift($current_user->roles);
	$classes[] = 'role-'. $user_role;
	return $classes;
}

/* 2. ###Add role class to ADMIN body Filter####  */

add_filter( 'admin_body_class', 'custom_admin_body_class' );
function custom_admin_body_class( $classes ) {
    global $current_user;
    $user_role = array_shift($current_user->roles);
    $classes .= ' role-'. $user_role;
	return $classes;
}

/* 3. ###WOOCOMERCE Add to cart button text change####  */

add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );    // 2.1 +
	function woo_archive_custom_cart_button_text() {
	return __( 'My Button Text', 'woocommerce' );
	}
}

/* 4. ###WOOCOMERCE Add to cart button text change by product category####  */
add_filter( 'woocommerce_product_add_to_cart_text', 'bbloomer_archive_custom_cart_button_text' );
 function bbloomer_archive_custom_cart_button_text() {
	global $product;       
	if ( has_term( 'arcade-machine-stands', 'product_cat', $product->ID ) ) {           
	return 'View more';
	} else {
	return 'Add To Basket';
	}
}

/* 5. ###WOOCOMERCE Message on checkout page top####  */
add_action( 'woocommerce_before_checkout_form', 'wnd_checkout_message', 10 );
	function wnd_checkout_message( ) {
		echo '<div class="wnd-checkout-message"><h3>For shipments outside the United States, call <a href=tel:"333-444-5555">333-444-5555</a>!</h3>
</div>';
}

/* 6. ###WOOCOMERCE Checkout page add confirm email field with email address####  */
/**
* @snippet Add "Confirm Email Address" Field @ WooCommerce Checkout
* @how-to Watch tutorial @ https://businessbloomer.com/?p=19055
* @sourcecode https://businessbloomer.com/?p=72602
* @author Rodolfo Melogli
* @testedwith WooCommerce 3.0.7
*/
add_filter( 'woocommerce_checkout_fields' , 'bbloomer_add_email_verification_field_checkout' );
	function bbloomer_add_email_verification_field_checkout( $fields ) {
		$fields['billing']['billing_email']['class'] = array('form-row-first');
		$fields['billing']['billing_em_ver'] = array(
			'label'     => __('Confirm Email Address', 'bbloomer'),
			'required'  => true,
			'class'     => array('form-row-last'),
			'clear'     => true
		);
		return $fields;
	}

/** 
* @Generate error message if field values are different
*/
add_action('woocommerce_checkout_process', 'bbloomer_matching_email_addresses');
	function bbloomer_matching_email_addresses() { 
		$email1 = $_POST['billing_email'];
		$email2 = $_POST['billing_em_ver'];
		if ( $email2 !== $email1 ) {
		wc_add_notice( __( 'Your email addresses do not match', 'bbloomer' ), 'error' );
		}
	}