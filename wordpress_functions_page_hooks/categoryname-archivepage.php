<?php
/* category name on archive page  */

add_action('woocommerce_after_shop_loop_item', 'add_procat' );
function add_procat(){
    global $woocommerce, $product;
    $product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );

    if ( $product_cats && ! is_wp_error ( $product_cats ) ){

        $single_cat = array_shift( $product_cats ); ?>

        <h3 itemprop="name" class="product_category_title"><span><?php echo $single_cat->name; ?></span></h3>
    <?php    
    }

}