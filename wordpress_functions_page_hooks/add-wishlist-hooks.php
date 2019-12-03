add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_display_yith_wishlist_loop', 1 );
 
function bbloomer_display_yith_wishlist_loop() {
echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
}