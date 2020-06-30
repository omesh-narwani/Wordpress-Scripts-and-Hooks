// Set product quantity added to cart (handling ajax add to cart)
add_filter( 'woocommerce_add_to_cart_quantity','woocommerce_add_to_cart_quantity_callback', 10, 2 );
function woocommerce_add_to_cart_quantity_callback( $quantity, $product_id ) {
    if( $quantity < 10 ) {
        $quantity = 10;
    }
    return $quantity;
}
// Set the product quantity min value
add_filter( 'woocommerce_quantity_input_args', 'woocommerce_quantity_input_args_callback', 10, 2 );
function woocommerce_quantity_input_args_callback( $args, $product ) {
    $args['input_value'] = 10;
    $args['min_value']   = 10;

    return $args;
}