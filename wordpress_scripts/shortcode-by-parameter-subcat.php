<?php
/*  use => [subcategory catID="38"] */
/* SHORTCODE BY PARAMETER */

function subcategory($atts){
	//print_r($atts);
	$catid = $atts['catid'];
	$parent_id = $catid;
	$args = array(
		'parent' => $parent_id,
		 'hide_empty' => 0
	);
	$terms = get_terms( 'product_cat', $args );   
	print_r( $terms );
}
add_shortcode('subcategory' , 'subcategory');
?>