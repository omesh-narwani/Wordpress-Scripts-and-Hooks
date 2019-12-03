<?php
/ STAR RATING FUNCTIONS.PHP  /
add_action('woocommerce_after_shop_loop_item_title', 'add_star_rating' );
function add_star_rating()
{
global $woocommerce, $product;
$average = $product->get_average_rating();

echo '<div class="star-rating"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div>';
}